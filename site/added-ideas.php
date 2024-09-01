<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

$db = connectToDB();


//setup a query to get all ideas information
$query = 'SELECT ideas.student_name,
                 ideas.title,    
                 ideas.description,    
                 ideas.link

FROM ideas
ORDER BY ideas.student_name ASC';

//Attempt to run the query
try{
    $stmt = $db->prepare($query);
    $stmt->execute();
    $ideas = $stmt->fetchAll();
}
catch (PDOexception $e) {
    consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
    die('There was an error getting idea data from the database');
}
//see what we got back
consoleLog($ideas);

//create added-ideas table
echo '<table>
        <tr>
           <th>Student Name</th>
           <th>Project title</th>
           <th>Description</th>
           <th>Link</th>
        </tr>';

foreach ($ideas as $idea) {
    echo '<tr>';

    echo    '<td>' . $idea['student_name'] . '</td>';
    echo    '<td>' . $idea['title'] . '</td>';
    echo    '<td>' . $idea['description'] . '</td>';
    echo    '<td>
                <a class="table-link" href="' . $idea['link'] . '"><i data-feather="external-link"></i></a>
            </td>';
    echo '</tr>';

    
}

echo '</table>';







?>

<?php include 'partials/bottom.php'; ?>
