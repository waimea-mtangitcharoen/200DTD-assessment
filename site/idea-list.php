<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

consoleLog($_GET);

$areaID = $_GET['area'] ?? null;
if ($areaID == null) die('Missing area ID!');

consoleLog('Area: ' . $areaID);

$db = connectToDB();

// -------------------------------------------------
// Get area name
$query = 'SELECT name                       
            FROM areas
            WHERE id = ?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$areaID]);
    $area = $stmt->fetch();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting area data from the database');
}

echo '<h2>' . $area['name'] . '</h2>';


// -------------------------------------------------
// Get list of tasks for that area
$query = 'SELECT title,
                link,
                id
                                            
FROM ideas
WHERE area = ?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$areaID]);
    $ideas = $stmt->fetchAll();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
//see what we got back
consoleLog($ideas);

if (count($ideas) == 0) {
    echo '<p>No ideas in this area!';
}
else {
    echo '<ul id="idea-list">';

    foreach ($ideas as $idea) {
        echo '<li>';

        echo '<a href="details.php?id='. $idea['id'] .'">';
        echo    $idea['title'];
        echo '</a>';
        
        echo '<a href="'. $idea['link'] .'">';
        echo '🔗';
        echo '</a>';

        echo   '<a href="delete-ideas.php?id=' .  $idea['id'] . '&area=' . $areaID . '">🗑</a>';
        echo '</li>';
    }

    echo '</ul>';
}

echo '<div id="add-idea-button">
                <a href="form-idea.php?area=' . $areaID . '">
                    +
                </a>
             </div>';
?>




<?php include 'partials/bottom.php'; ?>