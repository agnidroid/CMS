<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "cms");
if ($conn) {
    // echo "connected db";
} else {
    echo "error";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="navbar-fixed">
        <nav class="teal">
            <div class="nav-wrapper">
                <div class="container-fluid">
                    <a href="" class="brand-logo center">Self Blogger</a>
                    <a href="" class="sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>
                    <ul class="hide-on-small-and-down right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="">Visit Us</a></li>
                        <li><a href="https://abhishekraj.netlify.app/">About Us</a></li>
                        <li><a href="admin\login-register-form.php">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="row">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "select * from posts where id = '$id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                $sql2 = "select view from posts where id = '$id'";
                $res2 = mysqli_query($conn, $sql2);
                $row = mysqli_fetch_array($res2);
                $view = $row['view'];
                $view = $view + 1;

                $sql3 = "update posts set view='$view' where id='$id'";
                $res3 = mysqli_query($conn, $sql3);
                // echo $view;



                $data = mysqli_fetch_assoc($result);
                $title = $data['title'];
                $content = $data['content'];
                // echo $title . $content;
            }
        } else {
            header("Location:index.php");
        }

        ?>
        <div class="col l9 m9 s12">
            <!--this is card1-->
            <div class="">
                <div class="card">
                    <div class="card-content">
                        <div class="card-title blue-text center"><?php echo $title; ?></div>
                        <?php echo $content; ?>
                    </div>
                    <!-- <div class="card-action teal center">
                        <a href="" class="black-text">Read more</a>
                    </div> -->
                </div>
            </div>
            <!--comment section-->

            <div class="card-panel">
                <h5>Write Comments</h5>
                <?php
                if (isset($_SESSION["message"])) {
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                }
                ?>
                <div class="row">
                    <div class="col l8 offset-l2 m10 offset-m1 s12">
                        <form action="comment.php?id=<?php echo $id ?>" method="POST">
                            <div class="input-field">
                                <input type="email" name="email" id="" class="validate" placeholder="your email address">
                                <label for="email" data-error="invalid email format"></label>
                            </div>
                            <div class="input-field">
                                <textarea name="comment" class="materialize-textarea" placeholder="your comment"></textarea>
                            </div>
                            <div class="center">
                                <input type="submit" value="comment" name="submit">
                            </div>
                        </form>
                        <h5>Comments</h5>

                        <ul class="collection">
                            <?php
                            $sql5 = "select * from comment where post_id='$id' order by id desc limit 5";
                            $res5 = mysqli_query($conn, $sql5);
                            if (mysqli_num_rows($res5) > 0) {
                                while ($row = mysqli_fetch_array($res5)) {


                            ?>

                                    <li class="collection-item">
                                        <?php


                                        echo $row["comment_text"]; ?>
                                        <span class="secondary-content">
                                            <?php echo $row["email"]; ?>
                                        </span>
                                    </li>
                            <?php
                                }
                            } else {
                                echo "no comment";
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>




            <!--related blogs section-->

            <h4>Related blogs</h4>
            <?php
            $sql = "select * from posts order by rand() limit 4";
            $res = mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)) {
                while ($row = mysqli_fetch_array($res)) {


            ?>
                    <div class="col l3 m4 s6">
                        <div class="card small">
                            <div class="card-image">
                                <img src="image/<?php echo $row['post_img']; ?>" alt="">
                                <div class="card-title blue-text truncate"><?php echo $row['title']; ?></div>
                            </div>
                            <div class="card-content">
                                <?php echo $row['content']; ?>

                            </div>
                            <div class="card-action teal center">
                                <a href="post.php?id=<?php echo $row['id']; ?>" class="black-text">Read more</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>





        </div>

        <!--ths is side area-->
        <div class="col l3 m3 s12">
            <ul class="collection">
                <li class="collection-item" style="background:#f4f4f4">
                    <h5>Search</h5>
                    <form action="search.php" method="get">

                        <div class="input-field">
                            <input type="text" name="search" id="search" placeholder="Search Anythings..." required>
                            <div class="center">
                                <input type="submit" class="btn" value="search" name="submit">
                            </div>

                        </div>
                    </form>
                </li>
            </ul>
            <ul class="collection" style="background:tan">
                <h4>Trending blogs</h4>
                <?php
                $sql = "select * from posts order by view desc limit 7";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) {

                    while ($row = mysqli_fetch_assoc($res)) {



                ?>



                        <a href="post.php?Id=<?php echo $row['id'] ?>" class="collection-item" style="background:#f4f4f4"><?php echo $row['title'] ?></a>
                <?php
                    }
                }
                ?>

            </ul>
            <!-- </div> -->
        </div>



    </div>




    <ul id="slide-out" class="sidenav">
        <li><a href="index.php">Home</a></li>
        <div class="divider"></div>
        <li><a href="">Contact Us</a></li>
        <div class="divider"></div>
        <li><a href="https://abhishekraj.netlify.app/">About Us</a></li>
        <li><a href="admin\login-register-form.php">Admin</a></li>
        <div class="divider"></div>
    </ul>











    <footer class="page-footer teal " style="height:70px">
        <div class="container center">
            Theme Developed By ARA
        </div>

        <div class="container">
            &copy; All Right Reserved,Self Blogger
        </div>


    </footer>







    <script src="js/jquery.js"></script>
    <script src="js/materialize.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems, options);
        });

        // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
        // var collapsibleElem = document.querySelector('.collapsible');
        // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

        // Or with jQuery

        $(document).ready(function() {
            $('.sidenav').sidenav();
        });
    </script>
</body>

</html>


<?php
// if(isset($_POST["submit"])){
//     $email = $_POST["email"];
//     $comment = $_POST["comment"];
//     $id = $_GET["Id"];
//     $email=mysqli_real_escape_string($conn,$email);
//     $email=htmlentities($email);
//     $comment=mysqli_real_escape_string($conn,$comment);
//     $comment=htmlentities($comment);
//     $id=mysqli_real_escape_string($conn,$id);
//     $id=htmlentities($id);

//     $sql="insert into comment(post_id,comment_text,email) values('$id','$comment','$email')";
//     $res= mysqli_query($conn, $sql);
//     if($res){
//         $_SESSION["message"]="commented successfully";
//         header("Location:post.php?Id=$id");
//     }
//     else{
//        $_SESSION["message"]="something worng";
//        header("Location:post.php?Id=$id");

//     }

// }
?>

