<?php
    require_once "config.php";
    require_once  "../libs/AuthenticateUser.php";
    
   /* if(!AuthenticateUser::is_logged()){
        header("Location: .../login.php");
    }*/
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Dashbaord</title>
    </head>
    <body>
    <h3 class="title">Dashboard per Adminin</h3>
    <h3 class="text">Welcome</h3>
    <h3 class="loggedName">
        <strong>
            <?php
            $logged_user=AuthenticateUser::get();
            echo $logged_user["emri"];
            ?>
        </strong>
    </h3> 
    <h3><a href="user_list.php">Lista e Userave</a></h3>
    <h3><a href="article_list.php">Lista e Artikujve</a></h3>
    <h3><a href="article_create.php">Krijo Artikull</a></h3>
    </section>
<?php
    include '../subComponent/footer.php';
?>