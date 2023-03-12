<?php
    include_once "config.php";
    include_once WEBROOT . "libs/AuthenticateUser.php";
    include_once WEBROOT . "models/User.php";
    if(!AuthenticateUser::is_logged()){
        header("Location: /login.php");
    }
    $logged_user=User::getById(AuthenticateUser::get()["id"]);
    if(!$logged_user->isAdmin()){
        header("Location: /admin/profile.php");
    }
    $users=User::getList();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <title>User List</title>
    </head>
    <body>
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