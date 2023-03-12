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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
<form method="POST">
<?php foreach($users as $user): ?>
    <input type="text" name="name" value="<?php echo $user['emri']; ?>" placeholder="Enter your name"><br>
    <input type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="Enter your email"><br>
    <input type="submit" name="submit" value="Submit">
<?php endforeach?>
</form>
</div>
</body>
</html>