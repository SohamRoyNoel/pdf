<div class="header">
    <div class="wrap">

        <div class="nav-icon">
            <a href="#" class="right_bt" id="activator"><span> </span> </a>
        </div>
        <div class="box" id="box">
            <div class="box_content">
                <div class="box_content_center">
                    <div class="form_content">
                        <div class="menu_box_list">
                            <ul>
                                <li><a href="./index_home.php"><span>Home</span></a></li>
                                <li><a href="./abouts_ad.php"><span>About</span></a></li>


                                <?php
                                        $ff = $_SESSION['rl'];
                                        if ($ff === "admin"){
                                            echo "<li><a href=\"../ADMIN/index.php\"><span>ADMIN AREA</span></a></li>";
                                        } else {
                                            echo "<li><a href=\"./contacts.php\"><span>Contact</span></a></li>";
                                            echo "<li><a href=\"../user_can/user_browse.php\"><span>USER Area</span></a></li>";
                                        }
                                ?>
                                <div class="clear"> </div>
                            </ul>
                        </div>
                        <a class="boxclose" id="boxclose"> <span> </span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-searchbar">
            <form>
                <input type="text" /><input type="submit" value="" />
            </form>
        </div>
        <div class="userinfo">
            <div class="user">
                <ul>
                    <li><a href="../user_can/user_browse.php"><img height="43" width="43" src="../Registration/user_picture/<?php echo $_SESSION['img']; ?>" title="" /><span><?php echo $_SESSION['nm']; ?></span></a></li>
                </ul>
            </div>
        </div>
        <div class="clear"> </div>
    </div>