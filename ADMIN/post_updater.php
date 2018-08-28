<?php include "includes/posts_header.php"; ?>
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <?php include "includes/notification.php"?>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">

        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img height="33" width="43" alt="" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>">
                <span class="username"><?php echo $_SESSION['nm']; ?></span>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<?php include "includes/Sidemenu.php"?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="w3layouts-glyphicon">
            <div class="grid_3 grid_4">
                <h2 class="w3ls_head">Update Your PDF here</h2>

                <?php
                        if (isset($_GET['update'])) {
                            $grant = $_GET['update'];
                            $max = return_max_post_no();
                            for ($i = 1; $i <= $max; $i++) {
                                $jeez = crypt($i, '$2a$09$iusesomecrazystring111$');

                                if($jeez === $grant) {
                                    $qry = "select * from post where post_id = $i";
                                    $go = mysqli_query($connection, $qry);
                                    while ($row = mysqli_fetch_assoc($go)) {
                                        $p_id = $row['post_id'];
                                        $title = $row['post_title'];
                                        $content = $row['post_content'];
                                        $category = $row['post_category'];
                                    }

                                    $sel = "select * from category where category_id = $category";
                                    $goes = mysqli_query($connection, $sel);
                                    while ($r = mysqli_fetch_assoc($goes)) {
                                        $cat_tt = $r['category_name'];

                                    }
                                }
                            }
                        }
                ?>
                <?php
                        if (isset($_POST['sub'])){
                            $tits = $_POST['book_name'];
                            $cats = $_POST['cat'];
                            $cont = $_POST['contents'];

                            $a = "select * from category where category_id = $cats";
                            $sends = mysqli_query($connection, $a);

                            while ($row = mysqli_fetch_assoc($sends)) {
                                $img = $row['image'];
                            }

                            $statement = "update post set post_title = '{$tits}', post_category = '{$cats}', post_content = '{$cont}', thumbnail_image = '{$img}' where post_id = $p_id";
                            $went = mysqli_query($connection, $statement);
                            confirm($went);
                            header("Location: view_all_post.php");
                        }
                ?>

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cat-title">Edit Title</label>
                        <input autocomplete="off" class="form-control" value="<?php echo $title; ?>" type="text" name="book_name" required="">
                    </div>


                    <div class="">
                        <label for="">Edit Category &nbsp;</label>
                        <select id="country" name="cat">
                            <option class="dropdown-header" value=""><?php echo $cat_tt; ?></option>
                            <?php
                            $querys = "select * from category";
                            $sends = mysqli_query($connection, $querys);

                            while ($row = mysqli_fetch_assoc($sends)) {
                                $id = $row['category_id'];
                                $category = $row['category_name'];
                                $img = $row['image'];

                                echo "<option class='dropdown-item' value='{$id}'>{$category}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <br>
                    <div>
                        <label>Edit Intro</label>
                        <textarea name="contents" placeholder="Description of the book"  id = "body"><?php echo $content; ?></textarea>
                        <script>
                            ClassicEditor
                                .create( document.querySelector( '#body' ) )
                                .catch( error => {
                                    console.error( error );
                                } );
                        </script>
                    </div>

                    <br>
                    <div>
                        <input class="btn btn-success" type="submit" name="sub" value="Update Post">
                    </div>
                </form>

            </div>
        </div>
    </section>
    <?php include "includes/posts_footer.php"; ?>
