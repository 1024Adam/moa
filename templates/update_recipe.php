<?php
  $id = $_POST["recipid"];
  $i = 0;
 
  // UPDATE MEAL INFO          
  $recipname = $_POST['recipname'];
  $reciptype = $_POST['reciptype'];
  $recipdesc = $_POST['recipdesc'];
  $recipserving = $_POST['recipserving'];
  $querylist[$i] = 'UPDATE recipes
                    SET name = ?, type = ?, descr = ?, serving = ?
                    WHERE id = ?';
  $paramlist[$i] = array('sssii', &$recipname, &$reciptype, &$recipdesc, &$recipserving, &$id);
  $i++;

  // UPDATE INGREDIENT INFO          
  $query = 'SELECT id
            FROM ingredients
            WHERE recipe_id = ?';
  $params = array('i', &$id);

  $db->query($query, $params);
  $result = $db->fetch();
         
  foreach($result as $row)
  {
    $ingid[$i] = $row["id"];
            
    $ingname[$i] = $_POST['ingname' . $ingid[$i]];
    $ingdesc[$i] = $_POST['ingdesc' . $ingid[$i]];
    $ingamt[$i] = $_POST['ingamt' . $ingid[$i]];
    $ingtype[$i] = $_POST['ingtype' . $ingid[$i]];
    $ingprice[$i] = $_POST['ingprice' . $ingid[$i]];

    if(strcmp($ingprice[$i], '') != 0)
    {
      $querylist[$i] = 'UPDATE ingredients
                        SET name = ?, descr = ?, amount = ?, type = ?, avg_price = ?
                        WHERE id = ?';
      $paramlist[$i] = array('ssssdi', &$ingname[$i], &$ingdesc[$i], &$ingamt[$i], &$ingtype[$i], &$ingprice[$i], &$ingid[$i]);
    }
    else
    {
      $querylist[$i] = 'UPDATE ingredients
                        SET name = ?, descr = ?, amount = ?, type = ?, avg_price = NULL
                        WHERE id = ?';
      $paramlist[$i] = array('ssssi', &$ingname[$i], &$ingdesc[$i], &$ingamt[$i], &$ingtype[$i], &$ingid[$i]);
    }
    $i++;
  }
          
  $newingname = $_POST['newingname'];
  if(strcmp($newingname, '') != 0)
  {
    $newingdesc = $_POST['newingdesc'];
    $newingamt = $_POST['newingamt'];
    $newingtype = $_POST['newingtype'];
    $newingprice = $_POST['newingprice'];

    $querylist[$i] = 'INSERT INTO ingredients (name, descr, amount, type, avg_price, recipe_id)
                      VALUES (?, ?, ?, ?, ?, ?)';
    $paramlist[$i] = array('ssssdi', &$newingname, &$newingdesc, &$newingamt, &$newingtype, &$newingprice, &$id);
    $i++;
  }

  // UPDATE INSTRUCTION INFO          
  $query = 'SELECT id
            FROM instructions
            WHERE recipe_id = ?';
  $params = array('i', &$id);

  $db->query($query, $params);
  $result = $db->fetch();
        
  foreach($result as $row)
  {
    $instrid[$i] = $row["id"];
            
    $instrdesc[$i] = $_POST['instrdesc' . $instrid[$i]];
    $instrtime[$i] = $_POST['instrtime' . $instrid[$i]];

    $querylist[$i] = 'UPDATE instructions
                      SET descr = ?, est_time = ?
                      WHERE id = ?';
    $paramlist[$i] = array('sdi', &$instrdesc[$i], &$instrtime[$i], &$instrid[$i]);
           
    $i++;
  }
          
  $newinstrdesc = $_POST['newinstrdesc'];
  if(strcmp($newinstrdesc, '') != 0)
  {
    $newinstrtime = $_POST['newinstrtime'];
    $newinstrstep = $_POST['newinstrstep'];

    $query = 'SELECT id, sorted_id
              FROM instructions
              WHERE recipe_id = ? AND sorted_id >= ?';
    $params = array('ii', &$id, &$newinstrstep);

    $db->query($query, $params);
    $result = $db->fetch();
    foreach($result as $row)
    {
      $instrid[$i] = $row["id"];
      $adjstepnum[$i] = $row["sorted_id"] + 1;

      $querylist[$i] = 'UPDATE instructions
                        SET sorted_id = ?
                        WHERE id = ?';
      $paramlist[$i] = array('ii', &$adjstepnum[$i], &$instrid[$i]);
      $i++;
    } 

    $querylist[$i] = 'INSERT INTO instructions (sorted_id, descr, est_time, recipe_id)
                      VALUES (?, ?, ?, ?)';
    $paramlist[$i] = array('issi', &$newinstrstep, &$newinstrdesc, &$newinstrtime, &$id);
    $i++;
  }
          
  for($j = 0; $j < $i; $j++)
  {
    //echo '<p>' . $querylist[$j] . '</p>';
    $db->query($querylist[$j], $paramlist[$j]);
  }
?>
