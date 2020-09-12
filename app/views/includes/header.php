<?php
$UserInfo = $md->GetUser_Details(array(
    "id"=>$_SESSION['user_account']['userid']
));
?>
<header id="header">

    <div id="header-wrap">

        <div class="container clearfix">

            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
					============================================= -->
            <div id="logo">
                <a href="<?php echo GL_SITE_URL;?>/home" class="standard-logo"
                    data-dark-logo="<?php echo GL_SITE_URL;?>/assets/images/logo250x200.png"><img
                        src="<?php echo GL_SITE_URL;?>/assets/images/logo126x100.png" alt="Savin Logo"></a>
                <a href="<?php echo GL_SITE_URL;?>/home" class="retina-logo"
                    data-dark-logo="<?php echo GL_SITE_URL;?>/assets/images/logo250x200.png"><img
                        src="<?php echo GL_SITE_URL;?>/assets/images/logo126x100.png" alt="Savin Logo"></a>
            </div><!-- #logo end -->

            <div id="top-account" class="dropdown">
            <?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>
                <a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i> <?php //echo ucwords($UserInfo->full_name);?></a>
            <?php } ?>
            <?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>
                <a href="#" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i></a>
            <?php } ?>    
                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                    <?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>
                    <a class="dropdown-item tleft" href="<?php echo GL_SITE_URL;?>/dashboard"><i class="icon-home"></i> Dashboard</a>
                    <?php } ?>
                    <?php if(!isset($_SESSION['user_account']) && empty($_SESSION['user_account'])){?>
                    <a class="dropdown-item tleft" href="<?php echo GL_SITE_URL;?>/account"><i class="icon-user"></i> Sign Up</a>
                    <?php } ?>
                    <?php if(isset($_SESSION['user_account']) && !empty($_SESSION['user_account'])){?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item tleft" href="<?php echo GL_SITE_URL;?>/account?logout">Logout <i class="icon-signout"></i></a>
                    <?php } ?>
                </ul>
			</div>

            <!-- Primary Navigation
					============================================= -->
            <nav id="primary-menu">

                <ul>
                    <li class="<?php echo ('home'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a
                            href="<?php echo GL_SITE_URL;?>/home">
                            <div>Home</div>
                        </a></li>
                    <li class="<?php echo ('aboutus'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a
                            href="<?php echo GL_SITE_URL;?>/aboutus">
                            <div>About Us</div>
                        </a></li>
                    <li class="<?php echo ('publicrelations'== basename($_SERVER['REQUEST_URI']) || 'socialmediamarketing'== basename($_SERVER['REQUEST_URI']) || 'influencermarketing'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a href="#">
                            <div>Services</div>
                        </a>
                        <ul>
                            <li class="<?php echo ('publicrelations'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a href="<?php echo GL_SITE_URL;?>/publicrelations">
                                    <div><i class="icon-shop"></i> PR Dissemination</div>
                                </a></li>
                            <li class="<?php echo ('socialmediamarketing'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a href="<?php echo GL_SITE_URL;?>/socialmediamarketing">
                                    <div><i class="icon-user"></i> Social Media Marketing</div>
                                </a></li>
                            <li class="<?php echo ('influencermarketing'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a href="<?php echo GL_SITE_URL;?>/influencermarketing">
                                    <div><i class="icon-star2"></i> Influencer Marketing</div>
                                </a></li>
                        </ul>
                    </li>
                    <li class="<?php echo ('package'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a href="<?php echo GL_SITE_URL;?>/package">
                            <div>Package Pricing</div>
                        </a>
                    </li>
                    <li class="<?php echo ('affiliate'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a href="<?php echo GL_SITE_URL;?>/affiliate">
                            <div>Become Our Affiliate</div>
                        </a>
                    </li>
                    <li class="<?php echo ('contactus'== basename($_SERVER['REQUEST_URI']))?$Pagedetails['status']:'';?>"><a href="<?php echo GL_SITE_URL;?>/contactus">
                            <div>Contact US</div>
                        </a></li>
                </ul>

                <!-- Top Cart
						============================================= -->
                <!-- Top Search
						============================================= -->
                <!-- #top-search end -->

            </nav><!-- #primary-menu end -->

        </div>

    </div>

</header>