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
        <a href="<?php echo site_url('student/student-dashboard'); ?>" class="w3-bar-item w3-button active-menu">Dashboard</a>
        <a href="<?php echo site_url('student/edit-student-profile'); ?>" class="w3-bar-item w3-button">Edit Profile</a>
        <a href="<?php echo site_url('student/view-student-attendance'); ?>" class="w3-bar-item w3-button">View Attendance</a>
        <a href="<?php echo site_url('student/view-announcements'); ?>" class="w3-bar-item w3-button">Announcements</a>
        <a href="<?php echo site_url('student/student-query'); ?>" class="w3-bar-item w3-button">Query</a>
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
                        <h2 class="mt-4">Dashboard</h2>
                    </li>
                </ol>

                <div class="container">
                    <?php if($success = $this->session->tempdata('success')) { ?>
                    <div class='alert alert-success'>
                        <?php echo $success; ?>
                    </div>
                    <?php } ?><br>
                    <div class="row my-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-3 my-3">
                        <div class="border-bottom border-success" style="width: 130px">
                            <h5>Name : </h5>
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_fname'].' '.$student_data['student_lname']; ?>
                            </p>
                        </div><br>
                        <div class="border-bottom border-success" style="width: 130px">
                            <h5>Address : </h5> 
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_address']; ?>
                            </p>
                        </div>
                        <div class="border-bottom border-success" style="width: 100px">
                            <h5>City : </h5>
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_city']; ?>
                            </p>
                        </div>

                    </div>
                    <div class="col-md-3 my-3">
                        <div class="border-bottom border-success" style="width: 200px">
                            <h5>Mobile Number : </h5>
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_number']; ?>
                            </p>
                        </div><br>
                        <div class="border-bottom border-success" style="width: 100px">
                            <h5>email : </h5>
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_email']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 my-3">
                    <div class="border-bottom border-success" style="width: 200px">
                            <h5>Gender : </h5>
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_gender']; ?>
                            </p>
                        </div>
                        <div class="border-bottom border-success" style="width: 200px">
                            <h5>Class : </h5>
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_class']; ?>
                            </p>
                        </div>
                        <div class="border-bottom border-success" style="width: 200px">
                            <h5>Medium : </h5>
                        </div>
                        <div>
                            <br>
                            <p>
                                <?php echo $student_data['student_medium']; ?>
                            </p>
                        </div>
                    </div>
                    </div>
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