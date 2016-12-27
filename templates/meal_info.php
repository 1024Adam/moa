<?php
  include_once('../classes/Database.php');

  // Recipe Info
  $query = 'SELECT name, type, descr, serving
            FROM recipes
            WHERE id = ?';
  $params = array('i', &$id);
  $db->query($query, $params);
  $result = $db->fetch();
        
  $recipname = $result[0]["name"];
  $reciptype = $result[0]["type"];
  $recipdesc = $result[0]["descr"];
  $recipserving = $result[0]["serving"];
           
  echo '<h2>' . $recipname . '</h2>';
  echo '<div class="form-group row">
          <label for="recipname" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="recipname" id="recipname" value="' . $recipname . '">
          </div>
        </div>
        <div class="form-group row">
          <label for="reciptype" class="col-sm-2 col-form-label">Type</label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="reciptype" id="reciptype" value="' . $reciptype . '">
          </div>
        </div>
        <div class="form-group row">
          <label for="recipdesc" class="col-sm-2 col-form-label">Description</label>
          <div class="col-sm-5">
            <textarea class="form-control" name="recipdesc" id="recipdesc">' . $recipdesc . '</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="recipserving" class="col-sm-2 col-form-label">Serving</label>
          <div class="col-sm-4">
            <input type="number" class="form-control" name="recipserving" id="recipserving" value="' . $recipserving . '" min="1", max="10">
          </div>
        </div>';
  echo '<p>&nbsp;</p>';
?>

