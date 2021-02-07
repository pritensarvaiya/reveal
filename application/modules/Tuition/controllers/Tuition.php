<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tuition extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Tuition_model');
		$this->load->library('upload');
        $this->load->library('image_lib');
	}
	
	public function index() {
		if($this->session->has_userdata('id')) {
			$user_data = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
			$this->load->view('header');
			$this->load->view('tuition-dashboard',$user_data);
			$this->load->view('footer');
		}
		elseif(isset($_POST['submit'])) {
			$data= array(
				'tuition_email'		=> 		$this->input->post('email'),
				'tuition_password'	=> 		do_hash($this->input->post('password'), 'ripemd160')
			);
			$database_data = $this->Tuition_model->fatchOne('tuition_head','tuition_email',$data['tuition_email']);
			if(isset($database_data) && $database_data['tuition_email'] == $data['tuition_email'] && $database_data['tuition_password'] == $data['tuition_password'] ) {
				$session_data = array(
					'id' => $database_data['tuition_id'],
				);
				$this->session->set_userdata($session_data);
				$active_user_data = array(
					'tuition_id' => $database_data['tuition_id'],
					'user_id'    => $database_data['tuition_id'],
					'user_email' => $database_data['tuition_email']
				);
				if( $this->Tuition_model->insertData('active_users',$active_user_data) ) {
					redirect('tuition-dashboard');
				}
			}
			else {
				$this->session->set_tempdata('error','Invalid Email or Password',1);
				redirect('tuition-sign-in');
			}
		}
		else {
			$this->load->view('header');
			$this->load->view('tuition-login');
			$this->load->view('footer');
		}
	}
	public function register() {
		if($this->session->has_userdata('id')) {
			$user_data = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
			$this->load->view('header');
			$this->load->view('tuition-dashboard',$user_data);
			$this->load->view('footer');
		}
		elseif(isset($_POST['submit'])) {
			//Validation Rules
			$this->form_validation->set_rules('fname','First Name','trim|required');
			$this->form_validation->set_rules('lname','Last Name','trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('mobile_number','Mobile Number','trim|required|exact_length[10]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('tuition_name','Tuition name','trim|required');
			$this->form_validation->set_rules('address','Address','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			
			if($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('tuition-register');
				$this->load->view('footer');
			}
			else {
				$data = array(
					'head_fname'		=> 		$this->input->post('fname'),
					'head_lname'		=> 		$this->input->post('lname'),
					'tuition_password'	=> 		do_hash($this->input->post('password'), 'ripemd160'),
					'tuition_mobile'	=> 		$this->input->post('mobile_number'),
					'tuition_email'		=> 		$this->input->post('email'),
					'tuition_name'		=> 		$this->input->post('tuition_name'),
					'tuition_address'	=> 		$this->input->post('address'),
					'tuition_city'		=>		$this->input->post('city')
				);
				

				$filter_data = xss_clean($data);
				if($this->Tuition_model->insertData("tuition_head",$filter_data)) {
					$this->session->set_tempdata('success','Account created Successfully',1);
					redirect('tuition-sign-in');
				}
			}
		}
		else {
			$this->load->view('header');
			$this->load->view('tuition-register');
			$this->load->view('footer');
		}
	}

	public function dashboard() {
			if($this->session->has_userdata('id')) {
				$user_data = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
				$class = $this->Tuition_model->myQuery('SELECT `class_name` FROM `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id'));
				$teacher = $this->Tuition_model->myQuery('SELECT `teacher_fname` FROM `tuition_teacher` WHERE `tuition_id`='.$this->session->userdata('id'));
				$student = $this->Tuition_model->myQuery('SELECT `student_fname` FROM `tuition_student` WHERE `tuition_id`='.$this->session->userdata('id'));
				$user_data['class'] = sizeof($class);
				$user_data['teacher'] = sizeof($teacher);
				$user_data['student'] = sizeof($student);
				$this->load->view('header'); 
				$this->load->view('tuition-dashboard',$user_data);
				$this->load->view('footer');
			}
			else {
				redirect('tuition-sign-in');
			}
	}

	public function editProfile() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
			//Validation Rules
			$this->form_validation->set_rules('fname','First Name','trim|required');
			$this->form_validation->set_rules('lname','Last Name','trim|required');
			$this->form_validation->set_rules('mobile_number','Mobile Number','trim|required|exact_length[10]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('tuition_name','Tuition name','trim|required');
			$this->form_validation->set_rules('address','Address','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			
			if($this->form_validation->run() == FALSE){
				$user_data = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
				$this->load->view('header');
				$this->load->view('edit-tuition-profile',$user_data);
				$this->load->view('footer');
			}
			else {
				$data = array(
					'head_fname'		=> 		$this->input->post('fname'),
					'head_lname'		=> 		$this->input->post('lname'),
					'tuition_mobile'	=> 		$this->input->post('mobile_number'),
					'tuition_email'		=> 		$this->input->post('email'),
					'tuition_name'		=> 		$this->input->post('tuition_name'),
					'tuition_address'	=> 		$this->input->post('address'),
					'tuition_city'		=>		$this->input->post('city')
				);

				$filter_data = xss_clean($data);
				if($this->Tuition_model->updateData("tuition_head",'tuition_id',$this->session->userdata('id'),$filter_data)) {
					$this->session->set_tempdata('success','Profile Updated Successfully',1);
					redirect('tuition-dashboard');
				}
			}
		}
		else {
			$user_data = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
			$this->load->view('header'); 
			$this->load->view('edit-tuition-profile',$user_data);
			$this->load->view('footer');
		}
	}

	public function logout() {
		if($this->session->has_userdata('id')) {
			$user_data = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
			if( $this->Tuition_model->deleteData('active_users','user_email',$user_data['tuition_email']) ) {
				$this->session->unset_userdata('id');
				redirect('tuition-sign-in');
			}
			
		}
		else {
			redirect('tuition-sign-in');
		}
	}
	

	public function changePassword() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
			//Validation Rules
			$this->form_validation->set_rules('current_password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('conf_new_password', 'Confirm Password', 'trim|required|matches[new_password]');
			
			if($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('change-password');
				$this->load->view('footer');
			}
			else {
				$data = array(			
					'tuition_password'	=>  do_hash($this->input->post('new_password'), 'ripemd160')
				);
				$user_data = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
				if($user_data['tuition_password'] == do_hash($this->input->post('current_password'), 'ripemd160')) {
					if( $this->Tuition_model->updateData('tuition_head','tuition_id',$this->session->userdata('id'),$data) ) {
						$this->session->set_tempdata('success','Password Change Successfully',1);
						redirect('change-password');
					}
				}
				else {
					$this->session->set_tempdata('error','Invalid Current Password',1);
					redirect('change-password');
				}
			}
		}
		else {
			$this->load->view('header'); 
			$this->load->view('change-password');
			$this->load->view('footer');
		}
	}

	public function viewClasses() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			$user_data = $this->Tuition_model->myQuery('SELECT * From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id'));
			$data["class_data"] = $user_data;
			$this->load->view('header'); 
			$this->load->view('tuition-classes',$data);
			$this->load->view('footer');
		}

	}

	public function addClasses() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
			//Validation Rules
			$this->form_validation->set_rules('classname','Class Name','trim|required');
			$this->form_validation->set_rules('fees','Fees','trim|required');
			$this->form_validation->set_rules('medium','Medium','required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('add-tuition-classes');
				$this->load->view('footer');
			}
			else {
				$data = array(
					'tuition_id'	=>	$this->session->userdata('id'),			
					'class_name'	=>	$this->input->post('classname'),
					'medium'		=>	$this->input->post('medium'),
					'class_fees'	=>	$this->input->post('fees')
				);
				if( $this->Tuition_model->myQuery("SELECT * FROM `tuition_class` WHERE `tuition_id`='".$this->session->userdata('id')."' AND `class_name`='".$data['class_name']."' AND `medium`='".$data['medium']."'") ) 
				{
					$this->session->set_tempdata('error','Class allready added',1);
					redirect('add-tuition-classes');
				}
				elseif( $this->Tuition_model->insertData('tuition_class',$data) ) {
					$this->session->set_tempdata('success','Class add successfully',1);
					redirect('tuition-classes');
				}
			}
		}
		else {
			$this->load->view('header'); 
			$this->load->view('add-tuition-classes');
			$this->load->view('footer');
		}
	}

	public function getClass($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			$data = $this->Tuition_model->fatchOne('tuition_class','id',$id);
			$this->load->view('header'); 
			$this->load->view('update-class',$data);
			$this->load->view('footer');
		}
	}

	public function updateClass($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
			//Validation Rules
			$this->form_validation->set_rules('fees','Fees','trim|required');

			if($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('update-class');
				$this->load->view('footer');
			}
			else {
				$data = array(
					'tuition_id'	=>	$this->session->userdata('id'),			
					'class_fees'	=>	$this->input->post('fees')
				);
				if( $this->Tuition_model->updateData('tuition_class','id',$id,$data) ) {
					$this->session->set_tempdata('success','Class updated successfully',1);
					redirect('tuition-classes');
				}
			}
		}
	}

	public function deleteClass($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			if( $this->Tuition_model->deleteData('tuition_class','id',$id) ) {
				$this->session->set_tempdata('success','Class deleted successfully',1);
				redirect('tuition-classes');
			}
		}
	}

	public function addTeacher() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
			
            //Validation Rules
			$this->form_validation->set_rules('fname','First Name','trim|required');
			$this->form_validation->set_rules('lname','Last Name','trim|required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('mobile_number','Mobile Number','trim|required|exact_length[10]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('address','Address','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			
			if($this->form_validation->run() == FALSE){
				$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
				$this->load->view('header');
				$this->load->view('add-teacher',$data);
				$this->load->view('footer');
			}
			else {
				$tuition = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
				$data = array(
					'tuition_id'		=>		$this->session->userdata('id'),
					'tuition_name'		=>		$tuition['tuition_name'],
					'teacher_fname'		=> 		$this->input->post('fname'),
					'teacher_lname'		=> 		$this->input->post('lname'),
					'teacher_gender'	=>		$this->input->post('gender'),
					'teacher_class' 	=> 		implode('|',$this->input->post('class')),
					'teacher_password'	=> 		do_hash($this->input->post('password'), 'ripemd160'),
					'teacher_number'	=> 		$this->input->post('mobile_number'),
					'teacher_email'		=> 		$this->input->post('email'),
					'teacher_address'	=> 		$this->input->post('address'),
					'teacher_city'		=>		$this->input->post('city')
				);
				

				$filter_data = xss_clean($data);
				if($this->Tuition_model->insertData("tuition_teacher",$filter_data)) {
					$this->session->set_tempdata('success','Teacher add successfully',1);
					redirect('tuition-teacher-list');
				}
			}
		}
		else {
			$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
			$this->load->view('header'); 
			$this->load->view('add-teacher',$data);
			$this->load->view('footer');
		}
	} 

	public function teacherList() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			$user_data = $this->Tuition_model->myQuery('SELECT * From `tuition_teacher` WHERE `tuition_id`='.$this->session->userdata('id'));
			$data["class_data"] = $user_data;
			$this->load->view('header'); 
			$this->load->view('tuition-teacher-list',$data);
			$this->load->view('footer');
		}
	}

	public function getTeacher($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			$data = $this->Tuition_model->fatchOne('tuition_teacher','teacher_id',$id);
			$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
			$selected_class = explode('|',$data['teacher_class']);
			$data['selected_class'] = $selected_class;
			$this->load->view('header'); 
			$this->load->view('update-teacher',$data);
			$this->load->view('footer');
		}
	}

	public function updateTeacher($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
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
			
			if($this->form_validation->run() == FALSE) {
				
				$data = $this->Tuition_model->fatchOne('tuition_teacher','teacher_id',$id);
				$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
				$selected_class = explode('|',$data['teacher_class']);
				$data['selected_class'] = $selected_class;
				$this->load->view('header');
				$this->load->view('update-teacher',$data);
				$this->load->view('footer');
			}
			else {
				$data = array(
					'tuition_id'		=>		$this->session->userdata('id'),
					'teacher_fname'		=> 		$this->input->post('fname'),
					'teacher_lname'		=> 		$this->input->post('lname'),
					'teacher_gender'	=>		$this->input->post('gender'),
					'teacher_class' 	=> 		implode('|',$this->input->post('class')),
					'teacher_number'	=> 		$this->input->post('mobile_number'),
					'teacher_email'		=> 		$this->input->post('email'),
					'teacher_address'	=> 		$this->input->post('address'),
					'teacher_city'		=>		$this->input->post('city')
				);
				

				$filter_data = xss_clean($data);
				if($this->Tuition_model->updateData("tuition_teacher",'teacher_id',$id,$filter_data)) {
					$this->session->set_tempdata('success','Detailes updated successfully',1);
					redirect('tuition-teacher-list'); 
				}
			}
		}
	}

	public function deleteTeacher($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			if( $this->Tuition_model->deleteData('tuition_teacher','teacher_id',$id) ) {
				$this->session->set_tempdata('success','Teacher deleted successfully',1);
				redirect('tuition-teacher-list');
			}
		}
	}

	public function addStudent() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
            //Validation Rules
			$this->form_validation->set_rules('fname','First Name','trim|required');
			$this->form_validation->set_rules('lname','Last Name','trim|required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('classname','Class Name','trim|required');
			$this->form_validation->set_rules('medium','Medium','required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
			$this->form_validation->set_rules('mobile_number','Mobile Number','trim|required|exact_length[10]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('address','Address','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			
			if($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('add-tuition-student');
				$this->load->view('footer');
			}
			else {
				$tuition = $this->Tuition_model->fatchOne('tuition_head','tuition_id',$this->session->userdata('id'));
				$data = array(
					'tuition_id'		=>		$this->session->userdata('id'),
					'tuition_name'		=>		$tuition['tuition_name'],
					'student_fname'		=> 		$this->input->post('fname'),
					'student_lname'		=> 		$this->input->post('lname'),
					'student_gender'	=>		$this->input->post('gender'),
					'student_class'		=>		$this->input->post('classname'),
					'student_medium'	=>		$this->input->post('medium'),
					'student_password'	=> 		do_hash($this->input->post('password'), 'ripemd160'),
					'student_number'	=> 		$this->input->post('mobile_number'),
					'student_email'		=> 		$this->input->post('email'),
					'student_address'	=> 		$this->input->post('address'),
					'student_city'		=>		$this->input->post('city')
				);
				

				$filter_data = xss_clean($data);
				if($this->Tuition_model->insertData("tuition_student",$filter_data)) {
					$this->session->set_tempdata('success','Student add successfully',1);
					redirect('tuition-student-list');
				}
			}
		}
		else {
			$this->load->view('header'); 
			$this->load->view('add-tuition-student');
			$this->load->view('footer');
		}
	}

	public function studentList() {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			$user_data = $this->Tuition_model->myQuery('SELECT * From `tuition_student` WHERE `tuition_id`='.$this->session->userdata('id'));
			$data["class_data"] = $user_data;
			$this->load->view('header'); 
			$this->load->view('tuition-student-list',$data);
			$this->load->view('footer');
		}
	}

	public function getStudent($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			$data = $this->Tuition_model->fatchOne('tuition_student','student_id',$id);
			$this->load->view('header'); 
			$this->load->view('update-student',$data);
			$this->load->view('footer');
		}
	}

	public function updateStudent($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
			//Validation Rules
			$this->form_validation->set_rules('fname','First Name','trim|required');
			$this->form_validation->set_rules('lname','Last Name','trim|required');
			$this->form_validation->set_rules('gender','Gender','required');
			$this->form_validation->set_rules('classname','Class Name','trim|required');
			$this->form_validation->set_rules('medium','Medium','required');			
			$this->form_validation->set_rules('mobile_number','Mobile Number','trim|required|exact_length[10]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('address','Address','trim|required');
			$this->form_validation->set_rules('city','City','trim|required');
			
			if($this->form_validation->run() == FALSE){
				$data = $this->Tuition_model->fatchOne('tuition_student','student_id',$id);
				$this->load->view('header');
				$this->load->view('update-student',$data);
				$this->load->view('footer');
			}
			else {
				$data = array(
					'tuition_id'		=>		$this->session->userdata('id'),
					'student_fname'		=> 		$this->input->post('fname'),
					'student_lname'		=> 		$this->input->post('lname'),
					'student_gender'	=>		$this->input->post('gender'),
					'student_class'		=>		$this->input->post('classname'),
					'student_medium'	=>		$this->input->post('medium'),
					'student_number'	=> 		$this->input->post('mobile_number'),
					'student_email'		=> 		$this->input->post('email'),
					'student_address'	=> 		$this->input->post('address'),
					'student_city'		=>		$this->input->post('city')
				);
				

				$filter_data = xss_clean($data);
				if($this->Tuition_model->updateData("tuition_student","student_id",$id,$filter_data)) {
					$this->session->set_tempdata('success','Student updated successfully',1);
					redirect('tuition-student-list');
				}
			}
		}
	}

	public function deleteStudent($id) {
		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		else {
			if( $this->Tuition_model->deleteData('tuition_student','student_id',$id) ) {
				$this->session->set_tempdata('success','student deleted successfully',1);
				redirect('tuition-student-list');
			}
		}
	}

	public function studentAttendance() {

		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['get'])) {
			//Validation Rules
			$this->form_validation->set_rules('date','Date','trim|required');
			$this->form_validation->set_rules('class','Class','trim|required');
			
			if($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('student-attendance');
				$this->load->view('footer');
			}
			else {
				$data['date'] = $this->input->post('date');
				$arr = explode(',',$this->input->post('class'));
				$data['class_name'] = $arr[0];
				$data['medium'] = $arr[1];
				if( $this->Tuition_model->myQuery(" SELECT `student_name` From `student_attendance` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$arr[0]."' AND `student_medium`='".$arr[1]."' AND `date`='".$data['date']."' ORDER BY `timestamp`") ) {
					$this->session->set_tempdata('error','Attendance Allready Taken',1);
					redirect('student-attendance');
				}
				else {
					$data['user_data'] = $this->Tuition_model->myQuery(" SELECT `student_fname`,`student_lname`,`student_class`,`student_medium`,`student_id` From `tuition_student` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$arr[0]."' AND `student_medium`='".$arr[1]."' ORDER BY `timestamp`");
					$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
					$this->load->view('header'); 
					$this->load->view('student-attendance',$data);
					$this->load->view('footer');
				}
			}
		}
		elseif(isset($_POST['submit'])) {

			$user_data = $this->Tuition_model->myQuery(" SELECT `student_fname`,`student_lname`,`student_class`,`student_medium`,`student_id` From `tuition_student` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$this->input->post('class_name')."' AND `student_medium`='".$this->input->post('medium')."' ORDER BY `timestamp`");
			for ($i=0; $i < sizeof($user_data); $i++) { 
				$data = array(
					'tuition_id' 		=> $this->session->userdata('id'),
					'student_id' 		=> $user_data[$i]['student_id'],
					'student_name' 		=> $user_data[$i]['student_lname'].' '.$user_data[$i]['student_fname'],
					'student_class'		=> $user_data[$i]['student_class'],
					'student_medium' 	=> $user_data[$i]['student_medium'],
					'attendance_status' => $this->input->post($user_data[$i]['student_id']),
					'date' 				=> $this->input->post('date')
				);
				$this->Tuition_model->insertData('student_attendance',$data);
			}
			$this->session->set_tempdata('success','Attendance Taken Successfully',1);
			redirect('student-attendance');
			
		}
		else {
			$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
			$data['user_data'] = 0;
			$this->load->view('header'); 
			$this->load->view('student-attendance',$data);
			$this->load->view('footer');
		}
	}

	public function announcements() {

		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['submit'])) {
			$arr = explode(',',$this->input->post('class'));
			$data = array(
				'tuition_id'=>	$this->session->userdata('id'),
				'send_to'  	=>  $arr[0],
				'medium'	=>	$arr[1],
				'title'		=>	$this->input->post('title'),
				'message'	=>	$this->input->post('message')
			);
			if($this->Tuition_model->insertData('announcements',$data)) {
				$this->session->set_tempdata('success','Message Send',1);
				redirect('announcements');
			}
		}
		else {
			$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
			$this->load->view('header'); 
			$this->load->view('announcements',$data);
			$this->load->view('footer');
		}

	}

	public function viewStudentAttendance() {

		if(!$this->session->has_userdata('id')) {
			redirect('tuition-sign-in');
		}
		elseif(isset($_POST['get'])) {

			//Validation Rules
			$this->form_validation->set_rules('class','Class','trim|required');
			
			if($this->form_validation->run() == FALSE){
				$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
				$data['attendance_data'] = 0;
				$this->load->view('header');
				$this->load->view('view-student-attendance',$data);
				$this->load->view('footer');
			}
			else {

				$arr = explode(',',$this->input->post('class'));
				if( $data['attendance_data'] = $this->Tuition_model->myQuery("SELECT * FROM `student_attendance` WHERE `tuition_id`=".$this->session->userdata('id')." AND `student_class`='".$arr[0]."' AND `student_medium`='".$arr[1]."' ORDER BY `timestamp`") ) {
					$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
					$this->load->view('header');
					$this->load->view('view-student-attendance',$data);
					$this->load->view('footer');
				}
				else {
					$this->session->set_tempdata('error','no data found',1);
					redirect('view-student-attendance');
				}
			}
		}
		else {

			$data['class'] = $this->Tuition_model->myQuery('SELECT `class_name`,`medium` From `tuition_class` WHERE `tuition_id`='.$this->session->userdata('id').' ORDER BY `class_name`');
			$data['attendance_data'] = 0;
			$this->load->view('header'); 
			$this->load->view('view-student-attendance',$data);
			$this->load->view('footer');
		}

	}

} 