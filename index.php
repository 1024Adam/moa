<?php
  echo '
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- favicon -->
        <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
        <!-- unique meta -->
        <meta name="description" content="MOA - The Meal Organization Application">
        <meta name="keywords" content="Adam,Reid,Meal,Organization,Planner">
        <meta name="author" content="Adam Reid">
        <title>MOA</title>

        <!-- Bootstrap core CSS -->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/navbar-static-top.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">
      </head>
      <body>

        <!-- Static navbar -->
        <div class="col-sm-2">
          <ul class="nav nav-pills nav-stacked">
            <li id="list-home" role="presentation" class="active"><a href="#" id="menu-home">Home</a></li>
            <li id="list-meals" role="presentation"><a href="#" id="menu-meals" class="nav-black-hover">Meals</a></li>
            <li id="list-grocery" role="presentation"><a href="#" id="menu-grocery" class="nav-blakc-hover">Grocery List</a></li>
          </ul>
        </div>';
  include_once('home.php');
  include_once('meals.php');
  include_once('grocery.php');
  echo '
        <!-- Bootstrap core JavaScript
          ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="./js/ie10-viewport-bug-workaround.js"></script>
        <script defer async src="./js/moa.js"></script>
      </body>
    </html>';
?>
