<?php include "../db.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Pinball Website Template | Home :: w3layouts</title>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/fav-icon.png" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    </script>
    <!--webfonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
        <!-- Global CSS for the page and tiles -->
        <link rel="stylesheet" href="css/main.css">
        <!-- //Global CSS for the page and tiles -->
        <!---start-click-drop-down-menu----->
        <script src="js/jquery.min.js"></script>
    <!--start-dropdown-->
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        $(function() {
            $('#activator').click(function(){
                $('#box').animate({'top':'0px'},500);
            });
            $('#boxclose').click(function(){
                $('#box').animate({'top':'-700px'},500);
            });
        });
        $(document).ready(function(){
            //Hide (Collapse) the toggle containers on load
            $(".toggle_container").hide();
            //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
            $(".trigger").click(function(){
                $(this).toggleClass("active").next().slideToggle("slow");
                return false; //Prevent the browser jump to the link anchor
            });

        });
    </script>
    <!----//End-dropdown--->
    <!---//End-click-drop-down-menu----->
    <link href="css/jquery-ui.css" rel="stylesheet">
    <link href="https://code.jquery.com/jquery-3.3.1.js">
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#autocomplete").autoComplete({
                source:'x.php'
            })
        })
    </script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>