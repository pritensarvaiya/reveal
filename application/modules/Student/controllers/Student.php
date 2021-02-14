<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Student_model');
	}
	
	public function index() { 
		if($this->session->has_userdata('student_id')) {
			
			$data['student_data'] = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
			$temp['title'] = 'Student dashboard';
			$this->load->view('header',$temp);
			$this->load->view('student-dashboard',$data);
			$this->load->view('footer');
		}
		elseif(isset($_POST['submit'])) {
			$data= array(
				'student_email'		=> 		$this->input->post('email'),
				'student_password'	=> 		do_hash($this->input->post('password'), 'ripemd160')
			);
			$database_data = $this->Student_model->fatchOne('tuition_student','student_email',$data['student_email']);
			if(isset($database_data) && $database_data['student_email'] == $data['student_email'] && $database_data['student_password'] == $data['student_password'] ) {
				  
				$session_data = array(
					'tuition_id' => $database_data['tuition_id'],
					'student_id' => $database_data['student_id']
				);
				$this->session->set_userdata($session_data);
				$active_user_data = array(
					'tuition_id' => $database_data['tuition_id'],
					'user_id'    => $database_data['student_id'],
					'user_email' => $database_data['student_email']
				);
				if( $this->Student_model->insertData('active_users',$active_user_data) ) {
					redirect('student/student-dashboard'); 
				}
			}
			else {
				$this->session->set_tempdata('error','Invalid Email or Password',1);
				redirect('student/student-sign-in');
			}
		}
		else {
			$temp['title'] = 'Student Login';
			$this->load->view('header',$temp);
        	$this->load->view('student-login');
        	$this->load->view('footer');
		}
	}

	public function dashboard() {
		if(!$this->session->has_userdata('student_id')) {
			redirect('student/student-sign-in');
		}
		else { 
			$user_data = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
			$data['student_data'] = $user_data;
			$temp['title'] = 'Student Dashboard';
			$this->load->view('header',$temp);
			$this->load->view('student-dashboard',$data);
			$this->load->view('footer');
		}
	}

	public function editStudentProfile() {
		if(!$this->session->has_userdata('student_id')) {
			redirect('student/student-sign-in');
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
			  $temp['title'] = 'Edit Student Profile';
			  $this->load->view('header',$temp);
			  $this->load->view('student/edit-student-profile');
			  $this->load->view('footer');
			}
			else {
			  $data = array(
				'student_fname'		=> 		$this->input->post('fname'),
				'student_lname'		=> 		$this->input->post('lname'),
				'student_gender'	=>		$this->input->post('gender'),
				'student_number'	=> 		$this->input->post('mobile_number'),
				'student_email'		=> 		$this->input->post('email'),
				'student_address'	=> 		$this->input->post('address'),
				'student_city'		=>		$this->input->post('city')
			  );
			  
  
			  $filter_data = xss_clean($data);
			  if($this->Student_model->updateData("tuition_student",'student_id',$this->session->userdata('student_id'),$filter_data)) {
				$this->session->set_tempdata('success','Profile Updated successfully',1);
				redirect('student/student-dashboard');
			  }
			}
		}
		else {
			$data = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
			$temp['title'] = 'Edit Tuition Student';
			$this->load->view('header',$temp);
			$this->load->view('edit-tuition-student',$data);
			$this->load->view('footer');
		}
	}

	public function viewStudentAttendance() {
		if(!$this->session->has_userdata('student_id')) {
			redirect('student/student-sign-in');
		}
		else {
			$data = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
			$temp['title'] = 'View Student Attendance';
			$this->load->view('header',$temp); 
			$this->load->view('view-student-attendance',$data);
			$this->load->view('footer');
		}
	}

	public function studentLogout() {
		if($this->session->has_userdata('student_id')) {
			$user_data = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
			if( $this->Student_model->deleteData('active_users','user_email',$user_data['student_email']) ) {
			  $this->session->unset_userdata('student_id');
			  $this->session->unset_userdata('tuition_id');
			  redirect('student/student-sign-in');
			}
			
		  }
		  else {
			redirect('student/student-sign-in');
		  }
	}

	public function viewAnnouncements() {
		if(!$this->session->has_userdata('student_id')) {
			redirect('student/student-sign-in');
		}
		else {
			$student_data = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
			$data['announcement_data'] = $this->Student_model->myQuery("SELECT `announcements_id`,`title`,`message`,`timestamp` FROM `announcements` WHERE `tuition_id`=".$this->session->userdata('tuition_id')." AND `send_to`='".$student_data['student_class']."' AND `medium`='".$student_data['student_medium']."' ORDER BY timestamp");
			$temp['title'] = 'View Announcement';
			$this->load->view('header',$temp);
			$this->load->view('view-announcement',$data);
			$this->load->view('footer');
		}
	}

	public function getAnnouncement($id) {
		if(!$this->session->has_userdata('student_id')) {
			redirect('student/student-sign-in');
		}
		else {
			$data = $this->Student_model->fatchOne('announcements','announcements_id',$id);
			$temp['title'] = 'Announcement';
			$this->load->view('header',$temp);
			$this->load->view('announcement',$data);
			$this->load->view('footer');
		}
	}

	public function studentQuery() {
		if(!$this->session->has_userdata('student_id')) {
			redirect('student/student-sign-in');
		}
		elseif(isset($_POST['submit'])) {
            $user = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
            $data = array(
              'tuition_id'	=>		$this->session->userdata('tuition_id'),
              'user_id'   	=>    	$this->session->userdata('student_id'),
              'user_name' 	=>    	$user['student_fname'].' '. $user['student_lname'],
              'user_email'	=>    	$user['student_email'],
              'title'	  	=>		$this->input->post('title'),
              'message'	  	=>		$this->input->post('message')
            );
            if($this->Student_model->insertData('query',$data)) {
              $this->session->set_tempdata('success','Message Send',1);
              redirect('student/student-query');
            }
        }
        else {

			$temp['title'] = 'Student Query';
			$this->load->view('header',$temp); 
          $this->load->view('student-query');
          $this->load->view('footer');
		}
		
	}

	public function changePassword() {
		if(!$this->session->has_userdata('student_id')) {
			redirect('student/student-sign-in');
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
                'student_password'	=>  do_hash($this->input->post('new_password'), 'ripemd160')
              );
              $user_data = $this->Student_model->fatchOne('tuition_student','student_id',$this->session->userdata('student_id'));
              if($user_data['student_password'] == do_hash($this->input->post('current_password'), 'ripemd160')) {
                if( $this->Student_model->updateData('tuition_student','student_id',$this->session->userdata('student_id'),$data) ) {
                  $this->session->set_tempdata('success','Password Change Successfully',1);
                  redirect('student/change-password');
                }
              }
              else {
                $this->session->set_tempdata('error','Invalid Current Password',1);
                redirect('student/change-password');
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