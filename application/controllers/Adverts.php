<?php
class Adverts extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
               	$this->load->model('Advert_model');
				 
                $this->load->helper('url_helper');
				$this->load->helper('form');
				$this->load->helper('text');
        		$this->load->library('form_validation');;
				$this->load->library('javascript');
				$this->load->library('session');
 				$this->load->library('pagination');

        }

       

      public function ad_details()
        {
        	$slug = $this->uri->segment(3);	


          $data['adverts'] = $this->Advert_model->get_adverts($slug);

        if (empty($data['adverts']))
        {
                show_404();
        }

       

        $post_id= $data['adverts']['post_id'];
        $related= $data['adverts']['tags'];

        

        $data['pix'] = $this->Advert_model->get_images($post_id);
        $data['related'] = $this->Advert_model->related_adverts($related);
        $data['recent_ads'] = $this->Advert_model->recent_adverts();
        $data['featured'] = $this->Advert_model->featured_adverts();
      
        $data['title'] = $data['adverts']['title'].' - Yudala';

        $this->load->view('templates/header', $data);
       	$this->load->view('templates/nav2');
		
		$this->load->view('ad-details', $data);
        $this->load->view('templates/footer');
		
		
		$this->db->where('post_id', $post_id);
		$this->db->set('views', 'views+1', FALSE);
		$this->db->update('adverts');
		
        } 



		
		
	public function latest_ads($offset=0)
        {
	
	$config['total_rows'] = $this->Advert_model->totaladverts();
  
  $config['base_url'] = base_url()."adverts/latest_ads";
  $config['per_page'] = 15;
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
   

  $query = $this->Advert_model->list_adverts(15,$this->uri->segment(3));
  
  $data['adverts'] = null;
  
  if($query){
   $data['adverts'] =  $query;
  }

 		              
	
      $data['title'] = 'Yudala - Buy and Sell free anywhere in Europe with our classified Ads';
      $data['recent_ads'] = $this->Advert_model->recent_adverts();
        $data['featured'] = $this->Advert_model->featured_adverts_2();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav2');
    
         $this->load->view('adverts', $data);
        $this->load->view('templates/footer');
        }


  public function category($offset=0)
        {
  
  $data['cat'] = $cat = $this->uri->segment(3);
  $data['page'] = $this->uri->segment(2);

  $category = str_replace('-', ' ', $cat); 

  $config['total_rows'] = $this->Advert_model->totalad_cat($category);
  
  $config['base_url'] = base_url()."adverts/category/".$category."/";
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
   

  $query = $this->Advert_model->list_ad_cat(20,$this->uri->segment(3),$category);
  
  $data['adverts'] = null;
  
  if($query){
   $data['adverts'] =  $query;
  }

                  
  
      $data['title'] = 'Yudala - Buy and Sell free anywhere in Europe with our classified Ads';

      $data['recent_ads'] = $this->Advert_model->recent_adverts();
        $data['featured'] = $this->Advert_model->featured_adverts_2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav2');
    
         $this->load->view('adverts', $data);
        $this->load->view('templates/footer');
        }


 public function sub_category($offset=0)
        {
  
  $data['cat'] = $cat = $this->uri->segment(3);
  $data['page'] = $this->uri->segment(2);

  $category = str_replace('-', ' ', $cat); 

  $config['total_rows'] = $this->Advert_model->totalad_sub_cat($category);
  
  $config['base_url'] = base_url()."adverts/sub_category/".$category."/";
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
   

  $query = $this->Advert_model->list_sub_cat(20,$this->uri->segment(3),$category);
  
  $data['adverts'] = null;
  
  if($query){
   $data['adverts'] =  $query;
  }

                  
  
      $data['title'] = 'Yudala - Buy and Sell free anywhere in Europe with our classified Ads';
      $data['recent_ads'] = $this->Advert_model->recent_adverts();
        $data['featured'] = $this->Advert_model->featured_adverts_2();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav2');
    
         $this->load->view('adverts', $data);
        $this->load->view('templates/footer');
        }
    


public function filter($offset=0)
        {
  
 
  $data['page'] = $page = $this->uri->segment(3);
   $data['cat'] = $cat = $this->uri->segment(4);
  $sort = $this->uri->segment(5);

  $category = str_replace('-', ' ', $cat);
  $page1 = str_replace('-', '_', $page);  

  $config['total_rows'] = $this->Advert_model->totalad_filter($category,$page1,$sort);
  
  $config['base_url'] = base_url()."adverts/filter/".$page."/".$category."/".$sort;
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
   

  $query = $this->Advert_model->filter_ad(20,$this->uri->segment(3),$category,$page1,$sort);
  
  $data['adverts'] = null;
  
  if($query){
   $data['adverts'] =  $query;
  }

                  
  
      $data['title'] = 'Yudala - Buy and Sell free anywhere in Europe with our classified Ads';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav2');
    
         $this->load->view('adverts', $data);
        $this->load->view('templates/footer');
        }

    

	public function add_fav()
    {
      $post_id = $this->uri->segment(4);
      $slug = $this->uri->segment(3);
        
        if (empty($post_id))
        {
            show_404();
        }
                
      $user_id = $this->session->userdata('user_id');
        
         $data = array(
        'post_id' => $post_id,
        'user_id' => $user_id,
        'fav_date' =>date("Y-m-d H:i:s"),

       
    );
              $this->Advert_model->add_fav($user_id,$post_id,$data); 
 			$slug = $this->uri->segment(3);

 			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have add this Advert to your Favourites </div>');  


        redirect( base_url() . 'adverts/ad_details/'.$slug);        
    }


public function report()
    {
      $post_id = $this->input->post('post_id');
      $slug = $this->input->post('slug');
     
                
      $user_id = $this->session->userdata('user_id');
        
         $data = array(
        'post_id' => $post_id,
        'reason' => $this->input->post('reason'),
        'comment' => $this->input->post('comment'),
        'user_id' => $user_id,
        'report_date' => date("Y-m-d H:i:s"),
    );

              $this->Advert_model->report($data); 

 			 $slug = $this->input->post('slug');

 			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have Reported this Advert </div>');  


        redirect( base_url() . 'adverts/ad_details/'.$slug);        
    }
	

public function search()
        {
    $data['title'] = 'Advert Search Result';
    
    $search = $this->input->post('search');
    $category = $this->input->post('category');
   
    
  $config['total_rows'] = $this->Advert_model->totalsearch($search,$category);
  
  $config['base_url'] = base_url()."adverts/search/";
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
   

  $query = $this->Advert_model->search_adverts($search,20,$this->uri->segment(3),$category);
  
  $data['adverts'] = null;
  
  if($query){
   $data['adverts'] =  $query;
  
  

        $data['featured'] = $this->Advert_model->featured_adverts_2();
    
    
         $this->load->view('templates/header', $data);
        $this->load->view('templates/nav2');
        $this->load->view('search-results',$data);
        $this->load->view('templates/footer');

        }else{
      
    $data['search'] = 'No result found'; 
  

         $this->load->view('templates/header', $data);
        $this->load->view('templates/nav2');
        $this->load->view('search-results',$data);
        $this->load->view('templates/footer');  
      
    }

    }


}