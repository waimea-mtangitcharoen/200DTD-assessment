<?php
require 'lib/utils.php';
include 'partials/_top.php';

$db = connectToDB();

$areaID = $_GET['area'];
$ideaID = $_GET['id'] ?? null;

consoleLog($_GET);

$query = 'DELETE FROM ideas
          WHERE id = ?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$ideaID]);
    
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error deleting ideas from the database');
}
//use the header = cannot use the console log
header('location:idea-list.php?area=' . $areaID);

?>