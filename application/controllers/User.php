<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Muser', 'muser', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status'); 
        $this->roles = $this->config->item('roles');
	}

	public function index()
	{
		
	}

	public function auth()
	{
		$userLogin = $this->getUserLogin($this->input->post('identity'));

		if($userLogin) 
		{
			if (password_verify($this->input->post('password'), $userLogin->password) ) 
			{
				$user_session = array(
				 	'admin_login' => TRUE,
				 	'ID' => $userLogin->ID,
				 	'user' => $userLogin
				);	

				$this->session->set_userdata( $user_session );

				redirect(base_url('admin'));
			} else {
				$this->session->set_flashdata('message', 'Kombinasi Username/E-Mail dan Password tidak cocok.');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('message', 'Mohon Masukkan Username/E-Mail dan Password.');
			redirect(base_url());
		}
	}

	public function getUserLogin($identity = '')
	{
		if (filter_var($identity, FILTER_VALIDATE_EMAIL)) 
		{
			return $this->db->get_where('users', array('email' => $identity))->row();
		} else {
			return $this->db->get_where('users', array('username' => $identity))->row();
		}
	}

	public function signout()
	{
		$this->session->set_flashdata('message', 'Anda berhasil keluar.');
		$this->session->sess_destroy();

		redirect(base_url());
	}

	public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
        $this->form_validation->set_rules('password', 'Password', 'required'); 
            
        if($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('login');
            $this->load->view('footer');
        }else{
                
            $post = $this->input->post();  
            $clean = $this->security->xss_clean($post);
                
            $userInfo = $this->muser->checkLogin($clean);
                
            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'The login was unsucessful');
                redirect(site_url().'user/login');
            }                
            $user_session = array(
				 	'admin_login' => TRUE,
				 	'ID' => $userLogin->ID,
				 	'user' => $userLogin
				);	

				$this->session->set_userdata( $user_session );

				redirect(base_url('admin'));
        }            
    }

	public function register()
    {             
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');    
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
                       
        if ($this->form_validation->run() == FALSE) {   
            $this->load->view('header');
            $this->load->view('register');
            $this->load->view('footer');
        }else{                
            if($this->muser->isDuplicate($this->input->post('email'))){
                $this->session->set_flashdata('flash_message', 'User email already exists');
         	       redirect(site_url().'/user/login');
            }else{                    
                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $id = $this->muser->insertUser($clean); 
                $token = $this->muser->insertToken($id);                                        
                    
                $qstring = $this->base64url_encode($token);                    
                $url = site_url() . '/user/complete/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                               
                $message = '';                     
                $message .= '<strong>You have signed up with our website</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link;                          

                echo $message; //send this in email
                exit;
            }              
        }
    }
        
        
    protected function _islocal()
    {
        return strpos($_SERVER['HTTP_HOST'], 'local');
    }
        
    public function complete()
    {                                   
        $token = base64_decode($this->uri->segment(4));       
        $cleanToken = $this->security->xss_clean($token);
            
        $user_info = $this->muser->isTokenValid($cleanToken); //either false or array();           
            
        if(!$user_info){
            $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
            redirect(site_url().'user/login');
        }            
        $data = array(
            'username'=> $user_info->username, 
            'email'=>$user_info->email, 
            'user_id'=>$user_info->ID, 
            'token'=>$this->base64url_encode($token)
        );
           
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
        if ($this->form_validation->run() == FALSE) {   
            $this->load->view('header');
            $this->load->view('complete', $data);
            $this->load->view('footer');
        }else{
            $this->load->library('password');                 
            $post = $this->input->post(NULL, TRUE);
             
            $cleanPost = $this->security->xss_clean($post);
                
            $hashed = $this->password->create_hash($cleanPost['password']);                
            $cleanPost['password'] = $hashed;
            unset($cleanPost['passconf']);
            $userInfo = $this->muser->updateUserInfo($cleanPost);
            
            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'There was a problem updating your record');
                redirect(site_url().'/user/login');
            }
                
            unset($userInfo->password);
               
            foreach($userInfo as $key=>$val){
                $this->session->set_userdata($key, $val);
            }
            redirect(site_url().'/');
        }
    }

    public function forgot()
    {            
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
        if($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('forgot');
            $this->load->view('footer');
        }else{
            $email = $this->input->post('email');  
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->muser->getUserInfoByEmail($clean);
                
            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'We cant find your email address');
                redirect(site_url().'user/login');
            }   
                
            if($userInfo->status != $this->status[1]){ //if status is not approved
                $this->session->set_flashdata('flash_message', 'Your account is not in approved status');
                redirect(site_url().'user/login');
            }
                
            //build token 
            $token = $this->muser->insertToken($userInfo->id);                        
            $qstring = $this->base64url_encode($token);                  
            $url = site_url() . 'user/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>'; 
               
            $message = '';                     
            $message .= '<strong>A password reset has been requested for this email account</strong><br>';
            $message .= '<strong>Please click:</strong> ' . $link;             

            echo $message; //send this through mail
            exit;                
        }            
    }
        
    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));                  
        $cleanToken = $this->security->xss_clean($token);
            
        $user_info = $this->muser->isTokenValid($cleanToken); //either false or array();               
            
        if(!$user_info){
            $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
            redirect(site_url().'user/login');
        }            
        $data = array(
            'username'=> $user_info->username, 
            'email'=>$user_info->email, 
			//'user_id'=>$user_info->id, 
            'token'=>$this->base64url_encode($token)
        );
           
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
        if ($this->form_validation->run() == FALSE) {   
            $this->load->view('header');
            $this->load->view('reset_password', $data);
            $this->load->view('footer');
        }else{
            $this->load->library('password');                 
            $post = $this->input->post(NULL, TRUE);                
            $cleanPost = $this->security->xss_clean($post);                
            $hashed = $this->password->create_hash($cleanPost['password']);                
            $cleanPost['password'] = $hashed;
            $cleanPost['user_id'] = $user_info->id;
            unset($cleanPost['passconf']);                
            if(!$this->muser->updatePassword($cleanPost)){
                $this->session->set_flashdata('flash_message', 'There was a problem updating your password');
            }else{
                $this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
            }
        redirect(site_url().'user/login');                
        }
    }
        
    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */