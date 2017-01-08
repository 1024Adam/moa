<?php 
  session_start(); 
  include_once('../classes/Database.php');
  $db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
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
        <li id="list-recipes" role="presentation"><a href="./index.php" id="menu-recipes" class="nav-black-hover">Recipes</a></li>
        <li id="list-grocery" role="presentation"><a href="./index.php" id="menu-grocery" class="nav-blakc-hover">Grocery List</a></li>
      </ul>
    </div>
    <div class="col-sm-7">
      <div class="jumbotron jumbo-padding jumbo-dark">
        <form id="edit_form" action="index.php" method="post">
          <?php
            $id = $_GET["id"];
             
            include('../templates/meal_info.php');
            include('../templates/ingredient_list.php');
            include('../templates/instruction_list.php');
            echo '<input type="hidden" name="recipid" id="recipid" value="' . $id . '">';
          ?>
          <input type="hidden" name="edit_submit" id="edit_submit" value="true">
          <button type="submit" name="edit_save" id="edit_save" class="btn btn-primary">Save</button>
          <button type="button" name="edit_cancel" id="edit_cancel" class="btn btn-secondary">Cancel</button>
        </form>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
    <script src="./js/moa.js"></script>
  </body>
</html>
