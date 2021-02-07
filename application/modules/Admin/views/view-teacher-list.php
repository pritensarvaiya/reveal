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
            <a href="<?php echo site_url('admin/admin-logout'); ?>"><button
                    class="btn btn-outline-danger logout">Logout</button></a>
        </div>
    </header><!-- End Header  class="menu-active" -->

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left"
        style="width:200px; box-shadow: 0.50px 4px 10px 0.50px #cccccc;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
        <a href="<?php echo site_url('admin/admin-dashboard'); ?>" class="w3-bar-item w3-button">Dashboard</a>
        <a href="<?php echo site_url('admin/edit-admin-profile'); ?>" class="w3-bar-item w3-button">Edit Profile</a>
        <a href="<?php echo site_url('admin/view-tuition-list'); ?>" class="w3-bar-item w3-button">Tuition List</a>
        <a href="<?php echo site_url('admin/view-teacher-list'); ?>" class="w3-bar-item w3-button active-menu">Teacher List</a>
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
                        <h2 class="mt-4">Teacher List</h2>
                    </li>
                </ol>

                <div class="container">
                <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive-sm">
                            <table id="myTable" class="table table-bordered table-hover">
                        <thead class="">
                            <tr>
                                <th>S.no</th>
                                <th>Tuition Name</th>
                                <th>Teacher Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            <?php  foreach ($data as $value) { ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $value['tuition_name']; ?></td>
                                    <td><?php echo $value['teacher_fname'].' '.$value['teacher_lname']; ?></td>
                                    <td><?php echo $value['teacher_number']; ?></td>
                                    <td><?php echo $value['teacher_email']; ?></td>
                                    <td><?php echo $value['teacher_address']; ?></td>
                                    <td><?php echo $value['teacher_city']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php }  ?>
                        </tbody>
                    </table>
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