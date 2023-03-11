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

       
        <link rel="stylesheet" href="../assets/css/styles.css">

        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Shop The Best Sneaker Gifts - Stadium Goods</title>
    </head>
    <body>
        <header class="l-header" id="header">
            <nav class="nav bd-grid">
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bxs-grid'></i>
                </div>

                <a href="index.php" class="nav__logo">Stadium Goods</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="../index.php" class="nav__link ">Home</a></li>
                        <li class="nav__item"><a href="../featured.php" class="nav__link">Featured</a></li>
                        <li class="nav__item"><a href="../shop.php" class="nav__link">Shop Now</a></li>
                        <li class="nav__item"><a href="../aboutUS.php" class="nav__link">About Us</a></li>
                        <?php if (AuthenticateUser::is_logged()) { ?>
                            <li class="nav__item"><a href="logout.php" class="nav__link">Log Out</a></li>
                        <?php } else { ?>
                            <li class="nav__item"><a href="../logIn.php" class="nav__link">Log In/Register</a></li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="nav__shop">
                    <i class='bx bx-shopping-bag' ></i>
                </div>
            </nav>
        </header>
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
