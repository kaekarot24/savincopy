<?php
require_once('includes/headHandler.php');
$CheckPayStatus = $dashboard->CheckPayment_Status($_SESSION['user_account']['userid']);
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
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/dashboard.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
            data-bottom-top="background-position:0px 0px;" data-top-bottom="background-position:0px -300px;">
            <div class="container clearfix">
                <h1><?php echo $Pagedetails['pagename'];?></h1>
                <span>Start browsing your Subscription Plans attractively</span>
            </div>
        </section>
        <!-- #page-title end -->

        <!-- Content
		============================================== -->

        <section id="content" style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/bg-theme.jpg');">

            <div class="content-wrap">

                <div class="container clearfix">

                    <div class="row clearfix">

                        <div class="col-md-12">

                            <img src="assets/images/icons/avatar.jpg"
                                class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar"
                                style="max-width: 84px;">

                            <div class="heading-block noborder">
                                <h3><?php echo ucwords($UserInfo->full_name);?></h3>
                                <span>Your Dashboard Bio</span>
                            </div>

                            <div class="clear"></div>

                            <div class="row clearfix">

                                <div class="col-lg-12">

                                    <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                        <ul class="tab-nav clearfix">
                                            <li><a href="#tab-profile"><i class="icon-user"></i> Your Profile</a></li>
                                            <li><a href="#tab-feeds" class="tab_activities"><i class="icon-list"></i> Activities</a></li>
                                            <li><a href="#tab-posts"><i class="icon-pencil2"></i> Posts</a></li>
                                            <li><a href="#tab-package"><i class="icon-list"></i> Package</a></li>
                                        </ul>

                                        <div class="tab-container">

                                            <div class="tab-content clearfix" id="tab-profile">
                                                <h3>Update Profile</h3>
                                                <div class="clear topmargin-sm"></div>
                                                <div class="col-lg-12">
                                                    <form class="row" id="profile-form" action="#" method="post" enctype="multipart/form-data">
                                                        
                                                        <div class="col-6 form-group">
                                                            <label>Name:</label>
                                                            <input type="text" name="profile_form_name" id="profile_form_name" class="form-control" value="<?php echo $UserInfo->full_name;?>" placeholder="Enter your First Name">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label>Email:</label>
                                                            <input type="text" name="profile_form_email" id="profile_form_email" class="form-control" value="<?php echo $UserInfo->user_email;?>" placeholder="Enter your Email">
                                                        </div>
                                                        <div class="col-6 form-group">
                                                            <label>Contact:</label>
                                                            <input type="text" maxlength="15" name="profile_form_phone" id="profile_form_phone" class="form-control" value="<?php echo $UserInfo->user_contact;?>" placeholder="Enter your Phone">
                                                        </div>

                                                        <div class="col-12 form-group">
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

                                                        <div class="col-12">
                                                            <button name="event-registration-submit" class="btn btn-primary customize-profile">
                                                            <span class="spinner-border spinner-border-sm mr-2" style="display:none;"></span> Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>

                                            <div class="tab-content clearfix" id="tab-feeds">
                                            <?php if(true === $CheckPayStatus){ ?> 
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Time</th>
                                                            <th>Activity</th>
                                                            <th>Status</th>
                                                            <th>Preview</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="user_activities"></tbody>
                                                </table>
                                            <?php } else {?>
                                            <div class="clear topmargin-sm"></div>
                                               
                                            <div class="promo promo-light bottommargin">
                                                <h3>Call us today at <span>+91-8468008464</span> or Email us at <span>info@savincommunication.com</span></h3>
                                                <span>We strive to provide Our Customers with Top Notch Press Release Support to make their Experience Wonderful</span>
                                                <a href="<?php echo GL_SITE_URL?>/package" class="button button-dark button-xlarge button-rounded">Buy Now</a>
                                            </div>
                                            <?php } ?>    
                                            </div>
                                            <div class="tab-content clearfix" id="tab-posts">
                                              <?php if(true === $CheckPayStatus){ ?>  
                                               <h3>Upload Here To Your Publish Content</h3>
                                                <div class="alert alert-info">
                                                <i class="icon-hand-up"></i><strong>Please Note!</strong> According to Single Package Only one Activity allowed So Please be sure before Upload your content.
                                                </div>
                                                <div class="clear topmargin-sm"></div>
                                                <div class="row topmargin-sm clearfix">
                                                   
                                                <div class="col-lg-12 card p-3 bg-light">
                                                    <form class="row mb-0" id="upload-form-content" action="#" method="post" enctype="multipart/form-data">

                                                        <div class="form-group col-12">
                                                            <label for="inputEmail4">Image/File</label>
                                                            <input type="file" class="form-control dropzone"
                                                                id="contentimages" name="content_images[]" multiple>
                                                                <p><b>Note:</b> <small class="text-danger">Maximun 5 Images allowed to upload with (JPG, PNG) extension only. When browse use Ctrl+select image for multiple selection</small></p>
                                                        </div>
                                                        <div class="row col-12 form-group" id="previews"></div>
                                                        <div class="form-group col-12 py-2">
                                                            <div class="clear topmargin-sm"></div>
                                                            <label for="content_message">Paste Your content
                                                                here:</label>
                                                            <textarea name="content_message"
                                                                id="content_message" class="form-control" cols="30"
                                                                rows="20"></textarea>
                                                        </div>
                                                        <div class="form-group col-12">
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
                                                        <div class="form-group col-md-12">
                                                            <button type="submit" class="button button-rounded button-reveal button-large button-blue float-right customize-content">
                                                            <span class="spinner-border spinner-border-sm mr-2" style="display:none;"></span> <i class="icon-line-cloud-upload"></i> <span>Upload</span></button>
                                                        </div>
                                                    </form>
                                                </div>    
                                                </div>
                                                <?php } else {?>
                                                      
                                                <div class="clear topmargin-sm"></div>
                                               
                                                <div class="promo promo-light bottommargin">
                                                    <h3>Call us today at <span>+91-8468008464</span> or Email us at <span>info@savincommunication.com</span></h3>
                                                    <span>We strive to provide Our Customers with Top Notch Press Release Support to make their Experience Wonderful</span>
                                                    <a href="<?php echo GL_SITE_URL?>/package" class="button button-dark button-xlarge button-rounded">Buy Now</a>
                                                </div> 

                                                <?php } ?>    

                                            </div>
                                            <div class="tab-content clearfix" id="tab-package">

                                                <div class="clear topmargin-sm"></div>
                                               
                                                <div class="promo promo-light bottommargin">
                                                    <h3>Call us today at <span>+91-8468008464</span> or Email us at <span>info@savincommunication.com</span></h3>
                                                    <span>We strive to provide Our Customers with Top Notch Press Release Support to make their Experience Wonderful</span>
                                                    <a href="<?php echo GL_SITE_URL?>/package" class="button button-dark button-xlarge button-rounded">Buy Now</a>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="w-100 line d-block d-md-none"></div>

                    </div>

                </div>

                <!-- #Preview Modal -->
                
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-body">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Uploaded Content</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body user-content"></div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- #Preview Modal End -->
                

            </div>

        </section>


        <!-- #Content End -->

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
$md->enqueue_files('assets/js/dashboard/index.js','js');

//Plugins
$md->enqueue_files('assets/js/tinymce/tinymce.min.js','js');
?>
<script>
var ajaxUrl = "<?php echo GL_SITE_URL?>/dashboard/xhr/updateprofile";
var ajaxUrl_2 = "<?php echo GL_SITE_URL?>/dashboard/xhr/uploadcontent";
var ajaxUrl_3 = "<?php echo GL_SITE_URL?>/dashboard/xhr/getactivities"; 
var ajaxUrl_4 = "<?php echo GL_SITE_URL?>/dashboard/xhr/previewcontent";    
tinymce.init({
    selector: '#content_message',
    menubar: true,
    style_formats: [
        {title: 'Red Background', block: 'p', styles: {
            'background-color': '#ff0000', 
            'color':'white',
            'padding': '7px'}
        },
        {title: 'Blue Background', block: 'p', styles: {
            'background-color': '#0000ff', 
            'color':'white',
            'padding': '7px'}
        }
    ],
    setup: function(editor) {
        editor.on('change', function(e) {
            tinyMCE.triggerSave();
            $("#" + editor.id).valid();
        });
    }
});
</script>
</body>

</html>