<?php
  include_once('../classes/Database.php');
  
  // Ingredient Info
  $query = 'SELECT id, name, descr, amount, type, avg_price
            FROM ingredients
            WHERE recipe_id = ?';
  $params = array('i', &$id);
  $db->query($query, $params);
  $result = $db->fetch();

  echo '<h3>Ingredients</h3>';
  echo '<button type="button" id="ing_button" class="btn btn-secondary">Show/Hide</button>';
  echo '<p>&nbsp;</p>';
  echo '<div id="ing_list" hidden>';
  
  foreach($result as $row)
  {
    $ingid = $row["id"];
    $ingname = $row["name"];
    $ingdesc = $row["descr"];
    $ingamt = $row["amount"];
    $ingtype = $row["type"];
    $ingprice = $row["avg_price"];

    echo '<div class="form-group row">
            <label for="ingname' . $ingid . '" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ingname' . $ingid . '" id="ingname' . $ingid . '" value="' . $ingname . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingdesc' . $ingid . '" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">';
    if(!is_null($ingdesc))
    {
      echo '  <textarea class="form-control" name="ingdesc' . $ingid . '" id="ingdesc' . $ingid . '">' . $ingdesc . '</textarea>';
    }
    else
    {
      echo '  <textarea class="form-control" name="ingdesc' . $ingid . '" id="ingdesc' . $ingid . '"></textarea>';
    }
    echo '  </div>
          </div>
          <div class="form-group row">
            <label for="ingamt' . $ingid . '" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ingamt' . $ingid . '" id="ingamt' . $ingid . '" value="' . $ingamt . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingtype' . $ingid . '" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ingtype' . $ingid . '" id="ingtype' . $ingid . '" value="' . $ingtype . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingprice' . $ingid . '" class="col-sm-2 col-form-label">Average Price</label>
            <div class="col-sm-4">';
    if(!is_null($ingprice))
    {
      echo '  <input type="number" class="form-control decimal-number" name="ingprice' . $ingid . '" id="ingprice' . $ingid . '" step="any" value="' . $ingprice . '" min="0">';
    }
    else
    {
      echo '  <input type="number" class="form-control decimal-number" name="ingprice' . $ingid . '" id="ingprice' . $ingid . '" step="any" min="0">';
    }
    echo '  </div>
          </div>';
    echo '<p>&nbsp;</p>';
  }
  echo '  <button type="button" id="add_ing" class="btn btn-secondary">Add New Ingredient</button>
          <div id="new_ing" hidden>
            <div class="form-group row">
              <label for="newingname" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="newingname" id="newingname" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="newingdesc" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-5">
                <textarea class="form-control" name="newingdesc" id="newingdesc"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="newingamt" class="col-sm-2 col-form-label">Amount</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="newingamt" id="newingamt" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="newingtype" class="col-sm-2 col-form-label">Type</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="newingtype" id="newingtype" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="newingprice" class="col-sm-2 col-form-label">Average Price</label>
              <div class="col-sm-4">
                <input type="number" class="form-control decimal-number" name="newingprice" id="newingprice" step="any" min="0">
              </div>';
  echo '    </div>'; 
  echo '  </div>
          <p>&nbsp;</p>
        </div>';
?>
