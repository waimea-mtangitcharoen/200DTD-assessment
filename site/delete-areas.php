<?php
require 'lib/utils.php';
include 'partials/_top.php';

$db = connectToDB();

$areaID = $_GET['id'];
// $ideaID = $_GET['id'] ?? null;

consoleLog($_GET);
//for deleting area
$query = 'DELETE FROM areas
          WHERE id = ?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$areaID]);
    
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error deleting areas from the database');
}
//use the header = cannot use the console log
header('location:index.php');

?>