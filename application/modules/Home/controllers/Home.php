<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
	}
	
	public function index() {
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function services() {
		$this->load->view('header');
		$this->load->view('services');
		$this->load->view('footer');
	}
	public function about() {
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}
	public function contact() {
		if(isset($_POST['submit'])) {
			//Validation Rules
			$this->form_validation->set_rules('name','Name','trim|required');
			$this->form_validation->set_rules('email','Email','trim|required');
			$this->form_validation->set_rules('subject','Subject','trim|required');
			$this->form_validation->set_rules('message','Message','trim|required');
			if($this->form_validation->run() == FALSE){
				$this->load->view('header');
				$this->load->view('contact');
				$this->load->view('footer');
			}
			else {
				$data = array(
					'name'	=>	$this->input->post('name'),
					'email'	=>	$this->input->post('email'),
					'subject' => $this->input->post('subject'),
					'message' => $this->input->post('message')
				);
				$filter_data = xss_clean($data);
				if($this->Home_model->insertData('contact_us',$filter_data)) {
					$this->session->set_tempdata('success','Message Send Successfully',1);
					redirect('contact-us');
				}
			}
		}
		else {
			$this->load->view('header');
			$this->load->view('contact');
			$this->load->view('footer');
		}
	}
}