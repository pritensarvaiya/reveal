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
            <a href="<?php echo site_url('admin/admin-logout'); ?>"><button
                    class="btn btn-outline-danger logout">Logout</button></a>
        </div>
    </header><!-- End Header  class="menu-active" -->

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left"
        style="width:200px; box-shadow: 0.50px 4px 10px 0.50px #cccccc;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
        <a href="<?php echo site_url('admin/admin-dashboard'); ?>"
            class="w3-bar-item w3-button active-menu">Dashboard</a>
        <a href="<?php echo site_url('admin/edit-admin-profile'); ?>" class="w3-bar-item w3-button">Edit Profile</a>
        <a href="<?php echo site_url('admin/view-tuition-list'); ?>" class="w3-bar-item w3-button">Tuition List</a>
        <a href="<?php echo site_url('admin/view-teacher-list'); ?>" class="w3-bar-item w3-button">Teacher List</a>
        <a href="<?php echo site_url('admin/view-student-list'); ?>" class="w3-bar-item w3-button">Student List</a>
        <a href="<?php echo site_url('admin/view-all-message'); ?>" class="w3-bar-item w3-button">View Massage</a>
        <a href="<?php echo site_url('admin/change-password'); ?>" class="w3-bar-item w3-button">Change Password</a>
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


                <div class="row my-3">

                    <a href="<?php echo site_url('tuition-classes'); ?>" class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">Total
                                            Active Users</div>
                                        <div class="h2 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $count_active_users ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo site_url('tuition-teacher-list'); ?>" class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">Total
                                            Tuition</div>
                                        <div class="h2 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $count_tuition; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo site_url('tuition-student-list'); ?>" class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">Total
                                            Teacher</div>
                                        <div class="h2 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $count_teacher; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">Total
                                            Student</div>
                                        <div class="h2 mb-0 font-weight-bold text-gray-800">
                                            <?php echo $count_student; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="container">
                    <?php if($success = $this->session->tempdata('success')) { ?>
                    <div class='alert alert-success'>
                        <?php echo $success; ?>
                    </div>
                    <?php } ?>
                    <div class="row my-5">
                        <div class="col-md-4 ml-md-5 my-3">
                            <center>
                                <img src="<?= base_url('images/admin/'.$admin_data['admin_id']).'.jpg' ?>" class="img-fluid rounded-circle profile-pic" alt="team-member">
                                <h3></h3>
                            </center>
                        </div>

                        <div class="col-md-3 my-3">

                            <div class="border-bottom border-success" style="width: 200px">
                                <h5>Admin Name : </h5>
                            </div>
                            <div>
                                <br>
                                <p><?= $admin_data['admin_fname'].' '.$admin_data['admin_lname']; ?></p>
                            </div><br>

                        </div>
                        <div class="col-md-3 my-3">
                            <div class="border-bottom border-success" style="width: 200px">
                                <h5>Mobile Number : </h5>
                            </div>
                            <div>
                                <br>
                                <p><?= $admin_data['admin_number'] ?></p>
                            </div><br>
                            <div class="border-bottom border-success" style="width: 100px">
                                <h5>email : </h5>
                            </div>
                            <div>
                                <br>
                                <p><?= $admin_data['admin_email'] ?></p>
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