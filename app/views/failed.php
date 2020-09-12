<?php
require_once('includes/headHandler.php');
?>
</head>

<body class="stretched no-transition sticky-responsive-menu">

    <div id="wrapper" class="clearfix">

        <!-- Header
		============================================= -->
        <?php include "includes/header.php"; ?>
        <!-- #header end -->

        <!-- Content
		============================================= -->
        <!-- Page Title
		============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark skrollable skrollable-between"
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/payment_failed.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
            data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

            <div class="container clearfix">
                <h1><?php echo $Pagedetails['pagename'];?></h1>
                <!-- <span>A Short Page Title Tagline</span> -->
            </div>

        </section>
        <!-- #page-title end -->

        <section id="content" style="margin-bottom: 0px;">

            <div class="content-wrap">

                <div class="container subscribe-widget clearfix">

                    <div class="heading-block title-center nobottomborder">

                        <div class="jumbotron text-center">
                            <h1 class="display-3">Sorry!</h1>
                            <p class="lead"><strong>Your Payment Process</strong> has been failed.</p>
                            <hr>
                            <p>
                                Having trouble? <a href="<?php echo GL_SITE_URL?>/contactus">Contact us</a>
                            </p>
                            <p class="lead">
                                <a class="btn btn-primary btn-sm" href="<?php echo GL_SITE_URL?>/package"
                                    role="button">Continue to Retry Payment</a>
                            </p>
                        </div>

                    </div>

                    <div class="clear"></div>
                </div>

            </div>

        </section>

        <!-- Footer
		============================================= -->
        <?php include "includes/footer.php"; ?>
        <!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>


    <?php
require_once ('includes/footerHandler.php');
?>
</body>

</html>