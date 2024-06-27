<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

consoleLog($_GET);

$areaID = $_GET['area'] ?? null;
if ($areaID == null) die('Missing area ID!');

$db = connectToDB();

$query = 'SELECT * FROM areas WHERE id=?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$areaID]);
    $area = $stmt->fetch();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
//see what we got back
consoleLog($area);

?>

<h2>Add new project idea for '<?= $area['name'] ?>'</h2>

<form method="post" action="add-idea.php">

    <input type="hidden" name="area" value="<?= $areaID ?>">
    
    <label>Your name</label>
    <input name="student name" 
           type="text" 
           placeholder="e.g. Mimi" 
           required>

    <label>Project name</label>
    <input name="name" 
           type="text" 
           placeholder="e.g. Invisible necklace" 
           required>

    <label>Description</label>
    <input name="description" 
           type="text" 
           placeholder="e.g. It is invisible" 
           required>

    <label>Link</label>
    <input name="link" 
           type="url" 
           placeholder="e.g. www.necklace.invisible.com" 
           required>
    
    <input type="submit" value="Add">

</form>