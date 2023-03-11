
  <body>
  <header id="header"><?php include 'header.php'?></header>
    <div id="regpage">
      <h3>PERSONAL DETAILS</h3>
      <div id="fill">
        <form id="form" action="#">
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
            <button type="submit">CREATE ACCOUNT</button>
          </div>
      </div>
    </form>
    </div>
    <footer id="footer"><?php include 'footer.php'?></footer>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="script/reg_validation.js"></script>
