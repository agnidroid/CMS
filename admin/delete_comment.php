<?php

include("php/dbcon.php");
session_start();

if(isset($_GET["Id"])){
    $id=$_GET["Id"];
    //echo $id;

    $sql="delete from comment where id='$id'";
    $res=mysqli_query($conn,$sql);
    if($res){
       // echo "deleted";
      // echo "<script> alert("comment deleted sucessfully"); </script>";
       header("Location:dashboard.php");
    }
    else{
        echo "Not deleted";
    }
    
}

else{
    echo "error";
}
?>