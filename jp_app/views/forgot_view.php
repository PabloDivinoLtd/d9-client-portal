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
        <div class="content-wrap nopadding">
            <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container vertical-middle divcenter clearfix">

                    <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
                        <div class="panel-body" style="padding: 40px;">
                            <form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
                                <h3>Account Recovery</h3>

                                <div class="col_full">
                                    <label for="login-form-username">Email:</label>
                                    <input type="email" id="login-form-username" name="login-form-username" value="" class="form-control not-dark" />
                                </div>

                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Recover Password</button>
                                </div>
                            </form>
                        </div>
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