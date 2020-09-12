<?php
require_once('includes/headHandler.php');
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style>
.home_custom_service {
    margin: 0 0 60px !important;
}
</style>

</head>

<body class="stretched no-transition sticky-responsive-menu">

    <div id="wrapper" class="clearfix">

        <!-- Header
		============================================= -->
        <?php include "includes/header.php"; ?>
        <!-- #header end -->

        <!-- Content
		============================================= -->
        
        <section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix" data-autoplay="7000" data-speed="650" data-loop="true">

			<div class="slider-parallax-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark" style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/slider/slider_1.jpg');">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 data-animate="fadeInUp">Worlds Largest Digital PR Market Place</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Do you have a story to tell</p>
								</div>
							</div>
						</div>
						<div class="swiper-slide dark" style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/slider/slider_2.jpg');">
							<div class="container clearfix">
								<div class="slider-caption">
									<h2 data-animate="fadeInUp">Digital Ecosystem</h2>
									<p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Adapt To The Ever Changing Marketing Mix, Digitally</p>
								</div>
							</div>
						</div>
                        <div class="swiper-slide dark" style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/slider/slider_3.jpg');">
							<div class="container clearfix">
							</div>
						</div>
					</div>
					<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
					<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
					<div class="swiper-pagination"></div>
				</div>

			</div>

		</section>

        <section id="content" style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/bg-theme.jpg');">

            <div class="content-wrap" style="padding: 80px 0 0;">

                <div class="container clearfix">

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                            <div class="fbox-icon">
                                <a href="#"><i class="i-alt noborder icon-user"></i></a>
                            </div>
                            <h3>Qualified Employees<span class="subtitle">Our team consists of more than 20 qualified
                                    and experienced accountants, marketers, and managers.</span></h3>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                            <div class="fbox-icon">
                                <a href="#"><i class="i-alt noborder icon-wallet"></i></a>
                            </div>
                            <h3>Free Consultations<span class="subtitle">Our acquaintance with a client always begins
                                    with a free consultation to find out possible solutions to their problems.</span>
                            </h3>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                            <div class="fbox-icon">
                                <a href="#"><i class="i-alt noborder icon-check"></i></a>
                            </div>
                            <h3>100% Guaranteed<span class="subtitle">All results that you get from us are 100%
                                    guaranteed to bring you to a whole new level of profitability and financial
                                    success.</span></h3>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin col_last">
                        <div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
                            <div class="fbox-icon">
                                <a href="#"><i class="i-alt noborder icon-fire"></i></a>
                            </div>
                            <h3>Hot Offers Daily<span class="subtitle">Upto 10% Discounts</span></h3>
                        </div>
                    </div>

                    <div class="clear"></div>

                    <div class="section parallax parallax-bg notopborder skrollable skrollable-between"
                        data-rellax-speed="2"
                        style="background: rgba(0, 0, 0, 0) url('<?php echo GL_SITE_URL;?>/assets/images/advnachievements.jpg') repeat scroll 0px -63.6265px; padding: 100px 0px;"
                        data-bottom-top="background-position:0px 0px;"
                        data-top-bottom="background-position:0px -200px;">
                        <div class="container-fluid center clearfix">

                            <div class="heading-block">
                                <h2>Advantages and Achievements</h2>
                                <span>Since our establishment in 2017, our team has achieved a lot. Below are some
                                    statistics and interesting facts about our public relations company.</span>
                                <div class="clear"></div>
                            </div>

                            <div class="col_one_fourth nobottommargin bounceIn animated" data-animate="bounceIn">
                                <div class="counter counter-large counter-lined"><span data-from="0" data-to="20"
                                        data-refresh-interval="20" data-speed="2000">0</span></div>
                                <h5>Awards</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin bounceIn animated" data-animate="bounceIn"
                                data-delay="200">
                                <div class="counter counter-large counter-lined"><span data-from="10" data-to="500"
                                        data-refresh-interval="10" data-speed="2000">0</span></div>
                                <h5>Successful Projects</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin bounceIn animated" data-animate="bounceIn"
                                data-delay="400">
                                <div class="counter counter-large counter-lined"><span data-from="1" data-to="10"
                                        data-refresh-interval="13" data-speed="3000">0</span></div>
                                <h5>Years of Experience</h5>
                            </div>

                            <div class="col_one_fifth nobottommargin bounceIn animated" data-animate="bounceIn"
                                data-delay="600">
                                <div class="counter counter-large counter-lined"><span data-from="50" data-to="20"
                                        data-refresh-interval="25" data-speed="2500">0</span></div>
                                <h5>Qualified Employees</h5>
                            </div>

                        </div>
                    </div>

                    <div class="clear"></div>

                </div>

                <div class="container clearfix"></div>

                <div class="promo promo-dark promo-flat promo-full bottommargin">
                    <div class="container clearfix">
                        <h3>Learn the Cost of your <span>PR Campaign</span> Right Now!</h3>
                        <a href="<?php echo GL_SITE_URL?>/package"
                            class="button button-xlarge button-rounded">View All Pricing</a>
                    </div>
                </div>

                <div class="container clearfix"></div>

                <div class="section home_custom_service">
                    <div class="container clearfix">

                        <div class="heading-block center">
                            <h2>Services</h2>
                            <!-- <span>Canvas comes with 100+ Feature oriented Shortcodes that are easy to use too.</span> -->
                        </div>

                        <div class="clear bottommargin-sm"></div>

                        <div class="col_one_third">
                            <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="400">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-star2"></i></a>
                                </div>
                                <h3>Press Release Dissemination</h3>
                                <p>Savin Communication is exclusive partners with India’s top media houses like
                                    Hindustan Times, Zee News , Indian Express, ...</p>
                            </div>
                        </div>

                        <div class="col_one_third">
                            <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn" data-delay="200">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-user"></i></a>
                                </div>
                                <h3>Social Media Marketing</h3>
                                <p>Social media marketing is the use of social media platforms to connect with your
                                    audience to build your ...</p>
                            </div>
                        </div>

                        <div class="col_one_third col_last">
                            <div class="feature-box fbox-small fbox-plain" data-animate="fadeIn">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-shop"></i></a>
                                </div>
                                <h3>Influencer Marketing</h3>
                                <p>Influencer marketing involves a brand collaborating with an online influencer to
                                    market one of its products or services.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="container clearfix">

                    <div class="heading-block center">
                        <h2>Testimonials</h2>
                    </div>

                    <div id="oc-testi"
                        class="owl-carousel testimonials-carousel carousel-widget owl-loaded owl-drag with-carousel-dots"
                        data-margin="20" data-items-sm="1" data-items-md="2" data-items-xl="3">

                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1934px;">
                                <div class="owl-item active" style="width: 366.667px; margin-right: 20px;">
                                    <div class="oc-item">
                                        <div class="testimonial">
                                            <div class="testi-image">
                                                <a href="#"><img src="<?php echo GL_SITE_URL;?>/assets/images/testimonials/sarkar.png"
                                                        alt="Sarkar"></a>
                                            </div>
                                            <div class="testi-content">
                                                <p>Savin Communication are focused completely with eyes & brain, they left no empty space to satisfy the client with their consistent research and style of work</p>
                                                <div class="testi-meta">
                                                    S.N.M.D Sarkar
                                                    <span>CEO, Sarkar Jets.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 366.667px; margin-right: 20px;">
                                    <div class="oc-item">
                                        <div class="testimonial">
                                            <div class="testi-image">
                                                <a href="#"><img src="<?php echo GL_SITE_URL;?>/assets/images/testimonials/prateekgauri.png"
                                                        alt="Pratik"></a>
                                            </div>
                                            <div class="testi-content">
                                                <p>Animesh and team is amazing at PR. They are brilliant at understanding client expectations and their time of delivery is impeccable.</p>
                                                <div class="testi-meta">
                                                    Pratik Gauri
                                                    <span>India President, 5thelement group.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 366.667px; margin-right: 20px;">
                                    <div class="oc-item">
                                        <div class="testimonial">
                                            <div class="testi-image">
                                                <a href="#"><img src="<?php echo GL_SITE_URL;?>/assets/images/testimonials/mayankgarg.png"
                                                        alt="Mayank Garg"></a>
                                            </div>
                                            <div class="testi-content">
                                                <p>Fastest and Trustworthy service.</p>
                                                <div class="testi-meta">
                                                    Mayank Garg
                                                    <span>Founder, Sanjivani Pharmacy.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 366.667px; margin-right: 20px;">
                                    <div class="oc-item">
                                        <div class="testimonial">
                                            <div class="testi-image">
                                                <a href="#"><img src="<?php echo GL_SITE_URL;?>/assets/images/testimonials/sanjayguha.png"
                                                        alt="Customer Testimonails"></a>
                                            </div>
                                            <div class="testi-content">
                                                <p>We have been guided very well and would recommend Savin Communications as a very effective, professional, efficient PR agency which deliver its commitments and is very transparent and gives the right information and I would wish them all the very best</p>
                                                <div class="testi-meta">
                                                    Sanjay Guha
                                                    <span>CEO, Acquist Realty.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="section topmargin-sm nobottommargin" id="enquiry-section">
                    <div class="container clearfix">
                        <div class="col_two_fifth topmargin-sm nobottommargin" style="min-height: 350px">
                            <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"
                                class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink"
                                    style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                </div>
                            </div>
                            <h3>Sales Enquiry</h3>
                            <form id="sales-enquiry-form" action="#" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputname">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" id="full_name"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputmobile">Mobile</label>
                                        <input type="text" name="mobile" class="form-control" id="mobile"
                                            placeholder="Mobile">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputsubject4">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Message</label>
                                    <textarea class="form-control" maxlength="500" name="message" id="message" rows="5"></textarea>
                                    <small class="float-right"><a id="rchars">500</a> Character(s) Remaining</small>
                                </div>
                                
                                <div class="form-group">
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

                                <div class="form-group">
                                   <!-- Google reCAPTCHA box -->
                                   <div class="g-recaptcha" data-sitekey="6LekNr8ZAAAAANCNZi-ZhNYGMeejBLJQr95Pmqgz"></div>
                                </div>

                                <button class="btn btn-primary customize-enquiry">
                                <span class="spinner-border spinner-border-sm mr-2" style="display:none;"></span> Send Message
                                </button>
                                
                            </form>
                        </div>
                        <div class="col_three_fifth nobottommargin col_last">
                            <div class="heading-block topmargin-sm">
                                <h2>A Few Words About Us</h2>
                                <span>SAVIN COMMUNICATION – BREAKING BARRIERS, LEADING TRENDS IN THE DIGITAL
                                    ECOSYSTEM.</span>
                            </div>
                            <p>Our Customised PR Solution makes us different from others Savin Communication is helping
                                Company/Product/Individuals placed and positioned in Top Leading Daily News Digital
                                Portal. Savin Communication is a Startup Recognised Entity from the Government of India.
                                We are an exclusive partner with Top Media Houses in India and abroad which includes -
                                Hindustan Times, Livemint, Desimartini, Forbes India, Deccan Herald, Deccan Chronicle,
                                Asian Age, The Statesman, Midday, and many more.</p>
                            <!-- <a href="#" class="button button-3d button-large">Check out</a> -->
                        </div>
                    </div>
                </div>

                <div class="container clearfix">

                    <!-- <div id="oc-clients" class="owl-carousel owl-carousel-full image-carousel carousel-widget" data-margin="30" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6" style="padding: 20px 0;">

						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/1.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/2.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/3.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/4.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/5.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/6.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/7.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/8.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/9.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="images/clients/10.png" alt="Clients"></a></div>

					</div> -->

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
var ajaxUrl = "<?php echo GL_SITE_URL;?>/home/xhr/enquiry";
</script>
<?php
require_once ('includes/footerHandler.php');

$md->enqueue_files('assets/js/jquery.validate.js','js');
$md->enqueue_files('assets/js/homejs/index.js','js');
?>

</body>

</html>