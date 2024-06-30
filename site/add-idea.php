<?php 
require 'lib/utils.php';
include 'partials/_top.php';


//echo '<h2>Adding Idea Database....</h2>';


$title = $_POST['title'];
$description = $_POST['description'];
$link = $_POST['link'];
$student_name = $_POST['sname'];


$areaID = $_POST['area'];


$db = connectToDB();

//setup a query to get all company info 

$query = 'INSERT INTO ideas (area, title, description, link, student_name)
          VALUES (?,?,?,?,?)';
//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$areaID, $title, $description, $link,$student_name]);

}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB Idea Add', ERROR);
    die('There was an error adding new idea to the database');
}

header('location: idea-list.php?area=' . $areaID);
//header('location: index.php');

 ?>