<?php
class Message_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
 public function get_user($user_id)    {
            
            $this->db->select('*');
            $this->db->from('user_table');
            $this->db->where('user_id', $user_id);
            $query = $this->db->get();
            
            return $query->row_array();
       
    }

public function get_user_detail($user_detail)    {
            
            $this->db->select('*');
            $this->db->from('user_table');
            $this->db->where('user_id', $user_detail);
            $query = $this->db->get();
            
            return $query->row_array();
       
    }

public function get_advert($post_id)    {
            
            $this->db->select('*');
            $this->db->from('adverts');
            $this->db->where('post_id', $post_id);
            $query = $this->db->get();
            
            return $query->row_array();
       
    }  

    public function post_inbox($user_id,$post_id,$data2,$data3){


        $query = $this->db->get_where('inbox', array('ad_owner' => $user_id, 'post_id' => $post_id)); 

        if ($query->num_rows() > 0){

            $array = array('ad_owner' => $user_id, 'post_id' => $post_id );
            
            $this->db->where($array);
             $this->db->update('inbox', $data3);
        }
        else{
              $this->db->insert('inbox',$data2);
        }
                    
       
      
    }

     public function post($data){

         return $this->db->insert('message',$data);
      
    }

    function inbox($current_user){

            
            $array = array('message.ad_owner' => $current_user);

            $this->db->order_by('inbox.id', 'DESC');
            $this->db->select('*');
            $this->db->from('inbox');
            $this->db->join('adverts', 'inbox.post_id = adverts.post_id','left');
            $this->db->join('user_table', 'inbox.user_id = user_table.user_id','left');
            $this->db->where('inbox.ad_owner', $current_user);
            $this->db->or_where('inbox.user_id', $current_user);
           
            $result = $this->db->get()->result_array();
             return $result;
 }

    function get_mess($post_id){
    
            $this->db->order_by('message.id', 'ASC');
            $this->db->select('*');
            $this->db->from('message');
            $this->db->join('user_table', 'message.user_id = user_table.user_id','left');
            $this->db->where('message.post_id', $post_id);
            $result = $this->db->get()->result_array();
             return $result;
 }



public function get_unpaid()    {
	 $array = array('method !=' => 'online', 'status' => 'pending'); 
	 		
			$this->db->where($array);
			
            $query = $this->db->get('order');
            return $query->result_array();
       
    }
public function confirm_pay($ref,$data)  
    {		
          $this->db->where('order_id', $ref);
          return $this->db->update('order', $data);
        
    } 
	
	
	
function list_jobs($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('booking');
            return $query->result_array();
 }

 function totaljobs(){
  return $this->db->count_all_results('booking');
 }
 
 
function list_users($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$this->db->where('user_type', 'user');
			$query = $this->db->get('user_table');
            return $query->result_array();
 }

 function totalusers(){
  return $this->db
        ->where('user_type','user')
        ->count_all_results('user_table');
 }
 

function list_typist($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$this->db->where('user_type', 'typist');
			$query = $this->db->get('user_table');
            return $query->result_array();
 }

 function totaltypist(){
  return $this->db
        ->where('user_type','typist')
        ->count_all_results('user_table');
 }
 
public function suspend_typist($data,$user_id)  
    {		
          $this->db->where('user_id', $user_id);
          return $this->db->update('user_table', $data);
        
    } 



public function delete_job($job_id)
    {
        $this->db->where('id', $job_id);
        return $this->db->delete('booking');
    }
	
public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('user_table');
    }
	
	
 
function get_approved_projects($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->select('*');
			$this->db->from('projects');
			$this->db->join('proposal', 'proposal.project_id = projects.project_id','left');
			
			$result = $this->db->get()->result_array();
			 return $result;
 }

public function get_emails()    {
		
		$this->db->select('email');
		$this->db->from('user_table');
		$result = $this->db->get()->result_array();
		 return $result;
       
    }
	
public function new_message($data)
{
   
    return $this->db->insert('message', $data);
	
	
	
}


public function send_email($title,$message,$date,$email2){
        
        
        
        
       $mail_message='Dear User,'. "\r\n";
        $mail_message='<br><br> You have a new message fro Axiatag'. "\r\n";
        $mail_message.='<br><h3>'. $title.'</h3>';
        $mail_message.='<br><br>'.$message;
		$mail_message.='<br><h5>'. $date.'</h5>';
        $mail_message.='<br><br>Axiatag';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
        $mail->isSMTP();
		$mail->SMTPSecure = "true"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('admin@axiatag.com', 'Axiatag');
        $mail->addReplyTo("no-reply@axiatag.com", "");
        $mail->IsHTML(true);
        $mail->addAddress($email2);
        $mail->Subject = 'New Message';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
			//for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }

function get_all_message($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('message');
            return $query->result_array();
 }

 function totalmessage(){
  return $this->db->count_all_results('message');
 }

public function delete_message($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('message');
    }


}