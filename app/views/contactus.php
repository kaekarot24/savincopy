<?php
require_once('includes/headHandler.php');
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/contactus.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
            data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">

            <div class="container clearfix">
                <h1><?php echo $Pagedetails['pagename'];?></h1>
                <span>Get In Touch With Us</span>
            </div>

        </section>
        <!-- #page-title end -->

        <section id="content" style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/bg-theme.jpg');">

            <div class="content-wrap">

                <div class="container clearfix">

                    <!-- Contact Form
					============================================= -->
                    <div class="col_half">

                        <div class="fancy-title title-dotted-border">
                            <h3>Send us an Email</h3>
                        </div>

                        <div class="">
                            <form class="nobottommargin" id="template-contactform" action="#" method="post">
                                <div class="col_one_third">
                                    <label for="template-contactform-name">Name <small>*</small></label>
                                    <input type="text" id="template_contactform_name" name="template_contactform_name"
                                        value="" class="sm-form-control" />
                                </div>

                                <div class="col_one_third">
                                    <label for="template-contactform-email">Email <small>*</small></label>
                                    <input type="text" id="template_contactform_email"
                                        name="template_contactform_email" value=""
                                        class="sm-form-control" />
                                </div>

                                <div class="col_one_third col_last">
                                    <label for="template-contactform-phone">Phone</label>
                                    <input type="text" id="template_contactform_phone" name="template_contactform_phone"
                                        value="" class="sm-form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="template-contactform-subject">Subject <small>*</small></label>
                                    <input type="text" id="template_contactform_subject" name="template_contactform_subject" value=""
                                        class="sm-form-control" />
                                </div>

                                <div class="clear"></div>

                                <div class="col_full">
                                    <label for="template-contactform-message">Message <small>*</small></label>
                                    <textarea class="sm-form-control" id="template_contactform_message"
                                        name="template_contactform_message" rows="6" cols="30"></textarea>
                                </div>

                                <div class="col_full">
                                    <div class="style-msg successmsg" style="display: none;">
                                        <div class="sb-msg"></div>
                                    </div>
                                    <div class="style-msg errormsg" style="display: none;">
                                        <div class="sb-msg"></div>
                                    </div>
                                    <div class="style-msg alertmsg" style="display: none;">
                                        <div class="sb-msg"></div>
                                    </div>
                                </div>
                                  
                                <div class="col_full">
                                   <!-- Google reCAPTCHA box -->
                                   <div class="g-recaptcha" data-sitekey="6LekNr8ZAAAAANCNZi-ZhNYGMeejBLJQr95Pmqgz"></div>
                                </div>

                                <div class="col_full">
                                    <button class="btn btn-primary ml-2 customize-contact">
                                        <span class="spinner-border spinner-border-sm mr-2" style="display:none;"></span> Send Message
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div><!-- Contact Form End -->

                    <!-- Google Map
					============================================= -->
                    <div class="col_half col_last">

                        <!-- <section id="google-map" class="gmap" style="height: 410px;"></section> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14010.456792615092!2d77.3770485!3d28.6113486!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x945da0b1f4a1b5ca!2sSavin%20Communication%20Private%20Limited!5e0!3m2!1sen!2sin!4v1597237607528!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                    </div><!-- Google Map End -->

                    <div class="clear"></div>

                    <!-- Contact Info
					============================================= -->
                    <div class="row clear-bottommargin">

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-map-marker2"></i></a>
                                </div>
                                <h3>Our Headquarters<span class="subtitle">Noida, India</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-phone3"></i></a>
                                </div>
                                <h3>Speak to Us<span class="subtitle">+91-8860982744, +91-8340268994</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-skype2"></i></a>
                                </div>
                                <h3>Make a Video Call<span class="subtitle"></span></h3>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 bottommargin clearfix">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-facebook"></i></a>
                                </div>
                                <h3>Follow on Facebook<span class="subtitle">12K Followers</span></h3>
                            </div>
                        </div>

                    </div><!-- Contact Info End -->

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
var ajaxUrl = "<?php echo GL_SITE_URL;?>/contactus/xhr/contact";
</script>
<?php
require_once ('includes/footerHandler.php');

$md->enqueue_files('assets/js/jquery.validate.js','js');
$md->enqueue_files('assets/js/contact/index.js','js');
?>
<!-- <script src="https://maps.google.com/maps/api/js?key=AIzaSyCzkxzbEni5vR_Ugt1De8gBzrLX3236bnA"></script>
<script src="js/jquery.gmap.js"></script> -->
<script>

/*jQuery('#google-map').gMap({
    address: 'Melbourne, Australia',
    maptype: 'ROADMAP',
    zoom: 14,
    markers: [
        {
            address: "Melbourne, Australia",
            html: '<div style="width: 300px;"><h4 style="margin-bottom: 8px;">Hi, we\'re <span>Envato</span></h4><p class="nobottommargin">Our mission is to help people to <strong>earn</strong> and to <strong>learn</strong> online. We operate <strong>marketplaces</strong> where hundreds of thousands of people buy and sell digital goods every day, and a network of educational blogs where millions learn <strong>creative skills</strong>.</p></div>',
            icon: {
                image: "images/icons/map-icon-red.png",
                iconsize: [32, 39],
                iconanchor: [32,39]
            }
        }
    ],
    doubleclickzoom: false,
    controls: {
        panControl: true,
        zoomControl: true,
        mapTypeControl: true,
        scaleControl: false,
        streetViewControl: false,
        overviewMapControl: false
    }
});*/

</script>
</body>

</html>