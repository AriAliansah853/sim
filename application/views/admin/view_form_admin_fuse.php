<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin System | Form</title>
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
							<h1 class="m-0 text-dark">Form Admin Processing</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Form Admin Processing</li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			<section class="content">
				<form id="formProfilePage" action="<?php echo base_url('Admin/simpan_fuse');?>" method="POST">
					<div class="container-fluid">
						<div class="row">

							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="row">
											<div class="col-lg-12 text-center">
												<div class="form-group col-md-12 text-center" id="border">

												</div>
											</div>
										</div>
										<br>
										<div class="row mb-2">
												<div class="col-sm-6">
													<h1 class="m-0 text-dark">Form Admin Processing</h1>
												</div>
											</div>
											<br>
											<br>
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
					                                        				$select_User = '';
					                                        				if($rrBranch['rbranch_id'] == $user) {
						                                        				$select_cate= 'selected="selected"';
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
					                                        				$select_adm = '';
					                                        				// if($rrRm['rm_id'] == $user) {
						                                        			// 	$select_cate= 'selected="selected"';
						                                        			// }
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
															<input type="text" class="form-control" name="order_date" id="datepicker" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SUBMIT DATE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="submit_date" id="datepicker3" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ORDER VIA
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control"  name="order_via">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> START DATE

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="start_date" id="datepicker2" >
														</div>
													</div>
												</div>
												<!-- <div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> AGING (DAYS)
														</div>
														<div class="col-sm-8">
															<input type="number" class="form-control" name="aging"
																value="">
															
														</div>

													</div>
												</div> -->
												<!-- <div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DEADLINE PAYMENT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="deadline_pay" id="datepicker4" >
														</div>
													</div>
												</div> -->
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> INSURED NAME
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="insured_name"  >
															<!-- <select id="multiple2" class="js-states form-control" name="insured_name">
													          	<?php
				                                    				 $dataIns = $this->db->query("SELECT * FROM ref_insurance WHERE rins_visible = 1 ");
				                                    				  foreach ($dataIns->result_array() as $rrIns) { 
					                                        				$select_Ins = '';
					                                        				if($rrIns['rbranch_id'] == $user) {
						                                        				$select_cate= 'selected="selected"';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrIns['rins_id']; ?>" <?php echo $select_Ins; ?> ><?php echo $rrIns['rins_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select> -->
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PARTNER NAME

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="partner_name"  >
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
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PARTNER CATEGORY

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="partner_cate"  >
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
																value="">
															
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
					                                        				$select_Rm = '';
					                                        				if($rrRm['rm_id'] == $user) {
						                                        				$select_cate= 'selected="selected"';
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
																value="" required>
															
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
															<input type="text" class="form-control" name="policy_number" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CO-INS (Yes/No)

														</div>
														<div class="col-sm-4">
															<label class="radio-inline "><input type="radio" name="co_ins" value="1" 
																	checked>&nbsp;&nbsp;Ya</label>
														</div>
														<div class="col-sm-4">
															<label class="radio-inline"><input type="radio" value="0" 
																	name="co_ins">&nbsp;&nbsp;Tidak</label>
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SPLITTING RM Yes/No

														</div>
														<div class="col-sm-4">
															<label class="radio-inline "><input type="radio" name="splitt" value="1" 
																	checked>&nbsp;&nbsp;Ya</label>
														</div>
														<div class="col-sm-4">
															<label class="radio-inline"><input type="radio"
																	name="splitt" value="0" >&nbsp;&nbsp;Tidak</label>
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PREMIUM

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="premium"
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PREMIUM MARK UP

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="premium_mark"
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DISCOUNT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="discount"
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ADMIN FEE

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="adm_fee"
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ADMIN MARK UP

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="adm_markUp"
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> NET PAYMENT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="net_pay"
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  % COMMISSION 

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="commission" id="push_commission" value="">
															
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
					                                        				$select_policy = '';
					                                        				// if($rrRm['rm_id'] == $user) {
						                                        			// 	$select_cate= 'selected="selected"';
						                                        			// }
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
					                                        				$select_Ins2 = '';
					                                        				if($rrIns2['rbranch_id'] == $user) {
						                                        				$select_cate= 'selected="selected"';
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
					                                        				$select_Cov = '';
					                                        				if($rrCov['rcoverage_id'] == $user) {
						                                        				$select_cate= 'selected="selected"';
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
																value="">
															
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
												<div class="col-sm-6">
													<h1 class="m-0 text-dark">Billing Officcer</h1>
												</div>
											</div>
											<br>
											<br>
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
					                                        				$select_stat = '';
					                                        				// if($rrRm['rm_id'] == $user) {
						                                        			// 	$select_cate= 'selected="selected"';
						                                        			// }
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
																value="">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  NOMINAL MAX NET PAYMENT 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="nom_max_net" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  NOMINAL MAX NET PAYMENT (AFTER TAX) 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="after_max_net" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PAYMENT USING BONUS 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="pay_using_bonus" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  PAYMENT USING POINTS 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="pay_using_point" >
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
															<input type="text" class="form-control" name="pay_using_others"
																value="">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  TOTAL PAYMENT
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="pay_total" >
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
					                                        				$select_pay_to = '';
					                                        				// if($rrRm['rm_id'] == $user) {
						                                        			// 	$select_cate= 'selected="selected"';
						                                        			// }
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
															<input type="text" class="form-control" name="date_of_pay" id="datepicker5" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CANCEL DATE 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="cancel_date" id="datepicker6" >
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
												<div class="col-sm-6">
													<h1 class="m-0 text-dark">Admin Logistik</h1>
												</div>
											</div>
											<br>
											<br>
										<div class="row">
											<div class="col-sm-6">
												
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CORRESPONDENCE ADDRESS 
														</div>
														<div class="col-sm-8">
															<textarea class="form-control" rows="5" name="address" ></textarea>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DELIVERY DATE (DD/MM/YYYY) 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="delivery_date" id="datepicker7">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SEND VIA
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="send_via">
													          	<?php
				                                    				 $dataSend = $this->db->query("SELECT * FROM ref_send_via WHERE rsend_via_visible = 1 ");
				                                    				  foreach ($dataSend->result_array() as $rrSend) { 
					                                        				$select_pay_to = '';
					                                        				// if($rrRm['rm_id'] == $user) {
						                                        			// 	$select_cate= 'selected="selected"';
						                                        			// }
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
															<label for="" class=" control-label">  AWB NUMBER/RECIPIENT NAME 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="awb" >
														</div>
													</div>
												</div>
												

											</div>
										</div>
										<br>
												<br>
												<button type="submit" class="btn btn-primary mb-1">Simpan</button>
				</form>
				
				
		
	</div>
	</div>
	</div>
	</div>
	</form>
	</section>

	</div>

	<?php $this->load->view('include/include_footer'); ?>

	<aside class="control-sidebar control-sidebar-dark">

	</aside>


	<?php $this->load->view('include/include_basejs'); ?>
	
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<!-- Select2 -->
	<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
      $("#single").select2({
          placeholder: "Perusahaan",
          allowClear: true
      });
      $("#multiple").select2({
          placeholder: "Kategori",
          allowClear: true
      });
    </script> -->
    <!-- <script>
		function cek(){
			var commiss = document.getElementById('push_commission').value;
			var admfee = document.getElementById('push_adm').value;
			var disc = document.getElementById('push_disc').value;
			var max = 100 / 100 - parseInt(commiss);
			var nett = parseInt(subtot) - parseInt(disc);

			if(!isNaN(max)){
				document.getElementById('push_max_net').value = max;
			}

		}
	</script> -->


</body>

</html>
