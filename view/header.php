<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>SpiceProjects</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md" style="background-color: #282d32;">
    <div class="container-fluid"><a class="navbar-brand" href="#" style="color: #ffffff;font-size: 30px;">Education Program</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div
                class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="color: #ffffff;">Search</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: #ffffff;">Programs</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: #ffffff;">Schools</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color: #ffffff;">Advertisement</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/agent/edit" style="color: #ffffff;">Users</a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-item" role="presentation">
                    <?php if(isset($_SESSION['userLogin'])): ?>
                        <a class="log-button btn nav-link active" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/logout" >Logout <ion-icon name="log-out"></ion-icon></a>
                    <?php else: ?>
                        <a class="log-button btn nav-link active" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/login" >Login <ion-icon name="log-in"></ion-icon></span></a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluide text-center">
    <div class="row">