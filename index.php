<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Admin Portal</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/materialize-icon/materialize-icons.css">
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
</head>
<body>
    <?php
        $request = strtok($_SERVER["REQUEST_URI"], '?');
        $breadCrumb = '';
        $title = '';
        //var_dump($request); exit();

        $uri_segments = explode('/', $request);

        if ($request === '/') {
            $title = 'Dashboard';
            $breadCrumb = '<li class="active">' . $title . '</li>';
        } elseif ($request === '/users') {
            $title = 'Users';
            $breadCrumb = '<li class="active">' . $title . '</li>';
        } elseif ($request === '/rents') {
            $title = 'Rents';
            $breadCrumb = '<li class="active">' . $title . '</li>';
        } elseif ($uri_segments[count($uri_segments) - 1] == 'rents') {
            $title = 'My Rents';
            $breadCrumb = '<li><a href="/users">Users</a></li><li class="active">Rents</li>';
        } else {
            $breadCrumb = '<li class="active">404</li>';;
            echo "<h1>Not Found</h1>";
        }
    ?>
    <div class="wrapper">
        <?php include('layouts/sidebar.php') ?>
        <div class="content-wrapper ">
            <?php include('layouts/header.php') ?>
            <section class="content">
                <section class="content-header">
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="content-header__title"><?= $title ?></h1>
                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <?= $breadCrumb ?>
                                </ol>
                            </div>
                            <div class="col-md-5">
                                <div class="content-header__right">
                                    <!--Content Header Right-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content-body">
                    <?php
                        $request = strtok($_SERVER["REQUEST_URI"], '?');
                        $uri_segments = explode('/', $request);

                        if ($request === '/') {
                            include('pages/dashboard.php');
                        } elseif ($request === '/users') {
                            include('pages/users.php');
                        } elseif ($request === '/rents') {
                            include('pages/rents.php');
                        } elseif ($uri_segments[count($uri_segments) - 1] == 'rents') {
                            include('pages/user-rents.php');
                        } else {
                            echo "<h1>Not Found</h1>";
                        }
                    ?>
                </section>
                <?php include('layouts/footer.php') ?>
            </section>
        </div>
    </div>
</body>

<script src="/js/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script src="/js/bootstrap/bootstrap.min.js"></script>
<script src="/node_modules/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="/js/jquery/jquery.name.badges.js"></script>
<script src="/js/layout.js"></script>
<script src="/js/pages/users.js"></script>
</html>