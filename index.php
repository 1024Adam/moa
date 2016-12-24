<?php 
  session_start();
  include_once('include/db.php');
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
        if(strcmp($_POST['edit_submit'], 'true') == 0)
        {
          $id = $_POST["recipid"];
          $query = 'SELECT id, name, descr, amount, type, avg_price
                    FROM ingredients
                    WHERE recipe_id = ' . $id . '';
          $result = $db->query($query);
          $i = 0;
          while($row = $result->fetch_array())
          {
            $ingid = $row["id"];
            
            $ingname = $_POST['ingname' . $ingid];
            $ingdesc = $_POST['ingdesc' . $ingid];
            $ingamt = $_POST['ingamt' . $ingid];
            $ingtype = $_POST['ingtype' . $ingid];
            $ingavgprice = $_POST['ingprice' . $ingid];

            $querylist[$i] = 'UPDATE ingredients
                              SET name = "' . $ingname . '", descr = "' . $ingdesc . '", 
                                  amount = "' . $ingamt . '", type = "' . $ingtype . '"';
            if(strcmp($ingavgprice, '') == 0)
            {
              $querylist[$i] .= ', avg_price = NULL';
            }
            else
            {
              $querylist[$i] .= ', avg_price = ' . $ingavgprice;
            }
            $querylist[$i] .= ' WHERE id = ' . $ingid . '';
            $i++;
          }
          $result->close();
          for($j = 0; $j < $i; $j++)
          {
            //echo '<p>' . $querylist[$j] . '</p>';
            $query = $querylist[$j];
            $result = $db->query($query);
          }
        }
          
        include_once('recipes.php');
        include_once('grocery.php');
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
