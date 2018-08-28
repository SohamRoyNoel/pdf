<?php include "includes/need_head.php"?>
    <div class="log-w3">
    <div class="w3layouts-main">
    <h2>Post your need Now</h2>
    <?php

    if (isset($_POST['login'])){
        $title = escape($_POST['title']);
        $content = escape($_POST['content']);

        $need_author = $_SESSION['nm'];
        $need_author_id = $_SESSION['id'];

        $qr = "select image from user where id = $need_author_id";
        $pass = mysqli_query($connection, $qr);
        while ($rs = mysqli_fetch_assoc($pass)){
            $imgsp = $rs['image'];
        }

        $query = "insert into needs(need_author,need_author_id,need_content,need_title, img) values ('{$need_author}', {$need_author_id}, '{$content}', '{$title}', '{$imgsp}')";
        $gets = mysqli_query($connection, $query);

        set_needs_no();

        header("Location: need_can.php");
    }

    ?>

    <form action="#" method="post">
        <label>Title</label>
        <input type="text" class="ggg" name="title" placeholder="Title" required="">
        <label>Need</label>
        <input type="text" class="ggg" name="content" placeholder="ex. Book name" required="">

        <div class="clearfix"></div>
        <input type="submit" class="btn btn-success" value="Post" name="login">
    </form>
    <p>please check library before posting your need</p>

<?php include "includes/need_foot.php"?>