/*function checkValidation() {
  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;
  let emailText, passwordText;
  let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (password == "") {
    passwordText = "Password is not valid!";
  }
  if (!email.match(pattern)) {
    emailText = "Email is not valid!";
  }
  let emailErr = document.getElementById("emailError");
  emailErr.innerHTML = emailText;
  emailErr.style.color = "red";
  let passErr = document.getElementById("passwordError");
  passErr.innerHTML = passwordText;
  emailErr.style.color = "red";
}
*/
//LOGIN VALIDATION
/*
const form = document.querySelector("form");
(eField = form.querySelector(".email")),
  (eInput = eField.querySelector("input")),
  (pField = form.querySelector(".password")),
  (pInput = pField.querySelector("input"));
form.onsubmit = (e) => {
  e.preventDefault();
  eInput.value == "" ? eField.classList.add("error") : checkEmail();
  pInput.value == "" ? pField.classList.add("error") : checkPass();

  setTimeout(() => {
    eField.classList.remove("shake");
    pField.classList.remove("shake");
  }, 500);

  eInput.onkeyup = () => {
    checkEmail();
  };
  pInput.onkeyup = () => {
    checkPass();
  };

  function checkEmail() {
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!eInput.value.match(pattern)) {
      eField.classList.add("error");
      eField.classList.remove("valid");
      let errorTxt = eField.querySelector(".error-txt");
      eInput.value != ""
        ? (errorTxt.innerText = "Enter a valid email address")
        : (errorTxt.innerText = "This field is required.");
    } else {
      eField.classList.remove("error");
      eField.classList.add("valid");
    }
  }
  function checkPass() {
    if (pInput.value == "") {
      pField.classList.add("error");
      pField.classList.remove("valid");
    } else {
      pField.classList.remove("error");
      pField.classList.add("valid");
    }
  }
  if (
    !eField.classList.contains("error") &&
    !pField.classList.contains("error")
  ) {
    window.location.href = form.getAttribute("action");
  }
};*/
