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
        <a href="<?php echo site_url('student/edit-student-profile'); ?>" class="w3-bar-item w3-button active-menu">Edit
            Profile</a>
        <a href="<?php echo site_url('student/view-student-attendance'); ?>" class="w3-bar-item w3-button">View
            Attendance</a>
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
                        <h2 class="mt-4">Edit Profile</h2>
                    </li>
                </ol>

                <div class="container">
                    <div class="row">

                        <div class="col-md-1"></div>
                        <div class="col-md-10">

                            <form action="<?php echo site_url('student/edit-student-profile') ?>" method="POST">

                                <div class="form-group">
                                    <label for="firstName">First Name </label>
                                    <input type="text" class="form-control" name="fname" id="firstName"
                                        value="<?php echo $student_fname; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('fname'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name </label>
                                    <input type="text" class="form-control" name="lname" id="lastName"
                                        value="<?php echo $student_lname; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('lname'); ?>
                                    </div>
                                </div>
                                <div class="form-group my-5">
                                    Male <input type="radio" name="gender" value="male"
                                        <?php if($student_gender == 'male'){ echo 'checked'; } ?>>
                                    Female <input type="radio" name="gender" value="female"
                                        <?php if($student_gender == 'female'){ echo 'checked'; } ?>>
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('gender'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobileName">Mobile Name </label>
                                    <input type="text" class="form-control" name="mobile_number" id="mobileName"
                                        value="<?php echo $student_number; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('mobile_number'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="<?php echo $student_email; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address </label>
                                    <textarea id="address" autocomplete="off" name="address" class="form-control"
                                        placeholder="Address" required><?php echo $student_address; ?></textarea>
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city">City </label>
                                    <input type="text" class="form-control" name="city" id="city"
                                        value="<?php echo $student_city; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('city'); ?>
                                    </div>
                                </div><br>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                        <div class="col-md-1"></div>
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