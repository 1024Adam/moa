<?php
  $query = 'DELETE
            FROM grocery
            WHERE date = CURRENT_DATE';  
  if(isset($_POST['remove_grocery']))
  {
    $query .= ' AND recipe_id = ' . $_POST['remove_grocery'];  
  }

  $db->query($query);
?>
