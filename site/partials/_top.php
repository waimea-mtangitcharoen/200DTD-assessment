<?php require_once '_config.php'; 

session_name('TechWeb');
session_start();

$adminPortal = isset($_SESSION['admin']);

$page = basename($_SERVER['SCRIPT_NAME']);

// consoleLog($_SESSION);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project ideas website</title>

    <script src="https://unpkg.com/feather-icons"></script>

    <link
        rel="stylesheet"
        href="css/styles.css"
    >

</head>

<body>
    <header>
        <h1><a href="index.php">Project ideas website test</a></h1>

        <nav>
            <a href="index.php" ><i data-feather= "home"></i>Home</a>
            <?php
                if($adminPortal == true){
                   echo '<a href="added-ideas.php"><i data-feather="table"></i> Added ideas</a>';
                   echo '<a href="logOut-admin.php"  ><i data-feather="user"></i>Log Out</a>';
                }
                else{
                   echo '<a href="form-admin.php"  ><i data-feather="user"></i>Admin portal</a>';
                }
            ?>
        </nav>
    </header>

    <main>

