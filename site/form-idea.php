<?php
require 'lib/utils.php';
include 'partials/_top.php'; 


?>

<h2>Add new project ideas</h2>

<form method="post" action="add-area.php">
    
    <label>Your name</label>
    <input name="student name" 
           type="text" 
           placeholder="e.g. Mimi" 
           required>

    <label>Project name</label>
    <input name="name" 
           type="text" 
           placeholder="e.g. Invisible necklace" 
           required>

    <label>Description</label>
    <input name="description" 
           type="text" 
           placeholder="e.g. Invisible necklace" 
           required>

    <label>Link</label>
    <input name="link" 
           type="text" 
           placeholder="e.g. Invisible necklace" 
           required>
    
    <input type="submit" value="Add">

</form>