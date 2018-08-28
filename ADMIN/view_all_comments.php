<?php include "includes/users_header.php" ?>
<?php
// check the names of the elements
if (isset($_POST['checkBoxArray'])){
    foreach ($_POST['checkBoxArray'] as $row){

        $bos = $_POST['bulk_options'];

        switch ($bos){
            case 'delete':
                $del = "delete from comments where comment_id = $row";
                $grs = mysqli_query($connection, $del);
                break;

            case 'publish':
                $up = "update comments set comment_status = 'published' where comment_id = $row";
                $gr = mysqli_query($connection, $up);
                break;

            case 'draft':
                $del = "update comments set comment_status = 'draft' where comment_id = $row";
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
                    all comments detailed information
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
                                    <option value="publish">Change Status to Publish</option>
                                    <option value="draft">Change Status to Draft</option>
                                </select>
                            </div>
                            <input type="submit" name="bulk" class="btn btn-success" value="Apply Action">

                            <thead>
                            <tr>
                                <th style="width:20px;">
                                    <input type="checkbox" id="selectAllBoxes"><i></i>

                                </th>
                                <th>Id</th>
                                <th>Post</th>
                                <th>Author</th>
                                <th>Email</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>date</th>
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

                                $post_q_cnt = "select * from comments";
                                $select_all_posts_query = mysqli_query($connection, $post_q_cnt);
                                $cnts = mysqli_num_rows($select_all_posts_query);

                                $cnts = ceil($cnts/5);

                                $qr = "select * from comments limit $page_1, 5";
                                $snds = mysqli_query($connection, $qr);

                                confirm($snds);

                                while ($row = mysqli_fetch_assoc($snds)){
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_content =$row['comment_content'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];

                                    $SP = "select post_title from post where post_id={$comment_post_id}";
                                    $getu = mysqli_query($connection, $SP);
                                    while ($r = mysqli_fetch_assoc($getu))
                                        $post = $r['post_title'];

                                    echo "<tr>";
                                    ?>
                                <td><input class='checkbox' type='checkbox' name='checkBoxArray[]' value='<?php echo $comment_id; ?>'>
                                <?php
                                    echo "<td>{$comment_id}</td>";
                                    echo "<td>{$post}</td>";
                                    echo "<td>{$comment_author}</td>";
                                    echo "<td>{$comment_email}</td>";
                                    echo "<td>{$comment_content}</td>";
                                    echo "<td>{$comment_status} <br> <a href=\"manipulate.php?publishes={$comment_id}\" class=\"active\" ui-toggle-class=\"\"><i class=\"fa fa-check text-success text-active\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"manipulate.php?drafts={$comment_id}\" class=\"active\" ui-toggle-class=\"\"><i class=\"fa fa-times text-danger text\"></i></a></td>";
                                    echo "<td>{$comment_date}</td>";
                                    echo "<td><a href=\"manipulate.php?deletess=$comment_id\" class=\"active\" ui-toggle-class=\"\"><i class=\"fas fa-trash-alt\"></i></a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tr>

                            </tbody>
                        </table>
                    </form>
                </div>
                <footer class="panel-footer">
                    <div class="row">

                        <!-- Pagination -->
                        <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="">1</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>

    <ul class="pager">

        <?php

        // to insert color on the pager; we gotta make style.css
        for ($i=1; $i <= $cnts; $i++){
            if ($i == $page){
                echo "<li><a class='active_link' href='view_all_comments.php?page={$i}'>{$i}</a> </li>";
            } else {
                echo "<li><a href='view_all_comments.php?page={$i}'>{$i}</a> </li>";
            }
        }

        ?>
    </ul>
    <?php include "includes/users_footer.php"?>
