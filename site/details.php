<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

consoleLog($_GET);

$ideaID = $_GET['id'] ?? null;
if ($ideaID == null) die('Missing idea ID!');

consoleLog('Idea: ' . $ideaID);

$db = connectToDB();

// -------------------------------------------------
// Get area name
$query = 'SELECT title                       
            FROM ideas
            WHERE id = ?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$ideaID]);
    $idea = $stmt->fetch();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting idea data from the database');
}

echo '<h2>' . $idea['title'] . '</h2>';

$query = 'SELECT title,
                description,
                link,
                id
                                            
FROM ideas
WHERE id = ?';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute([$ideaID]);
    $ideas = $stmt->fetchAll();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
//see what we got back
consoleLog($ideas);

//if (count($ideas) == 0) {
    //echo '<p>No ideas in this area!';
//}
//else {
    echo '<id="idea-details">';

    foreach ($ideas as $idea) {
    
        echo '<img src="load-image.php?id=' . $idea['id'] . '">'; 
        // echo '<p id="description" '. $idea['description'] . '></p>';
        echo '<p id="description">' . $idea['description'] . '</p>';
        echo '<div class="find-more">';
            echo '<p>' . 'Find out more:' . '</p>';
            // echo '<a href="'. $idea['link'] .'">';
            echo '<a href="'. $idea['link'] .'">';
            echo '<i data-feather="external-link"></i>';
            echo '</a>';
        echo '</div>';
    }
   
    
//}
?>

<?php include 'partials/bottom.php'; ?>



