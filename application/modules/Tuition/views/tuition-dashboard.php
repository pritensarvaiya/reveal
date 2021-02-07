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
          <a href="<?php echo site_url('tuition-logout'); ?>"><button class="btn btn-outline-danger logout">Logout</button></a>
    </div>
  </header><!-- End Header  class="menu-active" -->

<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px; box-shadow: 0.50px 4px 10px 0.50px #cccccc;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">&times;</button>
  <a href="<?php echo site_url('tuition-dashboard'); ?>" class="w3-bar-item w3-button active-menu">Dashboard</a>
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
          <ol class="breadcrumb mb-4 mt-4">
                            <li class="breadcrumb-item active"><h2 class="mt-4">Dashboard</h2></li>
                        </ol>
            <div class="row my-3">
              
             <a href="<?php echo site_url('tuition-classes'); ?>" class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-success text-uppercase mb-1">Total Class</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $class; ?></div>
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
                      <div class="text-md font-weight-bold text-success text-uppercase mb-1">Total Teachers</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $teacher; ?></div>
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
                      <div class="text-md font-weight-bold text-success text-uppercase mb-1">Total Students</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800"><?php echo $student; ?></div>
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
                      <div class="text-md font-weight-bold text-success text-uppercase mb-1">Pending Massages</div>
                      <div class="h2 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                  </div>
                </div>
              </div>
            </a> 

        </div> 
        <?php if($success = $this->session->tempdata('success')) { ?>
              <div class='alert alert-success'>
                <?php echo $success; ?>
              </div>
          <?php } ?>
        <div class="row"> 
          <div class="col-md-2"></div>
          <div class="col-md-3 my-3">
            <div class="border-bottom border-success" style="width: 130px">
               <h5>Head name : </h5>
            </div>
            <div>
              <br><p><?php echo $head_fname." ".$head_lname; ?></p><br>
            </div>
            <div class="border-bottom border-success" style="width: 130px">
               <h5>Address : </h5>
            </div>
            <div>
              <br><p><?php echo $tuition_address; ?></p>
            </div>
           
          </div>
          <div class="col-md-3 my-3">
            
            <div class="border-bottom border-success" style="width: 200px">
               <h5>Mobile Number : </h5>
            </div>
            <div>
              <br><p><?php echo $tuition_mobile; ?></p>
            </div><br>
            <div class="border-bottom border-success" style="width: 100px">
               <h5>email : </h5>
            </div>
            <div>
              <br><p><?php echo $tuition_email; ?></p>
            </div>
            <br><br><br><br>
          </div>
          <div class="col-md-3 my-3">
          <div class="border-bottom border-success" style="width: 100px">
               <h5>City : </h5>
            </div>
            <div>
              <br><p><?php echo $tuition_city; ?></p>
            </div>
          </div>
        </div>
        
               
    </main>
  
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>