<?php
class Post extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Post_model');
				$this->load->model('Account_Model');
                $this->load->helper('url_helper');
				$this->load->library('cart');
				$this->load->library('user_agent');
				$this->load->library('session');
				$this->load->helper('form');
				$this->load->helper('text');
        		$this->load->library('form_validation');
				$this->load->helper('string');
				$this->load->library('pagination');

				$sess_id = $this->session->userdata('user_id');

			  	if(empty($sess_id))
			   {
			      redirect(base_url().'account/login');
			   }			
        }

   
    

public function new_post(){
	
	 
		
		
        $data['title'] = 'Post New Ads  - Yudala';
		
		 $this->form_validation->set_rules('title','Ad Title', 'trim|required');
        $this->form_validation->set_rules('price','Price', 'trim|required');
		$this->form_validation->set_rules('editor1','Description', 'trim|required');
        $this->form_validation->set_rules('category','Ad Category', 'trim|required');
        $this->form_validation->set_rules('sub_category','Ad Sub Category', 'trim|required');
		$this->form_validation->set_rules('tags','Tags', 'trim|required');
		$this->form_validation->set_rules('condition','Condition', 'trim|required');
		$this->form_validation->set_rules('ad_location','Ad Location', 'trim|required');
		$this->form_validation->set_rules('ad_town','Ad Town', 'trim|required');
		
		
		
        
        if($this->form_validation->run() == false){
                   
                    $this->load->view('dashboard/templates/header', $data);
					$this->load->view('dashboard/templates/nav');
                    $this->load->view('dashboard/new-post');
                    $this->load->view('dashboard/templates/footer');
                  
        }else{
			$config1['upload_path']          = './uploads/';
			$config1['allowed_types']        = 'gif|jpg|jpeg|png';
			$config1['overwrite'] = false;
			$config1['max_size']             = 1500;
			$config1['min_width'] = 			500;
			
			$new_name = rand(0000, 9999).$_FILES["pic1"]['name'];
			$config1['file_name'] = $new_name; 

			$this->load->library('upload', $config1);
			
				
							
			if ( ! $this->upload->do_upload('pic1')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('dashboard/templates/header', $data);
					$this->load->view('dashboard/templates/nav');
                    $this->load->view('dashboard/new-post', $error);
                    $this->load->view('dashboard/templates/footer');
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
                $config['max_size'] = '20000';
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
	$clean_title=convert_accented_characters($this->input->post('title'));
 	$slug= url_title($clean_title, 'dash', TRUE);
	
	
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
		'ad_town' => $this->input->post('ad_town'),
		'advert_status' => "1",
		'featured' => "No",
		'sold' => "0",
		'pic1' => $pix['file_name'],
		'user_id' => $user_id,
		'ad_date' => $date,
		
		'post_id'=>$post_id,
		
		
		
    );



		$this->Post_model->post_ad($data,$post_id,$fileName);
		
    
 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Ad successfully Published</div>'); 
		
		
        redirect(base_url("post/new-post"));
            
                

			}
		}
}





	   

public function my_ads($offset=0)
        {
	
	$config['total_rows'] = $this->Post_model->total_adverts();
  
  $config['base_url'] = base_url()."post/my_ads";
  $config['per_page'] = 6;
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
   

  $query = $this->Post_model->list_adverts(6,$this->uri->segment(3));
  
  $data['advert'] = null;
  
  if($query){
   $data['advert'] =  $query;
  }

 		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Account_Model->get_user($user_id);              
	 	$data['total_ad'] =  $this->Post_model->total_adverts();
	 	$data['fav_ads'] =  $this->Post_model->total_fav_ads();
	 	$data['sold_ads'] =  $this->Post_model->total_sold();      

        $data['title'] = 'My Ads Listing';

        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/my-ads', $data);
		
		$this->load->view('dashboard/templates/footer');
        }


 public function sold_ads($offset=0)
        {
	
	$config['total_rows'] = $this->Post_model->total_sold();
  
  $config['base_url'] = base_url()."post/my_ads";
  $config['per_page'] = 6;
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
   

  $query = $this->Post_model->sold_adverts(6,$this->uri->segment(3));
  
  $data['advert'] = null;
  
  if($query){
   $data['advert'] =  $query;
  }

 		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Account_Model->get_user($user_id);              
	 	$data['total_ad'] =  $this->Post_model->total_adverts();
	 	$data['fav_ads'] =  $this->Post_model->total_fav_ads();
	 	$data['sold_ads'] =  $this->Post_model->total_sold();   

        $data['title'] = 'My Ads Listing';

        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/sold-ads', $data);
		
		$this->load->view('dashboard/templates/footer');
        }



