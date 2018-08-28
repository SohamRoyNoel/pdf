<?php include "includes/add_admin_header.php"?>

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
		<div class="form-w3layouts">
            <!-- page start-->

            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Admin
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <?php
                                    if (isset($_POST['submit1'])){
                                        $fn = $_POST['firstname'];
                                        $ln = $_POST['lastname'];
                                        $un = $_POST['username'];
                                        $ps = $_POST['password'];
                                        $em = $_POST['email'];
                                        $ab = $_POST['about'];
                                        $rl = "admin";

                                        $image = $_FILES['images']['name'];
                                        $post_image_temp = $_FILES['images']['tmp_name'];


                                        move_uploaded_file($post_image_temp, "../Registration/user_picture/$image");

                                        $qr = "insert into user (name, password, first_name, last_name, email, image, role, about) values ('{$un}', '{$ps}', '{$fn}', '{$ln}', '{$em}', '{$image}', '{$rl}', '{$ab}')";
                                        $execute = mysqli_query($connection, $qr);

                                        confirm($execute);

                                        header("Location: add_admin.php");

                                    }
                                ?>
                                <?php
                                    if (isset($_POST['submit2'])){
                                        $fn = "";
                                        $ln = "";
                                        $un = "";
                                        $ps = "";
                                        $em = "";
                                        $ab = "";
                                        $rl = "";
                                    }
                                ?>
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="add_admin.php" novalidate="novalidate" enctype="multipart/form-data">
                                    <div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Firstname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="firstname" name="firstname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Lastname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="lastname" name="lastname" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">Username</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="username" name="username" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="password" name="password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="email" name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Image</label>
                                        <div class="col-lg-6">
                                            <div class="custom-file">
                                                <input type="file" name="images" class="custom-file-input">
                                                <label class="custom-file-label" for="customFile"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">About</label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control " id="body" name="about" type=""></textarea>
                                            <script>
                                                ClassicEditor
                                                    .create( document.querySelector( '#body' ) )
                                                    .catch( error => {
                                                        console.error( error );
                                                    } );
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" name="submit1">Save</button>
                                            <button class="btn btn-default" type="submit" name="submit2">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>


            <!-- page end-->
        </div>
</section>
<?php include "includes/add_admin_footer.php"?>