<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('../classes/Database.php'); 
?>
<div id="recipes" class="container">
  <h2>Recipes</h2>
  <form id="recipe_form" action="index.php" method="post">
    <div id="add_success" class="alert alert-success alert-small" role="alert">
      Your items have been added to your grocery list.
    </div>
    <div id="add_error" class="alert alert-danger alert-small" role="alert">
      You have not selected any recipes
    </div>
    <button type="button" id="add_to_list_button" class="btn btn-primary">
      Add Selected to Grocery List
    </button>
    <button type="button" id="new_recipe_button" class="btn btn-primary">
      Add New Recipe
    </button>
    <button type="button" id="del_recipe_button" class="btn btn-primary">
      Delete Recipe
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
          $query = 'SELECT id, name, type, descr, serving
                    FROM recipes
                    ORDER BY id ASC';
          $db->query($query);
          $i = 1;
          $result = $db->fetch();
          foreach($result as $row)
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
                      <button type="button" id="button' . $i . '" class="btn btn-secondary" onClick="processButtonClick(this.id)">View/Edit</button>
                    </td>';
            echo '</tr>';

            $i++;
          }
        ?>
      </tbody>
    </table>
  </form>
</div>
