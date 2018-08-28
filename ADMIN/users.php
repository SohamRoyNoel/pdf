<?php include "includes/users_header.php" ?>
<?php
// check the names of the elements
if (isset($_POST['checkBoxArray'])){
    foreach ($_POST['checkBoxArray'] as $row){

        $bos = $_POST['bulk_options'];

        switch ($bos){
            case 'delete':
                $del = "delete from user where id = $row";
                $grs = mysqli_query($connection, $del);
                break;
        }
    }
}

?>
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <?php include "includes/notification.php"; ?>
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
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User information details
                </div>
                <div class="row w3-res-tb">

                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group">

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <form action="" method="post">
                        <table class="table table-striped b-t b-light">

                            <div class="col-sm-5 m-b-xs">
                                <select class="input-sm form-control w-sm inline v-middle" name="bulk_options">
                                    <option value="">Choose Bulk action</option>
                                    <option value="delete">Delete Selected</option>
                                </select>
                            </div>
                            <input type="submit" name="bulk" class="btn btn-success" value="Apply Action">

                            <thead>
                            <tr>
                                <th style="width:20px;">
                                    <input type="checkbox" id="selectAllBoxes"><i></i>

                                </th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>F_Name</th>
                                <th>L_Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>About</th>
                                <th>ACTIONS</th>
                                <th style="width:30px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php
                                //pagination

                                if (isset($_GET['page'])){
                                    $page = $_GET['page'];
                                } else {
                                    $page = "";
                                }

                                if ($page == "" || $page == 1){
                                    $page_1 = 0;
                                } else{
                                    $page_1 = ($page * 5) - 5;
                                }

                                $post_q_cnt = "select * from user";
                                $select_all_posts_query = mysqli_query($connection, $post_q_cnt);
                                $cnts = mysqli_num_rows($select_all_posts_query);

                                $cnts = ceil($cnts/5);

                                $qr = "select * from user limit $page_1, 5";
                                $snds = mysqli_query($connection, $qr);

                                confirm($snds);

                                while ($row = mysqli_fetch_assoc($snds)){
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $fn = $row['first_name'];
                                    $ln = $row['last_name'];
                                    $em = $row['email'];
                                    $img = $row['image'];
                                    $rl = $row['role'];
                                    $ab = $row['about'];

                                    echo "<tr>";
                                    ?>
                                <td><input class='checkbox' type='checkbox' name='checkBoxArray[]' value='<?php echo $id; ?>'>
                                <?php
                                    echo "<td>{$id}</td>";
                                    echo "<td>{$name}</td>";
                                    echo "<td>{$fn}</td>";
                                    echo "<td>{$ln}</td>";
                                    echo "<td>{$em}</td>";
                                    echo "<td><img width='120' height='75' src='../Registration/user_picture/{$img}'></td>";
                                    echo "<td>{$rl}</td>";
                                    echo "<td>{$ab}</td>";
                                    echo "<td><br><a href=\"manipulate.php?deletep=$id\" class=\"active\" ui-toggle-class=\"\"><i class=\"fas fa-trash-alt\"></i></a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tr>

                            </tbody>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <ul class="pager">

        <?php

        // to insert color on the pager; we gotta make style.css
        for ($i=1; $i <= $cnts; $i++){
            if ($i == $page){
                echo "<li><a class='active_link' href='users.php?page={$i}'>{$i}</a> </li>";
            } else {
                echo "<li><a href='users.php?page={$i}'>{$i}</a> </li>";
            }
        }

        ?>
    </ul>


    <?php include "includes/users_footer.php"?>
