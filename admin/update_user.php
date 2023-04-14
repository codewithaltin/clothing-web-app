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
    $user->roli = (strtolower($_POST['roli']) == "admin") ? 0 :1 ;
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
        <h5>Emri:</h5>
        <input type="text" class="input" name="emri" value="<?php echo $user->emri ?>" placeholder="Name"><br>
       <br>
        <h5>Email:</h5>
        <input type="text" class="input" name="email" value="<?php echo $user->email ?>" placeholder="Email"><br>
       <br>
        <h5>Roli:</h5>
                    <input type="text" class="input" name="roli" value="<?php echo ($user->isAdmin()) ? "ADMIN":"Perdorues" ?>" placeholder="Role"><br>
        <div class="bttn">
            <button type="submit" class="bttn" name="save">UPDATE</button></div>
    </form>
 </div>
</section>
</body>
</html>


