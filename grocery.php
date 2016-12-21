<?php 
  if(!isset($_SESSION)) 
  { 
    session_start(); 
  } 
  include_once('include/db.php'); 
?>
<div id="grocery" class="container">
  <h1>Grocery List</h1>
  <p>Grocery!</p>
</div>
