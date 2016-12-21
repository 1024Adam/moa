<?php
  include_once('db.php');

  $query = 'SELECT recipes.id as a, recipes.name as b, ingredients.id as c, ingredients.name as d FROM recipes INNER JOIN ingredients ON recipes.id = ingredients.recipe_id ORDER BY recipes.id ASC, ingredients.id ASC';
  $result = $db->query($query);
  $new_name = '';
  while($row = $result->fetch_array())
  {
    $name = $row["b"];
    $ingredient = $row["d"];
    if(strcmp($new_name, '') == 0)
    {
      $new_name = $name;
      echo '<p>';
      echo $name;
      echo '<br>&nbsp;-&nbsp;';
      echo $ingredient;
    }
    else if(strcmp($new_name, $name) != 0)
    {
      $new_name = $name;
      echo'</p>';
      echo '<p>';
      echo $name;
      echo '<br>&nbsp;-&nbsp;';
      echo $ingredient;
    }
    else
    {
      echo '<br>&nbsp;-&nbsp;';
      echo $ingredient;
    }
  }
  echo '</p>';
  $result->close();
?>
