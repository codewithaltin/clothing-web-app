<?php
    require_once "config.php";
    require_once WEBROOT . "models/User.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
$user = User::getbyId($id);

if(isset($_POST['save'])){
    $user->emri = $_POST['emri'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->roli = $_POST['roli'];
    $user->save();
    header("Location:user_list.php");

}

?>
<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="../style/style.css">
    <title>Update User</title>
</head>
<body>
<section class="dashboard">
<div class="logindiv"> 
    <form method="post">
        <input type="text" class="input" name="emri" value="<?php echo $user->emri ?>" placeholder="Name"><br>
        <input type="text" class="input" name="email" value="<?php echo $user->email ?>" placeholder="Email"><br>
        <input type="text" class="input" name="password" value="<?php echo $user->password ?>" placeholder="Password"><br>
        <input type="text" class="input" name="roli" value="<?php echo $user->roli ?>" placeholder="Role"><br>
        <div class="bttn">
            <button type="submit" class="bttn" name="save">UPDATE</button></div>
    </form>
 </div>
</section>
</body>
</html>


