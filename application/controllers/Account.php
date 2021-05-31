<?php
class Account extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Account_Model');
                $this->load->model('Post_model');
				
                $this->load->helper('url_helper');
				$this->load->library('cart');
				$this->load->library('user_agent');
				$this->load->library('session');
				$this->load->helper('form');
				$this->load->helper('text');
        		$this->load->library('form_validation');
				$this->load->helper('string');
				$this->load->library('pagination');
        }

   
    public function register(){
		
		$data['title'] = 'User Registeration - Yudala classified Ads';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
		
        $this->form_validation->set_rules('name','Name', 'required');
       
		$this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[user_table.email]');
        $this->form_validation->set_message('is_unique', 'The %s already exist');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('address','Address', 'required');
		$this->form_validation->set_rules('location','Location', 'required');
		
		$this->form_validation->set_rules('phone','Phone Number', 'trim|required|is_unique[user_table.phone]');
		
		
        
        if($this->form_validation->run() == false){
            		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav2');
        $this->load->view('register', $data);
		 $this->load->view('templates/footer');
                   
            
        }else{
            //call db
			$date = date("Y-m-d H:i:s");
			$user_id=rand(00000,99999); 
            $data = array(
                'name' => $this->input->post('name'),
			
				'user_id' => $user_id,
                'email' => $this->input->post('email'),
               	'phone' => $this->input->post('phone'),
                'password' => md5($this->input->post('password')),
				'address' => $this->input->post('address'),
				'status' => "0",
				'location' => $this->input->post('location'),
				'reg_date'=>$date,
            );
            
            $receiver =$this->input->post('email');
            
                
                //send confirm mail
				
                if($this->Account_Model->sendEmail($receiver)){
                    $this->Account_Model->insertUser($data);
                    //redirect('Login_Controller/index');
                    //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm your Email (Remember to check your spam folder for the email.). </div>');
					 redirect(base_url().'account/login');
                }else{
                    
                    //$error = "Error, Cannot insert new user details!";
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Please try again or Contact support@yudala.de</div>');
					 redirect(base_url().'account/register');
                
                
                
            }
        }
        
    }
    
    function confirmEmail($hashcode){
        if($this->Account_Model->verifyEmail($hashcode)){
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
           redirect(base_url().'account/login');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
           redirect(base_url().'account/register');
        }
    }


public function login(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model'); 
		 $this->load->helper('url_helper');
		
		
        $data['title'] = 'Login - Yudala';
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
                    $this->load->view('templates/header', $data);
					$this->load->view('templates/nav2');
                    $this->load->view('login', $data);
                    $this->load->view('templates/footer');
        }else{
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            if($this->Account_Model->loginUser($email, $password)){
                
                $userInfo = $this->Account_Model->loginUser($email, $password);
            
                
                    
                
                
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                //$this->load->view('header');
                //$this->load->view('tasks_view');
                //$this->load->view('footer');
				if( $this->session->userdata('redirect_back') ) {
    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
    $this->session->unset_userdata('redirect_back');
    redirect( $redirect_url );
}
				else{
                redirect(base_url().'account/index');
				}
            }else{
                $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                    $this->load->view('templates/header', $data);
					$this->load->view('templates/nav2');
                    $this->load->view('login');
                    $this->load->view('templates/footer');
                
            }
        }
    }
    
   

