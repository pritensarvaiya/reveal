<link href="<?php echo base_url('assets/css/sidebar.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/admin-style-min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/media/css/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
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
        <a href="<?php echo site_url('view-student-attendance'); ?>" class="w3-bar-item w3-button active-menu">View
            Attendance</a>
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
                        <h2 class="mt-4">View Attendance</h2>
                    </li>
                </ol>

                <div class="container">
                    <?php if($error = $this->session->tempdata('error')) { ?>
                    <div class='alert alert-danger'>
                        <?php echo $error; ?>
                    </div>
                    <?php } ?>
                    <?php if($success = $this->session->tempdata('success')) { ?>
                    <div class='alert alert-success'>
                        <?php echo $success; ?>
                    </div>
                    <?php } ?>
                    <form action="<?php echo site_url('view-student-attendance'); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"><label class="form-label">Class</label>
                                    <select class="form-control" id="form_name" name="class">
                                        <option>---Select Class---</option>
                                        <?php  foreach ($class as $key => $value) { ?>
                                        <option value="<?= $value['class_name'].','.$value['medium'] ?>" <?php
                                            if(isset($class_name) && $class_name==$value['class_name'] &&
                                            $medium==$value['medium']){ echo 'selected' ; } ?>>
                                            <?= $value['class_name'].' '.$value['medium'] ?>
                                        </option>
                                        <?php }  ?>
                                    </select>
                                </div>
                            </div>
                        </div><br />
                        <button type="submit" name="get" class="btn btn-primary">Get</button>
                    </form>
                    <?php if($attendance_data): ?>
                    <div class="card my-5">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table id="myTable" class="table table-bordered table-hover">
                                    <thead class="">
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        <?php  foreach ($attendance_data as $value) { ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['student_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value['student_class'].' '.$value['student_medium']; ?>
                                                </td>
                                                <td>
                                                    <font <?php if($value['attendance_status'] == 'Present') { echo "color='green'";}elseif($value['attendance_status'] == 'Absent') { echo "color='red'";}?>><?php echo $value['attendance_status']; ?></font>
                                                </td>
                                                <td>
                                                    <?php $value['date']=date_create($value['date']); echo date_format($value['date'],"d-m-Y"); ?>
                                                </td>
                                            </tr>
                                        <?php $i++; ?>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
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