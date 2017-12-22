<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('base/meta_tags'); ?>
    <meta name="keywords" content="D9 claims">
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
    <?php echo form_open_multipart(base_url().'payment/pay',array('name' => 'pay_form', 'id' => 'pay_form'));?>
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <h3>Fill this form to start your claim.</h3>
                    <div col-md-9>
                        <div class="col_full <?php echo (form_error('full_name'))?'has-error':'';?>">
                            <label for="register-form-full-name">Full Name:</label>
                            <input type="text" id="full_name" name="full_name" value="<?php echo set_value('full_name'); ?>" placeholder="Your full name" class="form-control" />
                            <?php echo form_error('full_name'); ?>
                        </div>
                        <div class="col_full <?php echo (form_error('slip_file'))?'has-error':'';?>">
                            <label for="register-form-full-name">Full Name:</label>
                            <input type="file" id="slip_file" name="slip_file" value="<?php echo set_value('slip_file'); ?>"  class="file" />
                            <?php echo form_error('slip_file'); ?>
                        </div>

                        <div class="col_full nobottommargin">
                            <button type="submit" class="button button-3d button-black nomargin" id="submit" name="submit" value="register">Claim Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo form_close();?>
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