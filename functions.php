
<?php
function confirm($parameter){
        global $connection;
        if (!$parameter){
            die("Error ---> " .mysqli_error($connection));
        }
}

function escape($string){
    global $connection;
     return mysqli_real_escape_string($connection, trim($string));
}

function user_can_share_pdf(){
    global $connection;
    if (isset($_POST['sub'])){
        $name = escape($_POST['book_name']);

        $allow = array("pdf");
        $temp = explode(".", $_FILES['files']['name']);
        $extention = end($temp);
        $upload_file = $_FILES['files']['name'];
        $temps = $_FILES['files']['tmp_name'];

        $thumbnail_image = $_FILES['images']['name'];
        $post_image_temp = $_FILES['images']['tmp_name'];

        $cat = escape($_POST['cat']);
        $contents= escape($_POST['contents']);
        $author = $_SESSION['nm'];
        $date = date('d-m-y');
        $status = "published";
        $count = 4;
        $view = 4;
        $rate = 4;
        $u_id = $_SESSION['id'];

        if (!empty($name) && !empty($upload_file) && !empty($cat) && !empty($contents)){
            move_uploaded_file($temps, "../ADMIN/GLOBAL_PDF_DIRECTORY/$upload_file");
            move_uploaded_file($post_image_temp, "../ADMIN/PDF_THUMBNAIL/$thumbnail_image");


            if (!empty($thumbnail_image)) {
                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$thumbnail_image}', 'CROW108', $u_id)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
            } else {
                $queryn = "select * from category where category_id=$cat";
                $sendn = mysqli_query($connection, $queryn);

                while ($row = mysqli_fetch_assoc($sendn)) {
                    $imgS = $row['image'];
                }

                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$imgS}', 'CROW108', $u_id)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
            }

            header("Location: timeline_can.php");
        }
    }
}

function user_can_share_pdf_1($ips){
    global $connection;
    if (isset($_POST['sub'])){
        $name = escape($_POST['book_name']);

        $allow = array("pdf");
        $temp = explode(".", $_FILES['files']['name']);
        $extention = end($temp);
        $upload_file = $_FILES['files']['name'];
        $temps = $_FILES['files']['tmp_name'];

        $thumbnail_image = $_FILES['images']['name'];
        $post_image_temp = $_FILES['images']['tmp_name'];

        $cat = escape($_POST['cat']);
        $contents= escape($_POST['contents']);
        $author = $_SESSION['nm'];
        $date = date('d-m-y');
        $status = "published";
        $count = 4;
        $view = 4;
        $rate = 4;
        $u_id = $_SESSION['id'];

        if (!empty($name) && !empty($upload_file) && !empty($cat) && !empty($contents)){
            move_uploaded_file($temps, "../ADMIN/GLOBAL_PDF_DIRECTORY/$upload_file");
            move_uploaded_file($post_image_temp, "../ADMIN/PDF_THUMBNAIL/$thumbnail_image");

            if (!empty($thumbnail_image)) {
                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id, counter_need, need_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$thumbnail_image}', 'CROW108', $u_id, 'xasth145XCAH41dfgrmki444', $ips)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
                return true;
            } else {
                $queryn = "select * from category where category_id=$cat";
                $sendn = mysqli_query($connection, $queryn);

                while ($row = mysqli_fetch_assoc($sendn)) {
                    $imgS = $row['image'];
                }

                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id, counter_need, need_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$imgS}', 'CROW108', $u_id, 'xasth145XCAH41dfgrmki444', $ips)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
                return true;
            }

            header("Location: share_pdf.php");
        }
    }
}

function user_can_share_pdf_10(){
    global $connection;
    if (isset($_POST['sub'])){
        $name = escape($_POST['book_name']);

        $allow = array("pdf");
        $temp = explode(".", $_FILES['files']['name']);
        $extention = end($temp);
        $upload_file = $_FILES['files']['name'];
        $temps = $_FILES['files']['tmp_name'];

        $thumbnail_image = $_FILES['images']['name'];
        $post_image_temp = $_FILES['images']['tmp_name'];

        $cat = escape($_POST['cat']);
        $contents= escape($_POST['contents']);
        $author = $_SESSION['nm'];
        $date = date('d-m-y');
        $status = "published";
        $count = 4;
        $view = 4;
        $rate = 4;
        $u_id = $_SESSION['id'];

        if (!empty($name) && !empty($upload_file) && !empty($cat) && !empty($contents)){
            move_uploaded_file($temps, "../ADMIN/GLOBAL_PDF_DIRECTORY/$upload_file");
            move_uploaded_file($post_image_temp, "../ADMIN/PDF_THUMBNAIL/$thumbnail_image");


            if (!empty($thumbnail_image)) {
                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$thumbnail_image}', 'CROW108', $u_id)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
            } else {
                $queryn = "select * from category where category_id=$cat";
                $sendn = mysqli_query($connection, $queryn);

                while ($row = mysqli_fetch_assoc($sendn)) {
                    $imgS = $row['image'];
                }

                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$imgS}', 'CROW108', $u_id)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
            }


        }
    }
}

