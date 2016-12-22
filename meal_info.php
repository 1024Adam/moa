<?php
  include_once('include/db.php');

  // Recipe Info
  $query = 'SELECT name, type, descr, serving
            FROM recipes
            WHERE id = ' . $id . '';
  $result = $db->query($query);
           
  $row = $result->fetch_array();
        
  $recipname = $row["name"];
  $reciptype = $row["type"];
  $recipdesc = $row["descr"];
  $recipserving = $row["serving"];
           
  echo '<h2>' . $recipname . '</h2>';
  echo '<div class="form-group row">
          <label for="recipname" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="recipname" value="' . $recipname . '">
          </div>
        </div>
        <div class="form-group row">
          <label for="reciptype" class="col-sm-2 col-form-label">Type</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" id="reciptype" value="' . $reciptype . '">
          </div>
        </div>
        <div class="form-group row">
          <label for="recipdesc" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-5">
            <textarea class="form-control" id="recipdesc">' . $recipdesc . '</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="recipserving" class="col-sm-2 col-form-label">Serving</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" id="recipserving" value="' . $recipserving . '" min="1", max="10">
          </div>
        </div>';
  $result->close();
?>

