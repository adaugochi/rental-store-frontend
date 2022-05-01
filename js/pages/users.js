(function ($) {
    const baseURL = 'http://localhost:8000/api/';
    const pathname = window.location.pathname;

    if (pathname === '/') {
        $.ajax({
            url: `${baseURL}rent/logs`,
            type: "GET",
            cache: true,
            success: function (response) {
                let result = response.result;
                let xValues = Object.keys(result);
                let yValues = Object.values(result);
                yValues.push(0)
                let barColors = ["green","purple","orange","brown"];

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {display: false},
                        title: {
                            display: true,
                            text: "A Chart showing the statistics of the logs."
                        }
                    }
                });
            }
        });
    }

    if (pathname === '/users') {
        let queryStr = window.location.search;
        $.ajax({
            url: `${baseURL}users${queryStr}`,
            type: "GET",
            cache: true,
            success: function (response) {
                let result = response.result;
                let data = result.data;
                $.each(data, function (key, value) {
                    let index =  parseInt(key) + 1;
                    $('#userRow').append(
                        `<tr>
                        <td>${index}</td>
						<td>${value.name}</td>
						<td>${value.email}</td>
						<td>${value.address}</td>
						<td>${value.created_at}</td>
						<td><a href="/users/${value.id}/rents">View Rents</a></td>
				    </tr>`);
                })

                let links = result.links;
                createPagination(links, '#pagination-user-list')
            }
        });
    }

    if (pathname === '/rents') {
        let queryStr = window.location.search;
        $.ajax({
            url: `${baseURL}rents${queryStr}`,
            type: "GET",
            cache: true,
            success: function (response) {
                let result = response.result;
                let data = result.data;
                $.each(data, function (key, value) {
                    let index =  parseInt(key) + 1;
                    $('#rentRow').append(
                        `<tr>
                            <td>${index}</td>
                            <td>${value.user.name}</td>
                            <td>${value.rent_type}</td>
                            <td><span class="status status-${value.status}">${value.status}</span></td>
                            <td>${value.updated_at}</td>
                        </tr>`
                    );
                })

                let links = result.links;
                createPagination(links, '#pagination-rent-list')
            }
        });
    }

    if (wildTest('/users/*/rents', pathname)) {
        let userId = pathname.split('/')[2];
        $.ajax({
            url: `${baseURL}users/${userId}/rents`,
            type: "GET",
            cache: true,
            success: function (response) {
                let result = response.result;
                $.each(result, function (key, value) {
                    let index =  parseInt(key) + 1;
                    $('#userRentRow').append(
                        `<tr>
                            <td>${index}</td>
                            <td>${value.rent_type}</td>
                            <td><span class="status status-${value.status}">${value.status}</span></td>
                            <td>${value.updated_at}</td>
                        </tr>`
                    );
                })
            }
        });
    }

    function createPagination($this, targetId) {
        $.each($this, function (key, value) {
            let isActive = value.active ? 'active' : '';
            let hasURL = value.url ? '' : 'disabled';
            let index =  parseInt(key) + 1;
            $(targetId).append(
                `
                    <li class="page-item ${isActive} ${hasURL}" aria-label="${value.label}">
                        <a href="?page=${index}" class="page-link">${value.label}</a>
                    </li>
                `
            );
        })
    }

    function wildTest(wildcard, str) {
        let w = wildcard.replace(/[.+^${}()|[\]\\]/g, '\\$&'); // regexp escape
        const re = new RegExp(`^${w.replace(/\*/g,'.*').replace(/\?/g,'.')}$`,'i');
        return re.test(str); // remove last 'i' above to have case sensitive
    }
})(jQuery);