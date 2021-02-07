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
            <a href="<?php echo site_url('tuition-logout'); ?>"><button
                    class="btn btn-outline-danger logout">Logout</button></a>
        </div>
    </header><!-- End Header  class="menu-active" -->

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left"
        style="width:200px; box-shadow: 0.50px 4px 10px 0.50px #cccccc;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
        <a href="<?php echo site_url('tuition-dashboard'); ?>" class="w3-bar-item w3-button">Dashboard</a>
        <a href="<?php echo site_url('edit-tuition-profile'); ?>" class="w3-bar-item w3-button">Edit Profile</a>
        <a href="<?php echo site_url('add-tuition-classes'); ?>" class="w3-bar-item w3-button">Add Class</a>
        <a href="<?php echo site_url('tuition-classes'); ?>" class="w3-bar-item w3-button">Classes</a>
        <a href="<?php echo site_url('student-attendance'); ?>" class="w3-bar-item w3-button">Attendance</a>
        <a href="<?php echo site_url('view-student-attendance'); ?>" class="w3-bar-item w3-button">View Attendance</a>
        <a href="<?php echo site_url('add-tuition-teacher'); ?>" class="w3-bar-item w3-button">Add Teacher</a>
        <a href="<?php echo site_url('tuition-teacher-list'); ?>" class="w3-bar-item w3-button">Teachers List</a>
        <a href="<?php echo site_url('add-tuition-student'); ?>" class="w3-bar-item w3-button">Add Student</a>
        <a href="<?php echo site_url('tuition-student-list'); ?>" class="w3-bar-item w3-button">Students List</a>
        <a href="<?php echo site_url('announcements'); ?>" class="w3-bar-item w3-button">Announcements</a>
        <a href="<?php echo site_url('change-password'); ?>" class="w3-bar-item w3-button">Change Password</a>
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
                        <h2 class="mt-4">Update Teacher</h2>
                    </li>
                </ol>

                <div class="container">
                    <div class="card">
                        <div class="card-body my-4">
                            <form action="<?php echo site_url('Tuition/updateTeacher/'.$teacher_id) ?>" method="POST">
                                <div class="form-group">
                                    <label for="firstName">First Name </label>
                                    <input type="text" class="form-control" name="fname" id="firstName"
                                        value="<?php echo $teacher_fname; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('fname'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name </label>
                                    <input type="text" class="form-control" name="lname" id="lastName"
                                        value="<?php echo $teacher_lname; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('lname'); ?>
                                    </div>
                                </div>
                                <div class="form-group my-5">
                                    Male <input type="radio" name="gender" value="male" <?php if($teacher_gender == 'male'){ echo 'checked'; } ?>>
                                    Female <input type="radio" name="gender" value="female"<?php if($teacher_gender == 'female'){ echo 'checked'; } ?>>
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('gender'); ?>
                                    </div>
                                </div>
                                <div class="form-group"><label class="form-label">Classes : </label>
                                    <?php  foreach ($class as $key => $value) { ?>
                                        <br><input type="checkbox" name="class[]" value="<?= $value['class_name'].','.$value['medium'] ?>" <?php if(in_array($value['class_name'].','.$value['medium'],$selected_class)) { echo 'checked'; } ?>>&nbsp;&nbsp;<?= $value['class_name'].' '.$value['medium'] ?>
                                    <?php }  ?>
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('class'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mobileName">Mobile Name </label>
                                    <input type="text" class="form-control" name="mobile_number" id="mobileName"
                                        value="<?php echo $teacher_number; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('mobile_number'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $teacher_email; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Address </label>
                                    <textarea id="address" autocomplete="off" name="address" class="form-control"
                                        required><?php echo $teacher_address; ?></textarea>
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city">City </label>
                                    <input type="text" class="form-control" name="city" id="city" value="<?php echo $teacher_city; ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('city'); ?>
                                    </div>
                                </div>

                                <br /><br />
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                            </form>
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