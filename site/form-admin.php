<?php 

require 'lib/utils.php'; 
include 'partials/_top.php';

?>

<h2> Log in </h2>

<form method="post" action='form-admin-login.php'>
    
    <label>Username</label>
    <input name="username" 
           type="text"  
           required>

    <label>Password</label>
    <input name="password" 
           type="text" 
           required>
    
    <input type="submit" value="Add">

</form>
