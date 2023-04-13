<?php
    require_once "config.php";
    require_once WEBROOT . "libs/AuthenticateUser.php";
    if(!AuthenticateUser::is_logged()){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <title>Admin Dashboard</title>
    </head>
    <body>

    <section class="dashboard" id="featured">
    <h1>Welcome
        <strong>
            <?php
            $logged_user=AuthenticateUser::get();
            echo $logged_user["emri"];
            ?>
        </strong>
    </h1> 
    <hr>

    <p><b>Dashboard per Adminin</b></p>
    <p><a href="../index.php"> Kthehu ne main page</a></p>
    <p><a href="logout.php">Log Out</a></p>

    <p><b>You have the below acceses:</b></p>
    <p><a href="user_list.php">Lista e Userave</a></p>
    <p><a href="article_list.php">Lista e Artikujve</a></p>
    <p><a href="article_create.php">Krijo Artikull</a></p>
</section>