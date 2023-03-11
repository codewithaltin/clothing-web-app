<?php
    require_once "config.php";
    require_once /*WEBROOT .*/ "libs/AuthenticateUser.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ALTINIUM Offical Website</title>
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </head>
  <body>
<nav class="main-cont">
<link rel="stylesheet" href="./style/style.css">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <div class="logo"><a href="index.php">ALTINIUM</a></div>
  <input type="checkbox" id="click" />
  <label for="click" class="menu-btn">
    <i class="fas fa-bars"></i>
  </label>
  <ul>
    <li><a href="search.php">SEARCH</a></li>
    <?php if (AuthenticateUser::is_logged()) { ?>
      <li><a href="login.php">Log Out</a></li>
      <li>
      <img
        src="https://i.postimg.cc/q7R4p81H/wishlist-icon.png"
        width="15px"
        alt="Cart"
      />
    </li>
      <?php } else { ?>                      
    <li><a href="login.php">LOG IN</a></li>
    <li><a href="register.php">REGISTER</a></li>
    <?php } ?>

  </ul>
</nav>