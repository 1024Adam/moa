<?php
  include_once('../classes/Database.php');

  // Ingredient Info
  $query = 'SELECT id, descr, est_time
            FROM instructions
            WHERE recipe_id = ' . $id . '
            ORDER BY sorted_id ASC';
  $db->query($query);
  $result = $db->fetch();
           
  echo '<h3>Instructions</h3>';
  echo '<button type="button" id="instr_button" class="btn btn-secondary">Show/Hide</button>';
  echo '<p>&nbsp;</p>';
  echo '<div id="instr_list" hidden>';
  $i = 1;
  foreach($result as $row)
  {
    $instrid = $row["id"];
    $instrdesc = $row["descr"];
    $instrtime = $row["est_time"];

    echo '<div class="form-group row">
            <label for="instrdesc' . $instrid . '" class="col-sm-2 col-form-label">Step ' . $i . '</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="instrdesc' . $instrid . '" id="instrdesc' . $instrid . '" value="' . $instrdesc . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="instrtime' . $instrid . '" class="col-sm-2 col-form-label">Estimated Time</label>
            <div class="col-sm-4">
              <input type="number" class="form-control decimal-number" name="instrtime' . $instrid . '" id="instrtime' . $instrid . '" step="any" value="' . $instrtime . '" min="0">
            </div>
          </div>
          <p>&nbsp;</p>';
    $i++;
  }
  echo '  <button type="button" id="add_instr" class="btn btn-secondary">Add Next Instruction</button>
          <div id="new_instr" hidden>';

  echo '    <div class="form-group row">
              <label for="newinstrstep" class="col-sm-2 col-form-label">Step #</label>
              <div class="col-sm-5">
                <input type="number" class="form-control" name="newinstrstep" id="newinstrstep" value="1" min="1">
              </div>
            </div>
            <div class="form-group row">
              <label for="newinstrdesc" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="newinstrdesc" id="newinstrdesc" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="newinstrtime" class="col-sm-2 col-form-label">Estimated Time</label>
              <div class="col-sm-4">
                <input type="number" class="form-control decimal-number" name="newinstrtime" id="newinstrtime" step="any" value="0" min="0">
              </div>';
  echo '    </div>';
  echo '  </div>';
  echo '</div>';
  echo '<p>&nbsp;</p>';
?>
