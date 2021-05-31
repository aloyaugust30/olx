<?php
class Page extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
               
                $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->helper('url');
				$this->load->library('javascript');
				$this->load->library('session');
 				$this->load->library('pagination');
 				$this->load->model('Advert_model');
				

        }


public function index($offset=0)
        {

   $config['total_rows'] = $this->Advert_model->totaladverts();
  $config['base_url'] = base_url()."page/index";
  $config['per_page'] = 16;
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
   

  $query = $this->Advert_model->list_adverts(16,$this->uri->segment(3));
  
  $data['adverts'] = null;
  
  if($query){
   $data['adverts'] =  $query;
  }
		
        $data['title'] = 'Yudala - Buy and Sell free anywhere in Europe with our classified Ads';
        $data['featured'] = $this->Advert_model->featured_adverts();
        $data['vehicles'] = $this->Advert_model->count_vehicles();
        $data['mobile'] = $this->Advert_model->count_mobile();
        $data['home'] = $this->Advert_model->count_home();
        $data['estate'] = $this->Advert_model->count_estate();
        $data['job'] = $this->Advert_model->count_job();
        $data['electronic'] = $this->Advert_model->count_electronic();
        $data['pets'] = $this->Advert_model->count_pets();
        $data['hobbies'] = $this->Advert_model->count_hobbies();
        $data['fashion'] = $this->Advert_model->count_fashion();

		$this->load->view('templates/header', $data);
       	$this->load->view('templates/nav');
		
		$this->load->view('index', $data);
        $this->load->view('templates/footer');
        }


        public function ad_details($slug = NULL)
        {
			
        $data['adver'] = $this->home_model->get_projects($slug);
		$project_id = $this->uri->segment(2);	
        if (empty($data['projects']))
        {
                show_404();
        }
			
		
        $data['title'] = 'About Us | Noble Contracts - Web Design  | e-Commerce Development | Digital Marketing';
		$this->load->view('templates/header', $data);
       	$this->load->view('templates/nav');
		
		$this->load->view('ad-details', $data);
        $this->load->view('templates/footer');
        }
		
		
		public function about()
        {
			
        $data['title'] = 'Our Services | Noble Contracts - Web Design  | e-Commerce Development | Digital Marketing';
		$this->load->view('templates/header', $data);
       	$this->load->view('templates/nav2');
		
		$this->load->view('about', $data);
        $this->load->view('templates/footer');
        }
		
		
		public function faq()
        {
			
        $data['title'] = 'FAQ | Yudala - Buy and Sell free anywhere in Europe with our classified Ads';
		$this->load->view('templates/header', $data);
       	$this->load->view('templates/nav2');
		
		$this->load->view('faq', $data);
        $this->load->view('templates/footer');
        }



      public function privacy()
        {
      
        $data['title'] = 'Privacy Policy | Yudala - Buy and Sell free anywhere in Europe with our classified Ads';
    $this->load->view('templates/header', $data);
        $this->load->view('templates/nav2');
    
    $this->load->view('privacy', $data);
        $this->load->view('templates/footer');
        }
		
		
		
		
		public function contact(){
		
		 $data['title'] = 'Contact Us | Noble Contracts - Web Design  | e-Commerce Development | Digital Marketing';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
       
        $this->load->model('Page_Model');
		$this->load->library('email');
		
		 $this->form_validation->set_rules('name','Name', 'required');
       	 $this->form_validation->set_rules('phone','Phone', 'trim|required');
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('subject','Subject', 'trim|required');
        $this->form_validation->set_rules('message','Message', 'required');
		
		
			
        if($this->form_validation->run() == false){
            		$this->load->view('templates/header', $data);
					$this->load->view('templates/nav');
                    $this->load->view('contact');
                    $this->load->view('templates/footer');
            
        }else{
		
      
                $name = $this->input->post('name');
				$phone = $this->input->post('phone');
                $subject = $this->input->post('subject');
              
				$email = $this->input->post('email');
				$comment = $this->input->post('message');
				
            
            
           
           $this->Page_Model->contact_admin($name,$phone,$email,$subject,$comment);
                
               
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Sent Your Message, We would get back to you immediately</div>');
					 redirect(base_url().'page/contact');
               
                
            
        
		}
    }
		
		
		public function career()
        {
			
        $data['title'] = 'Career | Crystalinks Investment and Services';
		$this->load->view('templates/header', $data);
       	$this->load->view('templates/nav');
		
		$this->load->view('careers', $data);
        $this->load->view('templates/footer');
        }
		
		public function travel()
        {
			
        $data['title'] = 'Travel and Tours | Crystalinks Investment and Services';
		$this->load->view('templates/header', $data);
       	$this->load->view('templates/nav');
		
		$this->load->view('travel-and-tours', $data);
        $this->load->view('templates/footer');
        }


      
}