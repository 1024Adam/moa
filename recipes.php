<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('include/db.php'); 
?>
<div id="recipes" class="container">
  <h1>Recipes</h1>
  <form id="recipe_form" action="index.php" method="post">
    <div id="add_success" class="alert alert-success" role="alert">
      Your items have been added to your grocery list.
    </div>
    <div id="add_error" class="alert alert-danger" role="alert">
      You have not selected any recipes
    </div>
    <button type="button" class="btn btn-primary" onclick="addToGrocery()">
      Add Selected to Grocery List
    </button>
    <table id=recipe_table class="table">
      <thead>
        <tr>
          <th>Quantity</th>
          <th>Name</th>
          <th>Type</th>
          <th>Description</th>
          <th>Serving</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $query = "SELECT id, name, type, descr, serving
                    FROM recipes
                    ORDER BY name ASC";
          $result = $db->query($query);
          $i = 1;
          while($row = $result->fetch_array())
          {
            $id = $row["id"];
            $name = $row["name"];
            $type = $row["type"];
            $descr = $row["descr"];
            $serving = $row["serving"];
            echo '<tr>';
            echo   '<td>
                      <input type="number" id="q' . $i . '" value="0" min="0" max="10"/>
                    </td>';
            echo   '<td class="recipe-name">' . $name . '</td>';
            echo   '<td>' . $type . '</td>';
            echo   '<td>' . $descr . '</td>';
            echo   '<td class="td-number">' . $serving . '</td>';
            echo   '<td>
                      <button type="button" class="btn btn-secondary">View/Edit</button>
                    </td>';
            echo '</tr>';
            $i++;
          }
          $result->close();
        ?>
      </tbody>
    </table>
  </form>
</div>
