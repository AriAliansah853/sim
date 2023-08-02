<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin System | <?php echo $title; ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php $this->load->view('include/include_basecss'); ?>

	<style>
		#border {
			border: 1px solid #ccc;
			background: #DC143C;
			color: white;
			font-size: 20px;


		}

		#visible {

			background: #fff;
			color: white;
			font-size: 20px;
		}
	</style>
	<link href="<?php echo base_url(); ?>assets/tablesDinamis/css/buttons.dataTables.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<?php $this->load->view('include/include_header'); ?>

		<?php $this->load->view('include/include_sidebar'); ?>

		<div class="content-wrapper">

			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0 text-dark">Form Admin Fuse</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active"><?php echo $title; ?></li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			<section class="content">
				<form id="formProfilePage" action="<?php echo base_url('Admin/simpan_fuse/'.$id);?>" method="POST">
					<div class="container-fluid">
						<div class="row">

							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="row mb-2">
											<div class="col-sm-12  text-center">
													<h1 class="m-0 text-dark">Admin Processing</h1>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> BRANCH
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="branch">
													          	<?php
				                                    				 $dataBranc = $this->db->query("SELECT * FROM ref_branch WHERE rbranch_visible = 1 ");
				                                    				  foreach ($dataBranc->result_array() as $rrBranch) { 
					                                        				if ($rrBranch['rbranch_id'] == $branch) {
																			$select_User = 'selected="selected"';
																			} else {
																			$select_User = '';
																			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrBranch['rbranch_id']; ?>" <?php echo $select_User; ?> ><?php echo $rrBranch['rbranch_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ADMIN NAME
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="name_adm">
													          	<?php
				                                    				 $dataAdm = $this->db->query("SELECT * FROM userlogin ");
				                                    				  foreach ($dataAdm->result_array() as $rrAdm) { 
					                                        				if ($rrAdm['login_id'] == $name_adm) {
																			$select_adm = 'selected="selected"';
																			} else {
																			$select_adm = '';
																			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrAdm['login_id']; ?>" <?php echo $select_adm; ?> ><?php echo $rrAdm['login_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ORDER DATE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="order_date" id="datepicker" value="<?php echo $order_date; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SUBMIT DATE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="submit_date" id="datepicker3" value="<?php echo $submit_date; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ORDER VIA
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control"  name="order_via" value="<?php echo $order_via; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> START DATE

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="start_date" id="datepicker2" onchange="aging_date()" value="<?php echo $start_date; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> AGING (DAYS)
														</div>
														<div class="col-sm-8">
															<input type="number" class="form-control" id="aging" name="aging"
																value="<?php echo $aging; ?>">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DEADLINE PAYMENT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="deadline_pay" id="datepicker4" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> INSURED NAME
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="insured_name"  value="<?php echo $insured_name; ?>">															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PARTNER NAME

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="partner_name"  value="<?php echo $partner_name; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PARTNER PHONE NUMBER
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="partner_hp"
																value="<?php echo $partner_hp; ?>">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PARTNER CATEGORY

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="partner_cate"  value="<?php echo $partner_cate; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  PARTNER TYPE 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="partner_type"
																value="<?php echo $partner_type; ?>">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> RM NAME

														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="rm_name">
													          	<?php
				                                    				 $dataRm = $this->db->query("SELECT * FROM ref_rm WHERE rm_visible = 1 ");
				                                    				  foreach ($dataRm->result_array() as $rrRm) { 
					                                        				if ($rrRm['rm_id'] == $rm_name) {
																			$select_Rm = 'selected="selected"';
																			} else {
																			$select_Rm = '';
																			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrRm['rm_id']; ?>" <?php echo $select_Rm; ?> ><?php echo $rrRm['rm_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
				                                    	</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> FUSE CODE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="fuse_code"
																value="<?php echo $fuse_code; ?>" required>
															
														</div>

													</div>
												</div>
											</div>
											<div class="col-sm-6">
												
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> POLICY NUMBER

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="policy_number" value="<?php echo $policy_number; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CO-INS

														</div>
														<div class="col-sm-4">
															<label class="radio-inline "><input type="radio" name="co_ins" value="1" 
																	checked>&nbsp;&nbsp;Ya</label>
														</div>
														<div class="col-sm-4">
															<label class="radio-inline"><input type="radio"
																	name="co_ins" value="0">&nbsp;&nbsp;Tidak</label>
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SPLITTING RM

														</div>
														<div class="col-sm-4">
															<label class="radio-inline "><input type="radio" name="splitt" value="1" 
																	checked>&nbsp;&nbsp;Ya</label>
														</div>
														<div class="col-sm-4">
															<label class="radio-inline"><input type="radio"
																	name="splitt" value="0">&nbsp;&nbsp;Tidak</label>
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PREMIUM

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="premium" name="premium"
																value="<?php echo $premium; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PREMIUM MARK UP

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="premium_mark" name="premium_mark"
																value="<?php echo $premium_mark; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DISCOUNT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="discount" name="discount"
																value="<?php echo $discount; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ADMIN FEE

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="adm_fee" name="adm_fee"
																value="<?php echo $adm_fee; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ADMIN MARK UP

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="adm_markUp" name="adm_markUp"
																value="<?php echo $adm_markUp; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> NET PAYMENT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="net_pay" name="net_pay"
																value="<?php echo $net_pay; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  % COMMISSION 

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="commission" id="push_commission" value="<?php echo $commission; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  POLICY STATUS 

														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="policy_status">
													          	<?php
				                                    				 $dataPolicy = $this->db->query("SELECT * FROM ref_policy_status WHERE rp_sts_visible = 1 ");
				                                    				  foreach ($dataPolicy->result_array() as $rrPolicy) { 
					                                        				// $select_policy = '';
					                                        				if($rrPolicy['rp_sts_id'] == $policy_status) {
						                                        				$select_policy= 'selected="selected"';
						                                        			}else{
						                                        				$select_policy = '';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrPolicy['rp_sts_id']; ?>" <?php echo $select_policy; ?> ><?php echo $rrPolicy['rp_sts_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> INS CO

														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="ins_co">
													          	<?php
				                                    				 $dataIns2 = $this->db->query("SELECT * FROM ref_insurance WHERE rins_visible = 1 ");
				                                    				  foreach ($dataIns2->result_array() as $rrIns2) { 
					                                        				if($rrIns2['rins_id'] == $ins_co) {
						                                        				$select_Ins2= 'selected="selected"';
						                                        			}else{
						                                        				$select_Ins2 = '';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrIns2['rins_id']; ?>" <?php echo $select_Ins2; ?> ><?php echo $rrIns2['rins_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> COVERAGE

														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="coverage">
													          	<?php
				                                    				 $dataCov = $this->db->query("SELECT * FROM ref_coverage WHERE rcoverage_visible = 1 ");
				                                    				  foreach ($dataCov->result_array() as $rrCov) { 
					                                        				if($rrCov['rcoverage_id'] == $coverage) {
						                                        				$select_Cov= 'selected="selected"';
						                                        			}else{
						                                        				$select_Cov = '';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrCov['rcoverage_id']; ?>" <?php echo $select_Cov; ?> ><?php echo $rrCov['rcoverage_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SEND SCP/CN/QS

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="send"
																value="<?php echo $send; ?>">
															
														</div>

													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 text-center">
												<div class="form-group col-md-12 text-center" id="border">

												</div>
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-sm-12  text-center">
													<h1 class="m-0 text-dark">Billing Officcer</h1>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PAYMENT STATUS
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="pay_status">
													          	<?php
				                                    				 $dataPay_stat = $this->db->query("SELECT * FROM ref_payment_status WHERE rpay_sts_visible = 1 ");
				                                    				  foreach ($dataPay_stat->result_array() as $rrStatus) { 
					                                        				if($rrStatus['rpay_sts_id'] == $pay_status) {
						                                        				$select_stat= 'selected="selected"';
						                                        			}else{
						                                        				$select_stat = '';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrStatus['rpay_sts_id']; ?>" <?php echo $select_stat; ?> ><?php echo $rrStatus['rpay_sts_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> % MAX NET PAYMENT 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="max_net" id="push_max_net"
																value="<?php echo $max_net; ?>" onkeyup="hitung()">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  NOMINAL MAX NET PAYMENT 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="nom_max_net" name="nom_max_net" value="<?php echo $nom_max_net; ?>" onkeyup="hitung()">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  NOMINAL MAX NET PAYMENT (AFTER TAX) 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="after_max_net" name="after_max_net" value="<?php echo $after_max_net; ?>" onkeyup="hitung()">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PAYMENT USING BONUS 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="pay_using_bonus" name="pay_using_bonus" value="<?php echo $pay_using_bonus; ?>" onkeyup="hitung()">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  PAYMENT USING POINTS 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="pay_using_point" name="pay_using_point" value="<?php echo $pay_using_point; ?>" onkeyup="hitung()">
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PAYMENT USING OTHERS 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="pay_using_others" name="pay_using_others"
																value="<?php echo $pay_using_others; ?>" onkeyup="hitung()">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  TOTAL PAYMENT
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="pay_total" name="pay_total" value="<?php echo $pay_total; ?>" onkeyup="hitung()">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PAY TO 
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="pay_to">
													          	<?php
				                                    				 $dataPay_to = $this->db->query("SELECT * FROM ref_pay_method WHERE rpay_method_visible = 1 ");
				                                    				  foreach ($dataPay_to->result_array() as $rrPayto) { 
					                                        				if($rrPayto['rpay_method_id'] == $pay_to) {
						                                        				$select_pay_to= 'selected="selected"';
						                                        			}else{
						                                        				$select_pay_to = '';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrPayto['rpay_method_id']; ?>" <?php echo $select_pay_to; ?> ><?php echo $rrPayto['rpay_method_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DATE OF PAYMENT 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="date_of_pay" id="datepicker5" value="<?php echo $date_of_pay; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CANCEL DATE 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="cancel_date" id="datepicker6" value="<?php echo $cancel_date; ?>">
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 text-center">
												<div class="form-group col-md-12 text-center" id="border">

												</div>
											</div>
										</div>
										<div class="row mb-2">
											<div class="col-sm-12  text-center">
													<h1 class="m-0 text-dark">Admin Logistic</h1>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CORRESPONDENCE ADDRESS 
														</div>
														<div class="col-sm-8">
															<textarea class="form-control" rows="5" name="address" ><?php echo $address; ?></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DELIVERY DATE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="delivery_date" id="datepicker7" value="<?php echo $delivery_date; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SEND VIA
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="send_via" >
													          	<?php
				                                    				 $dataSend = $this->db->query("SELECT * FROM ref_send_via WHERE rsend_via_visible = 1 ");
				                                    				  foreach ($dataSend->result_array() as $rrSend) { 
					                                        				if($rrSend['rsend_via_id'] == $send_via) {
						                                        				$select_pay_to= 'selected="selected"';
						                                        			}else{
						                                        				$select_pay_to = '';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrSend['rsend_via_id']; ?>" <?php echo $select_pay_to; ?> ><?php echo $rrSend['rsend_via_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  AWB NUMBER /<br>RECIPIENT NAME 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="awb" value="<?php echo $awb; ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 text-center">
												<div class="form-group col-md-12 text-center" id="border">

												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-12 text-right">
												<button type="submit" class="btn-lg btn-primary mb-1">Save Data</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>

	<?php $this->load->view('include/include_footer'); ?>

	<aside class="control-sidebar control-sidebar-dark">

	</aside>


	<?php $this->load->view('include/include_basejs'); ?>

	<script>
		function aging_date(){
			var dateFirst = new Date(document.getElementById('datepicker2').value);
			var dateSecond = new Date();
			
			// time difference
         	var timeDiff = Math.abs(dateSecond.getTime() - dateFirst.getTime());
         	
			// days difference
         	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
         	
			if(!isNaN(diffDays)){
				document.getElementById('aging').value = diffDays;
			}
			
			var tt = document.getElementById('datepicker2').value;

		    var date = new Date(tt);
		    var newdate = new Date(date);
		
		    newdate.setDate(newdate.getDate() + 60);
		    
		    var dd = newdate.getDate();
		    var mm = newdate.getMonth() + 1;
		    var y = newdate.getFullYear();
		
		    var someFormattedDate = y + '-' + mm + '-' + dd;
		    document.getElementById('datepicker4').value = someFormattedDate;
		}
	</script>
	
	<script>
		function hitung(){
			var premium = document.getElementById('premium').value;
			var premium_mark_up = document.getElementById('premium_mark').value;
			var disc = document.getElementById('discount').value;
			var adm_fee = document.getElementById('adm_fee').value;
			var adm_mark_up = document.getElementById('adm_markUp').value;
			
			var net_pay = parseInt(premium) + parseInt(premium_mark_up) + parseInt(adm_fee) + parseInt(adm_mark_up) - parseInt(disc);
			
			if(!isNaN(net_pay)){
				document.getElementById('net_pay').value = Math.round(net_pay);
			}
			
			var income = document.getElementById('push_commission').value;
			var push_max_net = 100 - income;
			
			if(!isNaN(push_max_net)){
				document.getElementById('push_max_net').value = push_max_net;
			}
			
			var nom_max_net = (parseInt(premium) + parseInt(premium_mark_up))*(push_max_net/100)+(parseInt(adm_fee) + parseInt(adm_mark_up));
			
			if(!isNaN(nom_max_net)){
				document.getElementById('nom_max_net').value = Math.round(nom_max_net);
			}
			
			var total1 = parseInt(premium) + parseInt(premium_mark_up) + parseInt(adm_fee) + parseInt(adm_mark_up);
			var premium1 = (parseInt(premium) + parseInt(premium_mark_up) ) * ( parseInt(income) / 100 );
			var after_max_net = ( total1 ) - ( ( premium1 ) - ( premium1 ) * (parseInt(income)/100));
			
			if(!isNaN(after_max_net)){
				document.getElementById('after_max_net').value = Math.round(after_max_net);
			}
			
			var pay_using_bonus = document.getElementById('pay_using_bonus').value;			
			var pay_using_point = document.getElementById('pay_using_point').value;
			var pay_using_others =  parseInt(net_pay) - ( parseInt(pay_using_bonus) + ( parseInt(pay_using_point) * 1000) );
			
			if(!isNaN(pay_using_others)){
				document.getElementById('pay_using_others').value = Math.round(pay_using_others);
			}
			
			var pay_total =  parseInt(pay_using_others) + parseInt(pay_using_bonus) + ( parseInt(pay_using_point) * 1000);
			if(!isNaN(pay_total)){
				document.getElementById('pay_total').value = Math.round(pay_total);
			}
		}
	</script>
</body>

</html>
