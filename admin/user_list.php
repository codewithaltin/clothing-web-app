<?php
    require_once "config.php";
    require_once WEBROOT . "libs/AuthenticateUser.php";
    require_once WEBROOT . "models/User.php";
    
    if(!AuthenticateUser::is_logged()){
        header("Location: /login.php");
    }
    $logged_user=User::getById(AuthenticateUser::get()["id"]);
    if(!$logged_user->isAdmin()){
        header("Location: /admin/profile.php");
    }
    $users=User::getList();
   // include WEBROOT . "subcComponent/header.php"
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/styles.css"
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>Dashboard</title>
    </head>
    <body>
    
<section class="featured section" id="featured">
<h3 class="page-title">Lista e perdoruesve</h3>

<table class="tableUser">
    <thead>
        <tr>
            <th>Emri</th>
            <th>Email</th>
            <th>Roli</th>
            <th>Dyqani</th>
        </tr>
    </thead>
    <tbody>
        <? foreach($users as $user){ ?>
        <tr>
            <td><?= $user->emri ?></td>
            <td><?= $user->email ?></td>
            <td><?= ($user->tipi == "0")? "admin":"perdorues" ; ?></td>
        </tr>
        <?}?>
    </tbody>
</table>
</section>
<?php
    include WEBROOT . "footer.php"
?>
