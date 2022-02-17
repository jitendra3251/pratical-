<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
       
      public function __construct()
	{
          parent::__construct();
          $this->load->model('Common');
	}
	public function index()
	{
		{  
			$this->load->library('form_validation'); 
			$this->form_validation->set_rules('email', 'email', 'required|valid_email');  
			$this->form_validation->set_rules('password', 'password', 'required');
			if($this->form_validation->run() == true) 
			 {  
				 //true  
				 $email = $this->input->post('email'); 
				 $password = md5($this->input->post('password')); 
				 //model function  
				 if($this->Common->can_login($email, $password, 'user'))
				 {
					 $data = $this->Common->accessrecord('user', [], ['email'=>$email], 'row');
					 $session_data=array('id' =>$data->id,'username' =>$data->username,'email' =>$data->email,'contact'=>$data->contact);
					 $this->session->set_userdata($session_data);  
					 redirect(base_url('User-Dashboard'));  
				 }else
				 {  
					 $this->session->set_flashdata('error','Invalid email and Password');  
					 redirect(base_url('Sign-Up'));  
				 }  
			 }else
			 {  
				 $this->load->view('Login');
			 }
		   } 
	}
	public function SignUp(){
		$this->load->library('form_validation'); 
		$this->form_validation->set_rules('username','username', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');  
		$this->form_validation->set_rules('password', 'password', 'required');
		if($this->form_validation->run() == true)
		{  
		 $userdata = array(
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
		    );
	    	$this->load->common->insertData('user',$userdata);
	    }else{

		}
	}

}
