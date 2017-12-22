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

                <div class="" >

                    <div class="contact-form-result"></div>

                        <?php echo form_open_multipart('default_controller',array('name' => 'creditor_form', 'class' => 'landing-wide-form landing-form-overlay dark nobottommargin clearfix', 'id' => 'creditor_form', 'onSubmit' => 'return validate_form(this);'));?>
                        <div class="heading-block nobottommargin nobottomborder">
                            <h2>Signup</h2>
                            <span>Register now to start your claims</span>
                            <?php echo validation_errors(); ?> <?php echo $this->session->flashdata('msg');?>
                        </div>
                        <div class="line" style="margin: 20px 0 30px;"></div>
                        <div class="col_full <?php echo (form_error('username'))?'has-error':'';?>">
                            <input type="text" name="username" autocomplete="off" class="form-control required input-lg not-dark" value="<?php echo set_value('username'); ?>" placeholder="Username*">
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="col_full <?php echo (form_error('email'))?'has-error':'';?>">
                            <input type="email" name="email" autocomplete="off" class="form-control required input-lg not-dark" value="<?php echo set_value('email'); ?>" placeholder="Your Email*">
                            <?php echo form_error('email'); ?>
                        </div>
                        <div class="col_full <?php echo (form_error('pass'))?'has-error':'';?>">
                            <input type="password" name="pass" autocomplete="off" class="form-control required input-lg not-dark" value="<?php echo set_value('pass'); ?>" placeholder="Choose Password*">
                            <?php echo form_error('pass'); ?>
                        </div>
                        <div class="col_full<?php echo (form_error('confirm_pass'))?'has-error':'';?>">
                            <input type="password" name="confirm_pass" autocomplete="off" class="form-control required input-lg not-dark" value="<?php echo set_value('confirm_pass'); ?>" placeholder="Confirm Password*">
                            <?php echo form_error('confirm_pass'); ?>
                        </div>
                        <div class="col_full hidden">
                            <input type="text" id="template-landing5-botcheck" name="template-landing5-botcheck" value="" class="form-control" />
                        </div>
                        <div class="col_full nobottommargin">
                            <button class="btn btn-lg btn-danger btn-block nomargin" value="submit" type="submit" style="">START YOUR CLAIMS</button>
                        </div>

                    <?php echo form_close();?>
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
                        Marketing scheme in the names of D9 CLUB is brought to book, and all investors get refunded their money.
                    </span>
                </div>

                <div class="col_full">
                    <div id="snav-content1">
                        <p>Pursuant to the order approving the Bar Date motion, January 25th 2017 at 1500hrs, (Prevailing Eastern Time) has been
                            established as the deadline (the “Bar Date”) for each person or entity (including individuals, partnerships,
                            corporations, estates, trusts, join ventures, and governmental units, wherever located), and participants (collectively,
                            “Claimants’) to file proof of claims against the debtors. (“D9CLUB”) Failure to file a claim using this electronic system,
                            within the stipulated time frame stated, or failure to complete and SUBMIT a claim within the legally approved date of 15th December 2017,
                            shall render all your claims to D9CLUB invalid, and hence no money back shall be given in the event that the legal process is successful.</p>
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