<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Admin Portal</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/materialize-icon/materialize-icons.css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
    <?php
        $request = $_SERVER['REQUEST_URI'];
        $title = '';

        switch ($request) {
            case '/' :
                $title = 'Dashboard';
                break;
            case '/users' :
                $title = 'Users';
                break;
            case '/rents' :
                $title = 'Rents';
                break;
            default:
                http_response_code(404);
                break;
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
                                    <li class="active"><?= $title ?></li>
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
                        $request = $_SERVER['REQUEST_URI'];

                        switch ($request) {
                            case '/' :
                                include('pages/dashboard.php');
                                break;
                            case '/users' :
                                include('pages/users.php');
                                break;
                            case '/rents' :
                                include('pages/rents.php');
                                break;
                            default:
                                http_response_code(404);
                                break;
                        }
                    ?>
                </section>
                <?php include('layouts/footer.php') ?>
            </section>
        </div>
    </div>
</body>

<script src="js/jquery/jquery.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="node_modules/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="js/jquery/jquery.name.badges.js"></script>
<script src="js/layout.js"></script>
</html>