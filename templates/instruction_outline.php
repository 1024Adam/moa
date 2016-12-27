<?php
  for($i = 1; $i <= 5; $i++)
  {
    echo '<div class="form-group row">
            <label for="instrdesc' . $i . '" class="col-sm-2 col-form-label">Step ' . $i . '</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" name="instrdesc' . $i . '" id="instrdesc' . $i . '" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="instrtime' . $i . '" class="col-sm-2 col-form-label">Estimated Time</label>
            <div class="col-sm-4">
              <input type="number" class="form-control decimal-number" name="instrtime' . $i . '" id="instrtime' . $i . '" step="any" value="0" min="0">
            </div>
          </div>'; 
    echo '<p>&nbsp;</p>';
  }
?>
