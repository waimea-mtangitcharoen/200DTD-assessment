<?php 
require 'lib/utils.php';



//echo '<h2>Adding Area Database....</h2>';


$title = $_POST['title'];
$description = $_POST['description'];
$link = $_POST['link'];
$student_name = $_POST['student name'];



$db = connectToDB();

//setup a query to get all company info 

$query = 'INSERT INTO ideas (title, description, link, student name)
          VALUES (?,?,?,?)';
//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$title, $description, $link,$student_name]);

}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB Area Add', ERROR);
    die('There was an error adding new area to the database');
}

header('location: index.php');
//header('location: index.php');

 ?>