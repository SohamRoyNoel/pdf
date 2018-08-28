<?php include "../db.php" ?>
<?php ob_start(); ?>
<?php

// for posts
if (isset($_GET['publish'])){
    $holder = $_GET['publish'];

    $q = "update post set post_status = 'published' where post_id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: view_all_post.php");

}


if (isset($_GET['draft'])){
    $holder = $_GET['draft'];

    $q = "update post set post_status = 'draft' where post_id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: view_all_post.php");

}

if (isset($_GET['delete'])){
    $holder = $_GET['delete'];

    $q = "delete from post where post_id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: view_all_post.php");

}

// for categories
if (isset($_GET['deletes'])){
    $holder = $_GET['deletes'];

    $q = "delete from category where category_id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: view_all_categories.php");

}

// for user
if (isset($_GET['deletep'])){
    $holder = $_GET['deletep'];

    $q = "delete from user where id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: users.php");
}

// for comments
if (isset($_GET['publishes'])){
    $holder = $_GET['publishes'];

    $q = "update comments set comment_status = 'published' where comment_id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: view_all_comments.php");
}


if (isset($_GET['drafts'])){
    $holder = $_GET['drafts'];

    $q = "update comments set comment_status = 'draft' where comment_id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: view_all_comments.php");

}

if (isset($_GET['deletess'])){
    $holder = $_GET['deletess'];

    $q = "delete from comments where comment_id=$holder";
    $pass = mysqli_query($connection, $q);
    header("Location: view_all_comments.php");

}
?>