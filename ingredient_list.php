<?php
  include_once('include/db.php');
  
  // Ingredient Info
  $query = 'SELECT name, descr, amount, type, avg_price
            FROM ingredients
            WHERE recipe_id = ' . $id . '';
  $result = $db->query($query);
  echo '<h3>Ingredients</h3>';
  echo '<button type="button" id="ing_button" class="btn btn-secondary">Show/Hide</button>';
  echo '<p>&nbsp;</p>';
  echo '<div id="ing_list" hidden>';
  while($row = $result->fetch_array())
  {
    $ingname = $row["name"];
    $ingdesc = $row["descr"];
    $ingamt = $row["amount"];
    $ingtype = $row["type"];
    $ingprice = $row["avg_price"];

    echo '<div class="form-group row">
            <label for="ingname" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="ingname" value="' . $ingname . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingdesc" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">';
    if(!is_null($ingdesc))
    {
      echo '  <textarea class="form-control" id="ingdesc">' . $ingdesc . '</textarea>';
    }
    else
    {
      echo '  <textarea class="form-control" id="ingdesc"></textarea>';
    }
    echo '  </div>
          </div>
          <div class="form-group row">
            <label for="ingamt" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="ingamt" value="' . $ingamt . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingtype" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="ingtype" value="' . $ingtype . '">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingprice" class="col-sm-2 col-form-label">Average Price</label>
            <div class="col-sm-4">';
    if(!is_null($ingprice))
    {
      echo '  <input type="number" class="form-control decimal-number" id="ingprice" step="any" value="' . $ingprice . '" min="0">';
    }
    else
    {
      echo '  <input type="number" class="form-control decimal-number" id="ingprice" step="any" min="0">';
    }
    echo '  </div>
          </div>';
  }
  echo '</div>';
  $result->close();
?>
