<?php
  require_once "config.php";
  require_once "models/User.php";
  User::register('sign-up');
  
?>
<title>Register Page | ALTINIUM</title>

<header id="header"><?php include 'header.php'?></header>
<div id="regpage">
  <h3>PERSONAL DETAILS</h3>
  <div id="fill">
  <form id="form"  method ="POST">
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
       <p class="size6">ALREADY HAVE AN ACCOUNT? <a href="login.php " style ="color:mediumblue;">SIGN IN</a></p>
       <br> 
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
