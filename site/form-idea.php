<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

consoleLog($_GET);

$areaID = $_GET['area'] ?? null;
if ($areaID == null) die('Missing area ID!');

consoleLog($areaID);

$db = connectToDB();
//Get area id to add the new idea in
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

<h2 class="center-title">Add new project idea for '<?= $area['name'] ?>'</h2>
<!-- add new idea form -->
<form method="post" action='add-idea.php' enctype="multipart/form-data">

    <input type="hidden" name="area" value="<?= $areaID ?>">
    
    <label>Your name</label>
    <input name="sname" 
           type="text" 
           placeholder="e.g. Mimi Tangitcharoen" 
           required>

    <label>Project title</label>
    <input name="title" 
           type="text" 
           placeholder="e.g. DIY necklace" 
           required>

    <label>Description</label>
    <input name="description" 
           type="text" 
           placeholder="e.g. This necklace is..." 
           required>

    <label>Link</label>
    <input name="link" 
           type="url" 
           placeholder="e.g. http://www.necklace.com/index.html" 
           required>
           
    <label>Image</label>
    <input type="file" name="image" accept="image/*" required>
    <p id="copyright"> *Please make sure that the image is copyright before uploading </p>

    
    <input type="submit" value="Add">

</form>

<?php include 'partials/bottom.php'; ?>