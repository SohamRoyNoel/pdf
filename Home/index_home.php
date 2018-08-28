<?php include "../db.php"?>
<?php include "includes/header.php"?>

<!---start-wrap---->
<!---start-header---->
<?php include "includes/navigation.php"?>
</div>
<!---//End-header---->
<!---start-content---->
<div class="content">
    <div class="wrap">
        <div id="main" role="main">
            <ul id="tiles">
                <!-- These are our grid blocks -->
                <?php

                    $query = "select * from post where post_status='published' order by post_id desc";
                    $select_all = mysqli_query($connection, $query);
                    $count = mysqli_num_rows($select_all);

                    while ($row = mysqli_fetch_assoc($select_all)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_content = $row['post_content'];
                        $post_category = $row['post_category'];
                        $post_status = $row['post_status'];
                        $post_image = $row['thumbnail_image'];
                        $view = $row['post_views'];

                        $crypt_url = crypt($post_id, '$2a$09$iusesomecrazystring111$');

                        $N = "select * from category where category_id = $post_category";
                        $np = mysqli_query($connection, $N);
                        while ($r=mysqli_fetch_assoc($np)) {
                            $getu = $r['category_name'];
                            ?>

                            <li onclick="location.href='single-page.php?k=<?php echo $crypt_url; ?>';">
                                <img src="../ADMIN/PDF_THUMBNAIL/<?php echo $post_image; ?>" width="282" height="118">
                                <div class="post-info">
                                    <div class="post-basic-info">
                                        <h3><a href="#"><?php echo $post_title; ?></a></h3>
                                        <span><a href="#"><i class="fas fa-gift"></i><?php echo $getu; ?></a></span>
                                        <span><a href="#"><i class="fab fa-adn"></i><?php echo $post_author; ?></a></span> &nbsp;
                                        <span><a href="#"><i class="far fa-calendar-alt"></i>&nbsp;<?php echo $post_date; ?></a></span>
                                        <p><?php echo substr($post_content, 0, strlen($post_content) - 50) . " " . "<a href='single-page.php'>Read More....</a>"; ?></p>
                                    </div>
                                    <div class="post-info-rate-share">
                                        <?php
                                                $k ="select * from comments where comment_post_id=$post_id";
                                                $k1 = mysqli_query($connection, $k);
                                                $k2 = mysqli_num_rows($k1);
                                        ?>
                                        <div class="rateit">
                                            <i class="fas fa-eye"></i>&nbsp;<?php echo $view; ?>
                                            &nbsp;
                                            <i class="fas fa-comment-alt"></i>&nbsp;<?php echo $k2; ?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </li>

                            <?php
                        }
                    }
                 ?>
            </ul>
                <!-- End of grid blocks -->


        </div>
    </div>
</div>
<!---//End-content---->
<!----wookmark-scripts---->

<?php include "includes/footer.php"?>
