<?php
require_once('includes/headHandler.php');
?>
<style>
.testi-image-custom, .testi-image-custom a, .testi-image-custom img, .testi-image-custom i {
display: block;
width: 30px;
height: 30px;
}
.testi-image-custom {
    float: left;
	margin-right: 10px;
}
.testi-image-custom img {
    border-radius: 50%;
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
        <!-- Page Title
		============================================= -->
        <section id="page-title" class="page-title-parallax page-title-dark skrollable skrollable-between"
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/package.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
            data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">
            <div class="container clearfix">
                <h1><?php echo $Pagedetails['pagename'];?></h1>
                <span>Start selling your Subscription Plans attractively</span>
            </div>
        </section>
        <!-- #page-title end -->
         
        <section id="content" style="margin-bottom: 0px;">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="fancy-title title-dotted-border title-center">
						<h2>Savin Package</h2>
					</div>

					<div class="row pricing bottommargin clearfix">

						<div class="col-lg-3">
							<div class="pricing-box">
								<div class="pricing-title">
									<h3>Start Up</h3>
								</div>
								<div class="pricing-price">
									<span class="price-unit"><i class="icon-rupee"></i></span>19,999<span class="price-tenure">+GST</span>
								</div>
								<div class="pricing-features">
									<ul>
										<li><strong>8</strong> Article Coverage</li>
										<li>Phone &amp; Email Support</li>
									</ul>
								</div>
								<div class="pricing-action">
									<?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
									<a href="javascript:void(0)" data-price="19999" class="btn btn-success btn-block razor-pay-now">Buy Now</a>
									<?php } ?>
									<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
										<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block">Sign Up</a>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="col-lg-3">
							<div class="pricing-box best-price">
								<div class="pricing-title">
									<h3>Social PR</h3>
									<span>Most Popular</span>
								</div>
								<div class="pricing-price">
									<span class="price-unit"><i class="icon-rupee"></i></span>41,999<span class="price-tenure">+GST</span>
								</div>
								<div class="pricing-features">
									<ul>
									    <li><strong>11</strong> Article Coverage</li>
										<li>Phone &amp; Email Support</li>
									</ul>
								</div>
								<div class="pricing-action">
									<?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
									<a href="javascript:void(0)" data-price="41999" class="btn btn-primary btn-block razor-pay-now">Buy Now</a>
									<?php } ?>
									<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
										<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block bgcolor border-color">Sign Up</a>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="col-lg-3">
							<div class="pricing-box">
								<div class="pricing-title">
									<h3>Business</h3>
								</div>
								<div class="pricing-price">
									<span class="price-unit"><i class="icon-rupee"></i></span>89,999<span class="price-tenure">+GST</span>
								</div>
								<div class="pricing-features">
									<ul>
										<li><strong>7</strong> Article Coverage</li>
										<li>Phone &amp; Email Support</li>
									</ul>
								</div>
								<div class="pricing-action">
									<?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
									<a href="javascript:void(0)" data-price="89999" class="btn btn-success btn-block razor-pay-now">Buy Now</a>
									<?php } ?>
									<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
										<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block">Sign Up</a>
									<?php } ?>
								</div>
							</div>
						</div>

						<div class="col-lg-3">
							<div class="pricing-box">
								<div class="pricing-title">
									<h3>UNLIMITED</h3>
								</div>
								<div class="pricing-price">
									<span class="price-unit"><i class="icon-rupee"></i></span class="price-unit">1,99,999<span class="price-tenure">+GST</span>
								</div>
								<div class="pricing-features">
									<ul>
										<li><strong>20+</strong> Article Coverage</li>
										<li>Phone &amp; Email Support</li>
									</ul>
								</div>
								<div class="pricing-action">
									<?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
									<a href="javascript:void(0)" data-price="199999" class="btn btn-success btn-block razor-pay-now">Buy Now</a>
									<?php } ?>
									<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
										<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block">Sign Up</a>
									<?php } ?>
								</div>
							</div>
						</div>

					</div>

					<div class="fancy-title title-dotted-border title-center">
						<h3>Comparison Package Service</h3>
					</div>
					
					<div class="table-responsive">
					<table class="table table-hover table-comparison nobottommargin">
					  <thead>
						<tr>
						  <th>&nbsp;</th>
						  <th>Start Up</th>
						  <th>Social PR</th>
						  <th>Business</th>
						  <th>Unlimited</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>
						  <div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/midday.png" alt="Midday"></a>
						  </div>Midday
						  </td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/ht.png" alt="Hindustan Times"></a>
						  </div>Hindustan Times</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/yahoo.png" alt="Yahoo News"></a>
						  </div>Yahoo News</td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/edtimes.png" alt="EDTimes"></a>
						  </div>EdTimes</td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/theindiasaga.png" alt="India Saga"></a>
						  </div>Indian Saga</td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/dailyhunt.png" alt="Daily Hunt"></a>
						  </div>Daily Hunt</td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/socialbuddy.png" alt="Social Buddy"></a>
						  </div>Social Buddy</td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/thenewsminute.png" alt="News Minute"></a>
						  </div>News Minutes</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/BS.png" alt="Business Standard"></a>
						  </div>Business Standard</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/previndia.png" alt="The Prevalent India"></a>
						  </div>The Prevalent India</td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/filmy.png" alt="Filmy Mantra"></a>
						  </div>Filmy Mantra</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/theman.png" alt="The Men"></a>
						  </div>The Men.in</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/newstrack.png" alt="News Track"></a>
						  </div>News Track</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/deccanchronicle.png" alt="Deccan Chronicle"></a>
						  </div>Deccan Chronicle</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/theasianage.png" alt="The Asian age"></a>
						  </div>Asian Age</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/decher.png" alt="Deccan Herald"></a>
						  </div>Deccan Herald</td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/forbesindia.png" alt="Forbes India"></a>
						  </div>Forbes India</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/theweek.png" alt="The Week"></a>
						  </div>The Week</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/livemint.png" alt="Live Mint"></a>
						  </div>Live Mint</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/zee.png" alt="Zee News"></a>
						  </div>Zee News</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/zeebusiness.png" alt="Zee Business"></a>
						  </div>Zee Business</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/dna.png" alt="DNA India"></a>
						  </div>DNA India</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/bgr.png" alt="BGR"></a>
						  </div>BGR</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/bollylife.png" alt="Bollywood Life"></a>
						  </div>Bollywood Life</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						<tr>
						  <td><div class="testi-image-custom">
							<a href="#"><img src="assets/images/icons/indiacom.png" alt="India.com"></a>
						  </div>India.com</td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-remove text-danger"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						  <td><i class="icon-ok text-success"></i></td>
						</tr>
						
						
						<tr>
						  <td>&nbsp;</td>
						  <td><?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
								<a href="javascript:void(0)" data-price="19999" class="btn btn-success razor-pay-now">Buy Now</a>
							<?php } ?>
							<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
								<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block">Sign Up</a>
							<?php } ?></td>
						  <td><?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
								<a href="javascript:void(0)" data-price="41999" class="btn btn-primary razor-pay-now">Buy Now</a>
							<?php } ?>
							<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
								<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block">Sign Up</a>
							<?php } ?></td>
						  <td><?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
								<a href="javascript:void(0)" data-price="89999" class="btn btn-success razor-pay-now">Buy Now</a>
							<?php } ?>
							<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
								<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block">Sign Up</a>
							<?php } ?></td>
						  <td><?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>	
								<a href="javascript:void(0)" data-price="199999" class="btn btn-success razor-pay-now">Buy Now</a>
							<?php } ?>
							<?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>	
								<a href="<?php echo GL_SITE_URL?>/account" class="btn btn-danger btn-block">Sign Up</a>
							<?php } ?></td>
						</tr>
					  </tbody>
					</table>
					</div>

				</div>


			</div>

		</section>

		<section id="content" style="margin-bottom: 0px;">
			<div class="promo promo-dark promo-flat promo-full bottommargin">
				<div class="container clearfix">
					<h3>Call us today at <span>+91-8468008464</span> or Email us at <span>info@saincommunication.com</span></h3>
					<span>We strive to provide Our Customers with Top Notch Press Release Support to make their Experience Wonderful</span>
					<a href="<?php echo GL_SITE_URL?>/home#enquiry-section" class="button button-xlarge button-rounded">Enquiry Now</a>
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
<?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
  jQuery(document).on('click', '.razor-pay-now', function (e) {
	var price = $(this).attr('data-price') * 1;
    var total = Math.round(price+(price*0.18) * 1) * 100;
    var merchant_order_id = "<?php echo rand(1001, 9999999);?>";
    var merchant_surl_id = "<?php echo GL_SITE_URL?>/success?"+merchant_order_id;
    var merchant_furl_id = "<?php echo GL_SITE_URL?>/failed?"+merchant_order_id;
    var card_holder_name_id = "<?php echo $UserInfo->full_name?>";
    var merchant_total = total;
    var merchant_amount = price;
    var currency_code_id = "INR";
    var key_id = "<?php echo RAZOR_KEY_ID; ?>";
    var store_name = 'Savin Communication';
    var store_description = 'Payment';
    var store_logo = '<?php echo GL_SITE_URL?>/assets/images/logo250x200.png';
    var email = "<?php echo $UserInfo->user_email?>";
    var phone = <?php echo $UserInfo->user_contact?>;
    
    var razorpay_options = {
        key: key_id,
        amount: merchant_total,
        name: store_name,
        description: store_description,
        image: store_logo,
        netbanking: true,
        currency: currency_code_id,
        prefill: {
            name: card_holder_name_id,
            email: email,
            contact: phone
        },
        notes: {
            soolegal_order_id: merchant_order_id,
        },
        handler: function (transaction) {
            jQuery.ajax({
                url:'<?php echo GL_SITE_URL?>/package/xhr/callback',
                type: 'POST',
                data: {
					razorpay_payment_id: transaction.razorpay_payment_id, 
					merchant_order_id: merchant_order_id, 
					merchant_surl_id: merchant_surl_id, 
					merchant_furl_id: merchant_furl_id, 
					card_holder_name_id: card_holder_name_id, 
					merchant_total: merchant_total, 
					merchant_amount: merchant_amount, 
					currency_code_id: currency_code_id
				}, 
                dataType: 'json',
                success: function (res) {
                    window.location = res.redirectURL;
                }
            });
        },
        "modal": {
            "ondismiss": function () {
                // code here
            }
        }
    };
    // obj        
    var objrzpv1 = new Razorpay(razorpay_options);
    objrzpv1.open();
        e.preventDefault();
            
});
</script>
<?php } ?>
</body>
</html>