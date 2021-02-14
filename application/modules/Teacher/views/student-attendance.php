<link href="<?php echo base_url('assets/css/sidebar.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/admin-style-min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/media/css/jquery-ui.css')?>" rel="stylesheet">
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
        <a href="<?php echo site_url('teacher/student-attendance'); ?>"
            class="w3-bar-item w3-button active-menu">Attendance</a>
        <a href="<?php echo site_url('teacher/view-student-attendance'); ?>" class="w3-bar-item w3-button">View
            Attendance</a>
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
                        <h2 class="mt-4">Attendance</h2>
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
                    <form action="<?php echo site_url('teacher/student-attendance'); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Select Date :</label>
                                    <input type="text" id="datepicker" placeholder="---Select Date---"
                                        autocomplete="off" class="form-control" name="date"
                                        value="<?php if(isset($date)){ echo $date; } ?>">
                                    <div class="text-danger my-1 err">
                                        <?php echo form_error('date'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label class="form-label">Class</label>
                                    <select class="form-control" id="form_name" name="class">
                                        <option>---Select Class---</option>
                                        <?php  foreach ($class as $value) { ?>
                                        <option value="<?= $value ?>">
                                            <?= $value ?>
                                        </option>
                                        <?php }  ?>
                                    </select>
                                </div>
                            </div>
                        </div><br />
                        <button type="submit" name="get" class="btn btn-primary">Get</button>
                    </form>
                    <?php if($user_data): ?>
                    <form action="<?php echo site_url('teacher/student-attendance'); ?>" method="POST">
                        <!-- <div class="card-body"> -->
                        <div class="table-responsive">
                            <table class="table table-hover my-5">
                                <thead>
                                    <tr>
                                        <th scope="col">Roll no</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Class</th>
                                        <th scope="col">Medium</th>
                                        <th scope="col">Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0 ?>
                                    <?php foreach ($user_data as $value) { $i++;?>
                                    <tr>
                                        <td>
                                            <?= $i ?>
                                            <input type="hidden" name="class_name" value="<?= $class_name ?>">
                                            <input type="hidden" name="medium" value="<?= $medium ?>">
                                            <input type="hidden" name="date" value="<?= $date ?>">
                                        </td>
                                        <td>
                                            <?= $value['student_lname'].' '.$value['student_fname'] ?>
                                        </td>
                                        <td>
                                            <?= $value['student_class'] ?>
                                        </td>
                                        <td>
                                            <?= $value['student_medium'] ?>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="status[]" checked
                                                    value="<?= $value['student_id'] ?>" id="myCheck<?= $i ?>"
                                                    onclick="myFunction(<?= $i ?>)">
                                                <div class="ml-4 ">
                                                    <img src="<?= base_url('assets/img/present.png') ?>"
                                                        id="text<?= $i ?>" class="img-fluid" style="width: 30px">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        <!-- </div> -->
                    </form>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <script>
         function myFunction($id) {
        
            // Get the checkbox
            var checkBox = document.getElementById("myCheck"+$id);
            // Get the output text
            var text = "text";

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                document.getElementById(text.concat($id)).src = "../assets/img/present.png";
            } else {
                document.getElementById(text.concat($id)).src = "../assets/img/apsent.png";
            }
        }
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>