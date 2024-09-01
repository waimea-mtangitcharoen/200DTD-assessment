<?php 

require 'lib/utils.php'; 
include 'partials/_top.php';

?>

<h2 class="center-title"> Log in </h2>
<!-- login form -->
<form method="post" action='form-admin-login.php'>
    
    <label>Username</label>
    <input name="username" 
           type="text"  
           required>

    <label>Password</label>
    <input name="password" 
           type="password" 
           required>
    
    <input type="submit" value="Add">

</form>

<?php include 'partials/bottom.php'; ?>
