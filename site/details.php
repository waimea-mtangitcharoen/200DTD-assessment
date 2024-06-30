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








?>