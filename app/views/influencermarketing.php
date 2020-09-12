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
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/influencer.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
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
                        <h3>Influencer Marketing - Savin Communication</h3>
                        <p>Influencer marketing is the new fuel on which the advertising world runs. Statistics show
                            that 70% or more of consumers belonging to the millennial generation buy products after
                            getting influenced by someone on social media. No wonder that more and more brands are
                            looking at influencers to carry their legacy further. Social media has taken a very pleasant
                            turn with the increasing use of the Internet and the growing use of smartphones. This has
                            led to growth in the new breed of internet users, also known as Influencers, who boast of
                            millions of followers online. These followers watch out for each update, every post, each
                            move of their online idol and copy it. By putting out an amazing array of content, including
                            photographs, posts, videos, these Influencers are granting a new space to the businesses
                            around the world where they can showcase their products. Influencer marketing has impacted
                            every conceivable product – from hair oil to shampoo, lingerie to designer-wear, mundane to
                            exclusive! These Influencers integrate the products or services smartly into their content,
                            allowing a seamless marriage of supply with demand, thus changing the nomenclature of the PR
                            Communications!</p>
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