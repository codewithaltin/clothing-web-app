<?php
   require_once "models/User.php";
   list($email_err,$pass_err) = User::login('login');
?>
<title>Log-In Page | ALTINIUM</title>
  <header id="header"><?php include 'header.php'?></header>
    <div id="logindiv">
      <div id="log">
        <section>
          <h3>LOG IN</h3>
          <form id="form"  method ="POST">
            <div class="field email">
              <input
                name='email'
                type="text"
                class="inputEmail input"
                placeholder="E-MAIL ADDRESS"
              />
              <!--<div class="error error-txt size6">Email can't be blank</div>-->
              <small id="userErr" style="  color: red;visibility: hidden;float: left;">You cannot leave this field blank</small>
              <?php if(isset($email_err)){ ?>
                <small style="  color: red;visibility: visible;position:absolute;left:0;" id="userErr"><?php echo $email_err;?></small>
                <?php }?>
            </div>
            <br />
            <div class="field password">
              <input
                name='password'
                type="password"
                class="inputPasswd input"
                placeholder="PASSWORD"
              />
              <!--<div class="error error-txt size6">Password can't be blank</div>-->
              <small id="passErr" style="  color: red;visibility: hidden;float: left;">You cannot leave this field blank</small>
              <?php if(isset($pass_err)){ ?>
                <small style="  color: red;visibility: visible;float: left; position:absolute;left:0;"><?php echo $pass_err;?></small>
                <?php }?>
            </div>
            <br>
            <p class="size6 pointer">HAVE YOU FORGOTTEN YOUR PASSWORD?</p>
            <p class="size6 signUpText">DON'T HAVE AN ACCOUNT? <a href="register.php " style =" text-decoration: underline;">SIGN UP</a></p>
            <div class="bttn">
              <button type="submit" class='button' name ='login'>LOG IN</button>
             
            </div>
          </form>
        </section>
      </div>
      <div id="reg">
        <section>
          <h3>REGISTER</h3>
          <div class="size">
            <p>
              IF YOU STILL DON'T HAVE AN
              <span>
                <strong>ALTINIUM</strong> ACCOUNT, USE THIS OPTION TO ACCESS THE
                REGISTRATION FORM.
              </span>
            </p>

            <p>
              BY GIVING US YOUR DETAILS, PURCHASING IN <b>ALTINIUM</b>

              WILL BE FASTER AND AN ENJOYABLE EXPERIENCE.
            </p>
          </div>
          <div class="bttn">
            <button class="">
              <a href="register.php"> CREATE ACCOUNT</a>
            </button>
          </div>
        </section>
      </div>
    </div>
    <footer id="footer"><?php include 'footer.php'?></footer>
