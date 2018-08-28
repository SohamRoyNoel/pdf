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
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
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