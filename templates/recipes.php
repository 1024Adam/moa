<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('../classes/Database.php'); 
?>
<div id="recipes" class="container">
  <div class="col-sm-8">
    <h2>Recipes</h2>
  </div>
  <div class="col-sm-3">
    <br>
    <input type="input" class="form-control" name="search" id="search" placeholder="Search">
  </div>
  <form id="recipe_form" action="index.php" method="post">
    <div class="col-sm-10">
      <div id="new_success" class="alert alert-success alert-small" role="alert">
        The new recipe has been added successfully.
      </div>
      <div id="new_error" class="alert alert-danger alert-small" role="alert">
        There was a problem adding your the recipe.
      </div>
      <div id="update_success" class="alert alert-success alert-small" role="alert">
        The recipe has been updated successfully.
      </div>
      <div id="update_error" class="alert alert-danger alert-small" role="alert">
        There was a problem updating the selected recipe.
      </div>
      <div id="delete_success" class="alert alert-success alert-small" role="alert">
        The recipes have been deleted successfully.
      </div>
      <div id="delete_error" class="alert alert-danger alert-small" role="alert">
        There was a problem when deleting the selected recipes.
      </div>
      <div id="add_success" class="alert alert-success alert-small" role="alert">
        The recipes have been added to your grocery list.
      </div>
      <div id="add_error" class="alert alert-danger alert-small" role="alert">
        There was a problem when adding the selected items to your grocery list.
      </div>
      <button type="button" id="add_to_list_button" class="btn btn-primary">
        Add Selected to Grocery List
      </button>
      <button type="button" id="new_recipe_button" class="btn btn-primary">
        Add New Recipe
      </button>
      <button type="button" id="del_recipe_button" class="btn btn-danger">
        Delete Recipe
      </button>
    </div>
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
                      <input type="number" id="q' . $id . '" value="0" min="0" max="10"/>
                    </td>';
            echo   '<td class="recipe-name">' . $name . '</td>';
            echo   '<td>' . $type . '</td>';
            echo   '<td>' . $descr . '</td>';
            echo   '<td class="td-number">' . $serving . '</td>';
            echo   '<td>
                      <button type="button" id="button' . $id . '" class="btn btn-secondary" onClick="processButtonClick(this.id)">View/Edit</button>
                    </td>';
            echo '</tr>';

            $i++;
          }
        ?>
      </tbody>
    </table>
  </form>
</div>
