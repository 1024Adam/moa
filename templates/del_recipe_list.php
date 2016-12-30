<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('../classes/Database.php'); 
  $db = new Database();
?>
<div id="recipes" class="container">
  <h2>Recipes</h2>
  <form id="del_recipe_form" action="index.php" method="post">
    <button type="submit" id="del_recipe_button" class="btn btn-danger">
      Delete Recipe(s)
    </button>
    <input type="hidden" name="delete_submit" id="delete_submit" value="true"/>
    <table id=recipe_table class="table">
      <thead>
        <tr>
          <th>&nbsp;</th>
          <th>Name</th>
          <th>Type</th>
          <th>Description</th>
          <th>Serving</th>
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
                      <input type="checkbox" name="del_id[]" id="del_id" value="' . $id . '"/>
                    </td>';
            echo   '<td class="recipe-name">' . $name . '</td>';
            echo   '<td>' . $type . '</td>';
            echo   '<td>' . $descr . '</td>';
            echo   '<td class="td-number">' . $serving . '</td>';
            echo '</tr>';

            $i++;
          }
        ?>
      </tbody>
    </table>
  </form>
</div>
