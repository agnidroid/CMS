<?php
include("includes/nav.php");
?>
<?php
include("php/dbcon.php");
?>

<?php
if (isset($_GET['Id'])) {
    $id = $_GET['Id'];
    $id = mysqli_real_escape_string($conn, $id);
    $id = htmlspecialchars($id);

    $sql = "select * from posts where id='$id'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);

?>


        <script src="ckeditor/ckeditor.js"></script>


        <div class="main container-fluid p-0 m-0">
            <?php

            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
            <form action="php/update_logic.php?Id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

                <div class="card-panel">
                    <h5>Title</h5>
                    <textarea name="title" placeholder="Title of the post"> <?php echo $row['title']; ?> </textarea>


                    <h5>content</h5>
                    <textarea name="editor" id="editor" class="materialize-editor"> <?php echo $row['content']; ?> </textarea>
                    <div class="center">
                        <input type="submit" value="Update" name="upgrade" class="btn white-text">
                    </div>
                </div>
            </form>




        </div>

        <script>
            CKEDITOR.replace('editor');
        </script>

        <?php
        include("includes/foot.php");
        ?>

<?php

    } else {
        header("Location:dashboard.php");
    }
}
?>