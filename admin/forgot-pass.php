<?php
session_start();
if(isset($_SESSION["message"]))
{
  echo $_SESSION["message"];
  unset($_SESSION["message"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="materialize.css">

    <style>
        main{
            background: url(ab.jpg);
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        main > div {
            background-color: rgba(254, 254, 255);
        }
        main > div > div > span {
            border-radius: 20px !important;
        }
        input[type = "email"]{
            padding: 0 15px !important;
            margin-left: -15px !important;
        }
    </style>
</head>
<body>

  <main class="container-fluid p-0">
      <div class="container w-50 pt-4 pb-5 pl-5 pr-5">
        <h5 class="center m-0 mb-3">PASSWORD RECOVERY</h5>
          <form action="resetpass-logic.php" method="post" class="container-fluid">
            <input type="email" name="email" placeholder="Enter Registered E-mail" class="mt-4">
            <input type="submit" name="submit" value="submit" class="btn btn-primary mt-4 w-100">
          </form>
        </div>
      </main>

  <!--<h1>PASSWORD RECOVERY</H1>
   <div class="set">
      <form action="forgot-pass-logic.php" method="post">
        
        <input type="email" name="email" placeholder="Enter Registered E-mail"></br>
        <input type="submit" name="submit" value="submit">
   
   
       </form>
   </div>-------->
</body>
</html>