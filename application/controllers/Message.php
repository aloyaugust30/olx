<?php
class Message extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
               
                $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->library('javascript');
				$this->load->library('session');
 				$this->load->library('pagination');
 				$this->load->library('form_validation');
 				$this->load->library('user_agent');
 				$this->load->helper('string');
 				$this->load->model('Message_model'); 


 				$sess_id = $this->session->userdata('user_id');

   if(empty($sess_id))
   {
			
    $this->load->library('user_agent');  // load user agent library
    // save the redirect_back data from referral url (where user first was prior to login)
    $this->session->set_userdata('redirect_back', $this->agent->referrer() );  
    redirect(base_url().'account/login');
}

        }

public function inbox()
{		
		

		$current_user = $this->session->userdata('user_id');
		$data['inbox'] = $this->Message_model->inbox($current_user);


		 $data['title'] = 'Messages';
		 
 		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/inbox', $data);
		
		$this->load->view('dashboard/templates/footer');
}




        public function message()
{		
		$user_id = $this->uri->segment(3);
		$post_id = $this->uri->segment(4);

		$data['user'] = $this->Message_model->get_user($user_id);
		$data['advert'] = $this->Message_model->get_advert($post_id);
		$data['mess'] = $this->Message_model->get_mess($post_id);
		$data['owner'] = $this->uri->segment(3);
		$current_user = $this->session->userdata('user_id');
		$data['inbox'] = $this->Message_model->inbox($current_user);

		 $data['title'] = 'Messages';
		 
 		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/messages', $data);
		
		$this->load->view('dashboard/templates/footer');
}


 public function messages()
{		
		$user_id = $this->uri->segment(3);
		$post_id = $this->uri->segment(4);
		$user_detail = $this->uri->segment(5);

		$data['user'] = $this->Message_model->get_user($user_id);
		$data['advert'] = $this->Message_model->get_advert($post_id);
		$data['mess'] = $this->Message_model->get_mess($post_id);
		$data['owner'] = $this->uri->segment(3);
		$data['user1'] = $this->Message_model->get_user_detail($user_detail);
		$current_user = $this->session->userdata('user_id');
		$data['inbox'] = $this->Message_model->inbox($current_user);

		 $data['title'] = 'Messages';
		 
 		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/inbox-messages', $data);
		
		$this->load->view('dashboard/templates/footer');
}



	public function post()
    {
		
       
        
        
        
        $data['title'] = '	message';        
       
        
  		$this->form_validation->set_rules('message','Message', 'required');
		
	
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/messages', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
        else
		
        {
			
		$user_id = $this->input->post('user_id');
		$post_id = $this->input->post('post_id');

			$data = array(
        		'user_id' => $this->session->userdata('user_id'),
        		'user' => $this->input->post('user'),
				'ad_owner' => $user_id,
				'post_id' => $this->input->post('post_id'),
				'message' => $this->input->post('message'),
				'mess_date' => date("Y-m-d H:i:s"),
				
			    );

			$data2 = array(
        		'user_id' => $this->session->userdata('user_id'),
        		'ad_owner' => $user_id,
        		'post_id' => $this->input->post('post_id'),
				'inbox_date' => date("Y-m-d H:i:s"),
				
			    );

			$data3 = array(
        		
				'inbox_date' => date("Y-m-d H:i:s"),
				
			    );



	
		$this->Message_model->post_inbox($user_id,$post_id,$data2,$data3);
		$this->Message_model->post($data);
		
		 $this->session->set_flashdata('sent', '<div class="alert alert-Success text-center">Message Sent </div>');
		 
		
        
     redirect( base_url() . 'message/message/'.$user_id.'/'.$post_id);   
 
		
		
		
        }
    
	}


      public function project($slug = NULL)
        {
               $data['projects'] = $this->home_model->get_projects($slug);

        if (empty($data['projects']))
        {
                show_404();
        }

        $data['title'] = $data['projects']['title'];

        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('project-detalis', $data);
        $this->load->view('template/footer');
		
		
		
        } 
		
		
	public function projects($offset=0)
        {
	
	$config['total_rows'] = $this->home_model->totalplaces();
  
  $config['base_url'] = base_url()."home/projects";
  $config['per_page'] = 3;
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
   

  $query = $this->home_model->list_projects(6,$this->uri->segment(3));
  
  $data['project'] = null;
  
  if($query){
   $data['project'] =  $query;
  }

 		              
		$data['arts'] = $this->home_model->count_arts(); 
		 $data['Designers'] = $this->home_model->count_Designers(); 
		 $data['Instructors'] = $this->home_model->count_Instructors();
		 $data['Programmers'] = $this->home_model->count_Programmers();
		 $data['Scribes'] = $this->home_model->count_Scribes();
		 $data['Virtual'] = $this->home_model->count_Virtual();
		 $data['Virtual_Consultants'] = $this->home_model->count_Virtual_Consultants();
		 $data['Others'] = $this->home_model->count_Others();   
		 $data['featured'] = $this->home_model->featured_projects(); 
        $data['title'] = 'Project Lisitng';

        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
		
        $this->load->view('projects', $data);
        $this->load->view('template/footer');
        }
    
	
	public function category()
        {
               
         $category = $this->uri->segment(3);
      
		 
        if (empty($category))
        {
            show_404();
        }
		 $data['featured'] = $this->home_model->featured_projects();
		$data['project'] = $this->home_model->get_category($category);
		$cat = str_replace("-"," ",$category); 
		
        $data['title'] = 'Projects on '. $cat;

        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
		
        $this->load->view('category', $data);
        $this->load->view('template/footer');
		
		
		
        }
		
	 public function about()
        {
		$data['title'] = 'About us';
		 $data['featured'] = $this->home_model->featured_projects(); 
         $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('about');
		 $this->load->view('template/footer');
        }
		
		
	public function contact()
        {
		$data['title'] = 'Contact Us';
		 $data['featured'] = $this->home_model->featured_projects(); 	
         $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('contact');
		 $this->load->view('template/footer');
        }
		
		
		
 public function how()
        {
			$this->load->helper('url_helper');
		$data['title'] = 'How it Works';
		 $data['featured'] = $this->home_model->featured_projects(); 
         $this->load->view('template/header', $data);
		 $this->load->view('template/nav');
         $this->load->view('how-it-works');
		 $this->load->view('template/footer');
        }
		
	public function freelancer()
        {
			$this->load->helper('url_helper');
		$data['title'] = 'Freelancers';
		 $data['featured'] = $this->home_model->featured_projects();
		 $data['user'] = $this->home_model->get_users(); 
         $this->load->view('template/header', $data);
		 $this->load->view('template/nav');
         $this->load->view('freelancer');
		 $this->load->view('template/footer');
        }	
		
	public function user()
        {
			 $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
			$this->load->helper('url_helper');
		$data['title'] = 'User Details';
		 $data['featured'] = $this->home_model->featured_projects();
		 $data['user'] = $this->profile_model->get_user($user_id); 
         $this->load->view('template/header', $data);
		 $this->load->view('template/nav');
         $this->load->view('user');
		 $this->load->view('template/footer');
        }
    
	 public function categories()
        {
			
			
		 $data['arts'] = $this->home_model->count_arts(); 
		 $data['Designers'] = $this->home_model->count_Designers(); 
		 $data['Instructors'] = $this->home_model->count_Instructors();
		 $data['Programmers'] = $this->home_model->count_Programmers();
		 $data['Scribes'] = $this->home_model->count_Scribes();
		 $data['Virtual'] = $this->home_model->count_Virtual();
		 $data['Virtual_Consultants'] = $this->home_model->count_Virtual_Consultants();
		 $data['Others'] = $this->home_model->count_Others();             
		 $data['project'] = $this->home_model->get_projects();
		 $data['featured'] = $this->home_model->featured_projects();
        $data['title'] = 'Project Categories';
		$this->load->view('template/header', $data);
       	$this->load->view('template/nav');
		$this->load->view('categories', $data);
        $this->load->view('template/footer');
        }
}