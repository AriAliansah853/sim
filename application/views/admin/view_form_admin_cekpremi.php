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
							<h1 class="m-0 text-dark">Form Admin Processing Cekpremi</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Cekpremi Form</li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			<section class="content">
				<form id="formProfilePage" action="<?php echo base_url('Admin/simpan_cekpremi');?>" method="POST">
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
													<h1 class="m-0 text-dark">Admin Processing</h1>
												</div>
											</div>
											<br>
											<br>
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
															<input type="text" class="form-control" name="order_via" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">SALES NAME
														</div>
														<div class="col-sm-8">
															<select id="multiple2" class="js-states form-control" name="sales">
													          	<?php
				                                    				 $dataSales = $this->db->query("SELECT * FROM ref_sales ");
				                                    				  foreach ($dataSales->result_array() as $rrSales) { 
					                                        				$select_sales= '';
					                                        				// if($rrRm['rm_id'] == $user) {
						                                        			// 	$select_cate= 'selected="selected"';
						                                        			// }
				                                        		?>
				                                    				 	<option  value="<?php echo $rrSales['rsales_id']; ?>" <?php echo $select_sales; ?> ><?php echo $rrSales['rsales_name']; ?></option>	                                        		
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
															<input type="text" class="form-control" name="start_date" id="datepicker4" >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> FOLDER NAME
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="folder_name"
																value="">															
														</div>

													</div>
												</div>
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
															<label for="" class=" control-label"> NPP
														</div>
														<div class="col-sm-8">
															<input type="number" class="form-control" name="npp"
																value="" required>
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> POLICY NUMBER

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="policy_number"  >
														</div>
													</div>
												</div>
												<!-- <div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">  PARTNER TYPE 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="partner_type">															
														</div>

													</div>
												</div> -->
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label">PREMIUM

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="premium"  >
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> PREMIUM MARK UP
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="premium_mark_up" >
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
												
											</div>
											<div class="col-sm-6">																				
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> CASHBACK

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="cashback"
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
															<input type="text" class="form-control" name="adm_mark_up"
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
															<label for="" class=" control-label"> % INCOME

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="income"
																value="">
															
														</div>

													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> NOMINAL INCOME  

														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="nom_income"
																value="">
															
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
															<label for="" class=" control-label"> PHONE NUMBER

														</div>
														<div class="col-sm-8">
															<input type="number" class="form-control" name="phone_number">
															
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
																value="">
															
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
																value="">
															
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
																value="" id="datepicker8">
															
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
															<label for="" class=" control-label"> DEADLINE PAYMENT 
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="deadline_pay"
																value="" id="datepicker9">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-4 text-right">
															<label for="" class=" control-label"> DATE OF PAYMENT
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="date_of_pay" id="datepicker10" >
														</div>
													</div>
												</div>
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
															<label for="" class=" control-label"> CANCEL DATE
														</div>
														<div class="col-sm-8">
															<input type="text" class="form-control" name="cancel_date" id="datepicker11" >
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
															<textarea class="form-control" rows="5" name="corres" ></textarea>
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


</body>

</html>
