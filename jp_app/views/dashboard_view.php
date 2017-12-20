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
                    <h3>Please fill the blank form fields.</h3>

                    <form id="register-form" name="register-form" class="nobottommargin" action="#" method="POST">

                        <div class="col_full">
                            <label for="register-form-name">Username:</label>
                            <input type="text" id="name" name="name" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-email">Email Address:</label>
                            <input type="text" id="email" name="email" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-username">First Name:</label>
                            <input type="text" id="first-name" name="first-name" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-username">Last Name:</label>
                            <input type="text" id="last-name" name="last-name" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-phone">Phone:</label>
                            <input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-password">Choose Password:</label>
                            <input type="password" id="password" name="password" value="" class="form-control" />
                        </div>

                        <div class="col_full">
                            <label for="register-form-repassword">Re-enter Password:</label>
                            <input type="password" id="repassword" name="repassword" value="" class="form-control" />
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
                            <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register">Update Now</button>
                        </div>

                    </form>
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