<?php
include("includes/nav.php");
?>
<?php
include("php/dbcon.php");
?>

<!-- main content area-->
<div class="main container-fluid p-0 m-0">
    <div class="row container-fluid p-0 m-0">
        <div class="col-sm-6">
            <ul class="collection with-header">
                <li class="collection-header grey">
                    <h5 class="center "> Recent Post</h5>
                </li>


                  <?php
                    $sql="select * from posts order by id desc";
                    $res=mysqli_query($conn, $sql);
                      if(mysqli_num_rows($res)>0){

                        while($row=mysqli_fetch_assoc($res)){

                       
                  ?>
                         


                <li class="collection-item ">
                    <a href=""> <?php echo $row['title'];?>

                    </a><br>
                    <span> <a href="edit.php?Id=<?php echo $row['id'];?>"><i class="fa fa-pencil"></i> Edit</a> <a href="delete.php?Id=<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i> Delete</a> <a href=""><i class="fa fa-share-alt"></i> Share</a></span>
                </li>
                    <?php
                        }
                    }

                    else{
                        echo "you don't have any posts";
                    }
                    ?>
              

            </ul>
            <a href="" class="right">READ MORE</a>
        </div>
        <!-- this is comment area-->
        <div class="col-sm-6">
            <ul class="collection with-header">
                <li class="collection-header grey">
                    <h5 class="center"> Recent comments</h5>
                    <?php
                    if(isset($_SESSION["msg"])){
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                    else{
                        //echo "session not set";
                    }
                    ?>
                </li>
                <li class="collection-item ">
                <?php
                            $sql5 = "select * from comment order by id desc limit 5";
                            $res5 = mysqli_query($conn, $sql5);
                            if (mysqli_num_rows($res5) > 0) {
                                while ($row = mysqli_fetch_array($res5)) {


                            ?>

                                    
                                    <li class="collection-item">
                                        <?php


                                        echo $row["comment_text"]; ?>
                                        <span class="secondary-content">
                                            <?php echo $row["email"]; ?>
                                        </span><br>
                                        <span> <a href="approve.php?Id=<?php echo $row['id'];?>"><i class="fa fa-check"></i> Approve</a> <a href="delete_comment.php?Id=<?php echo $row['id'];?>"><i class="fa fa-times"></i> Remove</a></span>
                                    </li>
                                    
                            <?php
                                }
                            } else {
                                echo "no comment";
                            }
                            ?>
                </li>




            </ul>
            <a href="" class="right">READ MORE</a>
        </div>
    </div>
</div>

<div class="fixed-action-btn">
    <a href="write.php" class="btn-floating btn btn-large white-text red pulse" style="border-radius: 50% !important;"><i class="fa fa-pencil"></i></a>
</div>

</main>



<?php
include("includes/foot.php");
?>