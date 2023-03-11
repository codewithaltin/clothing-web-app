<?php
  require_once "config.php";
  require_once "libs/AuthenticateUser.php";
  if(isset($_POST['sign-up'])){

    $error_msg=null;
        $email=$_POST['email'];
        $password=$_POST['password'];
        $repeatpassword=$_POST['repeatpassword'];
        $firstName=$_POST['firstname'];
        $lastName=$_POST['lastname'];

    if($email==""){
        $error_msg="Email eshte e detyruesheme";
    }else if ($password=="" || $repeatpassword == ""){
        $error_msg="Password is required";
    }
    else if($password != $repeatpassword){
        $error_msg ="Passwords must match.";
    }
    else if ($firstName == '' || $lastName == '' ){
      $error_msg = "Emri dhe mbiemri is required.";
      }
    if(is_null($error_msg)){
        $user=new User();
        $user->emri=$firstName;
        $user->email=$email;
        $user->password=$password;
        $user->roli=1;
        $user->id_dyqani=1;
        $user->save();
        $_SESSION['name'] = $firstName;
        header("Location:index.php");
        exit;
    }
  }
?>
<header id="header"><?php include 'header.php'?></header>
<div id="regpage">
  <h3>PERSONAL DETAILS</h3>
  <div id="fill">
  <form id="form" action="#" method ="POST">
      <div class="input-control">
        <input  class='input' id="email" name="email" type="email" placeholder="E-MAIL" />
      </div>
      <div class="input-control">
        <input id="password" type="password" name ='password' class='input' placeholder="PASSWORD" />
        <input
          id="repeatpassword"
          type="password"
          name="repeatpassword"
          class='input'
          placeholder="REPEAT PASSWORD"
        />
        <input class='input' id="first-name" type="text" name="firstname" placeholder="FIRST NAME" />
      <input  class='input' id="last-name" type="text"  name="lastname" placeholder="LAST NAME" />
      </div>
      <br />
       <div id="checklast">
          <input  id="checkbox" name ="email" type="checkbox" />I WISH TO RECEIVE ALTINIUM
          NEWS ON MY E-MAIL<br>
        <input id="checkbox" id="checkmark1" type="checkbox" /> I ACCEPT THE PRIVACY
          STATEMENT          </div>
      <div class ="bttn" >
        <button type="submit" name ='sign-up'>CREATE ACCOUNT</button>
      </div>
  </div>
</form>
</div>
<footer id="footer"><?php include 'footer.php'?></footer>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="script/reg_validation.js"></script>
