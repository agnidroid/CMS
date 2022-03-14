<?php
session_start();
include("php/dbcon.php");
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $id=mysqli_real_escape_string($conn,$id);
    $id=htmlentities($id);

    $sql="update comment set status=1 where Id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
     // echo "updated";
     $_SESSION["msg"]="comment is approved";
     header("Location:dashboard.php");
    }
    else{
        $_SESSION["msg"]="something worng";
        header("Location:dashboard.php");
    }
}
?>