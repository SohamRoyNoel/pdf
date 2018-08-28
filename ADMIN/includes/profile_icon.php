<ul class="nav pull-right top-menu">
    <!-- user login dropdown start-->
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <img width="50" alt="" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>">
            <span class="username"><?php echo $_SESSION['nm']; ?></span>
            <b class="caret"></b>
        </a>
        <ul class="dropdown-menu extended logout">
            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
            <li><a href=""><i class="fa fa-key"></i> Log Out</a></li>
        </ul>
    </li>
    <!-- user login dropdown end -->

</ul>