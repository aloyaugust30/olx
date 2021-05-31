<?php

class Account_Model extends CI_Model{

    function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
		$this->load->helper('string');
		$this->load->library('email');
		date_default_timezone_set('Africa/Lagos');
	
    }
    
	 public function get_message($slug = FALSE)
    {
		
        if ($slug === FALSE)
        {
			$this->db->limit(5);
			$this->db->order_by('id', 'DESC');
			$this->db->where('slug', $slug);
            $query = $this->db->get('message');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('message', array('slug' => $slug));
        return $query->row_array();
    }

function get_all_messages($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('message');
            return $query->result_array();
 }

 function totalmessage(){
  return $this->db->count_all_results('message');
 }
 
	
	 public function get_user($user_id)
    {
		
       
 
        $query = $this->db->get_where('user_table', array('user_id' => $user_id));
        return $query->row_array();
    }
    
	
	
    //insert user details to user table
    public function insertUser($data){
        
        return $this->db->insert('user_table',$data);
      
    }
    
    public function loginUser($email, $password){
        //$this->db->where(array('username' = >$username, 'password' => $password));
        $query = $this->db->get_where('user_table', array('email' => $email, 'password' => $password,'status'=> 1));   //status sholud be 1
        
        if($query->num_rows() == 1){
            
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->user_id;
                $userArr[1] = $row->email;
				
                
            }
            $userdata = array(
                'user_id' => $userArr[0],
                'email' => $userArr[1],
				
				
                'logged_in'=> TRUE
            );
            $this->session->set_userdata($userdata);
            
            return $query->result();
        }else{
            return false;
        }
    }
    
    
    //send confirm mail
    public function sendEmail($receiver){
        
        
        
        
       $mail_message='Dear User,'. "\r\n";
        $mail_message.='Please click on the below activation link to verify your email address<br><br>
        <a href=\'http://olx.local/account/confirmEmail/'.md5($receiver).'\'>http://olx.local/account/confirmEmail/'. md5($receiver).'</a>' ."\r\n";
        $mail_message.='<br>Please contact the admin if your account could not be verifed';
        $mail_message.='<br><br>Thanks & Regards';
        $mail_message.='<br>yudala';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
         $mail = new PHPMailer;
       	//$mail->isSMTP();
        $mail->SMTPSecure = "true"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('noreply@axiatag.com', 'Yudala');
        $mail->addReplyTo("noreply@axiatag.com", "");
        $mail->IsHTML(true);
        $mail->addAddress($receiver);
        $mail->Subject = 'Verify Email';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
			//for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }
    
    //activate account
    function verifyEmail($key){
        $data = array('status' => 1);
        $this->db->where('md5(email)',$key);
        return $this->db->update('user_table', $data);    //update status as 1 to make active user
    }
	

public function loginAdmin($username, $password){
        //$this->db->where(array('username' = >$username, 'password' => $password));
        $query = $this->db->get_where('admin_table', array('username' => $username, 'password' => $password));   //status sholud be 1
        
        if($query->num_rows() == 1){
            
            $userArr = array();
            foreach($query->result() as $row){
                $userArr[0] = $row->admin_id;
                $userArr[1] = $row->username;
				
                
            }
            $userdata = array(
                'admin_id' => $userArr[0],
                'username' => $userArr[1],
				
                'logged_in'=> TRUE
            );
            $this->session->set_userdata($userdata);
            
            return $query->result();
        }else{
            return false;
        }
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


public function update_profile($user_id,$data)
    {       
          $this->db->where('user_id', $user_id);
          return $this->db->update('user_table', $data);
        
    } 	


public function get_user_by_email($email)
    {
        
    return $this->db
        ->where('email',$email)
        ->get('user_table')
        ->result();
                

    }


public function send_email($useremail,$slug,$user_id){
        
        
        
        
       $mail_message='Dear User,'. "\r\n";
        $mail_message.='You requested to change you password<br><br>
        <a href=\'http://olx.local/account/reset_password/'.$slug.'/'.$user_id.'\'>http://olx.local/account/reset_password/'. $slug.'/'.$user_id.'</a>' ."\r\n";
        $mail_message.='<br>Please Click on the link above to Change your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Yudala';        
        date_default_timezone_set('Africa/Lagos');
        
        require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
        
        
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPSecure = "ssl"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('nobleprojects001@gmail.com', 'Yudala');
        $mail->IsHTML(true);
        $mail->addAddress($useremail);
        $mail->Subject = 'Password Reset';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
            //for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }
    
public function get_slug($user_id)
    {
        
    return $this->db
        ->where('user_id',$user_id)
        ->get('user_table')
        ->result();
                

    }

public function update_password($user_id,$data)  
    {
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
}


}

?>