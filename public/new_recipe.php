<?php 
  session_start(); 
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
        <form id="new_form" action="index.php" method="post">
          <h2>New Recipe</h2> 
       
          <div class="form-group required row">
            <label for="recipname" class="col-sm-2 col-form-label control-label">Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="recipname" id="recipname" value="" required>
            </div>
          </div>
          <div class="form-group required row">
            <label for="reciptype" class="col-sm-2 col-form-label control-label">Type</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="reciptype" id="reciptype" value="" required>
            </div>
          </div>
          <div class="form-group required row">
            <label for="recipdesc" class="col-sm-2 col-form-label control-label">Description</label>
            <div class="col-sm-5">
              <textarea class="form-control" name="recipdesc" id="recipdesc" required></textarea>
            </div>
          </div>
          <div class="form-group required row">
            <label for="recipserving" class="col-sm-2 col-form-label control-label">Serving</label>
            <div class="col-sm-4">
              <input type="number" class="form-control" name="recipserving" id="recipserving" value="1" min="1", max="10" required>
            </div>
          </div>
          <p>&nbsp;</p>

          <h3>Ingredients</h3>
          <button type="button" id="ing_button" class="btn btn-secondary">Show/Hide</button>
          <p>&nbsp;</p>
          <div id="ing_list" hidden>
            <?php include('../templates/ingredient_outline.php'); ?> 
          </div>
          <h3>Instructions</h3>
          <button type="button" id="instr_button" class="btn btn-secondary">Show/Hide</button>
          <p>&nbsp;</p>
          <div id="instr_list" hidden>
            <?php include('../templates/instruction_outline.php'); ?>
          </div>
          
          <input type="hidden" name="new_submit" id="new_submit" value="true">
          <button type="submit" name="new_save" id="new_save" class="btn btn-primary">Save</button>
          <button type="button" name="new_cancel" id="new_cancel" class="btn btn-secondary">Cancel</button>
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
