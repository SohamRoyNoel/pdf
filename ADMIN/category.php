<?php include "includes/category_header.php"?>

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

            <!-- LEFT -->
            <div class="typo-agile col-xs-6">
                <h2 class="w3ls_head">Add Category in your Library</h2>

                <?php
                        if (isset($_POST['adds'])){
                            $category = $_POST['cat_title'];
                            $p_image = $_FILES['images']['name'];
                            $post_image_temp = $_FILES['images']['tmp_name'];

                            move_uploaded_file($post_image_temp, "PDF_THUMBNAIL/$p_image");

                            if ($category != "" && $p_image != "" && !empty($category) && !empty($p_image)){
                                $querys = "insert into category (category_name, image) values ('{$category}', '{$p_image}')";
                                $send = mysqli_query($connection, $querys);
                                header("Location: category.php");
                            } else {
                                echo  "Nothing to add";
                            }

                            // confirm($send);
                        }

                ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="cat-title">Add category</label>
                            <input autocomplete="off" class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <label for="cat-title">Add image</label>
                            <input type="file" name="images">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="adds" value="Add To Category">
                        </div>
                    </form>
            </div>

            <!-- RIGHT -->
            <div class="typo-agile col-xs-6">
                <h2 class="w3ls_head">Categories List</h2>
                <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                            $querys = "select * from category";
                            $sends = mysqli_query($connection, $querys);

                            while ($row = mysqli_fetch_assoc($sends)) {
                                $id = $row['category_id'];
                                $category = $row['category_name'];
                                $img = $row['image'];

                                if ($id != null && $category != null && $img != null){
                                    echo "<tr>";
                                    echo "<td>{$id}</td>";
                                    echo "<td>{$category}</td>";
                                    echo "<td><img width='100' height='50' src='PDF_THUMBNAIL/{$img}'></td>";
                                    echo "</tr>";
                                }
                            }
                    ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
<?php include "includes/category_footer.php"?>