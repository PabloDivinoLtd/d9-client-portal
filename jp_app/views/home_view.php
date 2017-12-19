<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('base/meta_tags'); ?>
    <title><?php echo $title;?></title>
    <?php $this->load->view('base/before_head_close'); ?>
</head>
<body class="stretched">
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">
        <!-- Header
		============================================= -->
        <?php $this->load->view('base/home_header'); ?>
        <!-- #header end -->

        <section id="slider" style="background: url(<?php echo base_url('public/images/landing-1.jpg');?>) center; overflow: visible;" data-height-lg="500" data-height-md="500" data-height-sm="600" data-height-xs="600" data-height-xxs="600">
            <div class="container clearfix">

                <div class="contact-widget" data-loader="button">

                    <div class="contact-form-result"></div>

                    <form action="" method="post" role="form" class="landing-wide-form landing-form-overlay dark nobottommargin clearfix">
                        <div class="heading-block nobottommargin nobottomborder">
                            <h2>Signup</h2>
                            <span>Register now to start your claims</span>
                        </div>
                        <div class="line" style="margin: 20px 0 30px;"></div>
                        <div class="col_full">
                            <input type="text" name="template-landing5-name" class="form-control required input-lg not-dark" value="" placeholder="Username*">
                        </div>
                        <div class="col_full">
                            <input type="email" name="template-landing5-email" class="form-control required input-lg not-dark" value="" placeholder="Your Email*">
                        </div>
                        <div class="col_full">
                            <input type="password" name="template-landing5-password" class="form-control required input-lg not-dark" value="" placeholder="Choose Password*">
                        </div>
                        <div class="col_full">
                            <input type="password" name="template-landing5-repassword" class="form-control required input-lg not-dark" value="" placeholder="Confirm Password*">
                        </div>
                        <div class="col_full hidden">
                            <input type="text" id="template-landing5-botcheck" name="template-landing5-botcheck" value="" class="form-control" />
                        </div>
                        <div class="col_full nobottommargin">
                            <button class="btn btn-lg btn-danger btn-block nomargin" value="submit" type="submit" style="">START YOUR CLAIMS</button>
                        </div>
                    </form>

                </div>

            </div>
        </section>

        <!-- Content
		============================================= -->

        <!-- Content -->
        <section id="content" style="overflow: visible;">
            <div class="content-wrap">
                <div class="promo promo-dark promo-full landing-promo header-stick">
                    <div class="container clearfix">
                        <h3>D9 Clubclaims <i class="icon-circle-arrow-right" style="position:relative;top:2px;"></i></h3>
                        <span>We help creditors of D9 CLUBE to file a claim and demand for their money from the owners of D9 CLUBE.</span>
                    </div>
                </div>
            </div>

            <div class="container clearfix">
                <div class="clear bottommargin-lg"></div>

                <div id="section-features" class="heading-block title-center page-section">
                    <h2>How can D9 Clubclaims help you?</h2>
                    <span>
                        An attorney has been assigned to this cause and will ensure that whoever is behind the Multi Level
                        Marketing scheme in the names of D9 CLUBE is brought to book, and all investors get refunded their money.
                    </span>
                </div>

                <div class="col_full">
                    <div id="snav-content1">
                        <p>Pursuant to the order approving the Bar Date motion, JANUARY 25th, 2017 at 1500hrs, (Prevailing Eastern Time) has been
                            established as the deadline (the “Bar Date”) for each person or entity (including individuals, partnerships,
                            corporations, estates, trusts, join ventures, and governmental units, wherever located), and participants (collectively,
                            “Claimants’) to file proof of claims against the debtors. (“D9CLUBE”) Failure to file a claim using this electronic system,
                            within the stipulated time frame stated, or failure to complete and SUBMIT a claim within the legally approved date of 15th December 2017,
                            shall render all your claims to D9CLUBE invalid, and hence no money back shall be given in the event that the legal process is successful.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer
		============================================= -->
        <?php $this->load->view('base/footer'); ?>
        <!-- #footer end -->
    </div><!-- #wrapper end -->
    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    <?php $this->load->view('base/before_body_close'); ?>
    <script type="text/javascript">
        $(function() {
            $( "#side-navigation" ).tabs({ show: { effect: "fade", duration: 400 } });
        });
    </script>
</body>
</html>