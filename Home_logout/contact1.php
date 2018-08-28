<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Food Club a Hotels and Restaurants Category Bootstrap responsive Website Template | Contact :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Food Club Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link href="css/bootstrap1.css" rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="css/styleX.css" type="text/css" media="all" />
    <!--// css -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin-ext" rel="stylesheet">
    <!-- //font -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap11.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<!-- banner -->
<div class="banner jarallax">
    <!-- agileinfo-dot -->
    <div class="agileinfo-dot">
        <div class="w3layouts-header-top">
            <div class="w3-header-top-grids">

                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="head">
            <div class="head-nav-grids">
                <div class="navbar-top">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <div class="navbar-brand logo ">
                            <h1><a href="index.html">PDF <span>Community</span></a></h1>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="w3-agile-main-heading">
            <h2>Contact Us</h2>
        </div>
    </div>
    <!-- //agileinfo-dot -->
</div>
<!-- //banner -->
<!-- contact -->
<div class="contact-content">
    <div class="container">

        <div class="contact-form">
            <h3>Contact With Admin</h3>
            <?php
                    if (isset($_POST['subs'])) {

                        $mails = $_POST['Email'];
                        $subj = $_POST['Subject'];
                        $msg = $_POST['Message'];

                        $headers = "From: $mails" . "\r\n" .
                            'MIME-Version: 1.0' . "\r\n".
                            'Content-Type: text/html; charset=utf-8';


                        $result = mail("soham.roy.developer@gmail.com", $subj, $msg, $headers);
                        // var_dump($result);
                    }
            ?>
            <form action="" method="post">
                <input type="text" name="Name" placeholder="Name" required="">
                <input type="text" name="Email" placeholder="Email" required="">
                <input type="text" name="Subject" placeholder="Subject" required="">
                <textarea name="Message" placeholder="Message" required=""></textarea>
                <input type="submit" name="subs" value="SEND">
            </form>
        </div>

    </div>
</div>
<!-- //contact -->
<!-- footer -->
<div class="w3-agile-footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <div class="footer-grid-heading">
                    <h3><a href="">PDF <span>Community</span></a></h3>
                </div>
                <div class="agile-footer-info">
                    <p>PDF community is a bacon of knowledge. She believes sharing is caring. Welcome to the vast ocean of knowledge.</p> <p>LOVE FROM PDF Community. </p>
                </div>
                <div class="social">

                </div>
            </div>
            <div class="col-md-3 footer-grid">
                <div class="footer-grid-heading">
                    <h4>Address</h4>
                </div>
                <div class="footer-grid-info">
                    <p>PDF Community
                        <span>Kolkata, India, 700109.</span>
                    </p>
                    <p class="phone">Phone : +91 869 757 296 4
                        <span>Email&nbsp:&nbsp<a href="mailto:example@email.com">soham.roy.developer@gmail.com</a></span>
                    </p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="agileits-w3layouts-copyright">
            <p>© 2017 Visitors. All rights reserved | Design by <a href="http://sohamroy.000webhostapp.com/index.html">Soham Roy</a></p>
        </div>
    </div>
</div>
<!-- //footer -->
<!-- //footer -->
<script src="js/jarallax.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<script type="text/javascript">
    /* init Jarallax */
    $('.jarallax').jarallax({
        speed: 0.5,
        imgWidth: 1366,
        imgHeight: 768
    })
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
</body>
</html>