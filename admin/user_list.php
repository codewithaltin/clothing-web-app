

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
    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="../style/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
    </head>
    <body>
<section class="featured section" id="featured">

<section class="dashboard">
    <p><a href="dashboard.php">Kthehu</a>
</p>
<table class="tableUser" border="1px solid black">
    <caption>Lista e perdoruesve</caption>
    <thead>
        <tr>
            <th>Emri</th>
            <th>Email</th>
            <th>Roli</th>
            <th colspan='2'>Actions</th>
        </tr>
    </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <th><?= $user->emri ?></th>
                <td><?= $user->email ?></td>
                <td><?= ($user->isAdmin()) ? "<b>ADMIN</b>":"Perdorues" ; ?></td>
                <!--<td><a href="<?php// $user->delete() ?>">Delete</a></td>-->
                <td><a href="delete_user.php?id=<?php echo $user->getId()?>"  onclick="return confirm('Are You Sure ?')">Delete</a></td>
                <td><a href="update_user.php?id=<?php echo $user->getId()?>">Update</a></td>
                </form>
            </tr>
            <?php endforeach?>
        </tbody>
    </table>
    </section>
</body>
</html>