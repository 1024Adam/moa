<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('../classes/Database.php'); 
  $db = new Database();

  $query = 'SELECT recipes.name as recipname, ingredients.recipe_id, 
                   ingredients.name as ingname, ingredients.descr, 
                   ingredients.amount, ingredients.avg_price, SUM(grocery.quantity) as quantity
            FROM ingredients, grocery, recipes
            WHERE ingredients.recipe_id = grocery.recipe_id AND
                  recipes.id = grocery.recipe_id AND
                  recipes.id = ingredients.recipe_id AND
                  grocery.date = CURRENT_DATE
            GROUP BY ingname, recipe_id
            ORDER BY recipe_id ASC, ingredients.id ASC';
  $db->query($query);
  $result = $db->fetch();
?>
<div id="grocery" class="container">
  <h2>Grocery List</h2>
  <form id="grocery_form" action="index.php" method="post">
    <?php
      if(empty($result))
      {
        echo '<a class="btn btn-secondary" role="button" disabled>
                Print List
              </a>';
      }
      else
      {
        echo '<a class="btn btn-secondary" target="_blank" href="../templates/gen_grocery_list.php" role="button">
                Print List
              </a>';
      }
    ?>
    <button type="submit" name="remove_all_grocery" id="remove_all_grocery" class="btn btn-danger" value="true">
      Remove All
    </button>
    <input type="hidden" name="temp" id="temp" value="true"/>
    <table id=grocery_table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Amount</th>
          <th class="td-number">Price / Amount</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $old_recipid = '';
          foreach($result as $row)
          {
            $recipid = $row["recipe_id"];
            $recipname = $row["recipname"];
            $name = $row["ingname"];
            $descr = $row["descr"];
            $amount = $row["amount"];
            $price = $row["avg_price"];
            $format_price = number_format($price, 2, '.', ' ');
            $quantity = $row["quantity"];
            if(strcmp($old_recipid, $recipid) != 0)
            {
              $old_recipid = $recipid;
              echo '<tr>';
              echo   '<td class="recipe-name" colspan=2>' . $recipname . '</td>'; 
              echo   '<td class="recipe-name" colspan=2>' . $quantity . ' x</td>'; 
              echo   '<td>
                        <button type="submit" name="remove_grocery" id="remove_grocery" class="btn btn-danger" value="' . $recipid . '">
                          Remove Recipe
                        </button>
                      </td>';
              echo '</tr>';
            }
            echo '<tr>';
            echo   '<td class="recipe-name">' . $name . '</td>';
            echo   '<td>' . $descr . '</td>';
            echo   '<td>&nbsp;&nbsp;&nbsp;&nbsp;' . $amount . '</td>';
            echo   '<td class="td-number">$ ' . $format_price . '</td>';
            echo   '<td>&nbsp;</td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
    <input type="hidden" name="delete_grocery" id="delete_grocery" value="true"/>
  </form>
</div>