public function edit_ad()
{
	 $this->load->helper('url');
	$user_id = $this->session->userdata('user_id');
	  $post_id = $this->uri->segment(3);
	 $data['user'] = $this->Account_Model->get_user($user_id);    

    
	
	 $data['advert'] = $this->Post_model->get_advert_by_id($post_id);
	 $data['image']=$this->Post_model->get_advert_image($post_id);
    $data['title'] = 'Edit Ads';
	
   		 $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/edit-ad', $data);
		
		$this->load->view('dashboard/templates/footer');
    }


    public function deleteimage(){
            $deleteid  = $this->input->post('image_id');
            $this->db->delete('images', array('id' => $deleteid)); 
            $verify = $this->db->affected_rows();
            echo $verify;

        }



public function edit(){
			if (!empty($_FILES['pic1']['name'])) {

		
			$config1['upload_path']          = './uploads/';
			$config1['allowed_types']        = 'gif|jpg|jpeg|png';
			$config1['overwrite'] = true;
			$config1['max_size']             = 1500;
			$config1['min_width'] = 			500;
			
			$new_name = rand(0000, 9999).$_FILES["pic1"]['name'];
			$config1['file_name'] = $new_name; 

			$this->load->library('upload', $config1);
			$this->upload->do_upload('pic1');
				
							
			if ( ! $this->upload->do_upload('pic1')){
				$error = array('error' => $this->upload->display_errors());
				$post_id = $this->input->post('post_id'); 
		
		$data['title'] = 'Edit Ads';
		
	
		$data['advert'] = $this->Post_model->get_advert_by_id($post_id);
		 $data['image']=$this->Post_model->get_advert_image($post_id);

		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/edit-ad', $data);
		
		$this->load->view('dashboard/templates/footer');

			}else{
								
					$pix=$this->upload->data();
              $files = $_FILES;
              if(!empty($files['userfile']['name'][0])){
              $count = count($_FILES['userfile']['name']);

              $post_id = $this->input->post('post_id');
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
				  
	$slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	
 
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
		
		'pic1' => $pix['file_name'],
	
    );



		$this->Post_model->edit_ad($data,$post_id,$fileName);
   $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have updated your Ads</div>');      
                
                }else{
                

              $post_id = $this->input->post('post_id');

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
		
		'pic1' => $pix['file_name'],
	
    );
              $this->Post_model->edit_ad($data,$post_id);
                }
$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have updated your Ads </div>');  
                redirect('post/edit_ad/'.$post_id);
                }

		}else{
		
				$files = $_FILES;
              if(!empty($files['userfile']['name'][0])){
              $count = count($_FILES['userfile']['name']);
              $post_id = $this->input->post('post_id');
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
				  
	$slug = url_title($this->input->post('title'), 'dash', TRUE);
	
	
 
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
	
    );



		$this->Post_model->edit_ad($data,$post_id,$fileName);
$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have updated your Ads </div>');  
            
                }else
                {
              $post_id = $this->input->post('post_id');
			  $slug = url_title($this->input->post('title'), 'dash', TRUE);
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
		
	
    );
              $this->Post_model->edit_ad($data,$post_id);
                }
$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have updated your Ads </div>');  

                redirect('post/edit_ad/'.$post_id);
                }		
		

			
		
		}

public function mark_sold()
    {
      $post_id = $this->uri->segment(3);
        
        if (empty($post_id))
        {
            show_404();
        }

        $data = array(
        	'sold' => 1,
        );

      $this->Post_model->mark_sold($data,$post_id);
      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Ad marked Sold </div>');  
        redirect( base_url() . 'post/sold_ads');     
  }

public function unmark_sold()
    {
      $post_id = $this->uri->segment(3);
        
        if (empty($post_id))
        {
            show_404();
        }

        $data = array(
        	'sold' => 0,
        );

      $this->Post_model->mark_sold($data,$post_id);
      $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Ad Unmarked Sold </div>');  
        redirect( base_url() . 'post/my_ads');     
  }

public function delete_ad()
    {
      $post_id = $this->uri->segment(3);
        
        if (empty($post_id))
        {
            show_404();
        }
                
      
        
        $this->Post_model->delete_ad($post_id);        
        redirect( base_url() . 'post/my_ads');        
    }





public function fav_ads($offset=0)
        {
	
	$config['total_rows'] = $this->Post_model->total_fav_ads();
  
  $config['base_url'] = base_url()."post/fav_ads";
  $config['per_page'] = 6;
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
   

  $query = $this->Post_model->fav_ads(6,$this->uri->segment(3));
  
  $data['advert'] = null;
  
  if($query){
   $data['advert'] =  $query;
  }

 		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->Account_Model->get_user($user_id);              
	 	$data['total_ad'] =  $this->Post_model->total_adverts();
	 	$data['fav_ads'] =  $this->Post_model->total_fav_ads(); 
	 	$data['sold_ads'] =  $this->Post_model->total_sold();       

        $data['title'] = 'My Favourite Ads';

        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
		$this->load->view('dashboard/fav-ads', $data);
		
		$this->load->view('dashboard/templates/footer');
        }

public function un_fav()
    {
      $post_id = $this->uri->segment(3);
        
        if (empty($post_id))
        {
            show_404();
        }
                
      
        
        $this->Post_model->un_fav($post_id);        
        redirect( base_url() . 'post/fav_ads');        
    }




}