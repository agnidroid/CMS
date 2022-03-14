<?php
session_start();
if (isset($_SESSION["user_name"])) {
    // echo $_SESSION["user_name"];
} else {
    $_SESSION['message']="Login to continue";
    header("Location:login-register-form.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--Iport google icon font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">

    <!-- Import materlialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>


    <style>
        main {
            display: grid;
            grid-template-columns: 300px auto;
            grid-template-rows: auto auto auto;
        }

        header {
            grid-column: 2/-1;
            grid-row: 1/1;
        }

        .sidenav {
            transform: translateX(0);
            grid-column: 1/1;
            grid-row: 1/-1;
        }

        .main {
            grid-column: 2/-1 !important;
        }

        a:hover {
            text-decoration: none;
        }

        header {
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 2;
        }

        .fa-camera {
            text-align: center;
            line-height: 65px;
            font-size: 20px;
        }

        @media screen and (max-width: 650px) {

            main {
                display: grid;
                grid-template-columns: 1fr;
                grid-template-rows: auto auto auto;
            }

            .sidenav {
                transform: translateX(-300px);
            }
        }

        .collection-item span {
            display: flex;
            justify-content: space-evenly;
        }

        .collection-item>a {
            color: rgba(0, 0, 0, 1) !important;
        }

        .collection-item>a:hover {
            color: #007bff !important;
        }

        */
    </style>
</head>

<body>


    <main class="container-fluid p-0 m-0">

        <!--- Header --->
        <header class="p-0 container-fluid">
            <nav class="teal">
                <div class="nav-wrapper">
                    <div class="container-fluid">
                        <a href="" class="brand-logo center">Blogera</a>
                        <a href="" class="sidenav-trigger right" data-target="slide-out"><i class="material-icons fa fa-bars"></i></a>
                        <ul class="hide-on-small-and-down  right" id="menu">
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="">Visit Us</a></li>
                            <li><a href="">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <!--  Aside 1  -->
        <aside class="sidenav">
            <ul class="side-nav fixed">
                <li>
                    <div class="user-view p-0" style="position: relative;">
                        <div class="bakcground">
                            <img src="ab.jpg" alt="" class="responsive-img w-100" style="height: 165px !important;">
                        </div>
                        <div style="position: absolute; bottom: 0; left: 10px;">
                            <a href=""><img src="ab.jpg" alt="" class="fa fa-camera bg-light circle"></a>
                            <span class="name white-text"><?php  echo $_SESSION["user_name"]; ?></span>
                            <span class="email white-text"><?php //echo $_SESSION["email"]; ?></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="dashboard.php" class="nav-links">Dashboard</a>
                </li>

                <li>
                    <a href="post.php" class="nav-links">Posts</a>
                </li>

                <li>
                    <a href="image.php" class="nav-links">Images</a>
                </li>

                <li>
                    <a href="" class="nav-links">Comments</a>
                </li>

                <li>
                    <a href="setting.php" class="nav-links">Setting</a>
                </li>

                <li class="divider"></li>

                <li>
                    <a href="php/logoutlogic.php" class="nav-links">Logout</a>
                </li>
            </ul>
        </aside>

        <!-- Aside slide-out -->
        <aside class="sidenav" id="slide-out">
            <ul class="side-nav fixed">
                <li>
                    <div class="user-view p-0" style="position: relative;">
                        <div class="bakcground">
                            <img src="image/ab.jpg" alt="" class="responsive-img w-100" style="height: 165px !important;">
                        </div>
                        <div style="position: absolute; bottom: 0; left: 10px;">
                            <!-- <a href=""><img src="1.jpg" alt="" class="fa fa-camera bg-light circle"></a>
        --> <a href="/"><img src="image/1.jpg" alt="" class="fa fa-camera bg-light circle"></a>
                            <span class="name white-text"><?php echo $_SESSION["user_name"]; ?></span>
                            <span class="email white-text"><?php //echo $_SESSION["email"]; ?></span>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="dashboard.php" class="nav-links">Dashboard</a>
                </li>

                <li>
                    <a href="post.php" class="nav-links">Posts</a>
                </li>

                <li>
                    <a href="image.php" class="nav-links">Images</a>
                </li>

                <li>
                    <a href="" class="nav-links">Comments</a>
                </li>

                <li>
                    <a href="setting.php" class="nav-links">Setting</a>
                </li>

                <li class="divider"></li>

                <li>
                    <a href="php/logoutlogic.php" class="nav-links">Logout</a>
                </li>
            </ul>
        </aside>