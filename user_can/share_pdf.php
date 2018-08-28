<?php include "includes/user_browser_header.php" ?>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="user_browse.php" class="logo">
                <?php echo $_SESSION['fn']; ?>
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <?php include "includes/notification.php"?>
        </div>
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">

                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="user_browse.php">
                        <img height="33" width="43" alt="" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>">
                        <span class="username"><?php echo $_SESSION['nm']; ?></span>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="user_browse.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="../ADMIN/logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <?php include "includes/sidemenu.php"?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- //market-->
            <div class="w3layouts-glyphicon">
                <div class="grid_3 grid_4">
                    <h2 class="w3ls_head">Post Your PDF here</h2>

                    <?php
                    if (isset($_GET['gets'])){
                        $gt = $_GET['gets'];
                        if ($gt === "xasth145XCAH41dfgrmki444"){
                            if (isset($_GET['g'])){
                                $getid = $_GET['g'];
                                for ($i=1; $i<=return_max_needs_no();$i++) {
                                    $val = crypt($i, '$2a$09$iusesomecrazystring111$');
                                    if ($val == $getid){
                                        $z = user_can_share_pdf_1($i);

                                        if ($z) {
                                            $qrys = "delete from needs where need_id={$i}";
                                            $passerby = mysqli_query($connection, $qrys);
                                            header("Location: timeline_can.php");
                                        }
                                    }
                                }


                            }
                        }
                    } else {
                        user_can_share_pdf();
                    }

                    ?>


                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cat-title"><b>Add Title</b></label>
                            <input autocomplete="off" class="form-control" type="text" name="book_name" required="">
                            *please add a meaningful name that could help you and other while searching a particular book
                        </div>


                        <div class="">
                            <label for=""><b>Choose Category</b> &nbsp; </label>
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

                        <label for=""><b>Upload The Book Here</b></label>
                        <div class="custom-file">
                            <input type="file" name="files" class="custom-file-input" accept="application/pdf">
                            <label class="custom-file-label" for="customFile"></label>
                        </div>

                        <label for=""><b>Upload Thumbnail Picture Of The Book Here</b></label>
                        <div class="custom-file">
                            <input type="file" name="images" class="custom-file-input">
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                        *remember : a default thumbnail will be added if no picture is uploaded

                        <br><br>
                        <div>
                            <label><b>Say Something about the book</b></label>
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
            <div class="clearfix"> </div>
            </div>
        </section>
        <?php include "includes/user_browser_footer.php"?>
