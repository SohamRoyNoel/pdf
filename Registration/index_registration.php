<?php include "includes/header.php"?>
<?php include "../db.php" ?>
<?php include "../functions.php" ?>

<!-- banner -->
	<div class="center-container">
	<div class="banner-dott">
		<div class="main">
			<h1 class="w3layouts_head">Readers Registration</h1>
				<div class="w3layouts_main_grid">
                    <?php
                    if (isset($_GET['k'])){
                        $ses = $_GET['k'];
                    }
                    ?>

                    <?php
                    if (isset($_POST['submit'])){

                        $name = escape($_POST['name']);
                        $password = escape($_POST['password']);
                        $first_name = escape($_POST['first_name']);
                        $last_name = escape($_POST['last_name']);
                        $email = escape($_POST['email']);
                        $p_image = $_FILES['images']['name'];
                        $post_image_temp = $_FILES['images']['tmp_name'];
                        $role = 'subscriber';
                        $ab = escape($_POST['about']);

                        move_uploaded_file($post_image_temp, "user_picture/$p_image");

                        $query = "insert into user (name, password, first_name, last_name, email, image, role, about) values ('{$name}', '{$password}', '{$first_name}', '{$last_name}', '{$email}', '{$p_image}', '{$role}', '{$ab}')";
                        $execute = mysqli_query($connection, $query);

                        header("Location:../Login/index_login.php?k=" . $ses);
                    }
                    ?>

					<form action="" method="post" class="w3_form_post" enctype="multipart/form-data">
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>First Name </label>
								<input autocomplete="off" type="text" name="first_name" placeholder="First Name" required="">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Last Name </label>
								<input autocomplete="off" type="text" name="last_name" placeholder="Last Name" required="">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Your Email </label>
								<input autocomplete="off" type="email" name="email" placeholder="Your Email" required="">
							</span>
						</div>
						<div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>User Name </label>
								<input autocomplete="off" type="text" name="name" placeholder="User Name" required="">
								</span>
						</div>
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>Password </label>
								<input autocomplete="off" class="form-control mx-sm-3" type="text" name="password" placeholder="Password" required="">
								</span>
                        </div>
                        <div class="w3_agileits_main_grid w3l_main_grid">
							<span class="agileits_grid">
								<label>About You </label>
                                <textarea autocomplete="off" class="form-control mx-sm-3" placeholder="Write something about you" type="text" name="about" id="body" required=""></textarea>

								</span>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="images" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
					<div class="w3_main_grid">
						<div class="w3_main_grid_right">
							<input type="submit" class="btn btn-success" name="submit" value="Register">
                            <span class="agileits-login">  Already a user? <a href="../Login/index_login.php">LOG IN</a> HERE..</span>
						</div>
					</div>
				</form>
			</div>

<?php include "includes/footer.php"?>
