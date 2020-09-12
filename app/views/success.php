<?php
require_once('includes/headHandler.php');
?>
<style>
.receipt-content .logo a:hover {
  text-decoration: none;
  color: #7793C4; 
}

.receipt-content .invoice-wrapper {
  background: #FFF;
  border: 1px solid #CDD3E2;
  box-shadow: 0px 0px 1px #CCC;
  padding: 40px 40px 60px;
  margin-top: 40px;
  border-radius: 4px; 
}

.receipt-content .invoice-wrapper .payment-details span {
  color: #A9B0BB;
  display: block; 
}
.receipt-content .invoice-wrapper .payment-details a {
  display: inline-block;
  margin-top: 5px; 
}

.receipt-content .invoice-wrapper .line-items .print a {
  display: inline-block;
  border: 1px solid #9CB5D6;
  padding: 13px 13px;
  border-radius: 5px;
  color: #708DC0;
  font-size: 13px;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear; 
}

.receipt-content .invoice-wrapper .line-items .print a:hover {
  text-decoration: none;
  border-color: #333;
  color: #333; 
}

.receipt-content {
  background: #ECEEF4; 
}
@media (min-width: 1200px) {
  .receipt-content .container {width: 900px; } 
}

.receipt-content .logo {
  text-align: center;
  margin-top: 50px; 
}

.receipt-content .logo a {
  font-family: Myriad Pro, Lato, Helvetica Neue, Arial;
  font-size: 36px;
  letter-spacing: .1px;
  color: #555;
  font-weight: 300;
  -webkit-transition: all 0.2s linear;
  -moz-transition: all 0.2s linear;
  -ms-transition: all 0.2s linear;
  -o-transition: all 0.2s linear;
  transition: all 0.2s linear; 
}

.receipt-content .invoice-wrapper .intro {
  line-height: 25px;
  color: #444; 
}

.receipt-content .invoice-wrapper .payment-info {
  margin-top: 25px;
  padding-top: 15px; 
}

.receipt-content .invoice-wrapper .payment-info span {
  color: #A9B0BB; 
}

.receipt-content .invoice-wrapper .payment-info strong {
  display: block;
  color: #444;
  margin-top: 3px; 
}

@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .payment-info .text-right {
  text-align: left;
  margin-top: 20px; } 
}
.receipt-content .invoice-wrapper .payment-details {
  border-top: 2px solid #EBECEE;
  margin-top: 30px;
  padding-top: 20px;
  line-height: 22px; 
}


@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .payment-details .text-right {
  text-align: left;
  margin-top: 20px; } 
}
.receipt-content .invoice-wrapper .line-items {
  margin-top: 40px !important; 
}
.receipt-content .invoice-wrapper .line-items .headers {
  color: #A9B0BB;
  font-size: 13px !important;
  letter-spacing: .3px !important;
  border-bottom: 2px solid #EBECEE !important;
  padding-bottom: 4px !important; 
}
.receipt-content .invoice-wrapper .line-items .items {
  margin-top: 8px !important;
  border-bottom: 2px solid #EBECEE !important;
  padding-bottom: 8px !important; 
}
.receipt-content .invoice-wrapper .line-items .items .item {
  padding: 10px 0 !important;
  color: #696969 !important;
  font-size: 15px !important; 
}
@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .items .item {
  font-size: 13px; } 
}
.receipt-content .invoice-wrapper .line-items .items .item .amount {
  letter-spacing: 0.1px !important;
  color: #84868A !important;
  font-size: 16px !important;
 }
@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .items .item .amount {
  font-size: 13px; } 
}

.receipt-content .invoice-wrapper .line-items .total {
  margin-top: 30px !important; 
}

.receipt-content .invoice-wrapper .line-items .total .extra-notes {
  float: left;
  width: 40%;
  text-align: left;
  font-size: 13px;
  color: #7A7A7A;
  line-height: 20px; 
}

@media (max-width: 767px) {
  .receipt-content .invoice-wrapper .line-items .total .extra-notes {
  width: 100%;
  margin-bottom: 30px;
  float: none; } 
}

.receipt-content .invoice-wrapper .line-items .total .extra-notes strong {
  display: block;
  margin-bottom: 5px;
  color: #454545; 
}

.receipt-content .invoice-wrapper .line-items .total .field {
  margin-bottom: 7px;
  font-size: 14px;
  color: #555; 
}

.receipt-content .invoice-wrapper .line-items .total .field.grand-total {
  margin-top: 10px;
  font-size: 16px;
  font-weight: 500; 
}

.receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
  color: #20A720;
  font-size: 16px; 
}

.receipt-content .invoice-wrapper .line-items .total .field span {
  display: inline-block;
  margin-left: 20px;
  min-width: 85px;
  color: #84868A;
  font-size: 15px; 
}

