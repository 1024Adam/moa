<?php          
  $recipname = $_POST['recipname'];
  $reciptype = $_POST['reciptype'];
  $recipdesc = $_POST['recipdesc'];
  $recipserving = $_POST['recipserving'];

  $query = 'INSERT INTO recipes (name, type, descr, serving)
            VALUES (?, ?, ?, ?)';
  $params = array('sssi', &$recipname, &$reciptype, &$recipdesc, &$recipserving);
  $db->query($query, $params);
         
  $query = 'SELECT MAX(id) as maxid 
            FROM recipes';
  $db->query($query);
  $result = $db->fetch();

  $id = $result[0]["maxid"];          

  $i = 1;
  while(isset($_POST['ingname' . $i]) && strcmp($_POST['ingname' . $i], '') != 0)
  {
    $ingname[$i] = $_POST['ingname' . $i];
    $ingdesc[$i] = $_POST['ingdesc' . $i];
    $ingamt[$i] = $_POST['ingamt' . $i];
    $ingtype[$i] = $_POST['ingtype' . $i];
    $ingprice[$i] = $_POST['ingprice' . $i];

    $querylist[$i] = 'INSERT INTO ingredients (recipe_id, name, descr, amount, type, avg_price)
                      VALUES (?, ?, ?, ?, ?, ?)';
    $paramlist[$i] = array('issssd', &$id, &$ingname[$i], &$ingdesc[$i], &$ingamt[$i], &$ingtype[$i], &$ingprice[$i]);

    $i++;
  }
  $j = 1;
  while(isset($_POST['instrdesc' . $j]) && strcmp($_POST['instrdesc' . $j], '') != 0)
  {
    $instrdesc[$i] = $_POST['instrdesc' . $j];
    $instrtime[$i] = $_POST['instrtime' . $j];
    $instrorder[$i] = $j;

    $querylist[$i] = 'INSERT INTO instructions (recipe_id, sorted_id, descr, est_time)
                      VALUES (?, ?, ?, ?)';
    $paramlist[$i] = array('iisd', &$id, &$instrorder[$i], &$instrdesc[$i], &$instrtime[$i]);

    $i++;
    $j++;
  }

  for($j = 1; $j < $i; $j++)
  {
    //echo '<p>' . $querylist[$j] . '</p>';
    $db->query($querylist[$j], $paramlist[$j]);
  }
?>
