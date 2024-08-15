<?php 
require 'lib/utils.php';
include 'partials/_top.php';

consoleLog($_POST, 'POST');
consoleLog($_FILES, 'FILES');


$ideaID = $_POST['idea'];
$areaID = $_POST['area'];

$title = $_POST['title'];
$description = $_POST['description'];
$link = $_POST['link'];
$student_name = $_POST['sname'];

if(empty($_POST) && empty($_FILES)) die ('There was a problem uploading the file (probably too large)');

$db = connectToDB();

// Are we changing the image?
if($_FILES['image']['error'] == 4) {
    // No, so ...
    $query = 'UPDATE ideas 
                SET title=?, description=?, link=?, student_name=?
                WHERE id=?';

    //Attempt to run the query
    try{
        $stmt = $db->prepare($query);
        $stmt->execute([$title, $description, $link, $student_name, $ideaID]);
    }
    catch (PDOexception $e) {
        consoleLog($e->getMessage(), 'DB Idea Update', ERROR);
        die('There was an error updating idea in the database');
    }
}
else {
    // Yes, so get details
    [
        'data' => $image_data,
        'type' => $image_type
    ] = uploadedImageData($_FILES['image']);    

    $query = 'UPDATE ideas 
                SET title=?, description=?, link=?, student_name=?, image_data=?, image_type=?
                WHERE id=?';

    //Attempt to run the query
    try{
        $stmt = $db->prepare($query);
        $stmt->execute([$title, $description, $link, $student_name, $image_data, $image_type, $ideaID]);
    }
    catch (PDOexception $e) {
        consoleLog($e->getMessage(), 'DB Idea Update', ERROR);
        die('There was an error updating idea in the database');
    }
}


header('location: idea-list.php?area=' . $areaID);
//header('location: index.php');

 ?>