<link href="<?php echo base_url('assets/css/sidebar.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/admin-style-min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/media/css/piechart.css')?>" rel="stylesheet">
</head>

<body>

    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><a href="index.php" class="scrollto">Reve<span>al</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#topbar"><img src="assets/img/logo.png" alt=""></a>-->
            </div>
            <a href="<?php echo site_url('teacher/teacher-logout'); ?>"><button
                    class="btn btn-outline-danger logout">Logout</button></a>
        </div>
    </header><!-- End Header  class="menu-active" -->

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left"
        style="width:200px; box-shadow: 0.50px 4px 10px 0.50px #cccccc;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
        <a href="<?php echo site_url('teacher/teacher-dashboard'); ?>" class="w3-bar-item w3-button">Dashboard</a>
        <a href="<?php echo site_url('teacher/edit-teacher-profile'); ?>" class="w3-bar-item w3-button">Edit Profile</a>
        <a href="<?php echo site_url('teacher/student-attendance'); ?>" class="w3-bar-item w3-button">Attendance</a>
        <a href="<?php echo site_url('teacher/view-student-attendance'); ?>" class="w3-bar-item w3-button active-menu">View Attendance</a>
        <a href="<?php echo site_url('teacher/student-list'); ?>" class="w3-bar-item w3-button">Students List</a>
        <a href="<?php echo site_url('teacher/teacher-query'); ?>" class="w3-bar-item w3-button">Query</a>
        <a href="<?php echo site_url('teacher/change-password'); ?>" class="w3-bar-item w3-button">Change Password</a>
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
                        <h2 class="mt-4"><?= "Attendance of ".$student_fname.' '.$student_lname ?></h2>
                    </li>
                </ol>

                <div class="table-responsive-sm">
                    <div class="progressDiv">
                        <div class="statChartHolder">
                            <div class="progress-pie-chart" data-percent="<?php if($total_days==0){echo '0';}else{echo (100*$present_days)/$total_days;} ?>">
                                <!--Pie Chart -->
                                <div class="ppc-progress">
                                    <div class="ppc-progress-fill"></div>
                                </div>
                                <div class="ppc-percents">
                                    <div class="pcc-percents-wrapper">
                                        <span>%</span>
                                    </div>
                                </div>
                            </div>
                            <!--End Chart -->
                        </div>
                        <div class="statRightHolder">
                            <ul>
                                <li>
                                    <h3 class="blue"><?= $total_days ?></h3> <span>Total Days</span>
                                </li>
                                <li>
                                    <h3 class="purple"><?= $present_days ?></h3> <span>Present Days</span>
                                </li>
                            </ul>

                            <ul class="statsLeft">
                                <li>
                                
                                </li>
                            </ul>
                            <ul class="statsRight">
                                <li>
                                    
                                </li>
                                <li>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/media/js/loader.js') ?>"></script>
    <script>
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
      }

      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
      }
    </script>