<?php          
  $i = 0;
  $delete_ids = $_POST['del_id'];
  for($j = 0; $j < count($delete_ids); $j++)
  {
    //echo '<p>' . $delete_id . '</p>';
    $querylist[$i] = 'DELETE FROM recipes
                      WHERE id = ?';
    $paramlist[$i] = array('i', &$delete_ids[$j]);
    $i++;
    $querylist[$i] = 'DELETE FROM ingredients
                      WHERE recipe_id = ?';
    $paramlist[$i] = array('i', &$delete_ids[$j]);
    $i++;
    $querylist[$i] = 'DELETE FROM instructions
                      WHERE recipe_id = ?';
    $paramlist[$i] = array('i', &$delete_ids[$j]);
    $i++;
  }

  for($j = 0; $j < $i; $j++)
  {
    $db->query($querylist[$j], $paramlist[$j]);
  }
?>
