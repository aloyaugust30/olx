<?php
class Advert_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        
        
        
        public function get_adverts($slug)
{
        $this->db->select('*');
        $this->db->from('adverts');
        $this->db->join('user_table', 'user_table.user_id = adverts.user_id');
        $this->db->where('adverts.slug', $slug);
        
        $query = $this->db->get();
        
        return $query->row_array();
        
}


public function get_images($post_id)
    {

            $this->db->where('post_id', $post_id);
            $query = $this->db->get('images');
            return $query->result_array();
      
    }


public function featured_adverts()
    {
        $this->db->limit('3');
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->join('adverts', 'adverts.user_id = user_table.user_id','left');
        $this->db->order_by('adverts.id', 'RANDOM');
        $this->db->where('featured','Yes');
        $result = $this->db->get()->result_array();
         return $result;
        }


public function featured_adverts_2()
    {
        $this->db->limit('6');
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->join('adverts', 'adverts.user_id = user_table.user_id','left');
        $this->db->order_by('adverts.id', 'RANDOM');
        $this->db->where('featured','Yes');
        $result = $this->db->get()->result_array();
         return $result;
        }



public function featured_adverts3()
{
      
                $query = $this->db->get('user_table');
                return $query->result_array();
       
}


function list_adverts($limit=null,$offset=NULL){
           $this->db->limit($limit, $offset);
            $this->db->select('*');
            $this->db->from('user_table');
            $this->db->join('adverts', 'adverts.user_id = user_table.user_id','left');
            $this->db->order_by("adverts.id", "DESC");
            $this->db->where('adverts.advert_status','1');
            $this->db->where('adverts.sold','0');
            $result = $this->db->get()->result_array();
             return $result;
 }

 function totaladverts(){
  return $this->db
        ->where('advert_status', '1')
        ->where('sold', '0')
        ->count_all_results('adverts');
 }


function list_ad_cat($limit=null,$offset=NULL,$category){
           $this->db->limit($limit, $offset);
            $this->db->select('*');
            $this->db->from('user_table');
            $this->db->join('adverts', 'adverts.user_id = user_table.user_id','left');
            $this->db->order_by("adverts.id", "DESC");
            $this->db->where('adverts.advert_status','1');
            $this->db->where('adverts.sold','0');
            $this->db->where('adverts.category',$category);
            $result = $this->db->get()->result_array();
             return $result;
 }

 function totalad_cat($category){
  return $this->db
        ->where('advert_status', '1')
        ->where('sold', '0')
        ->where('category', $category)
        ->count_all_results('adverts');
 }



 function list_sub_cat($limit=null,$offset=NULL,$category){
           $this->db->limit($limit, $offset);
            $this->db->select('*');
            $this->db->from('user_table');
            $this->db->join('adverts', 'adverts.user_id = user_table.user_id','left');
            $this->db->order_by("adverts.id", "DESC");
            $this->db->where('adverts.advert_status','1');
            $this->db->where('adverts.sold','0');
            $this->db->where('adverts.sub_category',$category);
            $result = $this->db->get()->result_array();
             return $result;
 }

 function totalad_sub_cat($category){
  return $this->db
        ->where('advert_status', '1')
        ->where('sold', '0')
        ->where('sub_category', $category)
        ->count_all_results('adverts');
 }

function filter_ad($limit=null,$offset=NULL,$category,$page1,$sort){
           $this->db->limit($limit, $offset);
            $this->db->select('*');
            $this->db->from('user_table');
            $this->db->join('adverts', 'adverts.user_id = user_table.user_id','left');
            $this->db->order_by("adverts.id", "DESC");
            $this->db->where('adverts.advert_status','1');
            $this->db->where('adverts.category',$category);
            $this->db->where('adverts.category',$category);
            $result = $this->db->get()->result_array();
             return $result;
             
 }

 function totalad_filter($category,$page1,$sort){
  return $this->db
        ->where('advert_status', '1')
        ->where('category', $category)
        ->where($page1, $page1)
        ->where('condition', $sort)
        ->count_all_results('adverts');
 }



