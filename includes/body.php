<?php

$conn = mysqli_connect("localhost", "root", "", "cms");
if ($conn) {
    // echo "connected db";
} else {
    echo "error";
}
?>


<div class="row">
    <div class="col l9 m9 s12">
        <!--this is card1-->
    <!--    <div class="col l3 m4 s6">
            <div class="card">
                <div class="card-image">
                    <img src="image/img10.png" alt="">
                    <div class="card-title blue-text">Blog 1</div>
                </div>
                <div class="card-content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, nostrum.

                </div>
                <div class="card-action teal center">
                    <a href="" class="black-text">Read more</a>
                </div>
            </div>
        </div>    -->
        <!--this is card1-->
        <?php
        $sql = "select * from posts order by id desc";
        $res = mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)) {
            while ($row = mysqli_fetch_array($res)) {


        ?>
                <div class="col l3 m4 s6">
                    <div class="card small">
                        <div class="card-image">
                            <img src="image/<?php echo $row['post_img'];?>" alt="">
                            
                        </div>
                        <div class="card-content">
                        <div class="card-title blue-text truncate"><?php echo $row['title'];?></div>
                        <?php echo $row['content'];?>

                        </div>
                        <div class="card-action teal center">
                            <a href="post.php?id=<?php echo $row['id'];?>" class="black-text">Read more</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    