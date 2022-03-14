<?php

$conn = mysqli_connect("localhost", "root", "", "cms");
if ($conn) {
       // echo "connected db";
} else {
       echo "error";
}
?>

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



                            <a href="post.php?Id=<?php echo $row['id']?>" class="collection-item" style="background:#f4f4f4"><?php echo $row['title']?></a>
              <?php
                     }
              }
              ?>

       </ul>
       <!-- </div> -->
</div>