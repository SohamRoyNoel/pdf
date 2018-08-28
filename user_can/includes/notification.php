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
                    $sp = "select * from needs limit 3";
                    $spn = mysqli_query($connection, $sp);

                    while ($row = mysqli_fetch_assoc($spn)){
                        $need_id = $row['need_id'];
                        $need_author = $row['need_author'];
                        $need_title = $row['need_title'];
            ?>
            <li>
                <a href="./share_pdf.php?gets=xasth145XCAH41dfgrmki444&g=<?php echo $need_id; ?>">
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
    <!-- inbox dropdown start-->
    <li id="header_inbox_bar" class="dropdown">
        <a data-toggle="dropdown" class="" href="#">
            <i class="far fa-bell"></i>
            <span class="badge bg-important">4</span>
        </a>
        <ul class="dropdown-menu extended inbox">
            <li>
                <p class="red">You have 4 Mails</p>
            </li>
            <li>
                <a href="#">
                    <span class="photo"><img alt="avatar" src="images/3.png"></span>
                    <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                    <span class="message">
                                    Hello, this is an example msg.
                                </span>
                </a>
            </li>

            <li>
                <a href="#">See all messages</a>
            </li>
        </ul>
    </li>

    <!-- inbox dropdown end -->
    <li>
        <a class="btn btn-primary" href="../Home/index_home.php"><i class="fas fa-home"></i></a>
    </li>


</ul>
<!--  notification end -->