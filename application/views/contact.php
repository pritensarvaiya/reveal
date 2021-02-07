
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
                <li class="menu-active"><a href="<?php echo site_url('contact-us'); ?>">Contact</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- End Header  " -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>7 KailashPark Street, RK 360005, INDIA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+91 9586 6505 38</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@reveal.com</a></p>
            </div>
          </div>

        </div>
      </div>

      

      <div class="container">
        <?php if($success = $this->session->tempdata('success')) { ?>
                        <div class='alert alert-success'>
                            <?php echo $success; ?>
                        </div>
                    <?php } ?>
        <div class="form">
          <form action="contact-us" method="post" role="form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" value="<?= set_value('name'); ?>" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="text-danger my-1 err">
                    <?php echo form_error('name'); ?>
                </div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="text-danger my-1 err">
                    <?php echo form_error('email'); ?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" value="<?= set_value('subject'); ?>" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="text-danger my-1 err">
                    <?php echo form_error('subject'); ?>
                </div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" value="<?= set_value('message'); ?>" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="text-danger my-1 err">
                    <?php echo form_error('message'); ?>
                </div>
            </div>

            <div class="text-center"><button type="submit" name="submit" class="btn btn-primary">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->