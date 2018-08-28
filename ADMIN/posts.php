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
                <h2 class="w3ls_head">Post Your PDF here</h2>

                <?php
                if (isset($_GET['gets'])){
                    $gt = $_GET['gets'];
                    $xps = $_GET['g'];
                    $xy = return_max_needs_no();

                    for ($i=1; $i<=$xy; $i++){
                        if ($gt === "xasth145XCAH41dfgrmki444") {
                            $value = crypt($i, '$2a$09$iusesomecrazystring111$');
                            if ($value === $xps) {
                                $getid = $i;

                                $z = user_can_share_pdf_11($getid);

                                if ($z) {
                                    $qrys = "delete from needs where need_id={$getid}";
                                    $passerby = mysqli_query($connection, $qrys);
                                    header("Location: timeline_can.php");
                                }
                            }
                        }
                    }

                } else {
                    user_can_share_pdf_10();
                }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="cat-title">Add Title</label>
                        <input autocomplete="off" class="form-control" type="text" name="book_name" required="">
                    </div>


                    <div class="">
                        <label for="">Choose Category &nbsp;</label>
                        <select id="country" name="cat">
                            <option class="dropdown-header" value="">Select Category</option>
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

                    <label for="">Upload The Book Here</label>
                    <div class="custom-file">
                        <input type="file" name="files" class="custom-file-input" accept="application/pdf">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>

                    <label for="">Upload Thumbnail Picture Of The Book Here</label>
                    <div class="custom-file">
                        <input type="file" name="images" class="custom-file-input">
                        <label class="custom-file-label" for="customFile"></label>
                    </div>
                    *remember : a default thumbnail will be added if no picture is uploaded

                    <br><br>
                    <div>
                        <label>Say Something about the book</label>
                        <textarea name="contents" placeholder="Description of the book"  id = "body"></textarea>
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
                        <input class="btn btn-success" type="submit" name="sub" value="Add To Post">
                    </div>
                </form>

            </div>
        </div>
    </section>
    <?php include "includes/posts_footer.php"; ?>
