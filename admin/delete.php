<?php
include("php/dbcon.php");
?>

<?php

if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    echo $id;
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);

    $sql="delete from posts where id='$id'";
    $res=mysqli_query($conn,$sql);

    if($res){
        // session_start();
        // $_SESSION['delmessage']="Post Deleted Successfully";
        header("Location:dashboard.php");
    }
}

?>