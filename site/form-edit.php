<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

consoleLog($_GET);

$ideaID = $_GET['id'] ?? null;
if ($ideaID == null) die('Missing idea ID!');
$areaID = $_GET['area'] ?? null;
if ($areaID == null) die('Missing area ID!');

// consoleLog($ideaID);
// consoleLog($areaID);

$db = connectToDB();
// Get idea id
$query = 'SELECT * FROM ideas WHERE id=?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$ideaID]);
    $idea = $stmt->fetch();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
//see what we got back
// consoleLog($idea);

?>

<h2 class="center-title">Edit details for '<?= $idea['title'] ?>'</h2>

<form method="post" action='edit-idea.php' enctype="multipart/form-data">

       <input type="hidden" name="idea" value="<?= $ideaID ?>">
       <input type="hidden" name="area" value="<?= $areaID ?>">
    <!-- edit idea form -->
    <label>Your name</label>
    <input name="sname" 
           type="text" 
           placeholder="e.g. Mimi Tangitcharoen"
           value="<?= $idea['student_name'] ?>"
           required>

    <label>Project title</label>
    <input name="title" 
           type="text" 
           placeholder="e.g. DIY necklace" 
           value="<?= $idea['title']?>"
           required>

    <label>Description</label>
    <textarea name="description" 
           placeholder="e.g. This necklace is..."
           required><?= $idea['description'] ?></textarea>

    <label>Link</label>
    <input name="link" 
           type="url" 
           placeholder="e.g. http://www.necklace.com/index.html"
           value= "<?= $idea['link']?>" 
           required>
           

    <p>Preview of existing image:</p>
    <?php
    if(!$idea['image_type'] or !$idea['image_type']){
        
        echo '<p>No existing image</p>';

    }
    else{
    echo   '<img src="load-image.php?id=' . $idea['id'] . '" class="details-image" alt="' . $idea['title'] . '">';
    }
    ?>


    <label>Image</label>
    <input type="file" name="image" accept="image/*">
    <p id="copyright"> *Please make sure that the image is copyright before uploading </p>
           
    <input type="submit" value="Edit">


</form>

<?php include 'partials/bottom.php'; ?>