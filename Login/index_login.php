<?php include "includes/header.php"?>

    <!--main-->
<div class="main-content-agile">
	<div class="sub-main-w3">
        <?php
        if (isset($_GET['k'])){
            $ses = $_GET['k'];
        }
        ?>
        <?php
        if (isset($_POST['submit'])){
            $ems = escape($_POST['name']);
            $password = escape($_POST['pass']);

            $query = "select * from user where email='{$ems}'";
            $send = mysqli_query($connection, $query);

            if (!$send){
                die("failed".mysqli_error());
            }

            echo "6";
            while ($row = mysqli_fetch_assoc($send)){
                $db_user_id = $row['id'];
                $db_user_name = $row['name'];
                $db_user_password = $row['password'];
                $db_user_fn = $row['first_name'];
                $db_user_ln = $row['last_name'];
                $db_user_em = $row['email'];
                $db_user_img = $row['image'];
                $db_user_role = $row['role'];
                $db_user_about = $row['about'];

                $_SESSION['id'] = $db_user_id;
                $_SESSION['nm'] = $db_user_name;
                $_SESSION['ps'] = $db_user_password;
                $_SESSION['fn'] = $db_user_fn;
                $_SESSION['ln'] = $db_user_ln;
                $_SESSION['em'] = $db_user_em;
                $_SESSION['img'] = $db_user_img;
                $_SESSION['rl'] = $db_user_role;
                $_SESSION['ab'] = $db_user_about;
            }

            if ($db_user_password === $password){
                echo "<h1>Hello</h1>";
                header("Location: ../Home/index_home.php");
            } else {
                header("Location: index_login.php");
            }
        }
        ?>

        <form action="index_login.php" method="post">
			<input placeholder="E-mail" name="name" class="user" type="text" required=""><br>
			<input  placeholder="Password" name="pass" class="pass" type="password" required=""><br>
			<input type="submit" name="submit" value="">
		</form>
	</div>
</div>
<!--//main-->

<?php include "includes/footer.php"?>