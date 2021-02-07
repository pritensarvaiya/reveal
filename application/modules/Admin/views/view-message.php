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
        <a href="<?php echo site_url('admin/admin-dashboard'); ?>" class="w3-bar-item w3-butto">Dashboard</a>
        <a href="<?php echo site_url('admin/edit-admin-profile'); ?>" class="w3-bar-item w3-button">Edit Profile</a>
        <a href="<?php echo site_url('admin/view-tuition-list'); ?>" class="w3-bar-item w3-button">Tuition List</a>
        <a href="<?php echo site_url('admin/view-teacher-list'); ?>" class="w3-bar-item w3-button">Teacher List</a>
        <a href="<?php echo site_url('admin/view-student-list'); ?>" class="w3-bar-item w3-button">Student List</a>
        <a href="<?php echo site_url('admin/view-all-message'); ?>" class="w3-bar-item w3-button active-menu">View Massage</a>
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
                        <h2 class="mt-4">View Message</h2>
                    </li>
                </ol>

                <div class="container">
                    <form action="#" method='POST'>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="title">Name :</label>
                                    <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" disabled required value="<?= $name; ?>">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="title">Date :</label>
                                    <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" disabled required value="<?= date("d-m-Y", strtotime($timestamp)); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Email :</label>
                            <input type="text" placeholder="Enter Title" class="form-control" name="title" id="title" disabled required value="<?= $email; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="validationTextarea">Massage :</label>
                            <textarea class="form-control" name="message" id="validationTextarea"
                                placeholder="Type Your Message here. . ." disabled required rows='15'><?= $message; ?></textarea>
                        </div>
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