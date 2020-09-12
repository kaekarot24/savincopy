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
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/pressrelease.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
            data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

            <div class="container clearfix">
                <h1><?php echo $Pagedetails['pagename'];?></h1>
                <!-- <span>A Short Page Title Tagline</span> -->
            </div>

        </section>
        <!-- #page-title end -->

        <section id="content" style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/bg-theme.jpg');">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="col_full">
                        <h3>Press Release Dissemination - Savin Communication</h3>
                        <p>American billionaire Bill Gates once famously said, “If I was down to my last dollar I would
                            spend it on PR.” We cannot emphasize the importance of Public Relations in today’s business
                            milieu. With each passing year, PR is proving to be essential to maintain a brand’s shelf
                            life and continue to earn the trust of clients and customers. The fact that the world is
                            fast-moving online has brought the spotlight on PR and its relevance like never before.
                            Along with the advent of technology and the extent to which it has permeated our lives, our
                            homes, offices, everywhere, the future of public relations is also going to evolve
                            accordingly. Businesses are shifting into the digital space, businessmen are turning
                            tech-savvy, and so are the customers. Everything is happening in the digital space today,
                            including business dealings, presentations, advertisements, event management, and much more!
                            PR professionals are the new breed of men & women leading this change with the help of
                            different platforms and technologies. With every shift in the global business & working
                            conditions, PR communications is becoming more and more relevant to the scheme of things. We
                            are currently in the midst of a robust communications era, where media presence is impact as
                            well as outcome-based.</p>


                    </div>
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