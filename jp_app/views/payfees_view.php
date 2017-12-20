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
                    <h2>Upload the paid receipt.</h2>
                    <div class="row center">
                        <a href="index.html"><img src="<?php echo base_url('public/images/barcode.png');?>" alt="Canvas Logo"></a>
                    </div class="row center">
                        <div style="font-size: 24px;font-weight: 700;">Pay to Bitcoin address :</div>
                        <p>1FtuDqexFsLktYvEc5TVxje2i1svAsdTpU</p>
                    <div >

                    </div>

                    <form id="register-form" name="register-form" class="nobottommargin" action="#" method="POST">
                        <div class="col_full">
                            <label></label><br>
                            <input id="input-1" type="file" class="file">
                        </div>

                        <div class="col_full nobottommargin">
                            <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register">Upload your payment receipt</button>
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
<script  type="text/javascript">
    $(document).on('ready', function() {
        $("#input-5").fileinput({showCaption: false});

        $("#input-6").fileinput({
            showUpload: false,
            maxFileCount: 10,
            mainClass: "input-group-lg",
            showCaption: true
        });

        $("#input-8").fileinput({
            mainClass: "input-group-md",
            showUpload: true,
            previewFileType: "image",
            browseClass: "btn btn-success",
            browseLabel: "Pick Image",
            browseIcon: "<i class=\"icon-picture\"></i> ",
            removeClass: "btn btn-danger",
            removeLabel: "Delete",
            removeIcon: "<i class=\"icon-trash\"></i> ",
            uploadClass: "btn btn-info",
            uploadLabel: "Upload",
            uploadIcon: "<i class=\"icon-upload\"></i> "
        });

        $("#input-9").fileinput({
            previewFileType: "text",
            allowedFileExtensions: ["txt", "md", "ini", "text", "pdf"],
            previewClass: "bg-warning",
            browseClass: "btn btn-primary",
            removeClass: "btn btn-default",
            uploadClass: "btn btn-default",
        });

        $("#input-10").fileinput({
            showUpload: false,
            layoutTemplates: {
                main1: "{preview}\n" +
                "<div class=\'input-group {class}\'>\n" +
                "   <div class=\'input-group-btn\'>\n" +
                "       {browse}\n" +
                "       {upload}\n" +
                "       {remove}\n" +
                "   </div>\n" +
                "   {caption}\n" +
                "</div>"
            }
        });

        $("#input-11").fileinput({
            maxFileCount: 10,
            allowedFileTypes: ["image", "video"]
        });

        $("#input-12").fileinput({
            showPreview: false,
            allowedFileExtensions: ["zip", "rar", "gz", "tgz"],
            elErrorContainer: "#errorBlock"
        });
    });

</script>
</body>
</html>