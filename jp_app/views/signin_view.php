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