<?php include "includes/single_page_HEADER.php"?>
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
                                <li><a href="#"><span>Contact</span></a></li>
                                <?php
                                $ff = $_SESSION['rl'];
                                if ($ff === "admin"){
                                    echo "<li><a href=\"../ADMIN/index.php\"><span>ADMIN AREA</span></a></li>";
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
                    <li><a href="../Profile/index_profile.php"><img height="43" width="43" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>" title="" /><span><?php echo $_SESSION['nm']; ?></span></a></li>
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
    </div>
</div>
<!---//End-header---->
<!---start-content---->
<div class="content">
    <div class="wrap">
        <div class="single-page">
            <?php
            if (isset($_POST['sub'])){
                $name = escape($_POST['book_name']);

                $allow = array("pdf");
                $temp = explode(".", $_FILES['files']['name']);
                $extention = end($temp);
                $upload_file = $_FILES['files']['name'];
                $temps = $_FILES['files']['tmp_name'];

                $thumbnail_image = $_FILES['images']['name'];
                $post_image_temp = $_FILES['images']['tmp_name'];

                $cat = escape($_POST['cat']);
                $contents= escape($_POST['contents']);
                $author = $_SESSION['nm'];
                $date = date('d-m-y');
                $status = "published";
                $count = 4;
                $view = 4;
                $rate = 4;

                echo  "ok";

                if (!empty($name) && !empty($upload_file) && !empty($cat) && !empty($contents)){
                    move_uploaded_file($temps, "../ADMIN/GLOBAL_PDF_DIRECTORY/$upload_file");
                    move_uploaded_file($post_image_temp, "../ADMIN/PDF_THUMBNAIL/$thumbnail_image");

                    echo "ok1";

                    if (!empty($thumbnail_image)) {
                        $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp)";
                        $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$thumbnail_image}', 'CROW108')";
                        $sender = mysqli_query($connection, $query);
                        confirm($sender);
                    } else {
                        $queryn = "select * from category where category_id=$cat";
                        $sendn = mysqli_query($connection, $queryn);

                        while ($row = mysqli_fetch_assoc($sendn)) {
                            $imgS = $row['image'];
                        }

                        $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp)";
                        $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$imgS}', 'CROW108')";
                        $sender = mysqli_query($connection, $query);
                        confirm($sender);
                    }

                    header("Location: user_post.php");
                }
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="cat-title"><b>Add Title</b></label>
                    <input autocomplete="off" class="form-control" type="text" name="book_name" required="">
                </div>


                <div class="">
                    <label for=""><b>Choose Category</b>&nbsp;</label>
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
        <!---//End-comments-section--->
    </div>
</div>
</div>
<?php include "includes/single_page_FOOTER.php"?>
