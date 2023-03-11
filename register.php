<?php
  include_once "config.php";

  if(isset($_POST['sign-up'])){

    $error_msg=null;
    
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
    if($email==""){
        $error_msg="Email eshte e detyruesheme";
    }else if ($password==""){
        $error_msg="Password eshte i detyrueshem";
    }
    if(is_null($error_msg)){
        $user=new User();
        $user->emri=$username;
        $user->email=$email;
        $user->password=$password;
        $user->roli=1;
        $user->id_dyqani=1;
        $user->save();
        header("Location: index.php");
        exit;
    }
  }
  <body>
  <header id="header"><?php include 'header.php'?></header>
    <div id="regpage">
      <h3>PERSONAL DETAILS</h3>
      <div id="fill">
        <form id="form" action="#" method ="POST">
          <div class="input-control">
            <input class = "input" name="email" type="email" placeholder="E-MAIL" />
          </div>
          <div class="input-control">
            <input class = "input" type="password" name ='password' placeholder="PASSWORD" />
            <input
              class = "input"
              type="password"
              name="repeatpassword"
              placeholder="REPEAT PASSWORD"
            />
            <input  class = "input" type="text" name="firstname" placeholder="FIRST NAME" />
          <input class = "input"type="text"  name="lastname" placeholder="LAST NAME" />
          </div>
          <br />
           <div id="checklast">
              <input id="checkbox" name ="email" type="checkbox" />I WISH TO RECEIVE ALTINIUM
              NEWS ON MY E-MAIL<br>
            <input id="checkbox" id="checkmark1" type="checkbox" /> I ACCEPT THE PRIVACY
              STATEMENT          </div>
          <div class="bttn">
            <input type="submit" name ='sign-up' >CREATE ACCOUNT</button>
          </div>
      </div>
    </form>
    </div>
    <footer id="footer"><?php include 'footer.php'?></footer>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="script/reg_validation.js"></script>
?>