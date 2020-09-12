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
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/signup.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
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

					<div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">

						<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
						<div class="acc_content clearfix" style="display: none;">
							<form id="login-form" class="nobottommargin" action="#" method="post">
								<div class="col_full">
									<label for="login_form_username">Username:</label>
									<input type="text" id="login_form_username" name="login_form_username" value="" class="form-control">
								</div>

								<div class="col_full">
									<label for="login_form_password">Password:</label>
									<input type="password" id="login_form_password" name="login_form_password" value="" class="form-control">
								</div>
                                 
                                <div class="col_full">
                                    <!-- Google reCAPTCHA box -->
                                   <div class="g-recaptcha" data-sitekey="6LekNr8ZAAAAANCNZi-ZhNYGMeejBLJQr95Pmqgz"></div>
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

								<div class="col_full nobottommargin">
									<button class="button button-3d button-blue nomargin customize-login" id="login_form_submit" name="login_form_submit" value="login">
                                    <span class="spinner-border spinner-border-sm mr-2" style="display:none;"></span> Login
                                    </button>
									<!-- <a href="#" class="fright">Forgot Password?</a> -->
								</div>
							</form>
						</div>

						<div class="acctitle acctitlec"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
						<div class="acc_content clearfix">
							<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">
								<div class="col_full">
									<label for="register_form_name">Name:</label>
									<input type="text" id="register_form_name" name="register_form_name" value="" class="form-control">
								</div>

								<div class="col_full">
									<label for="register_form_email">Email Address:</label>
									<input type="text" id="register_form_email" name="register_form_email" value="" class="form-control">
								</div>

								<div class="col_full">
									<label for="register_form_username">Choose a Username:</label>
									<input type="text" id="register_form_username" name="register_form_username" value="" class="form-control">
								</div>

								<div class="col_full">
									<label for="register_form_phone">Phone:</label>
									<input type="text" id="register_form_phone" name="register_form_phone" value="" class="form-control">
								</div>

								<div class="col_full">
									<label for="register_form_password">Choose Password:</label>
									<input type="password" id="register_form_password" name="register_form_password" value="" class="form-control">
								</div>

								<div class="col_full">
									<label for="register_form_repassword">Re-enter Password:</label>
									<input type="password" id="register_form_repassword" name="register_form_repassword" value="" class="form-control">
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

								<div class="col_full nobottommargin">
									<button class="button button-3d button-blue nomargin customize-register" id="register_form_submit" name="register_form_submit" value="register">
                                    <span class="spinner-border spinner-border-sm mr-2" style="display:none;"></span> Register Now
                                    </button>
								</div>
							</form>
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


<?php
require_once ('includes/footerHandler.php');
$md->enqueue_files('assets/js/jquery.validate.js','js');
$md->enqueue_files('assets/js/account/index.js','js');
?>
<script>
var ajaxUrl = "<?php echo GL_SITE_URL;?>/account/xhr/register";
var ajaxUrl_2 = "<?php echo GL_SITE_URL;?>/account/xhr/login";
</script>
</body>

</html>