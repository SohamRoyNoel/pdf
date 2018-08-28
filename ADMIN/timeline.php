<?php include "includes/hdr.php"?>

    <!-- Items-Starts-Here -->
    <div class="items">
        <!-- Item1-Starts-Here -->
        <?php
        $query = "select * from needs order by need_id desc";
        $pass = mysqli_query($connection, $query);

        while ($r = mysqli_fetch_assoc($pass)){
            $need_id = $r['need_id'];
            $need_auth = $r['need_title'];
            $need = $r['need_content'];
            $img = $r['img'];

            $crypt_url = crypt($need_id, '$2a$09$iusesomecrazystring111$');

            ?>
            <div class="item1">
                <div class="close1">
                    <!-- Remove-Item -->
                    <div class=""></div><!-- //Remove-Item -->
                    <div class="image1">
                        <img src="../Registration/user_picture/<?php echo $img; ?>" alt="item1">
                    </div>
                    <div class="title1">
                        &nbsp;<i class="fas fa-user-tie"></i> &nbsp; <b> <?php echo $need_auth; ?> </b>
                        <p>&nbsp;<i class="fas fa-info-circle"></i>  <b><?php echo $need; ?></b></p>
                        <p></p>
                    </div>

                    <div class="">
                        <br><br><br><br><br>
                        <a class="btn btn-success btn-large btn-block" href="posts.php?gets=xasth145XCAH41dfgrmki444&g=<?php echo $crypt_url; ?>" role="button">POST PDF FOR HIM</a>

                    </div>

                    <div class="clear"></div>
                </div>
            </div>
            <?php echo "<hr>";

        }
        ?>
        <!-- //Item1-Ends-Here -->
        <?php
        if (isset($_POST['submit'])) {
            // $y = crypt($need_id, '$2a$09$iusesomecrazystring111$');
            header("Location: share_pdf.php?gets=xasth145XCAH41dfgrmki444&g=". $need_id);

        }
        ?>



    </div>
    <!-- //Items-Ends-Here -->


    <!-- //Checkout-Ends-Here -->
<?php include "includes/ftr.php"?>