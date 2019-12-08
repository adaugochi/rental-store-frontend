(function ($) {
    let sidebarToggle = $(".custom-navbar__sidebar-toggle");
    let mainSidebar = $(".main-sidebar");
    let content = $(".content");
    let sideBar = $(".sidebar");
    let mainHeader = $(".main-header");
    let sidebarWidth = "144px";
    let slimscrollSize = "4px";
    let imageLabel = $(".image-label");
    let imagePreview = $(".image-preview");
    let imageName = $(".image-name");

    //Toggle Sidebar
    sidebarToggle.on('click', function () {
        mainSidebar.toggleClass('open');
        content.toggleClass('open');
    });

    content.on("click", function () {
        mainSidebar.removeClass("open");
        $(this).removeClass("open");
    });

    //Initialise SlimScroll
    $(window).resize(function () {
        sideBar.slimScroll({
            width: sidebarWidth,
            size: slimscrollSize,
            height: ($(window).height() - mainHeader.height()) + "px",
        });

        let imageLabelWidth = imageLabel.width();
        imageLabel.css("height", imageLabelWidth);
        imagePreview.css("height",  imageLabelWidth);
    }).resize();

    imageName.nameBadge({
        border: {},
        size: 40
    });

})(jQuery);
