<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 date_default_timezone_set("Asia/Jakarta");
		 
	}
    public function index(){
        $this->view();
    }

    public function view(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'user',
            'listUser'  => $this->db->query("SELECT * FROM userlogin"),
        );
        $this->load->view('user/user_view',$data);
    }

    public function Add($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'user',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('user/user_form_view',$data);
    }
	 public function save_user(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$User=$_POST['User'];
			$Username=$_POST['Username']; 
			$Password=$_POST['Password']; 
			$visible=$_POST['visible'];
			$passUser=password_hash($Password,PASSWORD_DEFAULT);
			// if(password_verify($Password, $passUser)){
				// die($Password);
			// }else{	
				// die($passUser);
			// }
				$sqlCek=$this->db->where('login_user',$User)->get('userlogin');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'user',
								'errorData'   =>0,
							);
					$this->load->view('user/user_form_view',$data);
				}else{
					$dataInput=array(
									// "rLoginSourceId"=>$source,
									"login_key"			=> md5($Username),
									"login_division_id"	=> 1,
									"login_level_id"	=> 1,
									"login_user"		=> $User,
									"login_name"		=> $Username,
									"login_password"	=> $passUser,
									"login_visible"		=> $visible,
									"login_insert_user"	=> $this->session->userdata('userId'),
									"login_insert_datetime" => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('userlogin',$dataInput);
					
					
					
					redirect('user');
					
				}
				
				
		}else{
			redirect('user/add');
		}
	}
	public function update_user(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			$id=$_POST['id']; 
			// die($id);
			$User=$_POST['User'];
			$Username=$_POST['Username']; 
			$Password=$_POST['Password']; 
			$visible=$_POST['visible'];
			$passUser=password_hash($Password,PASSWORD_DEFAULT);
			
				$sqlCek=$this->db->where('login_id',$id)->get('userlogin');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('login_id')==$id){
						$dataInput=array(
									// "rLoginSourceId"=>$source,
									"login_user"=>$User,
									"login_name"=>$Username,
									"login_password"=>$passUser,
									"login_visible"=>$visible,
									"login_insert_user"=>$this->session->userdata('userId'),
									"login_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('login_id',$id)->update('userlogin',$dataInput);
						redirect('user');
					 }else{
						 $data = array(
								'sidebar'   => 'user',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('user/user_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									// "rLoginSourceId"=>$source,
									"login_user"=>$User,
									"login_name"=>$Username,
									"login_password"=>$passUser,
									"login_visible"=>$visible,
									"login_insert_user"=>$this->session->userdata('userId'),
									"login_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('userlogin', $dataInput, array('login_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('user');
					
					
				}
				
				
		}else{
			redirect('user/add');
		}
	}
	public function edit_user($id){
		$sqlUser=$this->db->where('login_id',$id)->get('userlogin');
		
		if($sqlUser->num_rows()>0){
			$rrUser=$sqlUser->row_array();
			$data = array(
								'sidebar'   => 'user',
								'errorData' =>1,
								// 'source'  =>$rrUser['rLoginSourceId'],
								'user'    =>$rrUser['login_user'],
								'name'    =>$rrUser['login_name'],
								'password'  =>$rrUser['login_password'],
								'visible'   =>$rrUser['login_visible'],
								'idUser'    =>$rrUser['login_id'],
							);
			$this->load->view('user/edit_form_view',$data);
		
		
		}else{
			redirect('user');
		}
	}
	public function save_menu(){
		 // map_umenu_login_id
 	// die(print_r($_POST));
		$dataInsert=array(
				"map_umenu_login_id"=>$_POST['idUser'],
				"map_umenu_ref_id"=>$_POST['menu'],
				"map_umenu_insert_user"=>$this->session->userdata('userId'),
				"map_umenu_insert_datetime"=>date('Y-m-d H:i:s')
		);
		// die(print_r($dataInsert));
		$sqlCek=$this->db->where('map_umenu_login_id',$_POST['idUser'])
						->where('map_umenu_id',$_POST['menu'])
						->get('map_user_menu');
		if($sqlCek->num_rows()>0){
			redirect('user/edit_user/'.$_POST['idUser']);
		}else{
			$this->db->insert('map_user_menu',$dataInsert);
		}
		redirect('user/edit_user/'.$_POST['idUser']);
		
	}
	public function deleteMenu($id){
		$this->db->query("DELETE FROM userlogin where login_id = '".$id."'");
		redirect('user');
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */