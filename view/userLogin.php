<?php
/**
 * Created by PhpStorm.
 * User: roger.kaufmann
 * Date: 24.10.2018
 * Time: 15:00
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WE-CRM</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<div class="container" style="display:flex;flex-direction:column;justify-content:center;">
    <div class="page-header">
        <h2 class="text-center"><strong>TestLogin</strong></h2></div>
    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/login" method="post">
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label class="control-label">
                    <input type="checkbox" name="remember" />Remember me for 30 days</label>
            </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </div><a class="text-primary already" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/request">Opps, I forgot my password.</a><br>
        <a class="text-primary already" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/register">Register here.</a></form>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>
