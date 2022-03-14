<?php
session_start();

// if (isset($_SESSION['password'])) {
//   echo $_SESSION['password'];
//   unset($_SESSION['password']);
// }

// if (isset($_SESSION['email'])) {
//   echo $_SESSION['email'];
//   unset($_SESSION['message']);
// }
if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}

?>
<?php
if (!isset($_SESSION['user_name'])) {
  // echo $_SESSION['password']; 
 }
 else{
   header("Location:dashboard.php");
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>

  </style>
</head>

<body>

  <div class="hero">
    <div class="error-box1 container">
    </div>
    <div class="error-box2 container"></div>

    <div class="formBox container pt-3 mt-4">
      <div class="btn-container">
        <div class="btn-toggler"></div>
        <span class="btn-toggle" id="login">Login</span>
        <span class="btn-toggle" id="register">Register</span>
      </div>
      <div class="social">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
      </div>

      <form action="php/login.php" method="POST" class="form1">
        <div class="email">
          <input type="email" name="email" id="login-user" class="input input-1" placeholder=" Email Id" autocomplete="false" required autofocus="true">
        </div>

        <div class="valid">
          <input type="password" name="password" id="login-pass" class="input  input-1" placeholder="Password" required disabled autofocus="true">
          <label for="login-pass" class="fa fa-eye"></label>
          <ul class="pass-valid" for="login-pass">
            <li>Password Atleast Of 8 chars.</li>
            <li>Password must contain alphabet, number and special Char.</li>
          </ul>
        </div>
        <input type="checkbox" name="rpass" id="login-rpass" disabled="disabled">
        <span class="form1-span">Remember Password</span>
        <input type="submit" name="submit" value="Login" class="input login" disabled="disabled">
        <div class="text-center"><a href="forgot-pass.php">Forgot Password?</a></div>
      </form>
      <!--register form-->
      <form action="php/signup.php" method="POST" class="form2">
        <div class="valid">
          <input type="text" name="username" id="register-user" class="input input-1" placeholder="Username" autocomplete="false" required>
          <ul class="user-valid" for="login-pass">
            <li>Username must contains alphabet , special chars. and may contains number</li>
            <li>White space not allowed</li>
          </ul>
        </div>
        <input type="email" name="email" id="register-email" class="input input-1" placeholder="Email" autocomplete="false" required disabled="disabled">
        <div class="valid valid2">
          <input type="password" name="password" id="register-pass" class="input input-1" placeholder="Password" required disabled="disabled">
          <label for="register-pass" class="fa fa-eye"></label>
          <ul class="pass-valid" for="login-pass">
            <li>Password Atleast Of 8 chars.</li>
            <li>Password must contain alphabet, number and special Char.</li>
          </ul>
        </div>
        <input type="checkbox" name="terms" id="terms" class="input-1" disabled="disabled">
        <span class="form2-span">I agree to term and condition</span>
        <input type="submit" value="Register" class="input register" name="submit" disabled="disabled">
      </form>
    </div>
  </div>

  <script>
    var login = document.querySelector("#login")
    var register = document.querySelector("#register")

    var form1 = document.querySelector(".form1")
    var form2 = document.querySelector(".form2")

    var toggler = document.querySelector(".btn-toggler")

    var errorBox1 = document.querySelector(".error-box1")
    var errorBox2 = document.querySelector(".error-box2")


    // login form
    var email1 = document.querySelector("#login-user")
    var pass1 = document.querySelector("#login-pass")
    var rempass = document.querySelector("#login-rpass")
    var loginBtn = document.querySelector(".login")
    var form1Span = document.querySelector(".form1-span")
    var form1Valid = form1.querySelector(".valid ul")
    var form1Eye = form1.querySelector(".valid label")
    // register form
    var user = document.querySelector("#register-user")
    var email = document.querySelector("#register-email")
    var pass2 = document.querySelector("#register-pass")
    var terms = document.querySelector("#terms")
    var registerBtn = document.querySelector(".register")
    var form2Span = document.querySelector(".form2-span")
    var form2Valid1 = form2.querySelector(".valid ul")
    var form2Eye = form2.querySelector(".valid label")
    var form2Valid2 = form2.querySelector(".valid2 ul")


    console.log(form2Eye)
    /** form 1
    --------------------------*/
    // username
    email1.addEventListener("keyup", function(e) {

      // changing to lowercase
      e.target.value.toLowerCase()


      var regexEmail1 = /^([a-zA-Z]+)([0-9]{0,10})@gmail.com$/
      if (regexEmail1.test(e.target.value)) {
        pass1.removeAttribute("disabled", "disabled")
      } else {
        pass1.setAttribute("disabled", "disabled")
      }
    })


    // password
    pass1.addEventListener("keyup", function(e) {

      // changing to lowercase
      e.target.value.toLowerCase()


      var regexEmail1 = /([a-zA-Z0-9\!!@#$%^&*]{1,15})([a-zA-Z0-9\!!@#$%^&*]{1,15})/
      if (regexEmail1.test(e.target.value)) {
        rempass.removeAttribute("disabled", "disabled")
        form1Span.style.opacity = "1"
        loginBtn.removeAttribute("disabled", "disabled")

        // Valid
        form1Valid.lastElementChild.style.display = "none"

        if (e.target.value.length <= 5) {
          form1Valid.firstElementChild.style.display = "block"
        } else {
          form1Valid.firstElementChild.style.display = "none"
        }
      } else {
        rempass.setAttribute("disabled", "disabled")
        form1Span.style.opacity = "0.5"
        loginBtn.setAttribute("disabled", "disabled")

        // Valid
        form1Valid.lastElementChild.style.display = "block"
      }
    })

    // Password Valid
    pass1.addEventListener("focus", (e) => {
      form1Valid.style.display = "block"
      form1Eye.style.display = "block"
    })

    // Eye
    form1Eye.addEventListener("click", (e) => {
      if (pass1.type == "password") {
        pass1.setAttribute("type", "text")
      } else {
        pass1.setAttribute("type", "password")
      }
    })

    /* form 2
    ------------------*/
    // username
    user.addEventListener("keyup", function(e) {

      // changing to lowercase
      e.target.value.toLowerCase()


      var regexUser = /^([a-zA-Z]{3,15})([0-9\@#$_]{0,8})([\@#_]{1,5})$/
      if (regexUser.test(e.target.value)) {
        email.removeAttribute("disabled", "disabled")
        form2Valid1.style.display = "none"
      } else {
        email.setAttribute("disabled", "disabled")
        form2Valid1.style.display = "block"
      }
    })

    user.addEventListener("focus", function(e) {
      form2Valid1.style.display = "block"
    })
    /**** email
    -----------------------*/
    email.addEventListener("keyup", function(e) {

      // changing to lowercase
      e.target.value.toLowerCase()


      var regexEmail2 = /^([a-zA-Z]+)([0-9]{0,10})@gmail.com$/
      if (regexEmail2.test(e.target.value)) {
        pass2.removeAttribute("disabled", "disabled")
      } else {
        pass2.setAttribute("disabled", "disabled")
      }
    })


    /******* pass2
    ---------------------------*/
    pass2.addEventListener("keyup", function(e) {

      // changing to lowercase
      e.target.value.toLowerCase()


      var regexPass2 = /([a-zA-Z0-9\!!@#$%^&*]{1,15})([a-zA-Z0-9\!!@#$%^&*]{1,15})/
      if (regexPass2.test(e.target.value)) {
        terms.removeAttribute("disabled", "disabled")
        form2Span.style.opacity = "1"

        // Valid
        form2Valid2.lastElementChild.style.display = "none"

        if (e.target.value.length <= 5) {
          form2Valid2.firstElementChild.style.display = "block"
        } else {
          form2Valid2.firstElementChild.style.display = "none"
        }
      } else {
        terms.setAttribute("disabled", "disabled")
        form2Span.style.opacity = "0.5"

        // Valid
        form2Valid2.lastElementChild.style.display = "block"
      }
    })

    pass2.addEventListener("focus", function(e) {
      form2Valid2.style.display = "block"
      form1Eye.style.display = "block"
    })


    // Eye
    form1Eye.addEventListener("click", (e) => {
      if (pass1.type == "password") {
        pass1.setAttribute("type", "text")
      } else {
        pass1.setAttribute("type", "password")
      }
    })

    terms.addEventListener("click", (e) => {
      registerBtn.toggleAttribute("disabled")
    })




    /********************************************************************************************/
    // Button toggler
    login.addEventListener("click", function(e) {
      toggler.style.left = "0%";

      login.style.color = "white"
      register.style.color = "black"

      form1.style.left = "30px";
      form2.style.left = "420px";

      errorBox1.style.top = "0px";
      errorBox2.style.top = "-60px";

      /*
        errorBox1.innerHTML = "";
        errorBox2.innerHTML = "";

        errorBox1.classList.remove("error");
        errorBox2.classList.remove("error");

        errorBox1.classList.remove("success");
        errorBox2.classList.remove("success");
        */
    })

    register.addEventListener("click", function(e) {
      toggler.style.left = "50%";

      login.style.color = "black"
      register.style.color = "white"

      form1.style.left = "-420px";
      form2.style.left = "37px";


      errorBox1.style.top = "-60px";
      errorBox2.style.top = "0px";

      /*
        errorBox1.innerHTML = "";
        errorBox2.innerHTML = "";

        
        errorBox1.classList.remove("error");
        errorBox2.classList.remove("error");

        errorBox1.classList.remove("success");
        errorBox2.classList.remove("success");
        */
    })

    /*
      form1.addEventListener("submit", Login)
      function Login(e)
      {
        e.preventDefault()

        if(input1.value.trim() == "")
        {
          errorBox1.innerHTML = "!Invalid Input" 
          errorBox1.classList.add("error");
          return false;
        }
        else{
          true;
        }
      }
      */
    var form2 = document.querySelector(".form2")
    form2.addEventListener("submit", Register)

    function Register(e) {
      // var

      errorBox1.style.top = "0px"

    }
  </script>

</body>

</html>


<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div class="hero">
      <div class="error-box1 container">
          <?php

          // session_start();
          // if(isset($_SESSION["message"]))
          // {

          //   echo $_SESSION["message"];
          //   unset($_SESSION["message"]);
          // }


          ?>
      </div>
      <div class="error-box2 container"></div>

      <div class="formBox container pt-3 mt-4"> 
        <div class="btn-container">
          <div class="btn-toggler"></div>
          <span class="btn-toggle" id="login">Login</span>
          <span class="btn-toggle" id="register">Register</span>
        </div>
        <div class="social">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
        </div>
        
        <form action="demo2.php" method="POST" class="form1">
            <input type="email" name="email" id="login-user" class="input input-1" placeholder=" Email Id" autocomplete="false" required autofocus="true">
            <input type="password" name="password" id="login-pass" class="input  input-1" placeholder="Password" required disabled autofocus="true">
            <input type="checkbox" name="rpass" id="login-rpass" disabled="disabled">
            <span class="form1-span">Remember Password</span>
            <input type="submit" name="submit" value="Login" class="input login" disabled="disabled">
            <div class="text-center"><a href="C:\xampp\htdocs\project\forgotpass.php">Forgot Password?</a></div>
          </form>
          <form action="demo.php" method="POST" class="form2">
            <input type="text" name="username" id="register-user" class="input input-1" placeholder="Username" autocomplete="false" required>
            <input type="email" name="email" id="register-email" class="input input-1" placeholder="Email" autocomplete="false" required disabled="disabled">          
            <input type="password" name="password" id="register-pass" class="input input-1" placeholder="Password" required disabled="disabled">
            <input type="checkbox" name="terms" id="terms" class="input-1" disabled="disabled">
            <span class="form2-span">I agree to term and condition</span>
            <input type="submit" value="Register" class="input register" name="submit" disabled="disabled">
          </form>
      </div>
    </div>

<script>
  var login = document.querySelector("#login")
  var register = document.querySelector("#register")
  
  var form1 = document.querySelector(".form1")
  var form2 = document.querySelector(".form2")
  
  var toggler = document.querySelector(".btn-toggler")

  var errorBox1 = document.querySelector(".error-box1")
  var errorBox2 = document.querySelector(".error-box2")


  // login form
  var email1 = document.querySelector("#login-user")
  var pass1 = document.querySelector("#login-pass")
  var rempass = document.querySelector("#login-rpass")
  var loginBtn = document.querySelector(".login")
  var form1Span = document.querySelector(".form1-span")

  // register form
  var user= document.querySelector("#register-user")
  var email = document.querySelector("#register-email")
  var pass2 = document.querySelector("#register-pass")
  var terms = document.querySelector("#terms")
  var registerBtn = document.querySelector(".register")
  var form2Span = document.querySelector(".form2-span")
console.log(form1Span, form2Span)
/** form 1
--------------------------*/

// username
  email1.addEventListener("keyup",function(e){

    // changing to lowercase
    e.target.value.toLowerCase()

    
    var regexEmail1 = /^([a-zA-Z]+)([0-9]{0,10})@gmail.com$/
    if(regexEmail1.test(e.target.value))
    {
      pass1.removeAttribute("disabled", "disabled")
    }
    else{
      pass1.setAttribute("disabled","disabled")
    }
  })


// password
  pass1.addEventListener("keyup",function(e){

  // changing to lowercase
  e.target.value.toLowerCase()


  var regexEmail1 = /^([a-zA-Z0-9]{6,15})([\!@#$%^&*]{1,4})$/
  if(regexEmail1.test(e.target.value))
  {
    rempass.removeAttribute("disabled", "disabled")
    form1Span.style.opacity = "1"
    loginBtn.removeAttribute("disabled", "disabled")
  }
  else{
    rempass.setAttribute("disabled","disabled")
    form1Span.style.opacity = "0.5"
    loginBtn.setAttribute("disabled","disabled")
  }
  })

  /* form 2
  ------------------*/
// username
user.addEventListener("keyup",function(e){

// changing to lowercase
e.target.value.toLowerCase()


var regexUser= /^([a-zA-Z]{2,15})([0-9]{0,8})([\@#_]{1})$/
if(regexUser.test(e.target.value))
{
  email.removeAttribute("disabled", "disabled")
}
else{
  email.setAttribute("disabled","disabled")
}
})
/**** email
-----------------------*/
  email.addEventListener("keyup",function(e){

// changing to lowercase
e.target.value.toLowerCase()


var regexEmail2 = /^([a-zA-Z]+)([0-9]{0,10})@gmail.com$/
if(regexEmail2.test(e.target.value))
{
  pass2.removeAttribute("disabled", "disabled")
}
else{
  pass2.setAttribute("disabled","disabled")
}
})


/******* pass2
---------------------------*/
pass2.addEventListener("keyup",function(e){

// changing to lowercase
e.target.value.toLowerCase()


var regexPass2 = /^([a-zA-Z0-9]{6,15})([\!@#$%^&*]{1,4})$/
if(regexPass2.test(e.target.value))
{
  terms.removeAttribute("disabled", "disabled")
  form2Span.style.opacity = "1"
}
else{
  terms.setAttribute("disabled","disabled")
  form2Span.style.opacity = "0.5"
}
})

  terms.addEventListener("click", (e) => {
    registerBtn.toggleAttribute("disabled")
  })


 

/********************************************************************************************/
  // Button toggler
  login.addEventListener("click", function(e){
    toggler.style.left = "0px";
    
    login.style.color = "white"
    register.style.color = "black"

    form1.style.left = "30px";
    form2.style.left = "420px";

    errorBox1.style.top = "0px";
    errorBox2.style.top = "-60px";

  /*
    errorBox1.innerHTML = "";
    errorBox2.innerHTML = "";

    errorBox1.classList.remove("error");
    errorBox2.classList.remove("error");

    errorBox1.classList.remove("success");
    errorBox2.classList.remove("success");
    */
})

  register.addEventListener("click", function(e){
    toggler.style.left = "129px";
    
    login.style.color = "black"
    register.style.color = "white"

    form1.style.left = "-420px";
    form2.style.left = "30px";


    errorBox1.style.top = "-60px";
    errorBox2.style.top = "0px";

  /*
    errorBox1.innerHTML = "";
    errorBox2.innerHTML = "";

    
    errorBox1.classList.remove("error");
    errorBox2.classList.remove("error");

    errorBox1.classList.remove("success");
    errorBox2.classList.remove("success");
    */
})

/*
  form1.addEventListener("submit", Login)
  function Login(e)
  {
    e.preventDefault()

    if(input1.value.trim() == "")
    {
      errorBox1.innerHTML = "!Invalid Input" 
      errorBox1.classList.add("error");
      return false;
    }
    else{
      true;
    }
  }
  */
  var form2 = document.querySelector(".form2")
  form2.addEventListener("submit", Register)
  function Register(e)
  {
    // var
    
      errorBox1.style.top = "0px"

  }

</script>    
    
</body>
</html>

------->