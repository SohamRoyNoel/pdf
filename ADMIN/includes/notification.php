<!--  notification start -->
<ul class="nav top-menu">
    <!-- settings start -->
    <li class="dropdown">
        <?php
                $s = "select * from needs";
                $sp = mysqli_query($connection, $s);
                $count = mysqli_num_rows($sp);
        ?>
        <a data-toggle="dropdown" class="" href="#">
            <i class="fa fa-tasks"></i>
            <span class="badge bg-success"><?php echo $count; ?></span>
        </a>
        <ul class="dropdown-menu extended tasks-bar">
            <li>
                <p class="">You have <?php echo $count; ?> pending requests</p>
            </li>
            <?php
            $sp = "select * from needs order by need_id desc limit 3";
            $spn = mysqli_query($connection, $sp);

                while ($row = mysqli_fetch_assoc($spn)){
                    $need_id = $row['need_id'];
                    $need_author = $row['need_author'];
                    $need_title = $row['need_title'];

                    $crypto = crypt($need_id, '$2a$09$iusesomecrazystring111$');
            ?>
            <li>
                <a href="./posts.php?gets=xasth145XCAH41dfgrmki444&g=<?php echo $crypto ?>">
                    <div class="task-info clearfix">
                        <div class="desc pull-left">
                            <h5><?php echo $need_author; ?></h5>
                            <p><?php echo $need_title; ?></p>
                        </div>
                        <span class="notification-pie-chart pull-right" data-percent="45">
                            <span class="percent"></span>
                            </span>
                    </div>
                </a>
            </li>
            <?php } ?>

            <li class="external">
                <a href="./timeline_can.php">See All Tasks</a>
            </li>
        </ul>
    </li>
    <!-- settings end -->

    <!-- notification dropdown start-->
    <li id="header_notification_bar" class="dropdown">
        <a data-toggle="dropdown" class="" href="#">

            <i class="fas fa-bell"></i>
            <span class="badge bg-warning">3</span>
        </a>
        <ul class="dropdown-menu extended notification">
            <li>
                <p>Notifications</p>
            </li>
        </ul>
    </li>
    <li>
        <a class="btn btn-primary" href="../Home/index_home.php"><i class="fas fa-home"></i></a>
    </li>
    <!-- notification dropdown end -->
</ul>
<!--  notification end -->