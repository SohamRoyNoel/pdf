<div class="header">
    <div class="wrap">
        <div class="nav-icon">
            <a href="#" class="right_bt" id="activator"><span> </span> </a>
        </div>
        <div class="box" id="box">
                <div class="box_content_center">
                    <div class="form_content">
                        <div class="menu_box_list">
                            <ul>
                                <li><a href="./index_home.php"><span>Home</span></a></li>
                                <li><a href="./abouts.php"><span>About</span></a></li>
                                <li><a href="./contacts.php"><span>Contact</span></a></li>
                                <li><a href="../Registration/index_registration.php"><span>Registration</span></a></li>
                                <li><a href="../Login/index_login.php"><span>Log In</span></a></li>
                                <div class="clear"> </div>
                            </ul>
                        </div>
                        <a class="boxclose" id="boxclose"> <span> </span></a>

                    </div>
                </div>
        </div>
        <div class="menu_box_list">
            <ul>
                <?php
                $cats = "select * from category limit 7";
                $sp = mysqli_query($connection, $cats);
                while ($row = mysqli_fetch_assoc($sp)){
                    $ss = $row['category_name'];
                    $id = $row['category_id'];
                    echo "<li><a href='index_with_cat.php?param=$id'><span>$ss</span></a></li>";
                }
                ?>
            </ul>
        </div>
        <div class="clear"> </div>

    </div>



