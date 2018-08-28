<?php include "includes/single_page_HEADER.php"; ?>
<!---start-wrap---->
<!---start-header---->
<div class="header">
    <div class="wrap">

        <div class="nav-icon">
            <a href="#" class="right_bt" id="activator"><span> </span> </a>
        </div>
        <div class="box" id="box">
            <div class="box_content">
                <div class="box_content_center">
                    <div class="form_content">
                        <div class="menu_box_list">
                            <ul>
                                <li><a href="index_home.php"><span>Home</span></a></li>
                                <li><a href="#"><span>About</span></a></li>



                                <?php
                                $ff = $_SESSION['rl'];
                                if ($ff === "admin"){
                                    echo "<li><a href=\"../ADMIN/index.php\"><span>ADMIN AREA</span></a></li>";
                                } else {
                                    echo "<li><a href=\"#\"><span>Contact</span></a></li>";
                                    echo "<li><a href=\"../user_can/user_browse.php\"><span>USER Area</span></a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <a class="boxclose" id="boxclose"> <span> </span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="userinfo">
            <div class="user">
                <ul>
                    <li><a href="../user_can/user_browse.php"><img height="43" width="43" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>" title="" /><span><?php echo $_SESSION['nm']; ?></span></a></li>
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<!---//End-header---->
<!---start-content---->
<?php
if (isset($_GET['k'])) {
    $decrypt = $_GET['k'];

    $hp = return_max_post_no();
    for ($i = 1; $i <= $hp; $i++) {
        $value = crypt($i, '$2a$09$iusesomecrazystring111$');

        if ($value == $decrypt) {

            $qry = "update post set post_views=post_views+1 where post_id=$i";
            $endr = mysqli_query($connection, $qry);

            $spd = "select * from post where post_id = $i";
            $cons = mysqli_query($connection, $spd);

            while ($row = mysqli_fetch_assoc($cons)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_category = $row['post_category'];
                $post_status = $row['post_status'];
                $post_comment_count = $row['post_comment_count'];
                $post_views = $row['post_views'];
                $post_ratings = $row['post_ratings'];
                $pdf = $row['pdf'];
                $thumbnail_image = $row['thumbnail_image'];

                $_SESSION['books'] = $pdf;

                ?>
                <div class="content">
                    <div class="wrap">
                        <div class="single-page">
                            <div class="single-page-artical">
                                <div class="artical-content">
                                    <img width="1200" height="633"
                                         src="../ADMIN/PDF_THUMBNAIL/<?php echo $thumbnail_image; ?>"
                                         title="banner1">
                                    <h3><a href="#"><?php echo $post_title; ?></a></h3>
                                    <p><?php echo $post_content; ?>
                                </div>
                                <div class="artical-links">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-monero glyphicon-text-color"></i>&nbsp;<?php echo $post_author; ?></span></a>
                                        </li>
                                        <?php
                                        $psp = "select * from comments where comment_post_id = $post_id";
                                        $pb = mysqli_query($connection, $psp);
                                        $counter = mysqli_num_rows($pb);
                                        ?>
                                        <li><a href="#"><i class="fas fa-comment-alt"></i>&nbsp;<?php echo $counter; ?></span></a>
                                        </li> &nbsp;
                                        <li><a href="#"><i class="fas fa-eye"></i><span>&nbsp;<?php echo $post_views; ?></span></a>
                                        </li> &nbsp;
                                        <li><a href="download.php" class="btn btn-outline-light btn-lg"><i
                                                        class="fas fa-download"></i><span>&nbsp;&nbsp;Download This Book</span></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="clear"></div>
                            </div>

                            <!---start-comments-section--->
                            <div class="comment-section">
                                <div class="grids_of_2">
                                    <h2>Comments</h2>
                                    <?php

                                    $make = "select * from comments where comment_post_id = $post_id";
                                    $passes = mysqli_query($connection, $make);

                                    while ($row = mysqli_fetch_assoc($passes)) {
                                        $author = $row['comment_author'];
                                        $emls = $row['comment_email'];
                                        $conts = $row['comment_content'];
                                        $date = $row['comment_date'];

                                        $nested_pic = "select image from user where email='{$emls}'";
                                        $nested_send = mysqli_query($connection, $nested_pic);
                                        while ($rd = mysqli_fetch_assoc($nested_send)) {
                                            $spso = $rd['image'];
                                            ?>
                                            <div class="grid1_of_2">
                                                <div class="grid_img">
                                                    <a href=""><img height="80" width="80"
                                                                    src="../Registration/user_picture/<?php echo $spso; ?>"
                                                                    alt=""></a>
                                                </div>
                                                <div class="grid_text">
                                                    <h4 class="style1 list"><a
                                                                href="#"><?php echo $author; ?></a></h4>
                                                    <h3 class="style"><?php echo $date; ?></h3>
                                                    <p class="para top"> <?php echo $conts; ?> </p>

                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <?php
                                        }
                                    } ?>

                                    <div class="artical-commentbox">
                                        <h2>Leave a Comment</h2>
                                        <div class="table-form">
                                            <?php
                                            if (isset($_POST['subs'])) {
                                                $comment_post_id = $post_id;
                                                $comment_author = $_SESSION['nm'];
                                                $comment_email = $_SESSION['em'];
                                                $comment_content = escape($_POST['content']);
                                                $comment_status = "published";
                                                $comment_date = date('d-m-y');

                                                $qrys = "insert into comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
                                                $qrys .= "values({$comment_post_id},'{$comment_author}', '{$comment_email}', '{$comment_content}','{$comment_status}','{$comment_date}')";

                                                $pass = mysqli_query($connection, $qrys);


                                            }
                                            ?>
                                            <form action="" method="post">
                                                <div>
                                                    <label>Your Comment<span>*</span></label>
                                                    <textarea name="content"> </textarea>
                                                </div>
                                                <input type="submit" class="btn btn-success" name="subs"
                                                       value="submit">

                                            </form>

                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <!---//End-comments-section--->
                        </div>
                    </div>
                </div>
                <?php
            }

        }
    }
}
?>
<?php include "includes/single_page_FOOTER.php"?>

