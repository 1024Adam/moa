<?php
  include_once('include/db.php');

  // Ingredient Info
  $query = 'SELECT descr, est_time
            FROM instructions
            WHERE recipe_id = ' . $id . '
            ORDER BY id ASC';
  $result = $db->query($query);
           
  echo '<h3>Instructions</h3>';
  echo '<button type="button" id="instr_button" class="btn btn-secondary">Show/Hide</button>';
  echo '<p>&nbsp;</p>';
  echo '<div id="instr_list" hidden>';
  $i = 1;
  while($row = $result->fetch_array())
  {
    $instrdesc = $row["descr"];
    $instrtime = $row["est_time"];

    echo '<div class="form-group row">
            <label for="instrdesc" class="col-sm-2 col-form-label">Step ' . $i . '</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="instrdesc" value="' . $instrdesc . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="instrtime" class="col-sm-2 col-form-label">Estimated Time</label>
            <div class="col-sm-4">
              <input type="number" class="form-control decimal-number" id="instrtime" step="any" value="' . $instrtime . '" min="0">
            </div>
          </div>
          <p>&nbsp;</p>';
    $i++;
  }
  $result->close();
  echo '</div>';
?>
