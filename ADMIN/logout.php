<?php session_start(); ?>
<?php
            $_SESSION['id'] = "";
            $_SESSION['nm'] = "";
            $_SESSION['ps'] = "";
            $_SESSION['fn'] = "";
            $_SESSION['ln'] = "";
            $_SESSION['em'] = "";
            $_SESSION['img'] = "";
            $_SESSION['rl'] = "";
            $_SESSION['ab'] = "";

            header("Location: ../Home_logout/index_home.php");
?>
