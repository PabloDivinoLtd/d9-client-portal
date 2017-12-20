<header id="header" class="transparent-header page-section dark">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

            <!-- Logo
		    ============================================= -->
            <div id="logo">
                <a href="<?php echo base_url();?>" class="standard-logo" data-dark-logo="<?php echo base_url('public/images/logo-dark.png');?>">
                    <img src="<?php echo base_url('public/images/logo-dark.png');?>" alt="TaskJET Kenya"></a>
                <a href="<?php echo base_url();?>" class="retina-logo" data-dark-logo="<?php echo base_url('public/images/logo-dark.png');?>">
                    <img src="<?php echo base_url('public/images/logo-dark.png');?>" alt="TaskJET Kenya"></a>
            </div><!-- #logo end -->

            <!-- Primary Navigation
					============================================= -->
            <nav id="primary-menu">

                <ul class="one-page-menu">
                    <?php if($this->session->userdata('is_user_login')!=TRUE): ?>
                        <li><a href="<?php echo base_url();?>" class="loginBtn" title="Home page">Home</a></li>
                        <li><a href="<?php echo base_url('login');?>" class="loginBtn" title="Login">Login</a></li>
                    <?php else: ?>
                        <li><a href="<?php echo base_url('dashboard');?>" class="loginBtn" title="Dashboard">Dashboard</a></li>
                        <li><a href="<?php echo base_url('claim_form');?>" class="loginBtn" title="Claim Form">Claim Form</a></li>
                        <li><a href="<?php echo base_url('pay_fees');?>" class="loginBtn" title="Pay Fees">Pay Fees</a></li>
                        <li><a href="<?php echo base_url('logout');?>" class="loginBtn" title="Login">Sign Out</a></li>
                    <?php endif; ?>
                </ul>

            </nav><!-- #primary-menu end -->
        </div>
    </div>
</header>