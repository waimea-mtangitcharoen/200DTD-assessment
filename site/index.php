<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project ideas website</title>

</head>

<body>
    <header>
        <h1>Project ideas website test</h1>

        <nav>
            <a href="#"  >Added ideas</a>
            <a href="#"  >Admin portal</a>
        </nav>
    </header>


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

            echo '<a href="company.php?code='. $company['code'] .'">';
            echo    $company['name'];
            echo '</a>';
            
            
            

            echo '<a href="'. $company['website'] .'">';
            echo '🔗';
            echo '</a>';
            echo '</li>';

            
        }
    ?>

</body>
</html>
