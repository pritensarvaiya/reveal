</head>
<body>
<!--Top Bar-->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">info.priten@gmail.com</a>
            <i class="fa fa-phone"></i>+91 958 665 0538
        </div>
        <div class="social-links float-right">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        </div>
    </div>
</section><!-- End Top Bar-->


<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <h1><a href="<?php echo site_url('home'); ?>" class="scrollto">Reve<span>al</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#topbar"><img src="assets/img/logo.png" alt=""></a>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
                <li><a href="<?php echo site_url('services'); ?>">Services</a></li>
                <li><a href="<?php echo site_url('about-us'); ?>">About Us</a></li>
                <li><a href="<?php echo site_url('contect-us'); ?>">Contact</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- End Header  " -->
<div class="container">
    <center>
        <div class="row my-3">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body text-left">
                        <h5 class="card-title text-center">Sign In</h5>
                        <?php if($error = $this->session->tempdata('error')) { ?>
                            <div class='alert alert-danger'>
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>   
                        <form class="form-signin" action="<?php echo site_url('teacher/teacher-sign-in'); ?>" method="POST">

                            <div class="form-label-group">
                                <input type="email" name="email" id="inputemail" class="form-control"
                                    placeholder="Email Address" required autofocus value="">
                                <div class="text-danger my-1 err">
                                </div>
                                <label for="inputemail">Email Address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control"
                                    placeholder="Password" required value="">
                                <div class="text-danger my-1 err">
                                </div>
                                <label for="inputPassword">Password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase my-4" type="submit"
                                name="submit">Sign
                                in</button>
                            <div class="text-center my-3"><a href="#">Forgot Password?</a></div>
                            <hr class="my-4">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>