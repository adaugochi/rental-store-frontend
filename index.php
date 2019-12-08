<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>UI Portal</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/materialize-icon/materialize-icons.css">
<!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" type="text/css">-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">-->
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
<img src="/images/logo.png" alt=""/>
    <div class="wrapper">
        <?php include ('layouts/sidebar.php') ?>
        <div class="content-wrapper ">
            <?php include ('layouts/header.php') ?>
            <section class="content">
                <section class="content-header">
                    <div class="clearfix">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="content-header__title">Dashboard</h1>
                                <ol class="breadcrumb">
                                    <li><a href="/">Home</a></li>
                                    <li class="active">Admin</li>
                                    <li class="active">Invites</li>
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
                    <p>Body</p>
                </section>
                <?php include ('layouts/footer.php') ?>
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