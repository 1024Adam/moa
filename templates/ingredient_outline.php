<?php
  for($i = 1; $i <= 5; $i++)
  {
    echo '<div class="form-group row">
            <label for="ingname' . $i . '" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ingname' . $i . '" id="ingname' . $i . '" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingdesc' . $i . '" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-5">
              <textarea class="form-control" name="ingdesc' . $i . '" id="ingdesc' . $i . '"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="ingamt' . $i . '" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ingamt' . $i . '" id="ingamt' . $i . '" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingtype' . $i . '" class="col-sm-2 col-form-label">Type</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="ingtype' . $i . '" id="ingtype' . $i . '" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="ingprice' . $i . '" class="col-sm-2 col-form-label">Average Price</label>
            <div class="col-sm-4">
              <input type="number" class="form-control decimal-number" name="ingprice' . $i . '" id="ingprice' . $i . '" step="any" min="0">
            </div>
          </div>';
    echo '<p>&nbsp;</p>';
  }
?>
