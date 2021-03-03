<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Bubba Billing</title>
        <meta content="" name="descriptison">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets/images/favicon.png" rel="icon">
        <link href="assets/images/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://use.fontawesome.com/d344ee9f73.js"></script>

        <!-- CSS Files -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

        <?php $this->load->view('common/seo');?>
        
    </head>
    <body>

        <!-- Navigation Start -->
        <div class="navigation-wrap start-header start-style" id="header">
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <a href="tel:6788660750" class="top_bar_link"><i class="fa fa-phone"></i>(678)866-0750</a>
                            <a href="mailto:sales@bubbabilling.com" class="top_bar_link"><i class="fa fa-envelope-o"></i>sales@bubbabilling.com</a>
                        </div>
                        <div class="col-md-2">
                            <span class="right">
                                <ul class="footer_social">
                                    <li class="footer_social_li">
                                        <a href="" target="_blank">
                                            <img src="assets/images/facebook.png" alt="Facebook" class="img-fluid footer_social_img">
                                        </a>
                                    </li>
                                    <li class="footer_social_li">
                                        <a href="" target="_blank">
                                            <img src="assets/images/twitter.png" alt="Twitter" class="img-fluid footer_social_img">
                                        </a>
                                    </li>
                                </ul>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-md navbar-light" id="mainNav">
                            
                                <a class="navbar-brand" href="#">
                                    <img src="assets/images/flashpik.png" alt="FlashPik">
                                </a>    
                                
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainnavbar" aria-controls="mainnavbar" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                
                                <div class="nav-menu collapse navbar-collapse" id="mainnavbar">
                                    <ul class="navbar-nav ml-auto py-4 py-md-0">
                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                            <a class="nav-link" href="index.html">Home</a>
                                        </li>
                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                            <a class="nav-link" href="joinfree.html">30 Day Risk Free Test Drive</a>
                                        </li>
                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                            <a class="nav-link" href="calculator.html">Calculators</a>
                                        </li>
                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                            <a class="nav-link" href="contact.html">Contact Us</a>
                                        </li>
                                        <li class="nav-item pl-4 pl-md-0 ml-0 ml-md-4">
                                            <a class="nav-link btn theme_btn btn_redius" href="<?php echo base_url(); ?>login">Login</a>
                                        </li>
                                    </ul>
                                </div>
                                
                            </nav>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navigation End -->

        <div class="content">
            <section class="gray_bg login_signup_section">
                <div class="container">
                    <div class="col-md-6 offset-md-3">
                        <div class="login_signup_tabs">
                        <?php if($is_expired){ ?>
                            <div class="forgot_form">
                                <h3>Reset Password link has expired!</h3>
                            </div>
                        <?php }else{ ?>
                            <form class="forgot_form">
                                <h3 class="form_title">Set New Password</h3>
                                <p class="form_title">
                                <?php echo $memberdata[0]['first_name']." ".$memberdata[0]['last_name']; ?>
                                </p>
                                <div class="form-group">
                                    <div class="form_position">
                                        <input type="password" name="main_password" id="main_password" class="form-control form_field" required>
                                        <label class="form_label">Password <span class="required">*</span></label>
                                        <a href="javascript:;" class="hide-password">Show</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form_position">
                                        <input type="password" name="confirm_password" id="confirm_password" class="form-control form_field" required>
                                        <label class="form_label">Confirm Password <span class="required">*</span></label>
                                        <a href="javascript:;" class="hide-password">Show</a>
                                    </div>
                                </div>
                                <input type="hidden" name="tokenid" id="tokenid" value="<?php echo $tokenid; ?>">
                                <div class="form-group">
                                    <input type="button" value="Reset password" class="form_btn user_resetpass_btn">
                                </div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    <?php $this->load->view('common/footer');?> 

    </body>
    <?php $this->load->view('common/footer-script');?>  
</html>