<?php
session_start();
$conn=mysqli_connect("localhost","root","","cms");
if($conn){
   // echo "connected db";
}
else{
    echo "error";
}
?>

<?php
//include("dbcon.php");
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $comment = $_POST["comment"];
    $id = $_GET["id"];
    $email=mysqli_real_escape_string($conn,$email);
    $email=htmlentities($email);
    $comment=mysqli_real_escape_string($conn,$comment);
    $comment=htmlentities($comment);
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);

    $sql="insert into comment(post_id,comment_text,email) values('$id','$comment','$email')";
    $res= mysqli_query($conn, $sql);
    if($res){
       // echo "inserted";
        $_SESSION["message"]="commented successfully";
        
       header("Location:post.php?id=$id");
    }
    else{
     //   echo " not inserted";
    //    $_SESSION["message"]="something worng";
    //    header("Location:post.php?Id=$id");

    }

}
?>