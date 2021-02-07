<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Admin_model');
	}
	
	public function index() { 
        if($this->session->has_userdata('admin_id')) {
			$data['count_active_user'] = sizeof($this->Admin_model->fatchAll('active_users'));
            $data['count_tuition'] = sizeof($this->Admin_model->fatchAll('tuition_head'));
            $data['count_teacher'] = sizeof($this->Admin_model->fatchAll('tuition_teacher'));
            $data['count_student'] = sizeof($this->Admin_model->fatchAll('tuition_student'));
            $data['admin_data']    = $this->Admin_model->fatchOne('admin','admin_id',$this->session->userdata('admin_id'));
            $this->load->view('header');
        	$this->load->view('dashboard',$data);
        	$this->load->view('footer');
		}
		elseif(isset($_POST['submit'])) {
			$data= array(
				'admin_email'		=> 		$this->input->post('email'),
                'admin_password'	=> 		do_hash($this->input->post('password'), 'ripemd160')
			);
			$database_data = $this->Admin_model->fatchOne('admin','admin_email',$data['admin_email']);
			if(isset($database_data) && $database_data['admin_email'] == $data['admin_email'] && $database_data['admin_password'] == $data['admin_password'] ) {
				  
				$session_data = array(
					'admin_id' => $database_data['admin_id']
				);
                $this->session->set_userdata($session_data);
                redirect('admin/admin-dashboard'); 
			}
			else {
				$this->session->set_tempdata('error','Invalid Email or Password',1);
				redirect('admin');
			}
		}
		else {
			$this->load->view('header');
        	$this->load->view('admin-sign-in');
        	$this->load->view('footer');
		}
    }

    public function dashboard() {
        if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
        }
        else {
			$data['count_active_users'] 	= sizeof($this->Admin_model->fatchAll('active_users'));
            $data['count_tuition'] 		= sizeof($this->Admin_model->fatchAll('tuition_head'));
            $data['count_teacher'] 		= sizeof($this->Admin_model->fatchAll('tuition_teacher'));
            $data['count_student'] 		= sizeof($this->Admin_model->fatchAll('tuition_student'));
            $data['admin_data']    		= $this->Admin_model->fatchOne('admin','admin_id',$this->session->userdata('admin_id'));
            $this->load->view('header');
        	$this->load->view('dashboard',$data);
        	$this->load->view('footer');
        }
    }

    public function adminLogout() {
        if($this->session->has_userdata('admin_id')) {
			$user_data = $this->Admin_model->fatchOne('admin','admin_id',$this->session->userdata('admin_id'));
			$this->session->unset_userdata('admin_id');
			redirect('admin');			
		  }
		  else {
			redirect('admin');
		  }
	}
	
	public function editAdminProfile() {
		if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
		}
		elseif(isset($_POST['submit'])) {
			$data = array(
				'admin_fname'		=> 		$this->input->post('fname'),
				'admin_lname'		=> 		$this->input->post('lname'),
				'admin_number'		=> 		$this->input->post('mobile_number'),
				'admin_email'		=> 		$this->input->post('email'),
			  );
			  
			  $filter_data = xss_clean($data);
			  if($this->Admin_model->updateData("admin",'admin_id',$this->session->userdata('admin_id'),$filter_data)) {
				$this->session->set_tempdata('success','Profile Updated successfully',1);
				redirect('admin/admin-dashboard');
			  }
		}
		else {
			$data = $this->Admin_model->fatchOne('admin','admin_id',$this->session->userdata('admin_id'));
			$this->load->view('header');
			$this->load->view('edit-admin',$data);
			$this->load->view('footer');
		}
	}

	public function viewTuitionList() {
		if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
		}
		else {
			$tuition['data'] = $this->Admin_model->fatchAll('tuition_head');
			$this->load->view('header');
			$this->load->view('view-tuition-list',$tuition);
			$this->load->view('footer');
		}
	}

	public function viewTeacherList() {
		if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
		}
		else {
			$teacher['data'] = $this->Admin_model->myQuery("SELECT * FROM `tuition_teacher` ORDER BY `tuition_id` ");
			$this->load->view('header');
			$this->load->view('view-teacher-list',$teacher);
			$this->load->view('footer');
		}
	}

	public function viewStudentList() {
		if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
		}
		else {
			$student['data'] = $this->Admin_model->myQuery("SELECT * FROM `tuition_student` ORDER BY `tuition_id` ");
			$this->load->view('header');
			$this->load->view('view-student-list',$student);
			$this->load->view('footer');
		}
	}

	public function changePassword() {
		if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
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
                'admin_password'	=>  do_hash($this->input->post('new_password'), 'ripemd160')
              );
              $user_data = $this->Admin_model->fatchOne('admin','admin_id',$this->session->userdata('admin_id'));
              if($user_data['admin_password'] == do_hash($this->input->post('current_password'), 'ripemd160')) {
                if( $this->Admin_model->updateData('admin','admin_id',$this->session->userdata('admin_id'),$data) ) {
                  $this->session->set_tempdata('success','Password Change Successfully',1);
                  redirect('admin/change-password');
                }
              }
              else {
                $this->session->set_tempdata('error','Invalid Current Password',1);
                redirect('admin/change-password');
              }
            }
        }
		else {
            $this->load->view('header'); 
            $this->load->view('change-password');
            $this->load->view('footer');
        }
	}

	public function viewAllMessage() {
		if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
		}
		else {
			$contact['data'] = $this->Admin_model->fatchAll('contact_us');
			$this->load->view('header'); 
            $this->load->view('view-all-message',$contact);
            $this->load->view('footer');
		}
	}

	public function viewMessage($id) {
		if(!$this->session->has_userdata('admin_id')) {
			redirect('admin');
		}
		else {
			$data = $this->Admin_model->fatchOne('contact_us','id',$id);
			$this->load->view('header'); 
            $this->load->view('view-message',$data);
            $this->load->view('footer');
		}
	}
}