.receipt-content .invoice-wrapper .line-items .print {
  margin-top: 50px;
  text-align: center; 
}



.receipt-content .invoice-wrapper .line-items .print a i {
  margin-right: 3px;
  font-size: 14px; 
}

.receipt-content .footer {
  margin-top: 40px;
  margin-bottom: 110px;
  text-align: center;
  font-size: 12px;
  color: #969CAD; 
}
@media print {
    /* Hide everything in the body when printing... */
    .print-receipt  { display: none; }
    #header  { display: none; }
    #page-title {display: none;}
    .jumbotron{display: none;}
    #footer {display: none;}
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
            style="background-image: url('<?php echo GL_SITE_URL;?>/assets/images/payment_success.jpg'); background-size: cover; padding: 120px 0px; background-position: 0px -188.326px;"
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
                            <h1 class="display-3">Thank You!</h1>
                            <p class="lead"><strong>Your Payment Process</strong> has been done successfully.</p>
                            <hr>
                            <p>
                                Having trouble? <a href="<?php echo GL_SITE_URL?>/contactus">Contact us</a>
                            </p>
                            <p class="lead">
                                <a class="btn btn-primary btn-sm" href="<?php echo GL_SITE_URL?>/dashboard"
                                    role="button">Continue to Dashboard</a>
                            </p>
                        </div>

                    </div>

                    <div class="clear"></div>

                    <div class="receipt-content">
                        <div class="container bootstrap snippets bootdey">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="py-5 text-center">Payment Receipt</h1>
                                    <div class="invoice-wrapper">
                                        <div class="intro row">
                                           <div class="col-md-10">
                                            Hi <strong><?php echo ucwords($UserInfo->full_name);?></strong>,
                                            <br>
                                            This is the receipt for a payment of <strong><?php echo $response['data']['paid_taxable_amount']?></strong> (<?php echo $response['data']['currency'];?>) for your
                                            Package
                                           </div> 
                                           <div class="col-md-2">
                                               <img src="<?php echo GL_SITE_URL?>/assets/images/logo126x100.png" />
                                           </div> 
                                        </div>

                                        <div class="payment-info">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>Payment Id</span>
                                                    <strong><?php echo $response['data']['payment_id']?></strong>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <span>Payment Date</span>
                                                    <strong><?php echo date('M d, Y - h:i A', $response['data']['created_at']);?></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="payment-details">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>Client</span>
                                                    <strong>
                                                        <?php echo ucwords($UserInfo->full_name);?>
                                                    </strong>
                                                    <p>
                                                    <?php echo ucwords($UserInfo->user_contact);?>
                                                    <br>
                                                        <a href="#">
                                                        <?php echo ucwords($UserInfo->user_email);?>
                                                        </a>
                                                    </p>
                                                </div>
                                                <div class="col-sm-6 text-right">
                                                    <span>Payment To</span>
                                                    <strong>
                                                        Savin Communication
                                                    </strong>
                                                    <p>
                                                        B-46 First Floor <br>
                                                        Sector-63, Noida <br>
                                                        Uttar Pradesh 201301 <br>
                                                        INDIA <br>
                                                        <a href="mailto:info@savincommunication.com">
                                                            info@savincommunication.com
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="line-items">
                                            <div class="headers clearfix">
                                                <div class="row">
                                                    <div class="col-md-4">Description</div>
                                                    <div class="col-md-3">Quantity</div>
                                                    <div class="col-md-5 text-right">Amount</div>
                                                </div>
                                            </div>
                                            <div class="items">
                                                <div class="row item">
                                                    <div class="col-md-4 desc"><?php echo $package_name;?></div>
                                                    <div class="col-md-3 qty">1</div>
                                                    <div class="col-md-5 amount text-right"><?php echo $response['data']['currency']." ".$response['data']['paid_amount']?></div>
                                                </div>
                                            </div>
                                            <div class="total text-right">
                                                <div class="field">
                                                    Subtotal <span><?php echo $response['data']['paid_amount']?></span>
                                                </div>
                                                <div class="field">
                                                    GST/- (18%) <span><?php echo $response['data']['paid_amount']*0.18;?></span>
                                                </div>
                                                <div class="field grand-total">
                                                    Total <span><?php echo $response['data']['currency'].$response['data']['paid_taxable_amount']?></span>
                                                </div>
                                            </div>

                                            <div class="print">
                                                <a href="javascript:void(0)" class="print-receipt">
                                                    <i class="fa fa-print"></i>
                                                    Print this receipt
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="footer">
                                        Copyright © 2020. Savin Communication
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


    <?php
require_once ('includes/footerHandler.php');
?>
<script>
  $(".print-receipt").click(function () {
    //Hide all other elements other than printarea.
    $(".invoice-wrapper").show();
    window.print();
});
</script>
</body>

</html>