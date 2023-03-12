<?php
    require_once "config.php";
    require_once WEBROOT . "libs/AuthenticateUser.php";
    if(!AuthenticateUser::is_logged()){
        header("Location: logIn.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>-->
        <title>Dashboard</title>
    </head>
    <body>
    <section class="featured section" id="featured">
    <p class="title">Dashboard per Adminin</p>
    <h1 class="text">Welcome
        <strong>
            <?php
            $logged_user=AuthenticateUser::get();
            echo $logged_user["emri"];
            ?>
        </strong>
    </h1> 
    <p><a href="user_list.php">Lista e Userave</a></p>
    <p><a href="article_list.php">Lista e Artikujve</a></p>
    <p><a href="article_create.php">Krijo Artikull</a></p>
    </section>