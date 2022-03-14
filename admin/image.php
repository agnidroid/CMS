<?php
include("includes/nav.php");
?>
<?php
//include("php/dbcon.php");
?>
<?php
$dir = "../image/";
$files = scandir($dir);
if ($files) {
?>
    <div class="main">
        <style>
            .main_row {
                padding: 0 1rem;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(120px, 120px));
                grid-gap: 1rem;
                /* max-width: 130px; */
            }
            .main_row .card img {
                width: 100%;
                max-height: 150px;
            }
        </style>
        <div class="main_row" style="margin-left: 0;margin-right: 0;">
            <?php
            foreach ($files as $file) {
                if (strlen($file) > 2) {
            ?>
                    <div class="card">
                        <div class="card-image">
                            <img src="../image/<?php echo $file; ?>" alt="" srcset="" style="">
                        </div>
                    </div>

        <?php
                }
            }
        }

        ?>
        </div>
    </div>