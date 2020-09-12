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
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/affiliate.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
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
                        <h3>Savin Communication – Breaking Barriers, Leading Trends In The Digital Ecosystem</h3>
                        <p>Savin Communication is a trailblazing company with a combination of expertise, method, and
                            innovation. Thus, uniquely placed among the plethora of Communication firms, it has been
                            able to achieve a record 30% growth in its business right in the middle of the COVID-19
                            lockdown during the months of March-April 2020. The men behind it, Saurav Chaudhary and
                            Animesh Kumar have been consistent in performing well despite all odds, thanks to their
                            ethical way of working and foreseeing trends in digital communication.</p>

                        <h3>On a Roller-Coaster Ride</h3>
                        <p>Before Saurav embarked upon the journey called Savin Communication, he had a roller-coaster
                            ride as a professional. After staying jobless mostly throughout 2017, he faced two years of
                            challenges, failures, and despair, before trying every business idea and failing on most of
                            the fronts. In April 2019, things began to fall into place and once he stepped into Digital
                            PR, the ride was smooth thereafter. Soon, Saurav was joined by his old classmate, Animesh, a
                            B.Tech. in Computer Science with 6 years long experience in the digital domain. They both
                            have each other’s back in day-to-day business decisions and even during setbacks.</p>

                    </div>

                    <h4 class="nobottommargin">Become Affiliate</h4>
                    <p class="lead" style="font-size: 15px;">Choose Your own Affiliation Categories</p>

                    <div class="tabs tabs-responsive clearfix ui-tabs ui-corner-all ui-widget ui-widget-content">
                        <ul class="tab-nav clearfix ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                            role="tablist">
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                aria-controls="tab-responsive-2" aria-labelledby="ui-id-30" aria-selected="false"
                                aria-expanded="false"><a href="#tab-responsive-2" role="presentation" tabindex="-1"
                                    class="ui-tabs-anchor" id="ui-id-30">For Individual</a>
                            </li>
                            <li role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab"
                                aria-controls="tab-responsive-3" aria-labelledby="ui-id-31" aria-selected="false"
                                aria-expanded="false"><a href="#tab-responsive-3" role="presentation" tabindex="-1"
                                    class="ui-tabs-anchor" id="ui-id-31">For Company</a>
                            </li>
                            <li class="hidden-phone ui-tabs-tab ui-corner-top ui-state-default ui-tab" role="tab"
                                tabindex="0" aria-controls="tab-responsive-4" aria-labelledby="ui-id-32"
                                aria-selected="true" aria-expanded="true"><a href="#tab-responsive-4"
                                    role="presentation" tabindex="-1" class="ui-tabs-anchor" id="ui-id-32">For News
                                    Website</a>
                            </li>
                        </ul>
                        <div class="tab-container" data-active="">
                            <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content"
                                id="tab-responsive-2" aria-labelledby="ui-id-30" role="tabpanel" aria-hidden="true"
                                style="display: none;">
                                <h3>Why would you like to become our affiliate?</h3>
                                <p>A PR agency like Savin Communication is already focused on a wide variety of
                                    audiences, which means more contacts, more connections. Specialization in specific
                                    industries is another reason why you would want to affiliate with us. The fact that
                                    your story will be told clearly, consistently and creatively should also be reason
                                    enough for you to affiliate with us.</p>

                                <div class="">
                                    <div class="row shadow bg-light border">

                                        <div class="col-lg-4 dark"
                                            style="background: linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,.2)), url('assets/images/background.jpg') center center / cover; min-height: 400px;">
                                            <h3 class="center mt-5">For Individual</h3>
                                            <div class="calories-wrap center w-100 px-2">
                                                <span class="uppercase mb-0 ls2"></span>
                                                <h2 id="calories-count"
                                                    class="calories display-3 mb-2 heading-block nobottomborder t600 font-body py-2">
                                                    </h2>
                                                <span class="uppercase h6 ls3"></span>
                                            </div>
                                            <small class="center m-0 position-absolute" style="bottom: 12px;">Savin
                                                Team</small>
                                        </div>

                                        <div class="col-lg-8 p-5">
                                            <form class="row mb-0" id="affiliate-individual-form" action="#"
                                                method="post">
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="affiliate-form-name">Name:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_individual_name"
                                                                id="affiliate_individual_name" class="form-control"
                                                                value="" placeholder="Enter your Full Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="affiliate-form-email">Email:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_individual_email"
                                                                id="affiliate_individual_email" class="form-control"
                                                                value="" placeholder="Enter your Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="affiliate-form-phone">Phone:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_individual_phone"
                                                                id="affiliate_individual_phone" class="form-control"
                                                                value="" placeholder="Your Contact Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="affiliate-form-link">Social Media Link:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_individual_medialink"
                                                                id="affiliate_individual_medialink" class="form-control"
                                                                value="" placeholder="Media Link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <div class="col-md-8">
                                                        <div class="style-msg successmsg" style="display: none;">
                                                            <div class="sb-msg"><i
                                                                    class="icon-thumbs-up"></i><strong>Well
                                                                    done!</strong> Your request has been sent
                                                                successfully.</div>
                                                        </div>
                                                        <div class="style-msg errormsg" style="display: none;">
                                                            <div class="sb-msg"><i class="icon-remove"></i><strong>Oh
                                                                    snap!</strong> Change a few things up and try
                                                                submitting again.</div>
                                                        </div>
                                                        <div class="style-msg alertmsg" style="display: none;">
                                                            <div class="sb-msg"><i
                                                                    class="icon-warning-sign"></i><strong>Oh
                                                                    snap!</strong> Better check yourself, you're not
                                                                looking too good.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <button name="affiliate-form-submit customize-individual"
                                                            class="btn btn-primary ml-2">
                                                            <span class="spinner-border spinner-border-sm mr-2"
                                                                style="display:none;"></span> Send Message
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content"
                                id="tab-responsive-3" aria-labelledby="ui-id-31" role="tabpanel" style="display: none;"
                                aria-hidden="true">
                                <h3>Why would a business or brand want to become our affiliate?</h3>
                                <p>Every business or brand needs someone to tell their story perfectly to the right
                                    audience. At Savin Communication, we’ve been telling these stories for quite some
                                    time now. Brands and businesses need to be seen, heard and believed too. Savin
                                    Communication will help you accomplish all that within a set time-frame.
                                </p>

                                <div class="">
                                    <div class="row shadow bg-light border">
                                        <div class="col-lg-4 dark"
                                            style="background: linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,.2)), url('assets/images/background.jpg') center center / cover; min-height: 400px;">
                                            <h3 class="center mt-5">For Company</h3>
                                            <div class="calories-wrap center w-100 px-2">
                                                <span class="uppercase mb-0 ls2"></span>
                                                <h2 id="calories-count"
                                                    class="calories display-3 mb-2 heading-block nobottomborder t600 font-body py-2">
                                                    </h2>
                                                <span class="uppercase h6 ls3"></span>
                                            </div>
                                            <small class="center m-0 position-absolute" style="bottom: 12px;">Savin Team</small>
                                        </div>

                                        <div class="col-lg-8 p-5">
                                            <form class="row mb-0" id="affiliate-company-form" action="#" method="post">
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="company-form-name">Name:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_company_name"
                                                                id="affiliate_company_name" class="form-control"
                                                                value="" placeholder="Enter your Full Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="copmany-form-email">Email:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_company_email"
                                                                id="affiliate_company_email" class="form-control"
                                                                value="" placeholder="Enter your Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="company-form-phone">Phone:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_company_phone"
                                                                id="affiliate_company_phone" class="form-control"
                                                                value="" placeholder="Your Contact Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="company-form-designation">Designation:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_company_designation"
                                                                id="affiliate_company_designation" class="form-control"
                                                                value="" placeholder="Enter your Designation">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="company-form-name">Company Name:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_company_compname"
                                                                id="affiliate_company_compname" class="form-control"
                                                                value="" placeholder="Your Company Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="company-form-website">Website:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_company_website"
                                                                id="affiliate_company_website" class="form-control"
                                                                value="" placeholder="Website Link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end align-items-center">
                                                    <div class="col-md-8">
                                                        <div class="style-msg successmsg" style="display: none;">
                                                            <div class="sb-msg"><i
                                                                    class="icon-thumbs-up"></i><strong>Well
                                                                    done!</strong> Your request has been sent
                                                                successfully.</div>
                                                        </div>
                                                        <div class="style-msg errormsg" style="display: none;">
                                                            <div class="sb-msg"><i class="icon-remove"></i><strong>Oh
                                                                    snap!</strong> Change a few things up and try
                                                                submitting again.</div>
                                                        </div>
                                                        <div class="style-msg alertmsg" style="display: none;">
                                                            <div class="sb-msg"><i
                                                                    class="icon-warning-sign"></i><strong>Oh
                                                                    snap!</strong> Better check yourself, you're not
                                                                looking too good.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <button name="company-form-submit customize-company"
                                                            class="btn btn-primary ml-2">
                                                            <span class="spinner-border spinner-border-sm mr-2"
                                                                style="display:none;"></span> Send Message
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="tab-content clearfix ui-tabs-panel ui-corner-bottom ui-widget-content"
                                id="tab-responsive-4" aria-labelledby="ui-id-32" role="tabpanel" style="display: none;"
                                aria-hidden="true">
                                <h3>Why a news website should collaborate with us? </h3>
                                <p>Collaborative journalism is the new form of journalism in the digital media age. News
                                    is not just about reporting any longer. News websites need curated, filtered and
                                    tailor-made content to attract eyeballs. Working with Savin Communication will help
                                    the websites get pre-designed content to suit their space and readership, at no
                                    extra cost.</p>

                                <div class="">
                                    <div class="row shadow bg-light border">
                                        <div class="col-lg-4 dark"
                                            style="background: linear-gradient(rgba(0,0,0,.8), rgba(0,0,0,.2)), url('assets/images/background.jpg') center center / cover; min-height: 400px;">
                                            <h3 class="center mt-5">For News Website</h3>
                                            <div class="calories-wrap center w-100 px-2">
                                                <span class="uppercase mb-0 ls2"></span>
                                                <h2 id="calories-count"
                                                    class="calories display-3 mb-2 heading-block nobottomborder t600 font-body py-2">
                                                    </h2>
                                                <span class="uppercase h6 ls3"></span>
                                            </div>
                                            <small class="center m-0 position-absolute" style="bottom: 12px;">Savin Team</small>
                                        </div>

                                        <div class="col-lg-8 p-5">
                                            <form class="row mb-0" id="affiliate-news-form" action="#" method="post">
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="news-form-name">Name:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_news_name"
                                                                id="affiliate_news_name" class="form-control" value=""
                                                                placeholder="Enter your Full Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="news-form-email">Email:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="email" name="affiliate_news_email"
                                                                id="affiliate_news_email" class="form-control" value=""
                                                                placeholder="Enter your Email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="news-form-phone">Phone:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_news_phone"
                                                                id="affiliate_news_phone" class="form-control" value=""
                                                                placeholder="Your Contact Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="news-form-medialink">Social Media Link:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_news_medialink"
                                                                id="affiliate_news_medialink" class="form-control"
                                                                value="" placeholder="Media Link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 form-group">
                                                    <div class="row">
                                                        <div class="col-sm-2 col-form-label">
                                                            <label for="news-form-website">Website:</label>
                                                        </div>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="affiliate_news_website"
                                                                id="affiliate_news_website" class="form-control"
                                                                value="" placeholder="Website Link">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end align-items-center">
                                                    <div class="col-md-8">
                                                        <div class="style-msg successmsg" style="display: none;">
                                                            <div class="sb-msg"><i
                                                                    class="icon-thumbs-up"></i><strong>Well
                                                                    done!</strong> Your request has been sent
                                                                successfully.</div>
                                                        </div>
                                                        <div class="style-msg errormsg" style="display: none;">
                                                            <div class="sb-msg"><i class="icon-remove"></i><strong>Oh
                                                                    snap!</strong> Change a few things up and try
                                                                submitting again.</div>
                                                        </div>
                                                        <div class="style-msg alertmsg" style="display: none;">
                                                            <div class="sb-msg"><i
                                                                    class="icon-warning-sign"></i><strong>Oh
                                                                    snap!</strong> Better check yourself, you're not
                                                                looking too good.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <button name="news-form-submit customize-news"
                                                            class="btn btn-primary ml-2">
                                                            <span class="spinner-border spinner-border-sm mr-2"
                                                                style="display:none;"></span> Send Message
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
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


    <script>
    var ajaxUrl = "<?php echo GL_SITE_URL;?>/affiliate/xhr/individual";
    var ajaxUrl_2 = "<?php echo GL_SITE_URL;?>/affiliate/xhr/company";
    var ajaxUrl_3 = "<?php echo GL_SITE_URL;?>/affiliate/xhr/news";
    </script>
    <?php
require_once ('includes/footerHandler.php');

$md->enqueue_files('assets/js/jquery.validate.js','js');
$md->enqueue_files('assets/js/affiliate/index.js','js');
?>

</body>

</html>