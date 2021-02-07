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
            <div class="col-md-12 col-lg-12 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body text-left">
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form class="form-signin" action="<?php echo site_url('Tuition/register'); ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-label-group">
                                        <input type="text" name="fname" autocomplete="off" id="firstname"
                                            class="form-control" placeholder="First name" required autofocus value="<?php echo set_value('fname'); ?>">
                                        <div class="text-danger my-1 err">
                                        <?php echo form_error('fname'); ?>
                                        </div>
                                        <label for="firstname">First name</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" name="lname" autocomplete="off" id="lastname"
                                            class="form-control" placeholder="Last name" required autofocus value="<?php echo set_value('lname'); ?>">
                                        <div class="text-danger my-1 err">
                                        <?php echo form_error('lname'); ?>
                                        </div>
                                        <label for="lastname">Last name</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" name="password" autocomplete="off" id="inputPassword"
                                            class="form-control" placeholder="Password" required value="<?php echo set_value('password'); ?>">
                                        <div class="text-danger my-1 err">
                                        <?php echo form_error('password'); ?>
                                        </div>
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" name="confirm_password" autocomplete="off"
                                            id="RepeatPassword" class="form-control" placeholder="Repeat Password"
                                            required value="<?php echo set_value('confirm_password'); ?>">
                                        <div class="text-danger my-1 err">
                                        </div>
                                        <div class="text-danger my-1 err">
                                        <?php echo form_error('confirm_password'); ?>
                                        </div>
                                        <label for="RepeatPassword">Repeat Password</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" name="mobile_number" autocomplete="off" id="number"
                                            class="form-control" placeholder="Phone number" required autofocus value="<?php echo set_value('mobile_number'); ?>">
                                        <div class="text-danger my-1 err">
                                        <?php echo form_error('mobile_number'); ?>
                                        </div>
                                        <label for="number">Phone number</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" name="email" autocomplete="off" id="email"
                                            class="form-control" placeholder="Email Address" required autofocus
                                            value="<?php echo set_value('email'); ?>">
                                        <div class="text-danger my-1 err">
                                        <?php echo form_error('email'); ?>
                                        </div>
                                        <label for="email">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-2 col-lg-2"></div>
                                <div class="col-sm-5 col-md-5 col-lg-5">
                                    <div class="form-label-group">
                                        <input type="text" name="tuition_name" autocomplete="off" id="classname"
                                            class="form-control" placeholder="Tuition name" required autofocus value="<?php echo set_value('tuition_name'); ?>">
                                        <div class="text-danger my-1 err">
                                        <?php echo form_error('tuition_name'); ?>
                                        </div>
                                        <label for="classname">Tuition name</label>
                                    </div>
                                    <div class="form-label-group">
                                        <textarea id="address" autocomplete="off" name="address" name="address"
                                            class="form-control" placeholder="Address" required autofocus><?php echo set_value('address'); ?></textarea>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" name="city" autocomplete="off" id="city" class="form-control"
                                            placeholder="City" required autofocus value="<?php echo set_value('city'); ?>">
                                            <div class="text-danger my-1 err">
                                            <?php echo form_error('city'); ?>
                                            </div>
                                        <label for="city">City</label>
                                    </div>                                   
                                </div>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase my-3" type="submit"
                                name="submit">Create
                                Account <span style="font-size: 20px;">&rarr;</span></button>
                            <hr class="my-4">
                        </form>
                        <div class="text-center"><a href="<?php echo site_url('tuition-sign-in'); ?>"><b>I am already
                                    member</b></a></div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>