function related_adverts($related = 'default', $limit=3,$offset=NULL){
    
    
            $this->db->limit($limit, $offset);
            $this->db->order_by('id','DESC');
          $this->db->select('*');
        $this->db->from('adverts');
        $this->db->like('tags',$related);
        $this->db->or_like('description',$related);
        $this->db->or_like('category',$related);
        $this->db->where('advert_status', '1');
        

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
 }


 public function recent_adverts()
{
            $this->db->limit(4);
            $this->db->order_by('id','DESC');
            $this->db->where('advert_status', '1');
          $query = $this->db->get('adverts');
           return $query->result_array();
        
}    

public function add_fav($user_id,$post_id,$data){


        $query = $this->db->get_where('fav_ads', array('user_id' => $user_id, 'post_id' => $post_id)); 

        if ($query->num_rows() > 0){

            $array = array('user_id' => $user_id, 'post_id' => $post_id );
            
            
        }
        else{
              $this->db->insert('fav_ads',$data);
        }
                    
       
      
    }


    public function report($data)
    {
        
      
            $this->db->insert('report',$data);
       
    }


public function get_category($category)
    {
        
      
            $this->db->where('category', $category);
            $this->db->where('project_status', 'pending');
            $query = $this->db->get('projects');
            return $query->result_array();
       
    }
    

public function count_vehicles()
{
    
    return $this->db
        ->where('category', 'Vehicle')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}

public function count_mobile()
{
    
    return $this->db
        ->where('category', 'Mobile Phone & Tablets')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}

public function count_home()
{
    
    return $this->db
        ->where('category', 'Home, Furniture & Garden')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}

public function count_estate()
{
    
    return $this->db
        ->where('category', 'Real Estate')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}

public function count_job()
{
    
    return $this->db
        ->where('category', 'Job & Services')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}

public function count_electronic()
{
    
    return $this->db
        ->where('category', 'Electronic & Video')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}

public function count_pets()
{
    
    return $this->db
        ->where('category', 'Animals & Pets')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}

public function count_hobbies()
{
    
    return $this->db
        ->where('category', 'Hobbies, Arts & Sports')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}


public function count_fashion()
{
    
    return $this->db
        ->where('category', 'Fashion')
        ->where('advert_status', '1')
        ->count_all_results('adverts');
}


public function get_users()
{
       
            $this->db->where('user !=', 'employer');
            $query = $this->db->get('user_table');
            return $query->result_array();
}

 public function insert_comment($data){
        
        return $this->db->insert('board',$data);
      
    }
    
    
function search_adverts($search = 'default', $limit=null,$offset=NULL,$category){
    
    
            $this->db->limit($limit, $offset);
            $this->db->order_by('id','DESC');
          $this->db->select('*');
        $this->db->from('adverts');
        $this->db->like('title',$search);
       
        $this->db->or_like('category',$search);
        $this->db->where('category', $category);
        

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
 }
 
  function totalsearch($search = 'default',$category){
 $sql = "select * from adverts where title like '%$search%' OR description like '%$search%' OR category like '%$search%' AND category = '$category' ";
        $query = $this->db->query($sql);
        return $query->num_rows();
 }
 
 
 public function contact_admin($name,$email,$subject,$comment){
        
        
        
        
       $mail_message='Dear Admin,'. "\r\n";
        $mail_message.='A user with the following details contacted you'."\r\n";
        $mail_message.=' Name'.$name."\r\n";
        
        $mail_message.=' Email'.$email."\r\n";
        $mail_message.=' Phone'.$subject."\r\n";
        $mail_message.=' Name'.$comment."\r\n";
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Axiatag';        
        date_default_timezone_set('Africa/Lagos');
        
        require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
        
        
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Timeout = 120;
        $mail->SMTPSecure = "ssl"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('no-reply@axiatag.com', 'Axiatag');
        $mail->IsHTML(true);
        $mail->addAddress('contact@axiatag.com');
        $mail->Subject = 'Customer Contact ';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
            //for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }
 
 

}