<?php 
require 'lib/utils.php';
include 'partials/_top.php';

consoleLog($_POST, 'POST');
consoleLog($_FILES, 'FILES');

if(empty($_POST) && empty($_FILES)) die ('There was a problem uploading the file (probably too large)');
//echo '<h2>Adding Idea Database....</h2>';
[
    'data' => $image_data,
    'type' => $image_type
] = uploadedImageData($_FILES['image']);

$title = $_POST['title'];
$description = $_POST['description'];
$link = $_POST['link'];
$student_name = $_POST['sname'];


$areaID = $_POST['area'];


$db = connectToDB();

//setup a query to get all company info 

$query = 'INSERT INTO ideas (area, title, description, link, student_name, imagee_data, image_type)
          VALUES (?,?,?,?,?,?,?)';
//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$areaID, $title, $description, $link,$student_name, $image_data, $image_type]);

}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB Idea Add', ERROR);
    die('There was an error adding new idea to the database');
}

header('location: idea-list.php?area=' . $areaID);
//header('location: index.php');

 ?>