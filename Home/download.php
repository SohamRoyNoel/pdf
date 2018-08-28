<?php session_start(); ?>
<?php
$books = $_SESSION['books'];
$path = "../ADMIN/GLOBAL_PDF_DIRECTORY/$books";
header("Content-disposition: attachment; filename= $books");
header("Content-type: application/pdf");
readfile($path);
?>