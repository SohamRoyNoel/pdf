<?php session_start(); ?>
<?php include "includes/header.php" ?>

    <section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="index.PHP" class="logo">
                Admin
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <!--notification start-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <?php include "includes/notification.php" ?>
            <!--  notification end -->

        </div>

        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img height="33" width="53" alt="" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>">
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
<?php include "includes/Sidemenu.php" ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
    <br><br>
            <?php include "timeline.php"?>


<?php include "includes/footer.php" ?>