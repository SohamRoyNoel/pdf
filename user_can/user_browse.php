<?php include "includes/user_browser_header.php" ?>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="user_browse.php" class="logo">
        <?php echo $_SESSION['fn'];  ?>
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
        <!-- gallery -->
        <div class="gallery">
            <h2 class="w3ls_head">Profile</h2>
            <div class="gallery-grids">
                <div class="gallery-top-grids">
                    <div class="col-sm-4 gallery-grids-left">
                        <div class="gallery-grid">
                            <?php
                            $imgs = $_SESSION['img'];
                            ?>
                            <a class="example-image-link" href="../Registration/user_picture/<?php echo $_SESSION['img']; ?>" data-lightbox="example-set" data-title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae cursus ligula">
                                <img height="300" width="1000" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>" alt="" />
                                <div class="captn">
                                    <h4><?php echo $_SESSION['nm']; ?></h4>
                                    <p><?php echo $_SESSION['em']; ?></p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-8 gallery-grids-left">
                        <div class="gallery-grid">
                            <div class="right-w3-agile">
                                <div class="right-info">
                                    <h2><?php echo $_SESSION['nm'] . " (" . $_SESSION['fn'] . " " . $_SESSION['ln'] . ")"; ?></h2>
                                    <span class="designation"><?php echo $_SESSION['rl']; ?></span>
                                    <p class="para-wthree">
                                        <a href="mailto:example@mail.com"><?php echo $_SESSION['em'];?></a>
                                    </p>
                                    <p class="para-wthree"><?php echo $_SESSION['ab']; ?></p>

                                </div>
                                <div class="right-grids-w3-agileits">
                                    <div class="grids g1">
                                        <h6><?php
                                            $poster = $_SESSION['id'];
                                            $s = "select * from post where user_id = $poster";
                                            $send = mysqli_query($connection, $s);
                                            $counter_post = mysqli_num_rows($send);
                                            ?>
                                            <span><?php echo $counter_post; ?></span>Post</h6>
                                    </div>
                                    <div class="grids g2">
                                        <h6>
                                            <?php
                                            $poster = $_SESSION['id'];
                                            $s = "select * from comments where commenter_id = $poster";
                                            $send = mysqli_query($connection, $s);
                                            $counter_cmt = mysqli_num_rows($send);
                                            ?>
                                            <span><?php echo $counter_cmt; ?></span>Comments</h6>
                                    </div>
                                    <div class="grids g3">
                                        <h6>
                                            <span>218</span>Download</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
                <script src="js/lightbox-plus-jquery.min.js"> </script>

            </div>
        </div>
        <!-- //gallery -->
					<div class="clearfix"> </div>
				</div>
</section>
<?php include "includes/user_browser_footer.php"?>
