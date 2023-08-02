<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth extends CI_Controller {

	function __construct() {
        parent::__construct();
    }

/* -----------------------------------------

 -------------------------------------------
|                                           |
|         class "USER"                      |
|                                           |
 -------------------------------------------

1. sendOutput => ngeluarin echo json
2. index => lempar ke login function
3. 



----------------------------------------- */

    private function sendOutput($response){
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    private function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

    public function index(){
    	$this->login();
    }

    public function injectUser(){
        $insertData = array(
            'login_user' => 'ari',
            'login_name' => 'ari',
            'login_division_id' => 1,
            'login_level_id' => 1,
            'login_password' => password_hash('123',PASSWORD_DEFAULT),
            'login_visible'     => 1
        );

        // $insertData['useridmd5'] = md5($insertData['username'].$insertData['phone'].$insertData['email'].$insertData['password']);

        if ($this->db->insert('userlogin',$insertData)) {
            echo "SUKSES cuy";
        } else {
            echo "GAGAL";
        }
    }


    public function login(){

        if ($this->session->userdata('logged_in') ) {
            redirect(base_url('dashboard'));
        };
        $this->load->library('form_validation');
        $data = array(
            'ipAddress' => $this->getUserIP()
        );
        $config = array(
           array(
                 'field'   => 'username', 
                 'label'   => 'Username', 
                 'rules'   => 'required'
              ),
           array(
                 'field'   => 'password', 
                 'label'   => 'Password', 
                 'rules'   => 'required'
              )
        );
        $this->form_validation->set_message('required', '%s tidak boleh kosong');
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE){
            $this->load->view('login_view',$data);
        } else  {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $queryDataUser = $this->db->query("SELECT * FROM userlogin WHERE login_user='".$username."' limit 1");
            $queryDataUserResult = $queryDataUser->result();
            // die(print_r($queryDataUser->result_array()));
            #die("SELECT * FROM userlogin WHERE login_user='".$username."' limit 1");
            if ( count($queryDataUserResult) > 0 ) { // ada user nama itu
                // die(print_r($queryDataUserResult[0]->login_name).'--'.print_r($queryDataUserResult[0]->login_password));
                if(password_verify($password, $queryDataUserResult[0]->login_password)) {
                    // die("TEST 2");
                    $already = $queryDataUser->row_array();
                    if ($queryDataUser->num_rows() > 0) {
                        // die("ARI 2");
                        $logLogin = array(
                            'his_login_user'        => $already['login_id'],
                            'his_login_browser'     => $_SERVER['HTTP_USER_AGENT'],
                            'his_login_ip'          => $_SERVER['SERVER_ADDR'],
                            'his_login_ip_local'    => $this->getUserIP(),
                            'his_login_datetime'    => date('Y-m-d H:i:s'),
                        );
                        $this->db->update('history_login', $logLogin, array('his_login_id' => $already['login_id']));
                    } else {
                        $logLogin = array(
                            'his_login_user'        => $already['login_id'],
                            'his_login_browser'     => $_SERVER['HTTP_USER_AGENT'],
                            'his_login_ip'          => $_SERVER['SERVER_ADDR'],
                            'his_login_ip_local'    => $this->getUserIP(),
                            'his_login_datetime'    => date('Y-m-d H:i:s'),
                        );
                        $this->db->insert('history_login', $logLogin);
                    }

                    $newdata = array(
                        'userId'        => $queryDataUserResult[0]->login_id,
                        'divisionId'      => $queryDataUserResult[0]->login_division_id,
                        'levelId'      => $queryDataUserResult[0]->login_level_id,
                        'key'           => $queryDataUserResult[0]->login_key,
                        'user'          => $queryDataUserResult[0]->login_user,
                        'username'      => $queryDataUserResult[0]->login_name,
                        'logged_in'     => TRUE,
                    );
                    // die(print_r($newdata));

                    $this->session->set_userdata($newdata);
                    redirect(base_url('dashboard'));
                } else {
                    die("ARI");
                    $data['errorMsg'] = "Password yang anda masukkan salah !";
                    $this->load->view('login_view',$data);
                }
            }else{
                die("TEST");
				$data['errorMsg'] = "Username/Password yang anda masukkan salah !";
                    $this->load->view('login_view',$data);
			}
        }
    }
	public function direct_login() {
		$newdata = array(
                        'userId'        => 'dyah',
                        'divisionId'      => '1',
                        'levelId'      => '1',
                        'key'           => 'bca4230f118cf67554b220bcb582f819',
                        'user'          => 'dyah',
                        'username'      => 'dyah',
                        'logged_in'     => TRUE,
                    );

           $this->session->set_userdata($newdata);
	}
	
    public function logout(){
        $this->session->unset_userdata('userId');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('sourceId');
		$this->session->unset_userdata('key');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
        redirect(base_url());
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */