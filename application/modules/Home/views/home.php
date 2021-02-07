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
                <li class="menu-active"><a href="<?php echo site_url('home'); ?>">Home</a></li>
                <li><a href="<?php echo site_url('services'); ?>">Services</a></li>
                <li><a href="<?php echo site_url('about-us'); ?>">About Us</a></li>
                <li><a href="<?php echo site_url('contact-us'); ?>">Contact</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- End Header  " -->
<!-- ======= Intro Section ======= -->
<section id="intro">

    <div class="intro-content">
        <h2>Making <span>your ideas</span><br>happen!</h2>
        <div>
            <a href="<?php echo site_url('teacher/teacher-sign-in'); ?>" class="btn-get-started scrollto">For Teacher</a>
            <a href="<?php echo site_url('tuition-sign-in'); ?>" class="btn-projects scrollto">For Tution Admin</a>
            <a href="<?php echo site_url('student/student-sign-in'); ?>" class="btn-get-started scrollto">For Students</a>
        </div>
    </div>

    <div id="intro-carousel" class="owl-carousel">
        <div class="item" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/1.jpg'); ?>');"></div>
        <div class="item" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/2.jpg'); ?>');"></div>
        <div class="item" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/3.jpg'); ?>');"></div>
        <div class="item" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/4.jpg'); ?>');"></div>
        <div class="item" style="background-image: url('<?php echo base_url('assets/img/intro-carousel/5.jpg'); ?>');"></div>
    </div>

</section><!-- End Intro Section -->

<section id="about" class="wow fadeInUp" style="margin-left: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 about-img">
                <img src="<?php echo base_url('assets/img/about-img.jpg'); ?>" alt="">
            </div>

            <div class="col-lg-6 content">
                <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                    est
                    laborum.</h3>

                <ul>
                    <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</li>
                    <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                        velit.
                    </li>
                    <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis
                        aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat
                        nulla
                        pariatur.</li>
                </ul>

            </div>
        </div>

    </div>
</section><!-- End About Section -->