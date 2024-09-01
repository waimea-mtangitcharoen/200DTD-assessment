<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

$db = connectToDB();

//setup a query to get username and password

$query = 'SELECT * FROM admin';
//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $adminLog = $stmt->fetch();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB Area Add', ERROR);
    die('There was an error getting admin login info from the database');
}



consoleLog($adminLog);



if ($adminLog['username'] == $username &&  $adminLog['password'] == $password)
{
    $_SESSION['admin'] = true;
    header('location: index.php');
}
else {
    
    echo '<h2>Incorrect username or password. Please try again </h2>';
    echo '<a id="login-again" href="form-admin.php">Log in again';
    echo '</a>';

}







?>

<?php include 'partials/bottom.php'; ?>