function user_can_share_pdf_11($ips){
    global $connection;
    if (isset($_POST['sub'])){
        $name = escape($_POST['book_name']);

        $allow = array("pdf");
        $temp = explode(".", $_FILES['files']['name']);
        $extention = end($temp);
        $upload_file = $_FILES['files']['name'];
        $temps = $_FILES['files']['tmp_name'];

        $thumbnail_image = $_FILES['images']['name'];
        $post_image_temp = $_FILES['images']['tmp_name'];

        $cat = escape($_POST['cat']);
        $contents= escape($_POST['contents']);
        $author = $_SESSION['nm'];
        $date = date('d-m-y');
        $status = "published";
        $count = 4;
        $view = 4;
        $rate = 4;
        $u_id = $_SESSION['id'];

        if (!empty($name) && !empty($upload_file) && !empty($cat) && !empty($contents)){
            move_uploaded_file($temps, "../ADMIN/GLOBAL_PDF_DIRECTORY/$upload_file");
            move_uploaded_file($post_image_temp, "../ADMIN/PDF_THUMBNAIL/$thumbnail_image");

            if (!empty($thumbnail_image)) {
                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id, counter_need, need_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$thumbnail_image}', 'CROW108', $u_id, 'xasth145XCAH41dfgrmki444', $ips)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
                return true;
            } else {
                $queryn = "select * from category where category_id=$cat";
                $sendn = mysqli_query($connection, $queryn);

                while ($row = mysqli_fetch_assoc($sendn)) {
                    $imgS = $row['image'];
                }

                $query = "insert into post (post_title, post_author, post_date, post_content, post_category, post_status, post_comment_count, post_views, post_ratings, pdf, thumbnail_image, tagp, user_id, counter_need, need_id)";
                $query .= "values('{$name}', '{$author}', '{$date}', '{$contents}', '{$cat}', '{$status}', $count, $view, $rate, '{$upload_file}', '{$imgS}', 'CROW108', $u_id, 'xasth145XCAH41dfgrmki444', $ips)";
                $sender = mysqli_query($connection, $query);
                set_post_no();
                confirm($sender);
                return true;
            }


        }
    }
}
// getters
function return_max_category_no(){
    global $connection;
    $slso = "select * from counter where id=1";
    $sndr = mysqli_query($connection, $slso);
    while ($row = mysqli_fetch_assoc($sndr)){
        $cat = $row['category'];
    }
    return $cat;
}
function return_max_comments_no(){
    global $connection;
    $slso = "select * from counter where id=1";
    $sndr = mysqli_query($connection, $slso);
    while ($row = mysqli_fetch_assoc($sndr)){
        $com = $row['comments'];
    }
    return $com;
}
function return_max_needs_no(){
    global $connection;
    $slso = "select * from counter where id=1";
    $sndr = mysqli_query($connection, $slso);
    while ($row = mysqli_fetch_assoc($sndr)){
        $nd = $row['needs'];
    }
    return $nd;
}
function return_max_post_no(){
    global $connection;
    $slso = "select * from counter where id=1";
    $sndr = mysqli_query($connection, $slso);
    while ($row = mysqli_fetch_assoc($sndr)){
        $pos = $row['post'];
    }
    return $pos;
}
function return_max_user_no(){
    global $connection;
    $slso = "select * from counter where id=1";
    $sndr = mysqli_query($connection, $slso);
    while ($row = mysqli_fetch_assoc($sndr)){
        $usr = $row['user'];
    }
    return $usr;
}



// setters
function set_category_no(){
    global $connection;
    $ups = "update counter set category=category+1 where id=1";
    $plp = mysqli_query($connection, $ups);
}
function set_comments_no(){
    global $connection;
    $ups = "update counter set comments=comments+1 where id=1";
    $plp = mysqli_query($connection, $ups);
}
function set_needs_no(){
    global $connection;
    $ups = "update counter set needs=needs+1 where id=1";
    $plp = mysqli_query($connection, $ups);
}
function set_post_no(){
    global $connection;
    $ups = "update counter set post=post+1 where id=1";
    $plp = mysqli_query($connection, $ups);
}
function set_user_no(){
    global $connection;
    $ups = "update counter set user=user+1 where id=1";
    $plp = mysqli_query($connection, $ups);
}

?>


