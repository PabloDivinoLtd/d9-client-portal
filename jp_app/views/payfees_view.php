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
                    <div class="row">
                        <?php echo form_open_multipart('payfees',array('name' => 'payfees_form', 'id' => 'payfees_form', 'onSubmit' => 'return validate_form(this);'));?>
                        <h2>Upload the paid receipt.</h2>
                        <?php echo $this->session->flashdata('msg');?>
                        <div class="row center">
                            <img src="<?php echo base_url('public/images/barcode.png');?>" alt="Bar code">
                        </div>
                            <div style="font-size: 24px;font-weight: 700;">Pay to Bitcoin address :</div>
                            <p>1FtuDqexFsLktYvEc5TVxje2i1svAsdTpU</p>
                            <div class="col_full <?php echo (form_error('slip_file') || $msg)?'has-error':'';?>">
                                <label></label><br>
                                <input type="file" name="slip_file" id="slip_file" value="<?php echo set_value('slip_file'); ?>" class="file">
                                <?php
                                echo form_error('slip_file');
                                echo ($msg!='')?'<div class="alert alert-error"> <a class="close" data-dismiss="alert">×</a>'.$msg.'</div>':'';
                                ?>
                            </div>

                            <div class="col_full nobottommargin">
                                <button class="button button-3d button-black nomargin" type="submit" id="submit" name="submit" >Upload your payment receipt</button>
                            </div>
                        <?php echo form_close();?>
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

</body>
</html>