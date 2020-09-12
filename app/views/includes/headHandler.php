<?php
//get pagedetails
$Pagedetails = json_decode($md->get_pagename(array(
    "tab"=>"pagedetails",
    "uri"=>basename($_SERVER['REQUEST_URI'])
)), true);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $Pagedetails['description'];?>">
<meta name="robots" content="index, follow" />
<meta name="keywords" content="<?php echo $Pagedetails['keywords'];?>">
<meta name="author" content="Savin Communication">
<link rel="canonical" href="<?php echo GL_SITE_URL.$_SERVER['REQUEST_URI'];?>" />
<link rel="icon" href="assets/img/favicon.png" sizes="32x32" />

<?php
$md->enqueue_files('https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i','css','remote');
$md->enqueue_files('assets/css/bootstrap.css','css');
$md->enqueue_files('assets/css/style.css','css');
$md->enqueue_files('assets/css/swiper.css','css');
$md->enqueue_files('assets/css/dark.css','css');
$md->enqueue_files('assets/css/font-icons.css','css');
$md->enqueue_files('assets/css/animate.css','css');
$md->enqueue_files('assets/css/magnific-popup.css','css');
$md->enqueue_files('assets/css/responsive.css','css');
?>

<!-- Document Title
============================================= -->
<title><?php echo $Pagedetails['pagename'];?> - Savin Communication</title>
