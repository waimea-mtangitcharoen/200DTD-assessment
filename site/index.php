<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

?>


    <main>
        <h1>No ideas for your project? Easy!</h1>
        <p>Start off by picking your area of interest!!</p>
        
    <?php

        $db = connectToDB();


        //setup a query to get all company info
        $query = 'SELECT * FROM areas';

        //Attempt to run the query
        try{
            $stmt = $db->prepare($query);
            $stmt->execute();
            $areas = $stmt->fetchAll();
        }
        catch (PDOexception $e) {
            consoleLog($e->getMessage(), 'DB List Fetch', ERROR);
            die('There was an error getting data from the database');
        }
        //see what we got back
        consoleLog($areas);

        echo '<ul id="area-list">';
        foreach ($areas as $area) {
            echo '<li>';

            echo '<a href="idea-list.php?area='. $area['id'] .'">';
            echo    $area['name'];
            echo '</a>';
            echo '</li>';

            
        }
        echo '</ul>';

        echo '<div id="add-area-button">
                <a href="form-area.php">
                    +
                </a>
             </div>';
    ?>

    <?php include 'partials/bottom.php'; ?>

</body>
</html>
