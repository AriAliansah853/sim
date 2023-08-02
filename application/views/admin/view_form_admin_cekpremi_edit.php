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
							<h1 class="m-0 text-dark">Form Admin Cekpremi</h1>
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
				<form id="formProfilePage" action="<?php echo base_url('Admin/simpan_cekpremi/'.$id);?>" method="POST">
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
															<label for="" class=" control-label"> ADMIN NAME
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="name_adm">
													          	<?php
				                                    				 $dataAdm = $this->db->query("SELECT * FROM userlogin");
				                                    				 // die(print_r($dataAdm->result_array()));
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
															<input type="text" class="form-control" name="order_date" id="datepicker" value="<?php echo $order_date; ?>" >
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
															<input type="text" class="form-control" name="order_via" value="<?php echo $order_via; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">SALES NAME
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="sales" >
													          	<?php
				                                    				 $dataSales = $this->db->query("SELECT * FROM ref_sales ");
				                                    				  foreach ($dataSales->result_array() as $rrSales) { 
					                                        				// $select_sales= '';
					                                        				 if ($rrSales['rsales_id'] == $sales) {
												                                $selectSales = 'selected="selected"';
												                              } else {
												                                $selectSales = '';
												                              }
				                                        		?>
				                                    				 	<option  value="<?php echo $rrSales['rsales_id']; ?>" <?php echo $selectSales; ?> ><?php echo $rrSales['rsales_name']; ?></option>	                                        		
				                                    			<?php }
				                                    			?>
				                                    		</select>
														</div>
													</div>
												</div>												
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> START DATE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="start_date" id="datepicker4" value="<?php echo $start_date; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> FOLDER NAME
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="folder_name" value="<?php echo $folder_name; ?>">													
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> INSURED NAME

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="insured_name" value="<?php echo $insured_name; ?>">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> NPP
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="npp"
																value="<?php echo $npp; ?>" required>
															
														</div>

													</div>
												</div>
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
															<label for="" class=" control-label">  POLICY STATUS 

														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="policy_status">
													          	<?php
				                                    				 $dataPolicy = $this->db->query("SELECT * FROM ref_policy_status WHERE rp_sts_visible = 1 ");
				                                    				  foreach ($dataPolicy->result_array() as $rrPolicy) { 
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
					                                        				$select_Cov = '';
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
												
												
											</div>
											<div class="col-sm-6">	
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">PREMIUM

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="premium" name="premium" value="<?php echo $premium; ?>" onkeyup="hitung()" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PREMIUM MARK UP
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="premium_mark_up" name="premium_mark_up" value="<?php echo $premium_mark_up; ?>" >
														</div>
													</div>
												</div>												
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DISCOUNT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="discount" name="discount" value="<?php echo $discount; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>																			
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CASHBACK

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="cashback" name="cashback" value="<?php echo $cashback; ?>">
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ADMIN FEE

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="adm_fee" name="adm_fee" value="<?php echo $adm_fee; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> ADMIN MARK UP

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="adm_mark_up" name="adm_mark_up" value="<?php echo $adm_mark_up; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> NET PAYMENT

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="net_pay" name="net_pay" value="<?php echo $net_pay; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> % INCOME

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="income" name="income" value="<?php echo $income; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> NOMINAL INCOME  

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" id="nom_income" name="nom_income" value="<?php echo $nom_income; ?>" onkeyup="hitung()">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PHONE NUMBER

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number; ?>">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> EMAIL ADDRESS

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="email"
																value="<?php echo $email; ?>">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> SEND SCP/CN/QS

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="send_scp"
																value="<?php echo $send_scp; ?>">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DATE OF SEND SCP/CN/QS

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="date_scp"
																value="<?php echo $date_scp; ?>" id="datepicker8">
															
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
											<div class="col-sm-12 text-center">
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
					                                        				$select_stat = '';
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
															<label for="" class=" control-label"> DEADLINE PAYMENT 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="deadline_pay"
																value="<?php echo $deadline_pay; ?>" id="datepicker9">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DATE OF PAYMENT
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="date_of_pay" id="datepicker10" value="<?php echo $date_of_pay; ?>">
														</div>
													</div>
												</div>
												
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  PAY TO
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="pay_to">
													          	<?php
				                                    				 $dataPay_to = $this->db->query("SELECT * FROM ref_pay_method WHERE rpay_method_visible = 1 ");
				                                    				  foreach ($dataPay_to->result_array() as $rrPayto) { 
					                                        				$select_pay_to = '';
					                                        				if($rrPayto['rpay_method_id'] == $pay_to) {
						                                        				$select_pay_to= 'selected="selected"';
						                                        			}else{
						                                        				$select_pay_to = '';
						                                        			}			                                        		?>
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
															<label for="" class=" control-label"> CANCEL DATE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="cancel_date" id="datepicker11" value="<?php echo $cancel_date; ?>">
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
															<textarea class="form-control" rows="5" name="corres"><?php echo $corres; ?></textarea>
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
															<select id="multiple2" class="js-states form-control" name="send_via">
													          	<?php
				                                    				 $dataSend = $this->db->query("SELECT * FROM ref_send_via WHERE rsend_via_visible = 1 ");
				                                    				  foreach ($dataSend->result_array() as $rrSend) { 
					                                        				if($rrSend['rsend_via_id'] == $send_via) {
						                                        				$select_send_via= 'selected="selected"';
						                                        			}else{
						                                        				$select_send_via = '';
						                                        			}
				                                        		?>
				                                    				 	<option  value="<?php echo $rrSend['rsend_via_id']; ?>" <?php echo $select_send_via; ?> ><?php echo $rrSend['rsend_via_name']; ?></option>	                                        		
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
		function hitung(){
			var premium = document.getElementById('premium').value;
			var premium_mark_up = document.getElementById('premium_mark_up').value;
			var disc = document.getElementById('discount').value;
			var cashback = document.getElementById('cashback').value;
			var adm_fee = document.getElementById('adm_fee').value;
			var adm_mark_up = document.getElementById('adm_mark_up').value;
			var income = document.getElementById('income').value;
			
			var net_pay = parseInt(premium) - parseInt(disc) + parseInt(adm_fee) + parseInt(adm_mark_up);
			var nom_income = (parseInt(premium)+ parseInt(adm_fee))*(parseInt(income)/100)-(parseInt(disc)+parseInt(cashback))+parseInt(adm_mark_up);

			if(!isNaN(net_pay)){
				document.getElementById('net_pay').value = net_pay;
			}

			if(!isNaN(nom_income)){
				document.getElementById('nom_income').value = nom_income;
			}
		}
	</script>

</body>

</html>
