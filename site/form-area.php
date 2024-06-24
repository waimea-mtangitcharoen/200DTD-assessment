<?php
require 'lib/utils.php';
include 'partials/_top.php'; 


?>

<h2>Add new area of interest</h2>

<form method="post" action="add-area.php">
    
    <label>Name</label>
    <input name="name" 
           type="text" 
           placeholder="e.g. Woodwork" 
           required>
    
    <input type="submit" value="Add">

</form>