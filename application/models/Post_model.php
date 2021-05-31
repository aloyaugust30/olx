<?php
class Post_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
                $this->load->library('session');
        }
        
        
        

public function post_ad($data,$post_id,$fileName)
    {
      $this->db->insert('adverts', $data); 
      
      if($fileName!='' ){
      $filename1 = explode(',',$fileName);
      foreach($filename1 as $file){
      $file_data = array(
      'image' => $file,
      'post_id' => $post_id
      );
      $this->db->insert('images', $file_data);
      }
      }
    }


function list_adverts($limit=null,$offset=NULL){
  
  $user_id = $this->session->userdata('user_id');
  
      $this->db->limit($limit, $offset);
      $this->db->order_by('id', 'DESC');
      $this->db->where('user_id', $user_id);
      $this->db->where('sold', 0);
      $query = $this->db->get('adverts');
            return $query->result_array();
 }

 function total_adverts(){
  $user_id = $this->session->userdata('user_id');

  return $this->db
        ->where('user_id', $user_id)
        ->where('sold', 0)
        ->count_all_results('adverts');
 }


 function sold_adverts($limit=null,$offset=NULL){
  
  $user_id = $this->session->userdata('user_id');
  
      $this->db->limit($limit, $offset);
      $this->db->order_by('id', 'DESC');
      $this->db->where('user_id', $user_id);
      $this->db->where('sold', 1);
      $query = $this->db->get('adverts');
            return $query->result_array();
 }

 function total_sold(){
  $user_id = $this->session->userdata('user_id');

  return $this->db
        ->where('user_id', $user_id)
        ->where('sold', 1)
        ->count_all_results('adverts');
 }


 function fav_ads($limit=null,$offset=NULL){
  
  $user_id = $this->session->userdata('user_id');
  
      $this->db->select('*');
    $this->db->from('fav_ads');
    $this->db->join('adverts', 'fav_ads.post_id = adverts.post_id','left');
    $this->db->where('fav_ads.user_id',$user_id);
    $result = $this->db->get()->result_array();
            return $result;
 }

 function total_fav_ads(){
  $user_id = $this->session->userdata('user_id');

  return $this->db
        ->where('user_id', $user_id)
        ->count_all_results('fav_ads');
 }




public function get_advert_by_id($post_id )
    {
        
            $this->db->where('post_id', $post_id);
            $query = $this->db->get('adverts');
            return $query->result_array();
    }

public function get_advert_image($post_id)    {
      
      $this->db->where('post_id',$post_id);
      
            $query = $this->db->get('images');
            return $query->result_array();
       
    } 

 public function edit_ad($data,$post_id,$filename ='')
    {

        $this->db->where('post_id', $post_id);
        $this->db->update('adverts', $data);

      if($filename!='' ){
      $filename1 = explode(',',$filename);
      foreach($filename1 as $file){
      $file_data = array(
      'image' => $file,
      'post_id' => $post_id
      );
      $this->db->insert('images', $file_data);
      }
      }
    }

public function mark_sold($data,$post_id)
    {

        $this->db->where('post_id', $post_id);
        $this->db->update('adverts', $data);

    }


public function delete_ad($post_id)
    {
        $this->db->where('post_id', $post_id);
        return $this->db->delete('adverts');
    }

public function un_fav($post_id)
    {
        $this->db->where('post_id', $post_id);
        return $this->db->delete('fav_ads');
    }

  
}