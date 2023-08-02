<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Reference extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 date_default_timezone_set("Asia/Jakarta");
		 
	}
    // public function index(){
    //     $this->view();
    // }

    public function branch(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'branch',
            'listBranch'  => $this->db->query("SELECT * FROM ref_branch"),
        );
        $this->load->view('reference/branch_view',$data);
    }

    public function add_branch($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'user',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('reference/branch_form_view',$data);
    }
	 public function save_branch(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$branch=ucfirst($_POST['branch']);
			$visible=$_POST['visible'];
			
			
				$sqlCek=$this->db->where('rbranch_name',$branch)->get('ref_branch');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'branch',
								'errorData'   =>0,
							);
					$this->load->view('reference/branch_form_view',$data);
				}else{
					$dataInput=array(
									
									"rbranch_name"				 => $branch,
									"rbranch_visible"			 => $visible,
									"rbranch_insert_user"		 => $this->session->userdata('userId'),
									"rbranch_insert_datetime" 	 => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('ref_branch',$dataInput);
					
					
					
					redirect('reference/branch');
					
				}
				
				
		}else{
			redirect('reference/add_branch');
		}
	}
	public function update_branch($id='0'){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			// $id=$_POST['id']; 
			// die($id);
			$branch=ucfirst($_POST['branch']);
			$visible=$_POST['visible'];
				// $cek = $this->db->query("SELECT * FROM ref_branch where rbranch_id = '".$id."'");
				// die(print_r($cek->result_array()));
				$sqlCek=$this->db->where('rbranch_id',$id)->get('ref_branch');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('rbranch_id')==$id){
						$dataInput=array(
									
									"rbranch_name"=>$branch,
									"rbranch_visible"=>$visible,
									"rbranch_insert_user"=>$this->session->userdata('userId'),
									"rbranch_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('rbranch_id',$id)->update('ref_branch',$dataInput);
						redirect('reference/branch');
					 }else{
						 $data = array(
								'sidebar'   => 'branch',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('reference/branch_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									"rbranch_name"=>$branch,
									"rbranch_visible"=>$visible,
									"rbranch_insert_user"=>$this->session->userdata('userId'),
									"rbranch_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('ref_branch', $dataInput, array('rbranch_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('reference/branch');
					
					
				}
				
				
		}else{
			redirect('reference/add_branch');
		}
	}

	public function edit_branch($id){
		$sqlBranch=$this->db->where('rbranch_id',$id)->get('ref_branch');
		
		if($sqlBranch->num_rows()>0){
			$rrBranch=$sqlBranch->row_array();
			$data = array(
								"sidebar"  				 => 'branch',
								"errorData" 			 => 1,
								"id" 					 =>	$rrBranch['rbranch_id'],
								"nama_branch"			 => $rrBranch['rbranch_name'],
								"visible"			 	 => $rrBranch['rbranch_visible'],
								"inser_user"		 	 => $rrBranch['rbranch_insert_user'],
							);
			$this->load->view('reference/edit_form_view_branch',$data);
		
		
		}else{
			redirect('reference/branch');
		}
	}
	
	public function deleteBranch($id){
		$this->db->query("DELETE FROM ref_branch where rbranch_id = '".$id."'");
		redirect('reference/branch');
		
	}

	public function coverage(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'coverage',
            'listCoverage'  => $this->db->query("SELECT * FROM ref_coverage"),
        );
        $this->load->view('reference/coverage_view',$data);
    }

    public function add_coverage($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'coverage',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('reference/coverage_form_view',$data);
    }

    public function save_coverage(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$coverage=ucfirst($_POST['coverage']);
			$visible=$_POST['visible'];
			
			
				$sqlCek=$this->db->where('rcoverage_name',$coverage)->get('ref_coverage');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'coverage',
								'errorData'   =>0,
							);
					$this->load->view('reference/coverage_form_view',$data);
				}else{
					$dataInput=array(
									
									"rcoverage_name"				 => $coverage,
									"rcoverage_visible"			 	 => $visible,
									"rcoverage_insert_user"		 	 => $this->session->userdata('userId'),
									"rcoverage_insert_datetime" 	 => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('ref_coverage',$dataInput);
					
					
					
					redirect('reference/coverage');
					
				}
				
				
		}else{
			redirect('reference/add_coverage');
		}
	}

	public function update_coverage($id='0'){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			// $id=$_POST['id']; 
			// die($id);
			$coverage=ucfirst($_POST['coverage']);
			$visible=$_POST['visible'];
				// $cek = $this->db->query("SELECT * FROM ref_branch where rbranch_id = '".$id."'");
				// die(print_r($cek->result_array()));
				$sqlCek=$this->db->where('rcoverage_id',$id)->get('ref_coverage');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('rcoverage_id')==$id){
						$dataInput=array(
									
									"rcoverage_name"=>$coverage,
									"rcoverage_visible"=>$visible,
									"rcoverage_insert_user"=>$this->session->userdata('userId'),
									"rcoverage_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('rcoverage_id',$id)->update('ref_coverage',$dataInput);
						redirect('reference/coverage');
					 }else{
						 $data = array(
								'sidebar'   => 'coverage',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('reference/coverage_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									"rcoverage_name"=>$coverage,
									"rcoverage_visible"=>$visible,
									"rcoverage_insert_user"=>$this->session->userdata('userId'),
									"rcoverage_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('ref_coverage', $dataInput, array('rcoverage_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('reference/coverage');
					
					
				}
				
				
		}else{
			redirect('reference/add_coverage');
		}
	}

	public function edit_coverage($id){
		$sqlCoverage=$this->db->where('rcoverage_id',$id)->get('ref_coverage');
		
		if($sqlCoverage->num_rows()>0){
			$rrCoverage=$sqlCoverage->row_array();
			$data = array(
								"sidebar"  				 => 'coverage',
								"errorData" 			 => 1,
								"id" 					 =>	$rrCoverage['rcoverage_id'],
								"nama_coverage"			 => $rrCoverage['rcoverage_name'],
								"visible"			 	 => $rrCoverage['rcoverage_visible'],
								"insert_user"		 	 => $rrCoverage['rcoverage_insert_user'],
							);
			$this->load->view('reference/edit_form_view_coverage',$data);
		
		
		}else{
			redirect('reference/coverage');
		}
	}

	public function deleteCoverage($id){
		$this->db->query("DELETE FROM ref_coverage where rcoverage_id = '".$id."'");
		redirect('reference/coverage');
		
	}

    public function insurance(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'insurance',
            'listIns'  => $this->db->query("SELECT * FROM ref_insurance"),
        );
        $this->load->view('reference/insurace_view',$data);
    }

    public function add_insurance($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'insurance',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('reference/insurance_form_view',$data);
    }

    public function save_insurance(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$insurance=ucfirst($_POST['insurance']);
			$visible=$_POST['visible'];
			
			
				$sqlCek=$this->db->where('rins_name',$insurance)->get('ref_insurance');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'insurance',
								'errorData'   =>0,
							);
					$this->load->view('reference/insurance_form_view',$data);
				}else{
					$dataInput=array(
									
									"rins_name"				 => $insurance,
									"rins_visible"			 	 => $visible,
									"rins_insert_user"		 	 => $this->session->userdata('userId'),
									"rins_insert_datetime" 	 => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('ref_insurance',$dataInput);
					
					
					
					redirect('reference/insurance');
					
				}
				
				
		}else{
					
			redirect('reference/add_insurance');
		}
	}

	public function update_insurance($id='0'){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			// $id=$_POST['id']; 
			// die($id);
			$insurance=ucfirst($_POST['insurance']);
			$visible=$_POST['visible'];
				// $cek = $this->db->query("SELECT * FROM ref_branch where rbranch_id = '".$id."'");
				// die(print_r($cek->result_array()));
				$sqlCek=$this->db->where('rins_id',$id)->get('ref_insurance');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('rins_id')==$id){
						$dataInput=array(
									
									"rins_name"=>$insurance,
									"rins_visible"=>$visible,
									"rins_insert_user"=>$this->session->userdata('userId'),
									"rins_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('rins_id',$id)->update('ref_insurance',$dataInput);
						redirect('reference/insurance');
					 }else{
						 $data = array(
								'sidebar'   => 'insurance',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('reference/insurance_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									
									"rins_name"=>$insurance,
									"rins_visible"=>$visible,
									"rins_insert_user"=>$this->session->userdata('userId'),
									"rins_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('ref_insurance', $dataInput, array('rins_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('reference/insurance');
					
					
				}
				
				
		}else{
			redirect('reference/add_insurance');
		}
	}

	public function edit_insurance($id){
		$sqlInsurance=$this->db->where('rins_id',$id)->get('ref_insurance');
		
		if($sqlInsurance->num_rows()>0){
			$rrInsurance=$sqlInsurance->row_array();
			$data = array(
								"sidebar"  				 => 'insurance',
								"errorData" 			 => 1,
								"id" 					 =>	$rrInsurance['rins_id'],
								"nama_insurance"			 => $rrInsurance['rins_name'],
								"visible"			 	 => $rrInsurance['rins_visible'],
								"insert_user"		 	 => $rrInsurance['rins_insert_user'],
							);
			$this->load->view('reference/edit_form_view_insurance',$data);
		
		
		}else{
			redirect('reference/insurance');
		}
	}

	public function deleteInsurance($id){
		$this->db->query("DELETE FROM ref_insurance where rins_id = '".$id."'");
		redirect('reference/insurance');
		
	}

    public function menu(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'menu',
            'listMenu'  => $this->db->query("SELECT * FROM ref_menu"),
        );
        $this->load->view('reference/menu_view',$data);
    }

    public function add_menu($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'menu',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('reference/menu_form_view',$data);
    }

    public function save_menu(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$menu=ucfirst($_POST['menu']);
			$desc_menu=$_POST['desc_menu'];
			
			
				$sqlCek=$this->db->where('rmenu_title',$menu)->get('ref_menu');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'menu',
								'errorData'   =>0,
							);
					$this->load->view('reference/menu_form_view',$data);
				}else{
					$dataInput=array(
									
									"rmenu_title"				 => $menu,
									"rmenu_desc"			 	 => $desc_menu,
									"rmenu_insert_user"		 	 => $this->session->userdata('userId'),
									"rmenu_insert_datetime" 	 => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('ref_menu',$dataInput);
					
					
					
					redirect('reference/menu');
					
				}
				
				
		}else{
			redirect('reference/add_menu');
		}
	}

	public function update_menu($id='0'){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			// $id=$_POST['id']; 
			// die($id);
			$menu=ucfirst($_POST['menu']);
			$desc_menu=$_POST['desc_menu'];
				// $cek = $this->db->query("SELECT * FROM ref_branch where rbranch_id = '".$id."'");
				// die(print_r($cek->result_array()));
				$sqlCek=$this->db->where('rmenu_id',$id)->get('ref_menu');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('rmenu_id')==$id){
						$dataInput=array(
									
									"rmenu_title"=>$menu,
									"rmenu_desc"=>$menu,
									"rmenu_insert_user"=>$this->session->userdata('userId'),
									"rmenu_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('rmenu_id',$id)->update('ref_menu',$dataInput);
						redirect('reference/menu');
					 }else{
						 $data = array(
								'sidebar'   => 'menu',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('reference/menu_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									"rmenu_title"=>$menu,
									"rmenu_desc"=>$desc_menu,
									"rmenu_insert_user"=>$this->session->userdata('userId'),
									"rmenu_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('ref_menu', $dataInput, array('rmenu_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('reference/menu');
					
					
				}
				
				
		}else{
			redirect('reference/add_menu');
		}
	}

	public function edit_menu($id){
		$sqlMenu=$this->db->where('rmenu_id',$id)->get('ref_menu');
		
		if($sqlMenu->num_rows()>0){
			$rrMenu=$sqlMenu->row_array();
			$data = array(
								"sidebar"  				 => 'insurance',
								"errorData" 			 => 1,
								"id" 					 =>	$rrMenu['rmenu_id'],
								"nama_menu"		 		 => $rrMenu['rmenu_title'],
								"desc_menu"			 	 => $rrMenu['rmenu_desc'],
								"insert_user"		 	 => $rrMenu['rmenu_insert_user'],
							);
			$this->load->view('reference/edit_form_view_menu',$data);
		
		
		}else{
			redirect('reference/menu');
		}
	}

	public function deleteMenu($id){
		$this->db->query("DELETE FROM ref_menu where rmenu_id = '".$id."'");
		redirect('reference/menu');
		
	}

    public function pay_method(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'paymethod',
            'listPmet'  => $this->db->query("SELECT * FROM ref_pay_method"),
        );
        $this->load->view('reference/pay_method_view',$data);
    }

    public function add_pay_method($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'paymethod',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('reference/pay_method_form_view',$data);
    }

    public function save_pay_method(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$pay_method=ucfirst($_POST['pay_method']);
			$visible=$_POST['visible'];
			
			
				$sqlCek=$this->db->where('rins_name',$pay_method)->get('ref_insurance');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'pay_method',
								'errorData'   =>0,
							);
					$this->load->view('reference/pay_method_form_view',$data);
				}else{
					$dataInput=array(
									
									"rpay_method_name"				 => $pay_method,
									"rpay_method_visible"			 	 => $visible,
									"rpay_method_insert_user"		 	 => $this->session->userdata('userId'),
									"rpay_method_insert_datetime" 	 => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('ref_pay_method',$dataInput);
					
					
					
					redirect('reference/pay_method');
					
				}
				
				
		}else{
					
			redirect('reference/add_pay_method');
		}
	}

	public function update_pay_method($id='0'){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			// $id=$_POST['id']; 
			// die($id);
			$pay_method=ucfirst($_POST['pay_method']);
			$visible=$_POST['visible'];
				// $cek = $this->db->query("SELECT * FROM ref_branch where rbranch_id = '".$id."'");
				// die(print_r($cek->result_array()));
				$sqlCek=$this->db->where('rpay_method_id',$id)->get('ref_pay_method');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('rpay_method_id')==$id){
						$dataInput=array(
									
									"rpay_method_name"=>$pay_method,
									"rpay_method_visible"=>$visible,
									"rpay_method_insert_user"=>$this->session->userdata('userId'),
									"rpay_method_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('rpay_method_id',$id)->update('ref_pay_method',$dataInput);
						redirect('reference/pay_method');
					 }else{
						 $data = array(
								'sidebar'   => 'pay_method',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('reference/pay_method_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									
									"rpay_method_name"=>$pay_method,
									"rpay_method_visible"=>$visible,
									"rpay_method_insert_user"=>$this->session->userdata('userId'),
									"rpay_method_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('ref_pay_method', $dataInput, array('rpay_method_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('reference/pay_method');
					
					
				}
				
				
		}else{
			redirect('reference/add_pay_method');
		}
	}

	public function edit_pay_method($id){
		$sqlPayMethod=$this->db->where('rpay_method_id',$id)->get('ref_pay_method');
		
		if($sqlPayMethod->num_rows()>0){
			$rrMethod=$sqlPayMethod->row_array();
			$data = array(
								"sidebar"  				 => 'pay_method',
								"errorData" 			 => 1,
								"id" 					 =>	$rrMethod['rpay_method_id'],
								"nama_pay_method"		 => $rrMethod['rpay_method_name'],
								"visible"			 	 => $rrMethod['rpay_method_visible'],
								"insert_user"		 	 => $rrMethod['rpay_method_insert_user'],
							);
			$this->load->view('reference/edit_form_view_pay_method',$data);
		
		
		}else{
			redirect('reference/pay_method');
		}
	}

	public function deletePayMethod($id){
		$this->db->query("DELETE FROM ref_pay_method where rpay_method_id = '".$id."'");
		redirect('reference/pay_method');
		
	}

    public function rm(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'rm',
            'listRm'  => $this->db->query("SELECT * FROM ref_rm"),
        );
        $this->load->view('reference/rm_view',$data);
    }

    public function add_rm($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'rm',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('reference/rm_form_view',$data);
    }

    public function save_rm(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$rm=ucfirst($_POST['rm']);
			$visible=$_POST['visible'];
			
			
				$sqlCek=$this->db->where('rm_name',$rm)->get('ref_rm');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'rm',
								'errorData'   =>0,
							);
					$this->load->view('reference/rm_form_view',$data);
				}else{
					$dataInput=array(
									
									"rm_name"				 => $rm,
									"rm_visible"			 	 => $visible,
									"rm_insert_user"		 	 => $this->session->userdata('userId'),
									"rm_insert_datetime" 	 => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('ref_rm',$dataInput);
					
					
					
					redirect('reference/rm');
					
				}
				
				
		}else{
					
			redirect('reference/add_rm');
		}
	}

	public function update_rm($id='0'){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			// $id=$_POST['id']; 
			// die($id);
			$rm=ucfirst($_POST['rm']);
			$visible=$_POST['visible'];
				// $cek = $this->db->query("SELECT * FROM ref_branch where rbranch_id = '".$id."'");
				// die(print_r($cek->result_array()));
				$sqlCek=$this->db->where('rm_id',$id)->get('ref_rm');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('rm_id')==$id){
						$dataInput=array(
									
									"rm_name"=>$rm,
									"rm_visible"=>$visible,
									"rm_insert_user"=>$this->session->userdata('userId'),
									"rm_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('rm_id',$id)->update('ref_rm',$dataInput);
						redirect('reference/rm');
					 }else{
						 $data = array(
								'sidebar'   => 'rm',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('reference/rm_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									
									"rm_name"=>$rm,
									"rm_visible"=>$visible,
									"rm_insert_user"=>$this->session->userdata('userId'),
									"rm_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('ref_rm', $dataInput, array('rm_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('reference/rm');
					
					
				}
				
				
		}else{
			redirect('reference/add_rm');
		}
	}

	public function edit_rm($id){
		$sqlInsurance=$this->db->where('rm_id',$id)->get('ref_rm');
		
		if($sqlInsurance->num_rows()>0){
			$rrInsurance=$sqlInsurance->row_array();
			$data = array(
								"sidebar"  				 => 'rm',
								"errorData" 			 => 1,
								"id" 					 =>	$rrInsurance['rm_id'],
								"nama_rm"		 => $rrInsurance['rm_name'],
								"visible"			 	 => $rrInsurance['rm_visible'],
								"insert_user"		 	 => $rrInsurance['rm_insert_user'],
							);
			$this->load->view('reference/edit_form_view_rm',$data);
		
		
		}else{
			redirect('reference/rm');
		}
	}

	public function deleteRm($id){
		$this->db->query("DELETE FROM ref_rm where rm_id = '".$id."'");
		redirect('reference/rm');
		
	}

    public function sales(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'sales',
            'listSales'  => $this->db->query("SELECT * FROM ref_sales"),
        );
        $this->load->view('reference/sales_view',$data);
    }

    public function add_sales($flag=''){
		if($flag=='edit'){
			// die($_GET);
		}else{
			$data = array(
				'sidebar'   => 'sales',
				'errorData'   =>1,
								
			);
		}
        $this->load->view('reference/sales_form_view',$data);
    }

    public function save_sales(){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
		
			$sales=ucfirst($_POST['sales']);
			$visible=$_POST['visible'];
			
			
				$sqlCek=$this->db->where('rsales_name',$sales)->get('ref_sales');
				if($sqlCek->num_rows()>0){
					 $data = array(
								'sidebar'   => 'sales',
								'errorData'   =>0,
							);
					$this->load->view('reference/sales_form_view',$data);
				}else{
					$dataInput=array(
									
									"rsales_name"				 => $sales,
									"rsales_visible"			 => $visible,
									"rsales_insert_user"		 => $this->session->userdata('userId'),
									"rsales_insert_datetime" 	 => date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->insert('ref_sales',$dataInput);
					
					
					
					redirect('reference/sales');
					
				}
				
				
		}else{
					
			redirect('reference/add_sales');
		}
	}

	public function update_sales($id='0'){
		// die(print_r($_POST));
		if(count(($_POST))>0){
			
			// $id=$_POST['id']; 
			// die($id);
			$sales=ucfirst($_POST['sales']);
			$visible=$_POST['visible'];
				// $cek = $this->db->query("SELECT * FROM ref_branch where rbranch_id = '".$id."'");
				// die(print_r($cek->result_array()));
				$sqlCek=$this->db->where('rsales_id',$id)->get('ref_sales');
				if($sqlCek->num_rows()>0){
					 if($sqlCek->row('rsales_id')==$id){
						$dataInput=array(
									
									"rsales_name"=>$sales,
									"rsales_visible"=>$visible,
									"rsales_insert_user"=>$this->session->userdata('userId'),
									"rsales_insert_datetime"=>date('Y-m-d H:i:s'),
						);
						// die(print_r($dataInput));
						$this->db->where('rsales_id',$id)->update('ref_sales',$dataInput);
						redirect('reference/sales');
					 }else{
						 $data = array(
								'sidebar'   => 'sales',
								'errorData'   =>0,
							);
						 // die(print_r($data));
						$this->load->view('reference/sales_form_view',$data); 
					 }
					
				}else{
					$dataInput=array(
									
									"rsales_name"=>$sales,
									"rsales_visible"=>$visible,
									"rsales_insert_user"=>$this->session->userdata('userId'),
									"rsales_insert_datetime"=>date('Y-m-d H:i:s'),
						);
					// die(print_r($dataInput));
					$this->db->update('ref_sales', $dataInput, array('rsales_id'=>$id));
						// $this->db->where('login_id',$_POST['idUser'])->update('userlogin',$dataInput);
						redirect('reference/sales');
					
					
				}
				
				
		}else{
			redirect('reference/add_sales');
		}
	}

	public function edit_sales($id){
		$sqlSales=$this->db->where('rsales_id',$id)->get('ref_sales');
		
		if($sqlSales->num_rows()>0){
			$rrsqlSales=$sqlSales->row_array();
			$data = array(
								"sidebar"  				 => 'sales',
								"errorData" 			 => 1,
								"id" 					 =>	$rrsqlSales['rsales_id'],
								"nama_sales"		 	 => $rrsqlSales['rsales_name'],
								"visible"			 	 => $rrsqlSales['rsales_visible'],
								"insert_user"		 	 => $rrsqlSales['rsales_insert_user'],
							);
			$this->load->view('reference/edit_form_view_sales',$data);
		
		
		}else{
			redirect('reference/sales');
		}
	}

	public function deleteSales($id){
		$this->db->query("DELETE FROM ref_sales where rsales_id = '".$id."'");
		redirect('reference/sales');
		
	}

    public function send_via(){
    	// die("ARI");
        $data = array(
            'sidebar'   => 'sendVia',
            'listSendVia'  => $this->db->query("SELECT * FROM ref_send_via"),
        );
        $this->load->view('reference/send_via_view',$data);
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */