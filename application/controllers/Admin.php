<?php
class Admin extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                
                $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->library('javascript');
				$this->load->library('cart');
				$this->load->library('session');
 				$this->load->library('pagination');
				 $this->load->library('form_validation');
				 $this->load->model('Admin_model');
         $this->load->model('Post_model');

        }

        public function admin(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Admin_model'); 
		 $this->load->helper('url_helper');
		
		
        $data['title'] = 'Admin Login';
        $this->form_validation->set_rules('username','Username', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
                   
                    $this->load->view('templates/header', $data);
					$this->load->view('templates/nav');
                    $this->load->view('admin');
                    $this->load->view('templates/footer');
                  
        }else{
            
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            if($this->Admin_model->loginAdmin($username, $password)){
                
                $userInfo = $this->Admin_model->loginAdmin($username, $password);
            
                
                    
                
                
                $this->session->set_flashdata('login_msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                //$this->load->view('header');
                //$this->load->view('tasks_view');
                //$this->load->view('footer');
				if( $this->session->userdata('redirect_back') ) {
    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
    $this->session->unset_userdata('redirect_back');
    redirect( $redirect_url );
}
				else{
                redirect(base_url().'admin/index');
				}
            }else{
                $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                    $this->load->view('templates/header', $data);
					$this->load->view('templatse/nav');
                    $this->load->view('admin');
                    $this->load->view('templates/footer');
                
            }
        }
    }
    

 public function admin_logout(){
		
		
        $this->load->library('session');
         
        
        if($this->session->has_userdata('admin_id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
             
            redirect(base_url().'admin/index');
        }
        
        
    }

 
 public function index()
        {
		             
        $data['title'] = 'Admin Dashboard';
		
	
		
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/index', $data);
		
        $this->load->view('admin/templates/footer');
        }

 public function new_post(){
  
   
    
    
        $data['title'] = 'Post New Ads  - OLX';
    
     $this->form_validation->set_rules('title','Ad Title', 'trim|required');
        $this->form_validation->set_rules('price','Price', 'trim|required');
    $this->form_validation->set_rules('editor1','Description', 'trim|required');
        $this->form_validation->set_rules('category','Ad Category', 'trim|required');
        $this->form_validation->set_rules('sub_category','Ad Sub Category', 'trim|required');
    $this->form_validation->set_rules('tags','Tags', 'trim|required');
    $this->form_validation->set_rules('condition','Condition', 'trim|required');
    $this->form_validation->set_rules('ad_location','ad_location', 'trim|required');
    
    
    
        
        if($this->form_validation->run() == false){
                   
          $this->load->view('admin/templates/header', $data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/new-post');
          $this->load->view('admin/templates/footer');
                  
        }else{
      $config1['upload_path']          = './uploads/';
      $config1['allowed_types']        = 'gif|jpg|jpeg|png';
      $config1['overwrite'] = false;
      $config1['max_size']             = 1500;
      
      $new_name = rand(0000, 9999).$_FILES["pic1"]['name'];
      $config1['file_name'] = $new_name; 

      $this->load->library('upload', $config1);
      
        
              
      if ( ! $this->upload->do_upload('pic1')){
        $error = array('error' => $this->upload->display_errors());
          $this->load->view('admin/templates/header', $data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/new-post', $error);
          $this->load->view('admin/templates/footer');
      }else{
                
          $pix=$this->upload->data();
            
          $files = $_FILES;
              $count = count($_FILES['userfile']['name']);
              for($i=0; $i<$count; $i++)
                {
                $_FILES['userfile']['name']= time().$files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2000000';
                $config['remove_spaces'] = true;
                $config['overwrite'] = false;
                $config['max_width'] = '';
                $config['max_height'] = '';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
                }
                  $fileName = implode(',',$images);
                  
          
          
  $post_id= rand(000000,999999);
  $slug = url_title($this->input->post('title'), 'dash', TRUE);
  $date = date("Y-m-d H:i:s");
   $user_id = $this->session->userdata('user_id'); 
 
    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
    'price' => $this->input->post('price'),
    'price_status' => $this->input->post('price_status'),
    'category' => $this->input->post('category'),
        'sub_category' => $this->input->post('sub_category'),
    'description' => $this->input->post('editor1'),
    'tags' => $this->input->post('tags'),
    'conditions' => $this->input->post('condition'),
    'ad_location' => $this->input->post('ad_location'),
    'advert_status' => "1",
    'featured' => $this->input->post('featured'),
    'pic1' => $pix['file_name'],
    'user_id' => $user_id,
    'ad_date' => $date,
    
    'post_id'=>$post_id,
    
    
    
    );



    $this->Post_model->post_ad($data,$post_id,$fileName);
    
    
 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Ad successfully Published</div>'); 
    
    
        redirect(base_url("admin/new_post"));
            
                

      }
    }
}
 

 
 public function products()
        {
		$data['title'] = 'All Products - Tradpeek Plus';
			
      
	
	$config['total_rows'] = $this->Admin_model->totalproducts();
  
  $config['base_url'] = base_url()."admin/products/";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_model->all_products(20,$this->uri->segment(3));
  
  $data['product'] = null;
  
  if($query){
   $data['product'] =  $query;
  }
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/all-products', $data);
		$this->load->view('admin/templates/footer');

        }		

  public function edit_product(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Vendor_model');
		$this->load->model('product_model'); 
		 $this->load->helper('url_helper');
	
	$prod_id = $this->uri->segment(3);	
	$data['product']=$this->product_model->get_product_by_id($prod_id);
		
        $data['title'] = 'Edit Product - Tradpeek Plus';
		$data['vendor'] = $this->Admin_model->get_vendors();
		 $this->form_validation->set_rules('title','Product Title', 'trim|required');
        $this->form_validation->set_rules('price','Price', 'trim|required');
        $this->form_validation->set_rules('quantity','Quantity', 'trim|required');
		$this->form_validation->set_rules('description','Description', 'trim|required');
		$this->form_validation->set_rules('keyword','keyword', 'trim|required');
		$this->form_validation->set_rules('model','Model', 'trim|required');
		$this->form_validation->set_rules('vendor','Vendor', 'trim|required');
		$this->form_validation->set_rules('category','Category', 'trim|required');
		$this->form_validation->set_rules('sub_category','Sub Category', 'trim|required');
		
        
        if($this->form_validation->run() == false){
                   
                    $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/edit-product', $data);
		$this->load->view('admin/templates/footer');
                  
        }else{
            
            $config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 1500;
			
			
			$config['file_name'] = $_FILES["pic1"]['name'];

			$this->load->library('upload', $config);
			
				
							
			$this->upload->do_upload('pic1');
					$image=$this->upload->data();
					
				
			 
        $config2['upload_path'] = './uploads/';   // Directory 
	$config2['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config2['max_size']             = 1500;
	
	
	$config2['file_name'] = $_FILES["pic2"]['name'];


	$this->upload->initialize($config2); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic2');  // File Name
	$image1=$this->upload->data(); // store the name of the file 
		
	
	
	
	$config3['upload_path'] = './uploads/';   // Directory 
	$config3['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config3['max_size']             = 1500;

	
	$config3['file_name'] = $_FILES["pic3"]['name'];


	$this->upload->initialize($config3); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic3');  // File Name
	$image2=$this->upload->data(); // store the name of the file 
	

	
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	
	$featured = "No";
	$prod_id = $this->uri->segment(3);
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
		'price' => $this->input->post('price'),
        'quantity' => $this->input->post('quantity'),
		'description' => $this->input->post('description'),
		'model' => $this->input->post('model'),
		'shname' => $this->input->post('vendor'),
		'category' => $this->input->post('category'),
		'sub_category' => $this->input->post('sub_category'),
		'meta_desc' => $this->input->post('meta-description'),
		'keyword' => $this->input->post('keyword'),
		
		'featured' => $featured,
		
		
		
	
		
    );

if ($_FILES["pic1"]['name']) $data['pic1'] = $image['file_name'];
if ($_FILES["pic2"]['name']) $data['pic2'] = $image1['file_name'];
if ($_FILES["pic3"]['name']) $data['pic3'] = $image2['file_name'];

		$this->Admin_model->update_product($prod_id,$data);
    
 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Product successfully updated</div>'); 
		
		
        redirect(base_url("admin/edit_product/".$prod_id));
            
                

			}
		}


public function delete_product()
        {
               
         $prod_id = $this->uri->segment(3);
        
        if (empty($prod_id))
        {
            show_404();
        }
		
		
		
		 $this->Admin_model->delete_product($prod_id);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">A Product has been Deleted</div>');
          redirect(base_url().'admin/products');
		
		
		
  }	


 public function users()
        {
		$data['title'] = 'All Users - Tradpeek Plus';
			
      
	
	$config['total_rows'] = $this->Admin_model->totalusers();
  
  $config['base_url'] = base_url()."admin/users/";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_model->all_users(20,$this->uri->segment(3));
  
  $data['user'] = null;
  
  if($query){
   $data['user'] =  $query;
  }
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/users', $data);
		$this->load->view('admin/templates/footer');

        }
		
		
 public function user_profile()
    {
		
       
        
        $data['title'] = 'Edit User - Dashboard.';
		
			$user_id = $this->uri->segment('3');
       $data['user']=$this->Admin_model->get_user($user_id);
        
  		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required');
		$this->form_validation->set_rules('email','Email', 'required');
		$this->form_validation->set_rules('country','Country', 'required');
		$this->form_validation->set_rules('state','State', 'required');
		$this->form_validation->set_rules('address','Address', 'required');
		$this->form_validation->set_rules('user','User Type', 'required');
      
	
        if ($this->form_validation->run() === FALSE)
        {
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/edit-profile', $data);
		$this->load->view('admin/templates/footer');;	
 
        }
        else
		
        {
			$user_id = $this->session->userdata('user_id');       
       		 
            $data = array(
				
                'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'country' => $this->input->post('country'),
				'state' => $this->input->post('state'),
				'address' => $this->input->post('address'),
				'user' => $this->input->post('user'),
				
				
            );
			 
		

		$this->Admin_model->update_user($user_id,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated Your a User profile </div>');
		 
		 
        
     redirect( base_url() . 'admin/user_profile/'.$user_id);   
 
		
			
		
        }
    
	} 


public function delete_user()
        {
               
         $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
		
		
		 $this->Admin_model->delete_user($user_id);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">A user has been Deleted</div>');
          redirect(base_url().'admin/users');
		
		
		
  }	


	
public function vendors()
        {
		$data['title'] = 'All Vendors - Tradpeek Plus';
			
      
	
	$config['total_rows'] = $this->Admin_model->totalvendors();
  
  $config['base_url'] = base_url()."admin/vendors/";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_model->all_vendors(20,$this->uri->segment(3));
  
  $data['vendor'] = null;
  
  if($query){
   $data['vendor'] =  $query;
  }
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/vendors', $data);
		$this->load->view('admin/templates/footer');

        }

public function vendor_profile()
    {
		
       
        
        $data['title'] = 'Edit Vendor - Dashboard.';
		
			$ven_id = $this->uri->segment('3');
       $data['user']=$this->Admin_model->get_vendor($ven_id);
        
  		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required');
		$this->form_validation->set_rules('email','Email', 'required');
		$this->form_validation->set_rules('shname','Shop Name', 'required');
		$this->form_validation->set_rules('bname','Bank Name', 'required');
		$this->form_validation->set_rules('accname','Account Name', 'required');
		$this->form_validation->set_rules('accnum','Account Number', 'required');
      
	
        if ($this->form_validation->run() === FALSE)
        {
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/vendor-profile', $data);
		$this->load->view('admin/templates/footer');;	
 
        }
        else
		
        {
			$user_id = $this->session->userdata('user_id');       
       		 
            $data = array(
				
                'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'shname' => $this->input->post('shname'),
				'bname' => $this->input->post('bname'),
				'accname' => $this->input->post('accname'),
				'accnum' => $this->input->post('accnum'),
				
				
            );
			 
		

		$this->Admin_model->update_vendor($ven_id,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated Your a Vendor profile </div>');
		 
		 
        
     redirect( base_url() . 'admin/vendor_profile/'.$ven_id);   
 
		
			
		
        }
    
	} 

public function delete_vendor()
        {
               
         $ven_id = $this->uri->segment(3);
        
        if (empty($ven_id))
        {
            show_404();
        }
		
		
		
		 $this->Admin_model->delete_vendor($ven_id);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">A Vendor has been Deleted</div>');
          redirect(base_url().'admin/vendors');
		
		
		
  }	

public function orders()
        {
		$data['title'] = 'All Orders - Tradpeek Plus';
			
      
	
	$config['total_rows'] = $this->Admin_model->totalorders();
  
  $config['base_url'] = base_url()."admin/orders/";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_model->all_orders(20,$this->uri->segment(3));
  
  $data['order'] = null;
  
  if($query){
   $data['order'] =  $query;
  }
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/orders', $data);
		$this->load->view('admin/templates/footer');

        }



 public function order_detail()
    {
		
       
        
        $data['title'] = 'View Order - Dashboard.';
		
			$order_id = $this->uri->segment('3');
       $data['order']=$this->Admin_model->get_order_details($order_id);
        
  		$this->form_validation->set_rules('status','Order Status', 'required');
		
      
	
        if ($this->form_validation->run() === FALSE)
        {
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		$this->load->view('admin/order-details', $data);
		$this->load->view('admin/templates/footer');;	
 
        }
        else
		
        {
			$user_id = $this->session->userdata('user_id');       
       		 
            $data = array(
				
                'order_status' => $this->input->post('status'),
				'modify_status' => date(),
				
				
            );
			 
		

		$this->Admin_model->update_order($order_id,$data);
		
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-success">You have Updated the Order Status </div>');
		 
		 
        
     redirect( base_url() . 'admin/order_detail/'.$order_id);   
 
		
			
		
        }
    
	} 


public function delete_order()
        {
               
         $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
		
		
		 $this->Admin_model->delete_user($user_id);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">A user has been Deleted</div>');
          redirect(base_url().'admin/users');
		
		
		
  }	










  
}