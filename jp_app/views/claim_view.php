<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('base/meta_tags'); ?>
    <meta name="keywords" content="jobs in Kenya, government jobs, online jobs in Kenya, latest jobs in Kenya,  job in Kenya, latest jobs">
    <title><?php echo $title;?></title>
    <?php $this->load->view('base/before_head_close'); ?>
</head>
<body class="stretched">
<!-- Document Wrapper ============================================= -->
<div id="wrapper" class="clearfix">
    <!-- Header
    ============================================= -->
    <?php $this->load->view('base/dashboard_header'); ?>
    <!-- #header end -->

    <!-- Content
		============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">
                    <h3>Fill this form to start your claim.</h3>

                    <form id="register-form" name="register-form" class="nobottommargin" action="#" method="POST">

                        <div class="col_full">
                            <label for="register-form-name">Username:</label>
                            <input type="text" id="name" name="name" placeholder="User name used in D9" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-full-name">Full Name:</label>
                            <input type="text" id="full-name" name="full-name" placeholder="Your full name" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-phone">Phone:</label>
                            <input type="text" id="register-form-phone" name="register-form-phone" placeholder="Phone number" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-username">Full Name:</label>
                            <input type="text" id="package" name="package" placeholder="Package you have bought in D9" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <div class="bottommargin-sm">
                                <label for="">Select Multiple Values</label>
                                <select class="select-hide form-control bottommargin-sm" style="width:100%;">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </select>
                            </div>
                        </div>

                        <div class="col_full nobottommargin">
                            <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register">Claim Now</button>
                        </div>

                    </form>

                    <div class="line line-sm"></div>

                    <div class="center">
                        <h4 style="margin-bottom: 15px;">Have not paid?</h4>
                        <a href="#" class="button button-rounded si-twitter si-colored">Pay now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content -->

    <!-- Footer
    ============================================= -->
    <?php $this->load->view('base/footer'); ?>
    <!-- #footer end -->
</div><!-- Document Wrapper Ends-->

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