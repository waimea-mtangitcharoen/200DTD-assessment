<?php
require 'lib/utils.php';
include 'partials/_top.php'; 

?>

        <h1 class="center-title">No ideas for your project? Easy!</h1>
        <p class="center-title">Start off by picking your area of interest!!</p>
        
    <?php

        $db = connectToDB();


        //setup a query to get all area info
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
            echo $area['name'];            
            echo '</a>';
            // only admin can delete
            if($adminPortal == true){
                echo   '<a 
                            class="delete-button" 
                            href="delete-areas.php?id=' .  $area['id'] . '"
                            onclick="return confirm(`Are you sure?`)"><i data-feather="trash-2"></i></a>';
                } 
            echo '</li>';
            
        }
        echo '</ul>';

        echo '<div class="add-button">
                <a href="form-area.php">
                    +
                </a>
             </div>';
    
    ?>

    <?php include 'partials/bottom.php'; ?>
