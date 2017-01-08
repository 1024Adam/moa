<?php          
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('../classes/Database.php'); 
  
  $query = 'SELECT id
            FROM recipes
            ORDER BY id ASC';
  $db->query($query);
  $result = $db->fetch();
  $i = 0;
  foreach($result as $row)
  {
    $id[$i] = $row['id'];
    $quantity[$i] = $_POST['q' . $id[$i]];
    if($quantity[$i] > 0)
    {
      $params[$i] = array('ii', &$id[$i], &$quantity[$i]);
      $i++;
    }
  }
  $query = 'INSERT INTO grocery (date, recipe_id, quantity)
            VALUES (CURRENT_DATE, ?, ?)';
  for($j = 0; $j < $i; $j++)
  {
    $db->query($query, $params[$j]);
  }
?>
