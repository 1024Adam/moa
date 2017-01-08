<?php 
  session_start();
  include_once('../classes/Database.php');
 ?>
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
    <h1>&nbsp;Meal Organization Application</h1>
    <hr>
    <!-- Static navbar -->
    <div class="col-sm-2">
      <ul class="nav nav-pills nav-stacked">
        <li id="list-recipes" role="presentation"><a href="#" id="menu-recipes" class="nav-black-hover">Recipes</a></li>
        <li id="list-grocery" role="presentation"><a href="#" id="menu-grocery" class="nav-blakc-hover">Grocery List</a></li>
      </ul>
    </div>
    <div class="col-sm-6">
      <?php
        $db = new Database();
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
          // ADD REQUEST
          if(isset($_POST['new_submit']) && strcmp($_POST['new_submit'], 'true') == 0)
          {
            include('../templates/add_recipe.php');
          }
          // UPDATE REQUEST
          if(isset($_POST['edit_submit']) && strcmp($_POST['edit_submit'], 'true') == 0)
          {
            include('../templates/update_recipe.php');
          }
          // DELETE REQUEST
          if(isset($_POST['delete_submit']) && strcmp($_POST['delete_submit'], 'true') == 0)
          {
            include('../templates/delete_recipe.php');
          }
          // GROCERY REQUEST
          if(isset($_POST['grocery_submit']) && strcmp($_POST['grocery_submit'], 'true') == 0)
          {
            include('../templates/add_grocery.php');
          }
          // GROCERY REQUEST
          if(isset($_POST['delete_grocery']) && strcmp($_POST['delete_grocery'], 'true') == 0)
          {
            include('../templates/delete_grocery.php');
          }
        }
          
        include_once('../templates/recipes.php');
        include_once('../templates/grocery.php');
      ?>
    </div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
    <script defer async src="./js/moa.js"></script>
  </body>
</html>
