<?php require_once '_config.php'; 

session_name('TechWeb');
session_start();

$adminPortal = isset($_SESSION['admin']);

$page = basename($_SERVER['SCRIPT_NAME']);

consoleLog($_SESSION)




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project ideas website</title>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.pumpkin.min.css"
    >

</head>

<body>
    <header>
        <h1><a href="index.php">Project ideas website test</a></h1>

        <nav>
            <a href="added-ideas.php"  >Added ideas</a>
            <a href="form-admin.php"  >Admin portal</a>
        </nav>
    </header>

    <main>