<?php
// $sql="select * from post where title like '$data' or content like '$data' or title like '%$data%' or content like '%$data%'";
?>


<?php
include("includes/header.php");
include("includes/nav.php");

$conn = mysqli_connect("localhost", "root", "", "cms");
if ($conn) {
    // echo "connected db";
} else {
    echo "error";
}

?>


<?php
if (isset($_GET["submit"])) {
    $search = $_GET["search"];
    $search = mysqli_real_escape_string($conn, $search);
    $search = htmlentities($search);

    $sql = "select * from posts where title like '$search' or content like '$search' or title like '%$search%' or content like '%$search%'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {

?>
        <div class="row">
            <div class="col l9 m9 s12">
                <?php
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
                                <a href="post.php?Id=<?php echo $row['id']; ?>" class="black-text">Read more</a>
                            </div>
                        </div>
                    </div>
                <?php
                }


                ?>
            </div>
            <?php
            include "includes/sidebar.php";
            ?>
        </div>

<?php

    } else {
        ?>
          <h5 class="center">
              No data found
          </h5>
        <?php
    }
}
?>

<?php
   include "includes/footer.php";
?>