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
    <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js"></script>
    <script>
        function searchProgram() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("program");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
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
                <li class="nav-item" role="presentation"><a class="nav-link active" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/login" style="color: #ffffff;">Login<span class="glyphicon glyphicon-log-in"></span></a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluide text-center">
    <div class="row">