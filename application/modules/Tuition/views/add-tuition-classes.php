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
        <a href="<?php echo site_url('add-tuition-classes'); ?>" class="w3-bar-item w3-button active-menu">Add Class</a>
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
                        <h2 class="mt-4">Add Class</h2>
                    </li>
                </ol>

                <div class="container">
                <?php if($error = $this->session->tempdata('error')) { ?>
                    <div class='alert alert-danger'>
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                    <div class="card">
                        <div class="card-body my-4">
                            <form action="<?php echo site_url('Tuition/addClasses') ?>" method="POST">
                                <div class="form-group"><label class="form-label">Classes</label>
                                    <select class="form-control" id="form_name" name="classname" >
                                    <option>---Select Class---</option>
                                     <option value="1st">1st</option>
                                     <option value="2nd">2nd</option> 
                                     <option value="3rd">3rd</option>
                                     <option value="4th">4th</option>
                                     <option value="5th">5th</option>
                                     <option value="6th">6th</option>
                                     <option value="7th">7th</option>
                                     <option value="8th">8th</option>
                                     <option value="9th">9th</option>
                                     <option value="10th">10th</option>
                                     <option value="11th Commerce">11th Commerce</option>
                                     <option value="12th Commerce">12th Commerce</option>
                                     <option value="11th Science">11th Science</option>
                                     <option value="12th Science">12th Science</option>
                                    </select>
                                </div>
                                <div class="form-group my-5">
                                    Gujarati <input type="radio" name="medium" id="fees" value="Gujarati">
                                    English <input type="radio" name="medium" id="fees" value="English">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('medium'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fees">Fees </label>
                                    <input type="text" class="form-control" name="fees" id="fees" value="">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('fees'); ?>
                                    </div>
                                </div>
                                <br/><br/>
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