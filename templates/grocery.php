<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('../classes/Database.php'); 
?>
<div id="grocery" class="container">
  <h2>Grocery List</h2>
  <p>Grocery!</p>
</div>