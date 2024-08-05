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

echo '<h2 class="center-title">' . $area['name'] . '</h2>';


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

        echo '<a class="idea-name" href="details.php?id='. $idea['id'] .'">';
        echo    $idea['title'];
        echo '</a>';
        
        echo '<div class="function">';
            echo '<a href="'. $idea['link'] .'">';
            echo '<i data-feather="external-link"></i>';
            echo '</a>';

            if($adminPortal == true){
            echo   '<a href="delete-ideas.php?id=' .  $idea['id'] . '&area=' . $areaID . '"><i data-feather="trash-2"></i></a>';
            echo   '<a href="form-edit.php?id=' . $idea['id'] . '&area=' . $areaID . '"><i data-feather="edit"></i>';
            }
        echo '</div>';
        

        echo '</li>';
    }

    echo '</ul>';
}

echo '<div class="add-button">
                <a href="form-idea.php?area=' . $areaID . '">
                    +
                </a>
             </div>';
?>




<?php include 'partials/bottom.php'; ?>