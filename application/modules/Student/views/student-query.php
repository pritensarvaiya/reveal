<link href="<?php echo base_url('assets/css/sidebar.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/admin-style-min.css')?>" rel="stylesheet">
</head>

<body>

    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><a href="index.php" class="scrollto">Reve<span>al</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#topbar"><img src="assets/img/logo.png" alt=""></a>-->
            </div>
            <a href="<?php echo site_url('student/student-logout'); ?>"><button
                    class="btn btn-outline-danger logout">Logout</button></a>
        </div>
    </header><!-- End Header  class="menu-active" -->

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left"
        style="width:200px; box-shadow: 0.50px 4px 10px 0.50px #cccccc;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
        <a href="<?php echo site_url('student/student-dashboard'); ?>" class="w3-bar-item w3-button">Dashboard</a>
        <a href="<?php echo site_url('student/edit-student-profile'); ?>" class="w3-bar-item w3-button">Edit Profile</a>
        <a href="<?php echo site_url('student/view-student-attendance'); ?>" class="w3-bar-item w3-button">View Attendance</a>
        <a href="<?php echo site_url('student/view-announcements'); ?>" class="w3-bar-item w3-button">Announcements</a>
        <a href="<?php echo site_url('student/student-query'); ?>" class="w3-bar-item w3-button active-menu">Query</a>
        <a href="<?php echo site_url('student/change-password'); ?>" class="w3-bar-item w3-button">Change Password</a>
    </div>

    <div class="w3-main" style="margin-left:200px">
        <div class="w3-teal">
            <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
        </div>

        <div class="w3-container">

            <main>
                <!-- Page Heading -->
                <ol class="breadcrumb mb-4 mt-md-4">
                    <li class="breadcrumb-item active">
                        <h2 class="mt-4">Query</h2>
                    </li>
                </ol>

                <div class="container">
                    <?php if($success = $this->session->tempdata('success')) { ?>
                        <div class='alert alert-success'>
                            <?php echo $success; ?>
                        </div>
                    <?php } ?>
                    <form action="<?= site_url('student/student-query') ?>" method='POST'>
                        <div class="form-group">
                            <label for="title">Title :</label>
                            <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" required value="<?php  ?>">
                            <div class="text-danger my-1 err">
                                <?php echo form_error('title'); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="validationTextarea">Massage :</label>
                            <textarea class="form-control" name="message" id="validationTextarea"
                                placeholder="Type Your Message here. . ." required rows='15'></textarea>
                            <div class="text-danger my-1 err">
                                <?php echo form_error('message'); ?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <script>
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
      }

      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
      }
    </script>