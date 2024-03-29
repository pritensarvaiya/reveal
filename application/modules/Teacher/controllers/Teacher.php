<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MX_Controller {
	
    public function __construct() {
      parent::__construct();
        $this->load->model('Teacher_model');
      }
    
    public function index() {
      
      if($this->session->has_userdata('teacher_id')) {
          $tuition_data = $this->Teacher_model->myQuery('SELECT `tuition_name` FROM `tuition_head` WHERE `tuition_id`='.$this->session->userdata('tuition_id'));
          $user_data = $this->Teacher_model->fatchOne('tuition_teacher','teacher_id',$this->session->userdata('teacher_id'));
          $data['tuition_data'] = $tuition_data;
          $data['teacher_data'] = $user_data;
          $temp['title'] = 'Teacher Dashboard';
			    $this->load->view('header',$temp);
          $this->load->view('teacher-dashboard',$data);
          $this->load->view('footer');
      }
      elseif(isset($_POST['submit'])) {
        
        $data= array(
          'teacher_email'		=> 		$this->input->post('email'),
          'teacher_password'	=> 		do_hash($this->input->post('password'), 'ripemd160')
        );
        $database_data = $this->Teacher_model->fatchOne('tuition_teacher','teacher_email',$data['teacher_email']);
        if(isset($database_data) && $database_data['teacher_email'] == $data['teacher_email'] && $database_data['teacher_password'] == $data['teacher_password'] ) {
            
            $session_data = array(
              'tuition_id' => $database_data['tuition_id'],
              'teacher_id' => $database_data['teacher_id']
            );
            $this->session->set_userdata($session_data);
            $active_user_data = array(
              'tuition_id' => $database_data['tuition_id'],
              'user_id'    => $database_data['teacher_id'],
              'user_email' => $database_data['teacher_email']
            );
            if( $this->Teacher_model->insertData('active_users',$active_user_data) ) {
              redirect('teacher/teacher-dashboard');
            }
        }
        else {
          
          $this->session->set_tempdata('error','Invalid Email or Password',1);
          redirect('teacher/teacher-sign-in');
        }
      }
      else {
        $temp['title'] = 'Teacher Login';
			  $this->load->view('header',$temp);
        $this->load->view('teacher-login');
        $this->load->view('footer');
      }

    }

    public function dashboard() {

        if(!$this->session->has_userdata('teacher_id')) {
          redirect('teacher/teacher-sign-in');
        }
        else {
          $tuition_data = $this->Teacher_model->myQuery('SELECT `tuition_name` FROM `tuition_head` WHERE `tuition_id`='.$this->session->userdata('tuition_id'));
          $user_data = $this->Teacher_model->fatchOne('tuition_teacher','teacher_id',$this->session->userdata('teacher_id'));
          $data['tuition_data'] = $tuition_data;
          $data['teacher_data'] = $user_data;
          
          $temp['title'] = 'Teacher Dashboard';
			    $this->load->view('header',$temp);
          $this->load->view('teacher-dashboard',$data);
          $this->load->view('footer');
        }

    }
    
    public function teacherLogout() {
      
      if($this->session->has_userdata('teacher_id')) {
        $user_data = $this->Teacher_model->fatchOne('tuition_teacher','teacher_id',$this->session->userdata('teacher_id'));
        if( $this->Teacher_model->deleteData('active_users','user_email',$user_data['teacher_email']) ) {
          $this->session->unset_userdata('teacher_id');
          $this->session->unset_userdata('tuition_id');
          redirect('teacher/teacher-sign-in');
        }
        
      }
      else {
        redirect('teacher/teacher-sign-in');
      }
    }

    public function editTeacherProfile() {

      if(!$this->session->has_userdata('teacher_id')) {
        redirect('teacher/teacher-sign-in');
      }
      elseif(isset($_POST['submit'])) {

          //Validation Rules
          $this->form_validation->set_rules('fname','First Name','trim|required');
          $this->form_validation->set_rules('lname','Last Name','trim|required');
          $this->form_validation->set_rules('gender','Gender','required');
          $this->form_validation->set_rules('mobile_number','Mobile Number','trim|required|exact_length[10]');
          $this->form_validation->set_rules('email','Email','trim|required|valid_email');
          $this->form_validation->set_rules('address','Address','trim|required');
          $this->form_validation->set_rules('city','City','trim|required');
          
          if($this->form_validation->run() == FALSE){
            $temp['title'] = 'Edit Teacher Profile';
			      $this->load->view('header',$temp);
            $this->load->view('teacher/edit-teacher-profile');
            $this->load->view('footer');
          }
          else {
            $data = array(
              'teacher_fname'		=> 		$this->input->post('fname'),
              'teacher_lname'		=> 		$this->input->post('lname'),
              'teacher_gender'	=>		$this->input->post('gender'),
              'teacher_number'	=> 		$this->input->post('mobile_number'),
              'teacher_email'		=> 		$this->input->post('email'),
              'teacher_address'	=> 		$this->input->post('address'),
              'teacher_city'		=>		$this->input->post('city')
            );
            

            $filter_data = xss_clean($data);
            if($this->Teacher_model->updateData("tuition_teacher",'teacher_id',$this->session->userdata('teacher_id'),$filter_data)) {
              $this->session->set_tempdata('success','Profile Updated successfully',1);
              redirect('teacher/teacher-dashboard');
            }
			}

      }
      else {

        $data = $this->Teacher_model->fatchOne('tuition_teacher','teacher_id',$this->session->userdata('teacher_id'));
        $temp['title'] = 'Edit Tuition Teacher';
			  $this->load->view('header',$temp);
        $this->load->view('edit-tuition-teacher',$data);
        $this->load->view('footer');

      }

    } 

    public function studentAttendance() {
        
        if(!$this->session->has_userdata('teacher_id')) {
          redirect('teacher/teacher-sign-in');
        }
        elseif(isset($_POST['get'])) {
            
            //Validation Rules
            $this->form_validation->set_rules('date','Date','trim|required');
            $this->form_validation->set_rules('class','Class','trim|required');
            
            if($this->form_validation->run() == FALSE){
              $data['class'] = $this->Teacher_model->myQuery("SELECT `teacher_class` FROM `tuition_teacher` WHERE `tuition_id`=".$this->session->userdata('tuition_id')." AND `teacher_id`=".$this->session->userdata('teacher_id'));
              $data['class'] = explode('|',$data['class'][0]['teacher_class']);
              $data['user_data'] = 0;
              $temp['title'] = 'Student Attendance';
			        $this->load->view('header',$temp);
              $this->load->view('teacher/student-attendance',$data);
              $this->load->view('footer');
            }
            else {
              $data['date'] = $this->input->post('date');
              $arr = explode(',',$this->input->post('class'));
              $data['class_name'] = $arr[0];
              $data['medium'] = $arr[1];
              if( $this->Teacher_model->myQuery(" SELECT * From `student_attendance` WHERE `tuition_id`=".$this->session->userdata('tuition_id')." AND `student_class`='".$arr[0]."' AND `student_medium`='".$arr[1]."' AND `date`='".$data['date']."' ORDER BY `timestamp`") ) {
                $this->session->set_tempdata('error','Attendance Allready Taken',1);
                redirect('teacher/student-attendance');
              }
              else {
                $data['user_data'] = $this->Teacher_model->myQuery(" SELECT `student_fname`,`student_lname`,`student_class`,`student_medium`,`student_id` From `tuition_student` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$arr[0]."' AND `student_medium`='".$arr[1]."' ORDER BY `timestamp`");
                $data['class'] = $this->Teacher_model->myQuery("SELECT `teacher_class` FROM `tuition_teacher` WHERE `tuition_id`=".$this->session->userdata('tuition_id')." AND `teacher_id`=".$this->session->userdata('teacher_id'));
                $data['class'] = explode('|',$data['class'][0]['teacher_class']);
                $temp['title'] = 'Student Attendance';
			          $this->load->view('header',$temp); 
                $this->load->view('student-attendance',$data);
                $this->load->view('footer');
              }
            }
        }
        elseif(isset($_POST['submit'])) {

            $date = $this->Teacher_model->myQuery(" SELECT `attendance_id`,`date` FROM `student_attendance` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$this->input->post('class_name')."' AND `student_medium`='".$this->input->post('medium')."' ORDER BY `timestamp`");
            foreach ($date as $value) {
              if(!(date('Y-m-d',strtotime('-1 Monday')) <= $value['date'])) {
                $this->Teacher_model->deleteData('student_attendance','attendance_id',$value['attendance_id']);
              }
            }
            $student_data = $this->Teacher_model->myQuery(" SELECT `total_days`,`present_days`,`student_id` From `tuition_student` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$this->input->post('class_name')."' AND `student_medium`='".$this->input->post('medium')."' ORDER BY `timestamp`");
            foreach ($student_data as $student) {
              $data = array(
                'total_days' => $student['total_days']+1
              );
              $this->Teacher_model->updateData('tuition_student','student_id',$student['student_id'],$data);
            }
            foreach ($this->input->post('status') as $student_id) {
              $student = $this->Teacher_model->fatchOne('tuition_student','student_id',$student_id);
              $data = array(
                'present_days' => $student['present_days']+1
              );
              $this->Teacher_model->updateData('tuition_student','student_id',$student['student_id'],$data);
            }
            $data = array(
              'tuition_id' 		=> $this->session->userdata('id'),
              'student_class'		=> $this->input->post('class_name'),
              'student_medium' 	=> $this->input->post('medium'),
              'attendance_status' => implode(',',$this->input->post('status')),
              'date' 				=> $this->input->post('date')
            );
            $this->Teacher_model->insertData('student_attendance',$data);
            $this->session->set_tempdata('success','Attendance Taken Successfully',1);
            redirect('teacher/student-attendance');
          
        }
        else {
          $data['class'] = $this->Teacher_model->myQuery("SELECT `teacher_class` FROM `tuition_teacher` WHERE `tuition_id`=".$this->session->userdata('tuition_id')." AND `teacher_id`=".$this->session->userdata('teacher_id'));
          $data['class'] = explode('|',$data['class'][0]['teacher_class']);
          $data['user_data'] = 0;
          $temp['title'] = 'Student Attendance';
			    $this->load->view('header',$temp); 
			    $this->load->view('student-attendance',$data);
			    $this->load->view('footer');
        }
    }

    public function viewStudentAttendance() {

      if(!$this->session->has_userdata('teacher_id')) {
        redirect('teacher/teacher-sign-in');
      }
      elseif(isset($_POST['get'])) {
          //Validation Rules
          $this->form_validation->set_rules('class','Class','trim|required');
          
          if($this->form_validation->run() == FALSE){
            $data['class'] = $this->Teacher_model->myQuery("SELECT `teacher_class` FROM `tuition_teacher` WHERE `tuition_id`=".$this->session->userdata('tuition_id')." AND `teacher_id`=".$this->session->userdata('teacher_id'));
            $data['class'] = explode('|',$data['class'][0]['teacher_class']);
            $data['student_data'] = 0;
            $temp['title'] = 'View Student Attendance';
			      $this->load->view('header',$temp);
            $this->load->view('view-student-attendance',$data);
            $this->load->view('footer');
          }
          else {

            $arr = explode(',',$this->input->post('class'));
            if( $data['student_data'] = $this->Teacher_model->myQuery("SELECT * FROM `tuition_student` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$arr[0]."' AND `student_medium`='".$arr[1]."' ORDER BY `timestamp`") ) {
              $data['class'] = $this->Teacher_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
              $temp['title'] = 'View Student Attendance';
              $this->load->view('header',$temp);
              $this->load->view('view-student-attendance',$data);
              $this->load->view('footer');
            }
            else {
              $this->session->set_tempdata('error','no data found',1);
              redirect('teacher/view-student-attendance');
            }
          }
      }
      else {
        $data['class'] = $this->Teacher_model->myQuery("SELECT `teacher_class` FROM `tuition_teacher` WHERE `tuition_id`=".$this->session->userdata('tuition_id')." AND `teacher_id`=".$this->session->userdata('teacher_id'));
        $data['class'] = explode('|',$data['class'][0]['teacher_class']);
        $data['student_data'] = 0;
        $temp['title'] = 'View Student Attendance';
			  $this->load->view('header',$temp); 
			  $this->load->view('view-student-attendance',$data);
			  $this->load->view('footer');
      }
    }

    public function viewattendance($id) {

      if(!$this->session->has_userdata('teacher_id')) {
        redirect('teacher/teacher-sign-in');
      }
      else {
        $student_attendance = $this->Teacher_model->fatchOne('tuition_student','student_id',$id);
        $this->load->view('header');
        $this->load->view('view-attendance',$student_attendance);
        $this->load->view('footer');
      }
    }
    public function studentList() {

      if(!$this->session->has_userdata('teacher_id')) {
        redirect('teacher/teacher-sign-in');
      }
      else {
        $user_data = $this->Teacher_model->myQuery('SELECT * From `tuition_student` WHERE `tuition_id`='.$this->session->userdata('tuition_id'));
        $data["class_data"] = $user_data;
        $temp['title'] = 'Tuition Student List';
			  $this->load->view('header',$temp); 
        $this->load->view('tuition-student-list',$data);
        $this->load->view('footer');
      }
    }

    public function teacherQuery() {

        if(!$this->session->has_userdata('teacher_id')) {
          redirect('teacher/teacher-sign-in');
        }
        elseif(isset($_POST['submit'])) {
            $user = $this->Teacher_model->fatchOne('tuition_teacher','teacher_id',$this->session->userdata('teacher_id'));
            $data = array(
              'tuition_id'=>	$this->session->userdata('tuition_id'),
              'user_id'   =>  $this->session->userdata('teacher_id'),
              'user_name' =>  $user['teacher_fname'].' '. $user['teacher_lname'],
              'user_email'=>  $user['teacher_email'],
              'title'		=>	$this->input->post('title'),
              'message'	=>	$this->input->post('message')
            );
            if($this->Teacher_model->insertData('query',$data)) {
              $this->session->set_tempdata('success','Message Send',1);
              redirect('teacher/teacher-query');
            }
        }
        else {

          $temp['title'] = 'Teacher Query';
          $this->load->view('header',$temp); 
          $this->load->view('teacher-query');
          $this->load->view('footer');
        }
    }

    public function changePassword() {
        
        if(!$this->session->has_userdata('teacher_id')) {
          redirect('teacher/teacher-sign-in');
        }
        elseif(isset($_POST['submit'])) {
            
            //Validation Rules
            $this->form_validation->set_rules('current_password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('conf_new_password', 'Confirm Password', 'trim|required|matches[new_password]');
            
            if($this->form_validation->run() == FALSE){
              $temp['title'] = 'Change Password';
			        $this->load->view('header',$temp);
              $this->load->view('change-password');
              $this->load->view('footer');
            }
            else {
              $data = array(			
                'teacher_password'	=>  do_hash($this->input->post('new_password'), 'ripemd160')
              );
              $user_data = $this->Teacher_model->fatchOne('tuition_teacher','teacher_id',$this->session->userdata('teacher_id'));
              if($user_data['teacher_password'] == do_hash($this->input->post('current_password'), 'ripemd160')) {
                if( $this->Teacher_model->updateData('tuition_teacher','teacher_id',$this->session->userdata('teacher_id'),$data) ) {
                  $this->session->set_tempdata('success','Password Change Successfully',1);
                  redirect('teacher/change-password');
                }
              }
              else {
                $this->session->set_tempdata('error','Invalid Current Password',1);
                redirect('teacher/change-password');
              }
            }
        }
        else {
            $temp['title'] = 'Change Password';
            $this->load->view('header',$temp); 
            $this->load->view('change-password');
            $this->load->view('footer');
        }
    }

}