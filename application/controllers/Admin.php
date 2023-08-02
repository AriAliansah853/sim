<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		 date_default_timezone_set("Asia/Jakarta");
		 
	}
    public function index(){
        $this->view();
    }

    public function view(){
    	$data = array(
            'sidebar'   => 'viewFuse',
            'listFuse'  => $this->db->query("select * from obj_fuse, ref_branch, ref_insurance, userlogin, ref_coverage, ref_rm, ref_policy_status, ref_send_via,ref_pay_method where rbranch_id = fuse_proses_branch and login_id = fuse_proses_adm_name and rins_id = fuse_proses_ins_co and rm_id = fuse_proses_rm_name and rp_sts_id = fuse_proses_policy_sts and rcoverage_id = fuse_proses_coverage and rsend_via_id = fuse_logistic_send_via and rpay_method_id = fuse_billing_pay_to "),
        );
        $this->load->view('admin/view_admin_fuse',$data);
    }

    public function history_fuse($id='0'){
    	$listFuse  = $this->db->query("SELECT * FROM history_log, userlogin where login_id = his_log_input_user AND  his_log_table_id = '".$id."' AND his_log_table_name = 'obj_fuse' order by his_log_input_datetime desc ");

		if($listFuse->num_rows()>0){
			foreach($listFuse->result_array() as $isi){
			$response[]=$isi;
			
			}
		}else{
			$response=array();
		}	
        $this->output 
				->set_status_header(200)
				->set_content_type('application/json', 'utf-8')
				->set_output(json_encode($response))
				->_display();
			exit;	
    }

    public function view_cekpremi(){
        $data = array(
            'sidebar'   => 'viewCekpremi',
            'listCekpremi'  => $this->db->query("select * from obj_cekpremi, userlogin, ref_sales, ref_insurance, ref_policy_status, ref_coverage, ref_pay_method, ref_send_via where login_id = cekpremi_proses_adm_name and rsales_id = cekpremi_proses_sales_name and rins_id = cekpremi_proses_ins_co and rp_sts_id = cekpremi_proses_policy_sts and rcoverage_id = cekpremi_proses_coverage and rpay_method_id = cekpremi_billing_pay_to and rsend_via_id = cekpremi_logistic_send_via"),
        );
        $this->load->view('admin/view_admin_cekpremi',$data);
    }
    
    public function form_view(){
        $edit = array(  
                        'title'         => 'Create Data',
                        'id'    => 0,
                        'branch' => 0,
                        'name_adm' => 0,
                        'order_date' => '',
                        'submit_date' => '',
                        'order_via' => '',
                        'start_date' => '',
                        'aging' => 0,
                        'insured_name' => '',
                        'partner_name' => '',
                        'partner_hp' => '',
                        'partner_cate' => '',
                        'partner_type' => '',
                        'rm_name' => 0,
                        'fuse_code' => '',
                        'policy_number' => '',
                        'co_ins' => 0,
                        'splitt' => '',
                        'premium' => 0,
                        'premium_mark' => 0,
                        'discount' => 0,
                        'adm_fee' => 0,
                        'adm_markUp' => 0,
                        'net_pay' => 0,
                        'commission' => 0,
                        'policy_status' => '',
                        'ins_co' => 0,
                        'coverage' => 0,
                        'send' => '',
                        'pay_status' => 0,
                        'max_net' => 0,
                        'nom_max_net' => 0,
                        'after_max_net' => 0,
                        'pay_using_bonus' => 0,
                        'pay_using_point' => 0,
                        'pay_using_others' => 0,
                        'pay_total' => 0,
                        'pay_to' => 0,
                        'date_of_pay' => '',
                        'cancel_date' => '',
                        'address' => '',
                        'delivery_date' => '',
                        'send_via' => 0,
                        'awb' => '',
                    );
        $this->load->view('admin/view_form_admin_fuse_edit',$edit);
    }

    public function edit_fuse($id='0')
    {
        $obj_fuse = $this->db->query("select * from obj_fuse, ref_branch, ref_insurance, userlogin, ref_coverage, ref_rm, ref_policy_status, ref_send_via,ref_pay_method where rbranch_id = fuse_proses_branch and login_id = fuse_proses_adm_name and rins_id = fuse_proses_ins_co and rm_id = fuse_proses_rm_name and rp_sts_id = fuse_proses_policy_sts and rcoverage_id = fuse_proses_coverage and rsend_via_id = fuse_logistic_send_via and rpay_method_id = fuse_billing_pay_to and fuse_id = '".$id."'");
        // die(print_r($obj_cek->result_array()));

        $rrFuse = $obj_fuse->row_array();
        if ($rrFuse['fuse_billing_payment_sts'] == 1) {
            $paySts = 'Paid';
        } else {
            $paySts = 'Unpaid';
        }

        $edit = array(  
                        'title'         => 'Update Data',
                        'id'    =>$rrFuse['fuse_id'],
                        'branch' => $rrFuse['fuse_proses_branch'],
                        'name_adm' => $rrFuse['fuse_proses_adm_name'],
                        'order_date' => $rrFuse['fuse_proses_order_date'],
                        'submit_date' => $rrFuse['fuse_proses_submit_date'],
                        'order_via' => $rrFuse['fuse_proses_order_via'],
                        'start_date' => $rrFuse['fuse_proses_start_date'],
                        #            [fuse_proses_deadline_pay] => 2019-12-01
                        'aging' => $rrFuse['fuse_proses_aging'],
                        'insured_name' => $rrFuse['fuse_proses_insured_name'],
                        'partner_name' => $rrFuse['fuse_proses_partner_name'],
                        'partner_hp' => $rrFuse['fuse_proses_partner_number'],
                        'partner_cate' => $rrFuse['fuse_proses_partner_category'],
                        'partner_type' => $rrFuse['fuse_proses_partner_type'],
                        'rm_name' => $rrFuse['fuse_proses_rm_name'],
                        'fuse_code' => $rrFuse['fuse_proses_fuse_code'],
                        'policy_number' => $rrFuse['fuse_proses_policy_no'],
                        'co_ins' => $rrFuse['fuse_proses_coas_ins'],
                        'splitt' => $rrFuse['fuse_proses_splitting_ins'],
                        'premium' => $rrFuse['fuse_proses_premium'],
                        'premium_mark' => $rrFuse['fuse_proses_premium_markup'],
                        'discount' => $rrFuse['fuse_proses_disc'],
                        'adm_fee' => $rrFuse['fuse_proses_admin_fee'],
                        'adm_markUp' => $rrFuse['fuse_proses_admin_markup'],
                        'net_pay' => $rrFuse['fuse_proses_net_payment'],
                        'commission' => $rrFuse['fuse_proses_pct_commission'],
                        'policy_status' => $rrFuse['fuse_proses_policy_sts'],
                        'ins_co' => $rrFuse['fuse_proses_coverage'],
                        'coverage' => $rrFuse['fuse_proses_coverage'],
                        'send' => $rrFuse['fuse_proses_send_scp'],
                        #[fuse_proses_date_send] => 
                        'pay_status' => $rrFuse['fuse_billing_payment_sts'],
                        'max_net' => $rrFuse['fuse_billing_pct_max_net_pay'],
                        'nom_max_net' => $rrFuse['fuse_billing_max_net_pay'],
                        'after_max_net' => $rrFuse['fuse_billing_max_net_after_tax'],
                        'pay_using_bonus' => $rrFuse['fuse_billing_pay_bonus'],
                        'pay_using_point' => $rrFuse['fuse_billing_pay_point'],
                        'pay_using_others' => $rrFuse['fuse_billing_pay_others'],
                        'pay_total' => $rrFuse['fuse_billing_pay_total'],
                        'pay_to' => $rrFuse['fuse_billing_pay_to'],
                        'date_of_pay' => $rrFuse['fuse_billing_date_pay'],
                        'cancel_date' => $rrFuse['fuse_billing_cancel_date'],
                        'address' => $rrFuse['fuse_logistic_address'],
                        'delivery_date' => $rrFuse['fuse_logistic_delivery_date'],
                        'send_via' => $rrFuse['fuse_logistic_send_via'],
                        'awb' => $rrFuse['fuse_logistic_awb_number'],
                    );
        // die(print_r($edit));
        $this->load->view('admin/view_form_admin_fuse_edit',$edit);
    }

    public function simpan_fuse($id=0) {
        // die(print_r($_POST));        
		$arrayRep =  array('"',"'");
		
		if($id > 0 ) {
			$dataUpdate = $this->db->query("select * from obj_fuse, ref_branch, ref_insurance, userlogin, ref_coverage, ref_rm, ref_policy_status, ref_send_via,ref_pay_method where rbranch_id = fuse_proses_branch and login_id = fuse_proses_adm_name and rins_id = fuse_proses_ins_co and rm_id = fuse_proses_rm_name and rp_sts_id = fuse_proses_policy_sts and rcoverage_id = fuse_proses_coverage and rsend_via_id = fuse_logistic_send_via and rpay_method_id = fuse_billing_pay_to and fuse_id = '".$id."'");
	        $cek = $dataUpdate->row_array();
	        
			if ($dataUpdate->num_rows() > 0) {
		        $reason = '';
		        if($cek['fuse_proses_adm_name'] == $_POST['name_adm']) { } else {
			        $sqlAdminName = $this->db->query("select * from  userlogin where login_id = '".$_POST['name_adm']."'");
			        $rowAdminName = $sqlAdminName->row_array();
			        
		        	$reason .= ' <br> ADMIN NAME Before ['.$cek['login_name'].'] After ['.$rowAdminName['login_name'].']';
		        }
	
	            if($cek['fuse_proses_order_date'] == $_POST['order_date']) { } else {
	                $reason .= ' <br> ORDER DATE Before ['.$cek['fuse_proses_order_date'].'] After ['.$_POST['order_date'].']';
	            }
	
	            if($cek['fuse_proses_submit_date'] == $_POST['submit_date']) { } else {
	                $reason .= ' <br> SUBMIT DATE Before ['.$cek['fuse_proses_submit_date'].'] After ['.$_POST['submit_date'].']';
	            }
	
	            if($cek['fuse_proses_order_via'] == $_POST['order_via']) { } else {
	                $reason .= ' <br> ORDER VIA Before ['.$cek['fuse_proses_order_via'].'] After ['.$_POST['order_via'].']';
	            }
	
	            if($cek['fuse_proses_aging'] == $_POST['aging']) { } else {
	                $reason .= ' <br> AGING Before ['.$cek['fuse_proses_aging'].'] After ['.$_POST['aging'].']';
	            }
	
	            if($cek['fuse_proses_deadline_pay'] == $_POST['deadline_pay']) { } else {
	                $reason .= ' <br> DEADLINE PAY Before ['.$cek['fuse_proses_deadline_pay'].'] After ['.$_POST['deadline_pay'].']';
	            }
	
	            if($cek['fuse_proses_insured_name'] == $_POST['insured_name']) { } else {
	                $reason .= ' <br> INSURED NAME Before ['.$cek['fuse_proses_insured_name'].'] After ['.$$_POST['insured_name'].']';
	            }
		        
		        if($cek['fuse_proses_partner_name'] == $_POST['partner_name']) { } else {
		        	$reason .= ' <br> PARTNER NAME Before ['.$cek['fuse_proses_partner_name'].'] After ['.$_POST['partner_name'].']';
		        }
	
	            if($cek['fuse_proses_partner_number'] == $_POST['partner_hp']) { } else {
	                $reason .= ' <br> PARTNER HANPHONE Before ['.$cek['fuse_proses_partner_number'].'] After ['.$_POST['partner_hp'].']';
	            }
	
	            if($cek['fuse_proses_partner_category'] == $_POST['partner_cate']) { } else {
	                $reason .= ' <br> PARTNER CATEGORY Before ['.$cek['fuse_proses_partner_category'].'] After ['.$_POST['partner_cate'].']';
	            }
	
	            if($cek['fuse_proses_partner_type'] == $_POST['partner_type']) { } else {
	                $reason .= ' <br> PARTNER TYPE Before ['.$cek['fuse_proses_partner_type'].'] After ['.$_POST['partner_type'].']';
	            }
	
	            if($cek['fuse_proses_rm_name'] == $_POST['rm_name']) { } else {
	                $sqlRmName = $this->db->query("select * from  ref_rm where rm_id = '".$_POST['rm_name']."'");
	                $rowRmName = $sqlRmName->row_array();
	                $reason .= ' <br>  RM NAME Before ['.$cek['fuse_proses_rm_name'].'] After ['.$rowRmName['rm_name'].']';
	            }
	
	            if($cek['fuse_proses_fuse_code'] == $_POST['fuse_code']) { } else {
	                $reason .= ' <br>  FUSE CODE Before ['.$cek['fuse_proses_fuse_code'].'] After ['.$_POST['fuse_code'].']';
	            }
	
	            if($cek['fuse_proses_policy_no'] == $_POST['policy_number']) { } else {
	                $reason .= ' <br>  POLICY NUMBER Before ['.$cek['fuse_proses_policy_no'].'] After ['.$_POST['policy_number'].']';
	            }
	
	            if($cek['fuse_proses_coas_ins'] == $_POST['co_ins']) { } else {
	                $reason .= ' <br>  CO INS Before ['.$cek['fuse_proses_coas_ins'].'] After ['.$_POST['co_ins'].']';
	            }
	
	            if($cek['fuse_proses_splitting_ins'] == $_POST['splitt']) { } else {
	                $reason .= ' <br>  SPLITTING RM Before ['.$cek['fuse_proses_splitting_ins'].'] After ['.$_POST['splitt'].']';
	            }
	
	            if($cek['fuse_proses_premium'] == $_POST['premium']) { } else {
	                $reason .= ' <br>  PREMIUM Before ['.$cek['fuse_proses_premium'].'] After ['.$_POST['premium'].']';
	            }
	
	            if($cek['fuse_proses_premium_markup'] == $_POST['premium_mark']) { } else {
	                $reason .= ' <br>  PREMIUM MARK UP Before ['.$cek['fuse_proses_premium_markup'].'] After ['.$_POST['premium_mark'].']';
	            }
	
	            if($cek['fuse_proses_disc'] == $_POST['discount']) { } else {
	                $reason .= ' <br>  DISCOUNT Before ['.$cek['fuse_proses_disc'].'] After ['.$_POST['discount'].']';
	            }
	
	            if($cek['fuse_proses_admin_fee'] == $_POST['adm_fee']) { } else {
	                $reason .= ' <br>  ADM FEE Before ['.$cek['fuse_proses_admin_fee'].'] After ['.$_POST['adm_fee'].']';
	            }
	
	            if($cek['fuse_proses_admin_markup'] == $_POST['adm_markUp']) { } else {
	                $reason .= ' <br>  ADM MARK UP Before ['.$cek['fuse_proses_admin_markup'].'] After ['.$_POST['adm_markUp'].']';
	            }
	
	            if($cek['fuse_proses_net_payment'] == $_POST['net_pay']) { } else {
	                $reason .= ' <br>  NET PAYMENT Before ['.$cek['fuse_proses_net_payment'].'] After ['.$_POST['net_pay'].']';
	            }
		        
	            if($cek['fuse_proses_pct_commission'] == $_POST['commission']) { } else {
	                $reason .= ' <br>  COMMISSION Before ['.$cek['fuse_proses_pct_commission'].'] After ['.$_POST['commission'].']';
	            }
	
	            // if($cek['fuse_proses_policy_sts'] == $_POST['policy_status']) { } else {
	            //     $reason .= ' <br>  POLICY STATUS Before ['.$cek['fuse_proses_policy_sts'].'] After ['.$_POST['policy_status'].']';
	            // }
	            if($cek['fuse_proses_policy_sts'] == $_POST['policy_status']) { } else {
					$sqlPolicySts = $this->db->query("select * from  ref_policy_status where rp_sts_id = '".$_POST['policy_status']."'");
					$rowPolicySts = $sqlPolicySts->row_array();
					
					$reason .= ' <br> POLICY STATUS Before ['.$cek['rp_sts_name'].'] After ['.$rowPolicySts['rp_sts_name'].'];';
				}

				if($cek['fuse_proses_ins_co'] == $_POST['ins_co']) { } else {
					$sqlInsCo = $this->db->query("select * from  ref_insurance where rins_id = '".$_POST['ins_co']."'");
					$rowInsCo = $sqlInsCo->row_array();
					
					$reason .= ' <br> INS CO Before ['.$cek['rins_name'].'] After ['.$rowInsCo['rins_name'].'];';
				}

				if($cek['fuse_proses_coverage'] == $_POST['coverage']) { } else {
					$sqlCoverage = $this->db->query("select * from ref_coverage where rcoverage_id = '".$_POST['coverage']."'");
					$rowCoverage = $sqlCoverage->row_array();
					
					$reason .= ' <br> COVERAGE Before ['.$cek['rcoverage_name'].'] After ['.$rowCoverage['rcoverage_name'].'];';
				}
	
	
	            if($cek['fuse_proses_send_scp'] == $_POST['send']) { } else {
	                $reason .= ' <br>  SEND SCP Before ['.$cek['fuse_proses_send_scp'].'] After ['.$_POST['send'].']';
	            }

	            if($cek['fuse_billing_payment_sts'] == $_POST['pay_status']) { } else {
					$sqlPaymentSts = $this->db->query("select * from ref_payment_status where rpay_sts_id = '".$_POST['pay_status']."'");
					$rowPaymentSts = $sqlPaymentSts->row_array();
					
					$reason .= ' <br> PAYMENT STATUS Before ['.$cek['rpay_sts_name'].'] After ['.$rowCoverage['rpay_sts_name'].'];';
				}
	
	            if($cek['fuse_billing_pct_max_net_pay'] == $_POST['max_net']) { } else {
	                $reason .= ' <br>  % NET PAYMENT Before ['.$cek['fuse_billing_pct_max_net_pay'].'] After ['.$_POST['max_net'].']';
	            }
	            
	            if($cek['fuse_billing_max_net_pay'] == $_POST['nom_max_net']) { } else {
	                $reason .= ' <br>  NET PAYMENT Before ['.$cek['fuse_billing_max_net_pay'].'] After ['.$_POST['nom_max_net'].']';
	            }
	
	            if($cek['fuse_billing_max_net_after_tax'] == $_POST['after_max_net']) { } else {
	                $reason .= ' <br>  NOMINAL MAX NET PAYMENT (AFTER TAX) Before ['.$cek['fuse_billing_max_net_after_tax'].'] After ['.$_POST['after_max_net'].']';
	            }
	
	            if($cek['fuse_billing_pay_bonus'] == $_POST['pay_using_bonus']) { } else {
	                $reason .= ' <br>  PAYMENT USING BONUS Before ['.$cek['fuse_billing_pay_bonus'].'] After ['.$_POST['pay_using_bonus'].']';
	            }
	
	            if($cek['fuse_billing_pay_point'] == $_POST['pay_using_point']) { } else {
	                $reason .= ' <br>  PAYMENT USING POINTS Before ['.$cek['fuse_billing_pay_point'].'] After ['.$_POST['pay_using_point'].']';
	            }
	
	            if($cek['fuse_billing_pay_others'] == $_POST['pay_using_others']) { } else {
	                $reason .= ' <br>  PAYMENT USING OTHERS Before ['.$cek['fuse_billing_pay_others'].'] After ['.$_POST['pay_using_others'].']';
	            }
	
	            if($cek['fuse_billing_pay_total'] == $_POST['pay_total']) { } else {
	                $reason .= ' <br>  TOTAL PAYMENT Before ['.$cek['fuse_billing_pay_total'].'] After ['.$_POST['pay_total'].']';
	            }
	
	            if($cek['fuse_billing_pay_to'] == $_POST['pay_to']) { } else {
	                $reason .= ' <br>  PAY TO Before ['.$cek['fuse_billing_pay_to'].'] After ['.$_POST['pay_to'].']';
	            }
	
	            if($cek['fuse_billing_date_pay'] == $_POST['date_of_pay']) { } else {
	                $reason .= ' <br>  DATE OF PAYMENT Before ['.$cek['fuse_billing_date_pay'].'] After ['.$_POST['date_of_pay'].']';
	            }
	
	            if($cek['fuse_billing_cancel_date'] == $_POST['cancel_date']) { } else {
	                $reason .= ' <br> CANCEL DATE Before ['.$cek['fuse_billing_cancel_date'].'] After ['.$_POST['cancel_date'].']';
	            }
	
	            if($cek['fuse_logistic_address'] == $_POST['address']) { } else {
	                $reason .= ' <br> CORRESPONDENCE ADDRESS Before ['.$cek['fuse_logistic_address'].'] After ['.$_POST['address'].']';
	            }
	
	            if($cek['fuse_logistic_delivery_date'] == $_POST['delivery_date']) { } else {
	                $reason .= ' <br> DELIVERY DATE Before ['.$cek['fuse_logistic_delivery_date'].'] After ['.$_POST['delivery_date'].']';
	            }
	
	            if($cek['fuse_logistic_send_via'] == $_POST['send_via']) { } else {
	                $reason .= ' <br> SEND VIA Before ['.$cek['fuse_logistic_send_via'].'] After ['.$_POST['send_via'].']';
	            }
	
	            if($cek['fuse_logistic_awb_number'] == $_POST['awb']) { } else {
	                $reason .= ' <br> AWB NUMBER/RECIPIENT NAME Before ['.$cek['fuse_logistic_awb_number'].'] After ['.$_POST['awb'].']';
	            }
	            
		       $fuseUpdate = array(
		                                'fuse_proses_branch' => $_POST['branch'],
		                                'fuse_proses_adm_name' => $_POST['name_adm'],
		                                'fuse_proses_order_date' => $_POST['order_date'],
		                                'fuse_proses_submit_date' => $_POST['submit_date'],
		                                'fuse_proses_order_via' => $_POST['order_via'],
		                                'fuse_proses_start_date' => $_POST['start_date'],
		                                'fuse_proses_aging' => $_POST['aging'],
		                                'fuse_proses_deadline_pay' => $_POST['deadline_pay'],
		                                'fuse_proses_insured_name' => strtoupper($_POST['insured_name']),
		                                'fuse_proses_partner_name' => strtoupper($_POST['partner_name']),
		                                'fuse_proses_partner_number' => $_POST['partner_hp'],
		                                'fuse_proses_partner_category' => strtoupper($_POST['partner_cate']),
		                                'fuse_proses_partner_type' => strtoupper($_POST['partner_type']),
		                                'fuse_proses_rm_name ' => $_POST['rm_name'],
		                                'fuse_proses_fuse_code' => strtoupper($_POST['fuse_code']),
		                                'fuse_proses_policy_no' => strtoupper($_POST['policy_number']),
		                                'fuse_proses_coas_ins' => $_POST['co_ins'],
		                                'fuse_proses_splitting_ins' => $_POST['splitt'],
		                                'fuse_proses_premium' => $_POST['premium'],
		                                'fuse_proses_premium_markup' => $_POST['premium_mark'],
		                                'fuse_proses_disc' => $_POST['discount'],
		                                'fuse_proses_admin_fee' => $_POST['adm_fee'],
		                                'fuse_proses_admin_markup' => $_POST['adm_markUp'],
		                                'fuse_proses_net_payment ' => $_POST['net_pay'],
		                                'fuse_proses_pct_commission' => $_POST['commission'],
		                                'fuse_proses_policy_sts' => $_POST['policy_status'],
		                                'fuse_proses_ins_co' => $_POST['ins_co'],
		                                'fuse_proses_coverage' => $_POST['coverage'],
		                                'fuse_proses_send_scp' => $_POST['send'],
		                                'fuse_billing_payment_sts' => $_POST['pay_status'],
		                                'fuse_billing_pct_max_net_pay' => $_POST['max_net'],
		                                'fuse_billing_max_net_pay'	=> $_POST['nom_max_net'],
		                                'fuse_billing_max_net_after_tax' => $_POST['after_max_net'],
		                                'fuse_billing_pay_bonus' => $_POST['pay_using_bonus'],
		                                'fuse_billing_pay_point' => $_POST['pay_using_point'],
		                                'fuse_billing_pay_others' => $_POST['pay_using_others'],
		                                'fuse_billing_pay_total' => $_POST['pay_total'],
		                                'fuse_billing_pay_to' => $_POST['pay_to'],
	                                    'fuse_billing_date_pay' => $_POST['date_of_pay'],
		                                'fuse_billing_cancel_date' => $_POST['cancel_date'],
		                                'fuse_logistic_address' => $_POST['address'],
		                                'fuse_logistic_delivery_date' => $_POST['delivery_date'],
		                                'fuse_logistic_send_via' => $_POST['send_via'],
		                                'fuse_logistic_awb_number' => $_POST['awb'],
		                                'fuse_logistic_change_user' => $this->session->userdata('userId'),
		                            );
		        $this->db->where('fuse_id',$id)->update('obj_fuse',$fuseUpdate);
		        
				$action = 'UPDATE';
	            $note = str_replace($arrayRep, "", $this->db->update_string('obj_fuse',$fuseUpdate, "fuse_id = '".$id."'"));;
				$array_before = implode("::",$dataUpdate->row_array());
				$array_after = implode("::",$fuseUpdate);
		        
		        $dataInsert = array(
		                                'his_log_req_code' => strtoupper($_POST['fuse_code']),
		                                'his_log_table_name' => 'obj_fuse',
		                                'his_log_table_id' => $cek['fuse_id'],
		                                'his_log_url' => base_url(uri_string()),
		                                'his_log_action' => 'UPDATE',
		                                'his_log_short_desc' => 'FUSE CODE '.strtoupper($_POST['fuse_code']).$reason,
		                                'his_log_desc' => $note.'&&'.$array_before.'&&'.$array_after,
		                                'his_log_input_user' => $this->session->userdata('userId'),
		                                'his_log_input_datetime' => date('Y-m-d H:i:s'),
		                            );
	            // die(print_r($dataInsert));
		        $this->db->insert('history_log',$dataInsert);
	        }

    	} else {    
	        $dataInsert = array(
	                                'fuse_proses_branch' => $_POST['branch'],
	                                'fuse_proses_adm_name' => $_POST['name_adm'],
	                                'fuse_proses_order_date' => $_POST['order_date'],
	                                'fuse_proses_submit_date' => $_POST['submit_date'],
	                                'fuse_proses_order_via' => $_POST['order_via'],
	                                'fuse_proses_start_date' => $_POST['start_date'],
	                                'fuse_proses_aging' => $_POST['aging'],
	                                'fuse_proses_deadline_pay' => $_POST['deadline_pay'],
	                                'fuse_proses_insured_name' => strtoupper($_POST['insured_name']),
	                                'fuse_proses_partner_name' => strtoupper($_POST['partner_name']),
	                                'fuse_proses_partner_number' => $_POST['partner_hp'],
	                                'fuse_proses_partner_category' => strtoupper($_POST['partner_cate']),
	                                'fuse_proses_partner_type' => strtoupper($_POST['partner_type']),
	                                'fuse_proses_rm_name ' => $_POST['rm_name'],
	                                'fuse_proses_fuse_code' => strtoupper($_POST['fuse_code']),
	                                'fuse_proses_policy_no' => strtoupper($_POST['policy_number']),
	                                'fuse_proses_coas_ins' => $_POST['co_ins'],
	                                'fuse_proses_splitting_ins' => $_POST['splitt'],
	                                'fuse_proses_premium' => $_POST['premium'],
	                                'fuse_proses_premium_markup' => $_POST['premium_mark'],
	                                'fuse_proses_disc' => $_POST['discount'],
	                                'fuse_proses_admin_fee' => $_POST['adm_fee'],
	                                'fuse_proses_admin_markup' => $_POST['adm_markUp'],
	                                'fuse_proses_net_payment' => $_POST['net_pay'],
	                                'fuse_proses_pct_commission' => $_POST['commission'],
	                                'fuse_proses_policy_sts' => $_POST['policy_status'],
	                                'fuse_proses_ins_co' => $_POST['ins_co'],
	                                'fuse_proses_coverage' => $_POST['coverage'],
	                                'fuse_proses_send_scp' => $_POST['send'],
	                                'fuse_billing_payment_sts' => $_POST['pay_status'],
	                                'fuse_billing_pct_max_net_pay' => $_POST['max_net'],
	                                'fuse_billing_max_net_pay' => $_POST['nom_max_net'],
	                                'fuse_billing_max_net_after_tax' => $_POST['after_max_net'],
	                                'fuse_billing_pay_bonus' => $_POST['pay_using_bonus'],
	                                'fuse_billing_pay_point' => $_POST['pay_using_point'],
	                                'fuse_billing_pay_others' => $_POST['pay_using_others'],
	                                'fuse_billing_pay_total' => $_POST['pay_total'],
	                                'fuse_billing_pay_to' => $_POST['pay_to'],
	                                'fuse_billing_date_pay' => $rrFuse['date_of_pay'],
	                                'fuse_billing_cancel_date' => $_POST['cancel_date'],
	                                'fuse_logistic_address' => $_POST['address'],
	                                'fuse_logistic_delivery_date' => $_POST['delivery_date'],
	                                'fuse_logistic_send_via' => $_POST['send_via'],
	                                'fuse_logistic_awb_number' => $_POST['awb'],
	                                'fuse_logistic_insert_user' => $this->session->userdata('userId'),
	                                'fuse_logistic_insert_datetime' => date('Y-m-d H:i:s'),
	                            );
	        $this->db->insert('obj_fuse',$dataInsert);
	        $id = $this->db->insert_id();
            
            #untuk insert log
			$action = 'ADD';
			$ket_his = ' [PENAMBAHAN DATA BARU]';
			$note = str_replace($arrayRep, "", $this->db->insert_string('obj_fuse',$dataInsert));
			$array_before = '-';
			$array_after = implode("::",$dataInsert);
	
			$insLog = array(
                            'his_log_req_code' => strtoupper($_POST['fuse_code']),
                            'his_log_table_name' => 'obj_fuse',
                            'his_log_table_id' => $id,
                            'his_log_url' => base_url(uri_string()),
                            'his_log_action' => $action,
                            'his_log_short_desc' => 'FUSE CODE '.strtoupper($_POST['fuse_code']).$ket_his,
                            'his_log_desc' => $note.'&&'.$array_before.'&&'.$array_after,
                            'his_log_input_user' => $this->session->userdata('userId'),
                            'his_log_input_datetime' => date('Y-m-d H:i:s'),
					  );
			$this->db->insert('history_log', $insLog);
        }
        redirect('admin/view');

    }

    public function form_view_cekpremi(){
        $edit = array(   
                        'title'         => 'Create Data',
                        'id'            => '0',
                        'name_adm'      => '0',
                        'order_date'    => '',
                        'submit_date'   => '',
                        'order_via'     => '',
                        'sales'         => '0',
                        'start_date'    => '',
                        'folder_name'   => '',
                        'insured_name'  => '',
                        'npp'           => '',
                        'policy_number' => '',
                        'premium'       => 0,
                        'premium_mark_up' => 0,
                        'discount'        => 0,
                        'cashback'        => 0,
                        'adm_fee'         => 0,
                        'adm_mark_up'     => 0,
                        'net_pay'         => 0,
                        'income'          => 0,
                        'nom_income'      => 0,
                        'policy_status'   => '0',
                        'ins_co'          => '0',
                        'coverage'        => 0,
                        'phone_number'    => '',
                        'email'           => '',
                        'send_scp'        => '',
                        'date_scp'        => '',
                        'pay_status'      => 0,
                        'deadline_pay'    => '',
                        'date_of_pay'     => '',
                        'pay_to'          => 0,
                        'cancel_date'     => '',
                        'corres'          => '',
                        'delivery_date'   => '',
                        'send_via'        => '',
                        'awb'             => '',
                    );
        $this->load->view('admin/view_form_admin_cekpremi_edit',$edit);
    }

    public function edit_cekpremi($id='0') {
        $obj_cek = $this->db->query("select * from obj_cekpremi, userlogin, ref_sales, ref_insurance, ref_policy_status, ref_coverage, ref_pay_method, ref_send_via where login_id = cekpremi_proses_adm_name and rsales_id = cekpremi_proses_sales_name and rins_id = cekpremi_proses_ins_co and rp_sts_id = cekpremi_proses_policy_sts and rcoverage_id = cekpremi_proses_coverage and rpay_method_id = cekpremi_billing_pay_to and rsend_via_id = cekpremi_logistic_send_via and cekpremi_id = '".$id."'");
        // die(print_r($obj_cek->result_array()));

        $rrCekpremi = $obj_cek->row_array();
        if ($rrCekpremi['cekpremi_billing_payment_sts'] == 1) {
            $paySts = 'Paid';
        } else {
            $paySts = 'Unpaid';
        }

        $edit = array(   
                        'title'         => 'Update Data',
                        'id'            =>$rrCekpremi['cekpremi_id'],
                        'name_adm'      => $rrCekpremi['cekpremi_proses_adm_name'],
                        'order_date'    => $rrCekpremi['cekpremi_proses_order_date'],
                        'submit_date'   => $rrCekpremi['cekpremi_proses_submit_date'],
                        'order_via'     => $rrCekpremi['cekpremi_proses_order_via'],
                        'sales'         => $rrCekpremi['cekpremi_proses_sales_name'],
                        'start_date'    => $rrCekpremi['cekpremi_proses_start_date'],
                        'folder_name'   => $rrCekpremi['cekpremi_proses_folder_name'],
                        'insured_name'  => $rrCekpremi['cekpremi_proses_insured_name'],
                        'npp'           => $rrCekpremi['cekpremi_proses_npp'],
                        'policy_number' => $rrCekpremi['cekpremi_proses_policy_no'],
                        'premium'       => $rrCekpremi['cekpremi_proses_premium'],
                        'premium_mark_up' => $rrCekpremi['cekpremi_proses_premium_markup'],
                        'discount'        => $rrCekpremi['cekpremi_proses_disc'],
                        'cashback'        => $rrCekpremi['cekpremi_proses_cashback'],
                        'adm_fee'         => $rrCekpremi['cekpremi_proses_admin_fee'],
                        'adm_mark_up'     => $rrCekpremi['cekpremi_proses_admin_markup'],
                        'net_pay'         => $rrCekpremi['cekpremi_proses_net_payment'],
                        'income'          => $rrCekpremi['cekpremi_proses_pct_income'],
                        'nom_income'      => $rrCekpremi['cekpremi_proses_nominal_income'],
                        'policy_status'   => $rrCekpremi['cekpremi_proses_policy_sts'],
                        'ins_co'          => $rrCekpremi['cekpremi_proses_ins_co'],
                        'coverage'        => $rrCekpremi['cekpremi_proses_coverage'],
                        'phone_number'    => $rrCekpremi['cekpremi_proses_phone'],
                        'email'           => $rrCekpremi['cekpremi_proses_email'],
                        'send_scp'        => $rrCekpremi['cekpremi_proses_send_scp'],
                        'date_scp'        => $rrCekpremi['cekpremi_proses_date_send'],
                        'pay_status'      => $rrCekpremi['cekpremi_billing_payment_sts'],
                        'deadline_pay'    => $rrCekpremi['cekpremi_billing_deadline_pay'],
                        'date_of_pay'     => $rrCekpremi['cekpremi_billing_date_pay'],
                        'pay_to'          => $rrCekpremi['cekpremi_billing_pay_to'],
                        'cancel_date'     => $rrCekpremi['cekpremi_billing_cancel_date'],
                        'corres'          => $rrCekpremi['cekpremi_logistic_address'],
                        'delivery_date'   => $rrCekpremi['cekpremi_logistic_delivery_date'],
                        'send_via'        => $rrCekpremi['cekpremi_logistic_send_via'],
                        'awb'             => $rrCekpremi['cekpremi_logistic_awb_number'],
                    );
        // die(print_r($edit));
        $this->load->view('admin/view_form_admin_cekpremi_edit',$edit);
    }

    public function simpan_cekpremi($id='0'){
		// die(print_r($_POST));
		$arrayRep =  array('"',"'");
		if($id > 0 ) {
			$dataUpdate = $this->db->query("select * from obj_cekpremi, userlogin, ref_sales, ref_insurance, ref_policy_status, ref_coverage, ref_pay_method, ref_send_via where login_id = cekpremi_proses_adm_name and rsales_id = cekpremi_proses_sales_name and rins_id = cekpremi_proses_ins_co and rp_sts_id = cekpremi_proses_policy_sts and rcoverage_id = cekpremi_proses_coverage and rpay_method_id = cekpremi_billing_pay_to and rsend_via_id = cekpremi_logistic_send_via and cekpremi_id = '".$id."'");
			$cek = $dataUpdate->row_array();
			
			if ($dataUpdate->num_rows() > 0) {
				
				$reason = '';
				if($cek['cekpremi_proses_adm_name'] == $_POST['name_adm']) { } else {
					$sqlAdminName = $this->db->query("select * from  userlogin where login_id = '".$_POST['name_adm']."'");
					$rowAdminName = $sqlAdminName->row_array();
					
					$reason .= ' <br> ADMIN NAME Before ['.$cek['login_name'].'] After ['.$rowAdminName['login_name'].'];';
				}
				
				if($cek['cekpremi_proses_order_date'] == $_POST['order_date']) { } else {
					$reason .= ' <br> ORDER DATE Before ['.$cek['cekpremi_proses_order_date'].'] After ['.$_POST['order_date'].'];';
				}
				
				if($cek['cekpremi_proses_submit_date'] == $_POST['submit_date']) { } else {
					$reason .= ' <br> SUBMIT DATE Before ['.$cek['cekpremi_proses_submit_date'].'] After ['.$_POST['submit_date'].'];';
				}
				
				if($cek['cekpremi_proses_order_via'] == $_POST['order_via']) { } else {
					$reason .= ' <br> ORDER VIA Before ['.$cek['cekpremi_proses_order_via'].'] After ['.$_POST['order_via'].'];';
				}
				
				if($cek['cekpremi_proses_sales_name'] == $_POST['sales']) { } else {
					$sqlSales = $this->db->query("select * from  ref_sales where rsales_id = '".$_POST['sales']."'");
					$rowSales = $sqlSales->row_array();
					
					$reason .= ' <br> SALES Before ['.$cek['rsales_name'].'] After ['.$rowSales['rsales_name'].'];';
				}
				
				if($cek['cekpremi_proses_start_date'] == $_POST['start_date']) { } else {
					$reason .= ' <br> START DATE Before ['.$cek['cekpremi_proses_start_date'].'] After ['.$_POST['start_date'].'];';
				}
				
				if($cek['cekpremi_proses_folder_name'] == $_POST['folder_name']) { } else {
					$reason .= ' <br> FOLDER NAME Before ['.$cek['cekpremi_proses_folder_name'].'] After ['.$_POST['folder_name'].'];';
				}
				
				if($cek['cekpremi_proses_insured_name'] == $_POST['insured_name']) { } else {
					$reason .= ' <br> INSURED NAME Before ['.$cek['cekpremi_proses_insured_name'].'] After ['.$_POST['insured_name'].'];';
				}
				
				if($cek['cekpremi_proses_npp'] == $_POST['npp']) { } else {
					$reason .= ' <br> NPP Before ['.$cek['cekpremi_proses_npp'].'] After ['.$_POST['npp'].'];';
				}
				
				if($cek['cekpremi_proses_policy_no'] == $_POST['policy_number']) { } else {
					$reason .= ' <br> POLICY NUMBER Before ['.$cek['cekpremi_proses_policy_no'].'] After ['.$_POST['policy_number'].'];';
				}
				
				if($cek['cekpremi_proses_premium'] == $_POST['premium']) { } else {
				$reason .= ' <br> PREMIUM Before ['.$cek['cekpremi_proses_premium'].'] After ['.$_POST['premium'].'];';
				}
				
				if($cek['cekpremi_proses_premium_markup'] == $_POST['premium_mark_up']) { } else {
					$reason .= ' <br> PREMIUM MARK UP Before ['.$cek['cekpremi_proses_premium_markup'].'] After ['.$_POST['premium_mark_up'].'];';
				}
				
				if($cek['cekpremi_proses_net_payment'] == $_POST['net_pay']) {
				
				} else {
					$reason .= ' <br> NET PAYMENT Before ['.$cek['cekpremi_proses_net_payment'].'] After ['.$_POST['net_pay'].'];';
				}
				
				if($cek['cekpremi_proses_pct_income'] == $_POST['income']) { } else {
					$reason .= ' <br> INCOME Before ['.$cek['cekpremi_proses_pct_income'].'] After ['.$_POST['income'].'];';
				}
				
				if($cek['cekpremi_proses_nominal_income'] == $_POST['nom_income']) {
				} else {
					$reason .= ' <br> NOMINAL INCOME Before ['.$cek['cekpremi_proses_nominal_income'].'] After ['.$_POST['nom_income'].'];';
				}
				
				if($cek['cekpremi_proses_policy_sts'] == $_POST['policy_status']) { } else {
					$sqlPolicySts = $this->db->query("select * from  ref_policy_status where rp_sts_id = '".$_POST['policy_status']."'");
					$rowPolicySts = $sqlPolicySts->row_array();
					
					$reason .= ' <br> POLICY STATUS Before ['.$cek['rp_sts_name'].'] After ['.$rowPolicySts['rp_sts_name'].'];';
				}
				
				if($cek['cekpremi_proses_ins_co'] == $_POST['ins_co']) { } else {
					$sqlInsCo = $this->db->query("select * from  ref_insurance where rins_id = '".$_POST['ins_co']."'");
					$rowInsCo = $sqlInsCo->row_array();
					
					$reason .= ' <br> INS CO Before ['.$cek['rins_name'].'] After ['.$rowInsCo['rins_name'].'];';
				}
				
				if($cek['cekpremi_proses_coverage'] == $_POST['coverage']) { } else {
					$sqlCoverage = $this->db->query("select * from ref_coverage where rcoverage_id = '".$_POST['coverage']."'");
					$rowCoverage = $sqlCoverage->row_array();
					
					$reason .= ' <br> COVERAGE Before ['.$cek['rcoverage_name'].'] After ['.$rowCoverage['rcoverage_name'].'];';
				}
				
				if($cek['cekpremi_proses_phone'] == $_POST['phone_number']) { } else {
					$reason .= ' <br> PHONE NUMBER Before ['.$cek['cekpremi_proses_phone'].'] After ['.$_POST['phone_number'].'];';
				}
				
				if($cek['cekpremi_proses_email'] == $_POST['email']) { } else {
					$reason .= ' <br> EMAIL ADDRESS Before ['.$cek['cekpremi_proses_email'].'] After ['.$_POST['email'].'];';
				}
				
				if($cek['cekpremi_proses_send_scp'] == $_POST['send_scp']) { } else {
					$reason .= ' <br> SEND SCP Before ['.$cek['cekpremi_proses_send_scp'].'] After ['.$_POST['send_scp'].'];';
				}
				
				if($cek['cekpremi_proses_date_send'] == $_POST['date_scp']) { } else {
					$reason .= ' <br> DATE OF SEND Before ['.$cek['cekpremi_proses_date_send'].'] After ['.$_POST['date_scp'].'];';
				}
				
				if($cek['cekpremi_billing_payment_sts'] == $_POST['pay_status']) { } else {
					$sqlPaymentSts = $this->db->query("select * from ref_payment_status where rpay_sts_id = '".$_POST['pay_status']."'");
					$rowPaymentSts = $sqlPaymentSts->row_array();
					
					$reason .= ' <br> PAYMENT STATUS Before ['.$cek['rpay_sts_name'].'] After ['.$rowCoverage['rpay_sts_name'].'];';
				}
				
				if($cek['cekpremi_billing_deadline_pay'] == $_POST['deadline_pay']) { } else {
					$reason .= ' <br> DEADLINE PAYMENT Before ['.$cek['cekpremi_billing_deadline_pay'].'] After ['.$_POST['deadline_pay'].'];';
				}
				
				if($cek['cekpremi_billing_date_pay'] == $_POST['date_of_pay']) { } else {
					$reason .= ' <br> DATE OF PAYMENT Before ['.$cek['cekpremi_billing_date_pay'].'] After ['.$_POST['date_of_pay'].'];';
				}
				
				if($cek['cekpremi_billing_cancel_date'] == $_POST['cancel_date']) { } else {
					$reason .= ' <br> CANCEL DATE Before ['.$cek['cekpremi_billing_cancel_date'].'] After ['.$_POST['cancel_date'].'];';
				}
				
				if($cek['cekpremi_billing_pay_to'] == $_POST['pay_to']) { } else {
					$sqlPaymentMethod = $this->db->query("select * from ref_pay_method where rpay_method_id = '".$_POST['pay_to']."'");
					$rowPaymentMethod = $sqlPaymentMethod->row_array();
					
					$reason .= ' <br> PAY TO Before ['.$cek['rpay_method_name'].'] After ['.$rowPaymentMethod['rpay_method_name'].'];';
				}
				
				if($cek['cekpremi_logistic_address'] == $_POST['corres']) { } else {
					$reason .= ' <br> CORRESPONDENCE ADDRESS Before ['.$cek['cekpremi_logistic_address'].'] After ['.$_POST['corres'].'];';
				}
				
				if($cek['cekpremi_logistic_delivery_date'] == $_POST['delivery_date']) { } else {
					$reason .= ' <br> DELIVERY DAT Before ['.$cek['cekpremi_logistic_delivery_date'].'] After ['.$_POST['delivery_date'].'];';
				}
				
				if($cek['cekpremi_logistic_send_via'] == $_POST['send_via']) { } else {
					$sqlVia = $this->db->query("select * from ref_send_via where rsend_via_id = '".$_POST['send_via']."'");
					$rowVia = $sqlVia->row_array();
					
					$reason .= ' <br> PAY TO Before ['.$cek['rsend_via_name'].'] After ['.$rowVia['rsend_via_name'].'];';
				}
				
				if($cek['cekpremi_logistic_awb_number'] == $_POST['awb']) { } else {
					$reason .= ' <br> AWB NUMBER / RECIPIENT NAME Before ['.$cek['cekpremi_logistic_awb_number'].'] After ['.$_POST['awb'].'];';
				}
				
				$cekpremiUpdate = array(
				                'cekpremi_proses_adm_name'          => $_POST['name_adm'],
				                'cekpremi_proses_order_date'        => $_POST['order_date'],
				                'cekpremi_proses_submit_date'       => $_POST['submit_date'],
				                'cekpremi_proses_order_via'         => $_POST['order_via'],
				                'cekpremi_proses_sales_name'        => $_POST['sales'],
				                'cekpremi_proses_start_date'        => $_POST['start_date'],
				                'cekpremi_proses_folder_name'       => $_POST['folder_name'],
                                'cekpremi_proses_insured_name'      => strtoupper($_POST['insured_name']),
                                'cekpremi_proses_npp'               => strtoupper($_POST['npp']),
                                'cekpremi_proses_policy_no'         => strtoupper($_POST['policy_number']),
				                'cekpremi_proses_premium'           => $_POST['premium'],
				                'cekpremi_proses_premium_markup'    => $_POST['premium_mark_up'],
				                'cekpremi_proses_disc'              => $_POST['discount'],
				                'cekpremi_proses_cashback'          => $_POST['cashback'],
				                'cekpremi_proses_admin_fee'         => $_POST['adm_fee'],
				                'cekpremi_proses_admin_markup'      => $_POST['adm_mark_up'],
                                'cekpremi_proses_net_payment'       => $_POST['net_pay'],
                                'cekpremi_proses_pct_income'        => $_POST['income'],
                                'cekpremi_proses_nominal_income'    => $_POST['nom_income'],
				                'cekpremi_proses_policy_sts'        => $_POST['policy_status'],
				                'cekpremi_proses_ins_co'            => $_POST['ins_co'],
				                'cekpremi_proses_coverage'          => $_POST['coverage'],
				                'cekpremi_proses_phone'             => $_POST['phone_number'],
				                'cekpremi_proses_email'             => $_POST['email'],
				                'cekpremi_proses_send_scp'          => $_POST['send_scp'],
				                'cekpremi_proses_date_send'         => $_POST['date_scp'],
				                'cekpremi_billing_payment_sts'      => $_POST['pay_status'],
				                'cekpremi_billing_deadline_pay'     => $_POST['deadline_pay'],
				                'cekpremi_billing_date_pay'         => $_POST['date_of_pay'],
				                'cekpremi_billing_pay_to'           => $_POST['pay_to'],
				                'cekpremi_billing_cancel_date'      => $_POST['cancel_date'],
				                'cekpremi_logistic_address'         => $_POST['corres'],
				                'cekpremi_logistic_delivery_date'   => $_POST['delivery_date'],
				                'cekpremi_logistic_send_via'        => $_POST['send_via'],
				                'cekpremi_logistic_awb_number'      => $_POST['awb'],
				                'cekpremi_logistic_change_user'     => $this->session->userdata('userId'),
				            );
				$this->db->where('cekpremi_id',$id)->update('obj_cekpremi',$cekpremiUpdate);
				
				$action = 'UPDATE';
	            $note = str_replace($arrayRep, "", $this->db->update_string('obj_cekpremi',$cekpremiUpdate, "cekpremi_id = '".$id."'"));;
				$array_before = implode("::",$dataUpdate->row_array());
				$array_after = implode("::",$cekpremiUpdate);
		        
		        $dataInsert = array(
                            			'his_log_req_code' => strtoupper($_POST['npp']),
		                                'his_log_table_name' => 'obj_cekpremi',
		                                'his_log_table_id' => $cek['cekpremi_id'],
		                                'his_log_url' => base_url(uri_string()),
		                                'his_log_action' => $action,
		                                'his_log_short_desc' => 'NPP '.strtoupper($_POST['npp']).$reason,
		                                'his_log_desc' => $note.'&&'.$array_before.'&&'.$array_after,
		                                'his_log_input_user' => $this->session->userdata('userId'),
		                                'his_log_input_datetime' => date('Y-m-d H:i:s'),
		                            );
		        $this->db->insert('history_log',$dataInsert);
			}
		} else {
            $dataInsert = array(
                                    'cekpremi_proses_adm_name'          => $_POST['name_adm'],
                                    'cekpremi_proses_order_date'        => $_POST['order_date'],
                                    'cekpremi_proses_submit_date'       => $_POST['submit_date'],
                                    'cekpremi_proses_order_via'         => $_POST['order_via'],
                                    'cekpremi_proses_sales_name'        => $_POST['sales'],
                                    'cekpremi_proses_start_date'        => $_POST['start_date'],
                                    'cekpremi_proses_folder_name'       => $_POST['folder_name'],
                                    'cekpremi_proses_insured_name'      => strtoupper($_POST['insured_name']),
                                    'cekpremi_proses_npp'               => strtoupper($_POST['npp']),
                                    'cekpremi_proses_policy_no'         => strtoupper($_POST['policy_number']),
                                    'cekpremi_proses_premium'           => $_POST['premium'],
                                    'cekpremi_proses_premium_markup'    => $_POST['premium_mark_up'],
                                    'cekpremi_proses_disc'              => $_POST['discount'],
                                    'cekpremi_proses_cashback'          => $_POST['cashback'],
                                    'cekpremi_proses_admin_fee'         => $_POST['adm_fee'],
                                    'cekpremi_proses_admin_markup'      => $_POST['adm_mark_up'],
                                    'cekpremi_proses_net_payment'       => $_POST['net_pay'],
                                    'cekpremi_proses_pct_income'        => $_POST['income'],
                                    'cekpremi_proses_nominal_income'    => $_POST['nom_income'],
                                    'cekpremi_proses_policy_sts'        => $_POST['policy_status'],
                                    'cekpremi_proses_ins_co'            => $_POST['ins_co'],
                                    'cekpremi_proses_coverage'          => $_POST['coverage'],
                                    'cekpremi_proses_phone'             => $_POST['phone_number'],
                                    'cekpremi_proses_email'             => $_POST['email'],
                                    'cekpremi_proses_send_scp'          => $_POST['send_scp'],
                                    'cekpremi_proses_date_send'         => $_POST['date_scp'],
                                    'cekpremi_billing_payment_sts'      => $_POST['pay_status'],
                                    'cekpremi_billing_deadline_pay'     => $_POST['deadline_pay'],
                                    'cekpremi_billing_date_pay'         => $_POST['date_of_pay'],
                                    'cekpremi_billing_pay_to'           => $_POST['pay_to'],
                                    'cekpremi_billing_cancel_date'      => $_POST['cancel_date'],
                                    'cekpremi_logistic_address'         => $_POST['corres'],
                                    'cekpremi_logistic_delivery_date'   => $_POST['delivery_date'],
                                    'cekpremi_logistic_send_via'        => $_POST['send_via'],
                                    'cekpremi_logistic_awb_number'      => $_POST['awb'],
                                    'cekpremi_logistic_insert_user'     => $this->session->userdata('userId'),
                                    'cekpremi_logistic_insert_datetime' => date('Y-m-d H:i:s'),               
                                );
            $this->db->insert('obj_cekpremi',$dataInsert);
			$id = $this->db->insert_id();
            
            #untuk insert log
			$action = 'ADD';
			$ket_his = ' [PENAMBAHAN DATA BARU]';
			$note = str_replace($arrayRep, "", $this->db->insert_string('obj_cekpremi',$dataInsert));
			$array_before = '-';
			$array_after = implode("::",$dataInsert);
	
			$insLog = array(
                            'his_log_req_code' => strtoupper($_POST['npp']),
                            'his_log_table_name' => 'obj_cekpremi',
                            'his_log_table_id' => $id,
                            'his_log_url' => base_url(uri_string()),
                            'his_log_action' => $action,
                            'his_log_short_desc' => 'NPP '.strtoupper($_POST['npp']).$ket_his,
                            'his_log_desc' => $note.'&&'.$array_before.'&&'.$array_after,
                            'his_log_input_user' => $this->session->userdata('userId'),
                            'his_log_input_datetime' => date('Y-m-d H:i:s'),
					  );
			$this->db->insert('history_log', $insLog);
        }
        redirect('admin/view_cekpremi');
    }

    public function deleteFuse($id='0')
    {
    	$this->db->query("DELETE FROM obj_fuse where fuse_id = '".$id."'");
    	redirect('admin/view');
    }

    public function deleteCekpremi($id='0')
    {
    	$this->db->query("DELETE FROM obj_cekpremi where cekpremi_id = '".$id."'");
    	redirect('admin/view_cekpremi');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */