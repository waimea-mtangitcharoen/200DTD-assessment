<?php 
require 'lib/utils.php';



$name = $_POST['name'];

$db = connectToDB();

//setup a query to get all company info 

$query = 'INSERT INTO areas (name)
          VALUES (?)';
//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$name]);
    $newAreaId = $db->lastInsertId();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB Area Add', ERROR);
    die('There was an error adding new area to the database');
}

header('location: form-idea.php?area=' . $newAreaId)
//header('location: index.php');

 ?>