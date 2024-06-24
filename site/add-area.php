<?php 
require 'lib/utils.php';



echo '<h2>Adding Area Database....</h2>';


$name = $_POST['name'];

echo '<p>Name:' .$name;

$db = connectToDB();

//setup a query to get all company info 

$query = 'INSERT INTO areas (name)
          VALUES (?)';
//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$name]);

}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB Area Add', ERROR);
    die('There was an error adding new area to the database');
}

header('location: form-idea.php')
//header('location: index.php');

 ?>