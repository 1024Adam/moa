<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('../classes/Database.php'); 
?>
<div id="recipes" class="container">
  <div class="col-xs-9">
    <h2>Recipes</h2>
  </div>
  <div class="col-xs-3">
    <br>
    <input type="input" class="form-control" name="search" id="search" placeholder="Search">
  </div>
  <form id="recipe_form" action="index.php" method="post">
    <div class="col-xs-12">
      <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
          // ADD REQUEST
          if(isset($_POST['new_submit']) && strcmp($_POST['new_submit'], 'true') == 0)
          {
            echo '<div id="new_success" class="alert alert-success alert-small" role="alert">
                    The new recipe has been added successfully.
                  </div>';
          }
          // UPDATE REQUEST
          if(isset($_POST['edit_submit']) && strcmp($_POST['edit_submit'], 'true') == 0)
          {
            echo '<div id="update_success" class="alert alert-success alert-small" role="alert">
                    The recipe has been updated successfully.
                  </div>';
          }
          // DELETE REQUEST
          if(isset($_POST['delete_submit']) && strcmp($_POST['delete_submit'], 'true') == 0)
          {
            echo '<div id="delete_success" class="alert alert-danger alert-small" role="alert">
                    The recipe(s) have been deleted successfully.
                  </div>';
          }
          // GROCERY REQUEST
          if(isset($_POST['grocery_submit']) && strcmp($_POST['grocery_submit'], 'true') == 0)
          {
            echo '<div id="add_success" class="alert alert-success alert-small" role="alert">
                    The recipe ingredient(s) have been added to your grocery list.
                  </div>';
          }
          // GROCERY REQUEST
          if(isset($_POST['delete_grocery']) && strcmp($_POST['delete_grocery'], 'true') == 0)
          {
            echo '<div id="delete_success" class="alert alert-danger alert-small" role="alert">
                    The recipe ingredient(s) have been removed from the grocery list.
                  </div>';
          }
        }
      ?>
      <button type="submit" id="add_to_list_button" class="btn btn-primary">
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
                    ORDER BY name ASC';
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
            echo '<tr id="row' . $i . '">';
            echo   '<td>
                      <input type="number" name="q' . $id . '" id="q' . $id . '" value="0" min="0" max="10"/>
                    </td>';
            echo   '<td class="recipe-name">
                      <textarea class="borderless" id="n' . $i . '" readonly>' . $name . '</textarea>
                    </td>';
            echo   '<td>
                     <input type="text" class="borderless" size="10" id="t' . $i . '" readonly value="' . $type . '">
                    </td>';
            echo   '<td>
                      <textarea class="borderless" id="d' . $i . '" readonly>' . $descr . '</textarea>
                    </td>';
            echo   '<td class="td-number">' . $serving . '</td>';
            echo   '<td>
                      <button type="button" id="button' . $id . '" class="btn btn-secondary" onClick="processButtonClick(' . $id . ')">View/Edit</button>
                    </td>';
            echo '</tr>';

            $i++;
          }
        ?>
      </tbody>
    </table>
    <input type="hidden" name="grocery_submit" id="grocery_submit" value="true" />
  </form>
</div>
