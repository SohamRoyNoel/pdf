<?php session_start(); ?>
<?php include "includes/header.php" ?>


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
<?php include "includes/Sidemenu.php" ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="" >
            <br><br><br>
            <!-- //market-->
            <div class="market-updates">
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-4 market-update-right">
                            <br>
                            <i class="fas fa-sitemap icon-3x"> </i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Post</h4>
                            <?php
                                    $s = "select * from post";
                                    $p = mysqli_query($connection, $s);
                                    $c = mysqli_num_rows($p);
                            ?>
                            <h3><?php echo $c; ?></h3>
                            <p>Other hand, we denounce</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-1">
                        <div class="col-md-4 market-update-right">
                            <br>
                            <i class="fas fa-users icon-3x" ></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Users</h4>
                            <?php
                                    $s = "select * from user";
                                    $p = mysqli_query($connection, $s);
                                    $c = mysqli_num_rows($p);
                            ?>
                            <h3><?php echo $c; ?></h3>
                            <p>Other hand, we denounce</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-3">
                        <div class="col-md-4 market-update-right">
                            <br>
                            <i class="far fa-question-circle icon-3x"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Unposted</h4>
                            <?php
                                    $s = "select * from post where post_status = 'draft'";
                                    $p = mysqli_query($connection, $s);
                                    $c = mysqli_num_rows($p);
                            ?>
                            <h3><?php echo $c; ?></h3>
                            <p>Other hand, we denounce</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 market-update-gd">
                    <div class="market-update-block clr-block-2">
                        <div class="col-md-4 market-update-right">
                            <br>
                            <i class="far fa-comments icon-3x" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-8 market-update-left">
                            <h4>Comments</h4>
                            <?php
                                    $s = "select * from comments";
                                    $p = mysqli_query($connection, $s);
                                    $c = mysqli_num_rows($p);
                            ?>
                            <h3><?php echo $c; ?></h3>
                            <p>Other hand, we denounce</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </section>
    <?php
            $query = "select * from post where post_status='published'";
            $pass = mysqli_query($connection, $query);
            $post_count = mysqli_num_rows($pass);

            $query = "select * from post where post_status='draft'";
            $pass = mysqli_query($connection, $query);
            $post_counts = mysqli_num_rows($pass);

            $query = "select * from comments";
            $pass = mysqli_query($connection, $query);
            $cmt_count = mysqli_num_rows($pass);

            $query = "select * from comments where comment_status='draft'";
            $pass = mysqli_query($connection, $query);
            $cmt_counts = mysqli_num_rows($pass);

            $query = "select * from user";
            $pass = mysqli_query($connection, $query);
            $usr_counts = mysqli_num_rows($pass);

            $query = "select * from user where role='subscriber'";
            $passr = mysqli_query($connection, $query);
            $usr_countsA = mysqli_num_rows($passr);

            $query = "select * from category";
            $pass = mysqli_query($connection, $query);
            $cat_count = mysqli_num_rows($pass);

    ?>
    <div class="container">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Data ', 'Count'],

                    <?php
                    $elements_text = ['Active Post','Draft Post', 'Comments', 'Unapproved Comments', 'Users', 'Subscribers', 'Categories'];
                    $element_count = [$post_count, $post_counts, $cmt_count, $cmt_counts, $usr_counts, $usr_countsA, $cat_count ];

                    // "['{$elements_text[$i]}']" --> For each text val
                    //   "$element_count[$i]" --> For each integer value
                    // general structure defined in API
                    for ($i = 0; $i < 7; $i++){
                        echo "['{$elements_text[$i]}'" . "," . "{$element_count[$i]}],";
                    }
                    ?>
                    //['Post', 1000],
                ]);

                var options = {
                    chart: {
                        title: '',
                        subtitle: '',
                    }
                };

                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
            }
        </script>

        <div id="columnchart_material" style="width: 1100px; height: 400px;"></div>
        <br>
    </div>
    </section>



<?php include "includes/footer.php" ?>