public function index(){
	
	
         $data['title'] = 'User - Dashboard.';
		;
      
        if(isset($_SESSION['user_id'])){
		


		
			$this->load->helper('url');
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->Account_Model->get_user($user_id);
			$data['total_ad'] =  $this->Post_model->total_adverts();
	 	$data['fav_ads'] =  $this->Post_model->total_fav_ads();
	 	$data['sold_ads'] =  $this->Post_model->total_sold();  
       
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/index', $data);
		
		$this->load->view('dashboard/templates/footer');
		
        }else{
            redirect(base_url().'account/login');
        }
        
    }
    
	

    
	
    public function logout(){
		
		
        $this->load->library('session');
         
        
        if($this->session->has_userdata('user_id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
             
            redirect(base_url().'page/index');
        }
        
        
    }






public function forgotpassword()
{		$data['title'] = 'Forgot Passowrd';
		$this->load->helper('url');
		$email= $this->input->post('email');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|trim');
	
	if ($this->form_validation->run() == FALSE)
{
		
 		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav2');
        $this->load->view('forgotpassword', $data);
		 $this->load->view('templates/footer');
       
}
	else
{
		$email= $this->input->post('email');
		if($user = $this->Account_Model->get_user_by_email($email)){
			
			foreach($user as $users) { 
			$slug = md5($users->user_id);
			$user_id=$users->user_id;
		
			
			if($this->Account_Model->send_email($email,$slug,$user_id)){
			
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">An email has been sent to you</div>');
           redirect(base_url().'account/forgotpassword');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email could not be sent, please try again.</div>');
           redirect(base_url().'account/forgotpassword');
        }}
		}else{
			
		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Email address is not found. Please try to re-register.</div>');
           redirect(base_url().'account/register');	
			
		}

}
}


public function reset_password()
{		$data['title'] = 'Change Passowrd';
		
		$this->load->helper('url');

		$data['user_id'] = $this->uri->segment(4);
		$data['hash'] = $this->uri->segment(3);
	
		
		$user_id= $this->input->post('user_id');
		$hash= $this->input->post('hash');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
	
	if ($this->form_validation->run() == FALSE)
{
		
 		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav2');
        $this->load->view('reset-password', $data);
		 $this->load->view('templates/footer');
       
}
	else
	
{	
	
	$user = $this->Account_Model->get_slug($user_id);
			
			foreach($user as $users) { 
			$slug = md5($users->user_id);
			
		
			
			if($hash != $slug){
			
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">The Code from the email does not match</div>');
          $this->load->view('templates/header', $data);
		$this->load->view('templates/nav2');
        $this->load->view('reset-password', $data);
		 $this->load->view('templates/footer');
        }else{
			
			
			$data = array(
        		
                'password' => md5($this->input->post('password')),
				
		
		
		
    );

	
		if($this->Account_Model->update_password($user_id,$data)){
			
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Password has been updated. please Login</div>');
           redirect(base_url().'account/login');
        
		}else{
			
		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">An Error occoured Please try again later</div>');
           redirect(base_url().'account/reset_password');	
			
		}	
	
		}}
}
}
   

   
	  
public function edit_profile()
    {
		
       
        
        $data['title'] = 'Dashboard.';
		
			$user_id = $this->session->userdata('user_id');
       $data['user'] = $this->Account_Model->get_user($user_id);
        
  		$this->form_validation->set_rules('name','Name', 'required');
		
		$this->form_validation->set_rules('phone','Phone', 'required');
		$this->form_validation->set_rules('location','Location', 'required');
		
		$this->form_validation->set_rules('address','Address', 'required');
		
     
	
        if ($this->form_validation->run() === FALSE)
        {
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/index', $data);
		
		$this->load->view('dashboard/templates/footer');	
 
        }
        else
		
        {
			
			$config['upload_path']          = './profile/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 1500;
			
			
			$config['file_name'] = $_FILES["picture"]['name'];

			$this->load->library('upload', $config);
			
				
							
			$this->upload->do_upload('picture');
			$image=$this->upload->data();
       		 
            $data = array(
				
                'name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'location' => $this->input->post('location'),
				'address' => $this->input->post('address'),
		
				
				
            );
			 
		if ($_FILES["picture"]['name']) $data['picture'] = $image['file_name'];

 
 
		$this->Account_Model->update_profile($user_id,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated Your profile </div>');
		 
		 
        
     redirect( base_url() . 'account/index');   
 
		
			
		
        }
    
	}
	
public function order()
        {
		$data['title'] = 'Oder Details';
		 $code = $this->uri->segment(3);	
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Basket_model->get_order($code);
		 
		 $this->form_validation->set_rules('ownprice','Your Price', 'required');
      
	
        if ($this->form_validation->run() === FALSE)
        {
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/order-details', $data);
		 $this->load->view('dashboard/templates/footer');
		 
		}else{
			 
		    $code = $this->uri->segment(3);	
       		 
            $data = array(
				
                'ownprice' => $this->input->post('ownprice'),
				
				
            );
			 
		

		$this->Account_Model->update_price($code,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated your order Price </div>');
		 
		 
        
     redirect( base_url() . 'account/order/'.$code);   	 
			 
		 }
        }
		


public function celebrant_orders()
        {
		$data['title'] = 'Oder Details';
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Account_Model->get_order();
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/celebrant-order');
		 $this->load->view('dashboard/templates/footer');
        }

public function order_history()
        {
		$data['title'] = 'Oder History | Tradpeek Plus';
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Account_Model->get_order_history();
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/order-history');
		 $this->load->view('dashboard/templates/footer');
        }

public function order_details()
        {
			$order_id = $this->uri->segment(3);
		$data['title'] = 'Order History | Tradpeek Plus';
		 $data['user']=$this->Account_Model->get_user();
		 $data['order'] = $this->Account_Model->get_order_details($order_id);
         $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/order-history-details');
		 $this->load->view('dashboard/templates/footer');
        }


public function cancel_order()
        {
		
		 $order_id = $this->uri->segment(3);
		
           
		

		$this->Account_Model->cancel_order($order_id);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have deleted an Order</div>');
		 
		 
        
     redirect( base_url() . 'account/order_history');   	 
			 
		 
        }
	


}