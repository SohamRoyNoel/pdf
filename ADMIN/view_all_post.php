<?php include "includes/users_header.php" ?>
<?php
// check the names of the elements
if (isset($_POST['checkBoxArray'])){
    foreach ($_POST['checkBoxArray'] as $row){

        $bos = $_POST['bulk_options'];

        switch ($bos){
            case 'delete':
                $del = "delete from post where post_id = $row";
                $grs = mysqli_query($connection, $del);
                break;

            case 'publish':
                $up = "update post set post_status = 'published' where post_id = $row";
                $gr = mysqli_query($connection, $up);
                break;

            case 'draft':
                $del = "update post set post_status = 'draft' where post_id = $row";
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
                    All Post Detailed Information
                </div>
                <div class="row w3-res-tb">


                    <div class="col-sm-4">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-2">

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
                                <th style="width:20px;"><input type="checkbox" id="selectAllBoxes"><i></i></th>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Content</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Comment_no</th>
                                <th>Views</th>
                                <th>Ratings</th>
                                <th>PDF</th>
                                <th>Thumbnail</th>
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
                                    $page_1 = ($page * 2) - 2;
                                }

                                $post_q_cnt = "select * from post";
                                $select_all_posts_query = mysqli_query($connection, $post_q_cnt);
                                $cnts = mysqli_num_rows($select_all_posts_query);

                                $cnts = ceil($cnts/2);

                                $get_id = $_SESSION['rl'];
                                $qr = "select * from post limit $page_1, 2";
                                $snds = mysqli_query($connection, $qr);


                                confirm($snds);

                                while ($row = mysqli_fetch_assoc($snds)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_content =$row['post_content'];
                                $post_category = $row['post_category'];
                                $post_status = $row['post_status'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_views = $row['post_views'];
                                $post_ratings = $row['post_ratings'];
                                $pdf = $row['pdf'];
                                $thumbnail_image = $row['thumbnail_image'];

                                $SP = "select category_name from category where category_id='{$post_category}'";
                                $getu = mysqli_query($connection, $SP);
                                while ($r = mysqli_fetch_assoc($getu))
                                    $category = $r['category_name'];

                                $reduced_length_content = substr($post_content, 0, strlen($post_content)-80);

                                echo "<tr>";
                                ?>
                                <td><input class='checkbox' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id ?>'>
                                    <?php
                                    echo "<td>{$post_id}</td>";
                                    echo "<td>{$post_title}</td>";
                                    echo "<td>{$post_author}</td>";
                                    echo "<td>{$post_date}</td>";
                                    echo "<td>{$reduced_length_content}</td>";
                                    echo "<td>{$post_category}</td>";
                                    echo "<td>{$post_status} <br> <a href=\"manipulate.php?publish=$post_id\" class=\"active\" ui-toggle-class=\"\"><i class=\"fa fa-check text-success text-active\"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"manipulate.php?draft=$post_id\" class=\"active\" ui-toggle-class=\"\"><i class=\"fa fa-times text-danger text\"></i></a></td>";
                                    echo "<td>{$post_comment_count}</td>";
                                    echo "<td>{$post_views}</td>";
                                    echo "<td>{$post_ratings}</td>";
                                    echo "<td>{$pdf}</td>";
                                    echo "<td><img width='120' height='75' src='PDF_THUMBNAIL/{$thumbnail_image}'></td>";

                                    $cpt = crypt($post_id, '$2a$09$iusesomecrazystring111$');

                                    echo "<td><a href=\"post_updater.php?update=$cpt\" class=\"active\" ui-toggle-class=\"\"><i class=\"fas fa-edit\"></i></a><br><br><a href=\"manipulate.php?delete=$post_id\" class=\"active\" ui-toggle-class=\"\"><i class=\"fas fa-trash-alt\"></i></a></td>";
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
                echo "<li><a class='active_link' href='view_all_post.php?page={$i}'>{$i}</a> </li>";
            } else {
                echo "<li><a href='view_all_post.php?page={$i}'>{$i}</a> </li>";
            }
        }

        ?>
    </ul>

    <?php include "includes/users_footer.php"?>
