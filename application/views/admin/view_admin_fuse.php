
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Admin System | Admin Fuse</title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	
  	<?php $this->load->view('include/include_basecss'); ?>

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
			            	<h1 class="m-0 text-dark">List of Fuse Data</h1>
			          	</div>
			          	<div class="col-sm-6">
			            	<ol class="breadcrumb float-sm-right">
			              		<li class="breadcrumb-item"><a href="#">Home</a></li>
			              		<li class="breadcrumb-item active">Admin Fuse</li>
			            	</ol>
			          	</div>
			        </div>
		     	 </div>
		    </div>

    		<section class="content">
		      	<div class="container-fluid">
			        <div class="row">

			          	<div class="col-md-12">

			            	<div class="card">
					            <div class="card-body table-responsive">
					              	<table id="example1" class="table table-bordered table-striped " width="100%">
						                <thead>
							                <tr>
							                  	<th>No.</th>
							                  	<th style="text-align: center;" colspan="3">Action</th>
							                  	<th>Branch</th>
							                  	<th>Admin Name</th>
							                  	<th>Order Date</th>
							                  	<th>Submit Date</th>
							                  	<th>Order Via</th>
							                  	<th>Start Date</th>
							                  	<th>Aging (Days)</th>
							                  	<th>Deadline Payment</th>
							                  	<th>Insured Name</th>
							                  	<th>Partner Name</th>
							                  	<th>Partner Phone Number</th>
							                  	<th>Partner Category</th>
							                  	<th>RM Name</th>
							                  	<th>Fuse Code</th>
							                  	<th>Policy Number</th>
							                  	<th>Co-Ins</th>
							                  	<th>Splitting RM</th>
							                  	<th>Premium</th>
							                  	<th>Premium Mark Up</th>
							                  	<th>Discount</th>
							                  	<th>Admin Fee</th>
							                  	<th>Admin Mark Up</th>
							                  	<th>Net Payment</th>
							                  	<th>% Commission</th>
							                  	<th>Policy Status</th>
							                  	<th>Ins CO</th>
							                  	<th>Coverage</th>
							                  	<th>Send SCP/CN/QS</th>
							                  	<th>Payment Status</th>
							                  	<th>% Max Net Payment</th>
							                  	<th>Max Net Payment</th>
							                  	<th>Max Net Payment (After Tax)</th>
							                  	<th>Payment Using Bonus</th>
							                  	<th>Payment Using Points</th>
							                  	<th>Payment Using Others</th>
							                  	<th>Total Payment</th>
							                  	<th>Pay To</th>
							                  	<th>Date Of Payment</th>
							                  	<th>Cancel Date</th>
							                  	<th>Correspondence Address</th>
							                  	<th>Delivery Date</th>
							                  	<th>Send VIA</th>
							                  	<th>AWB Number / Recipent</th>
							                </tr>
						                </thead>
						                <tbody>
						                	<?php 
						                		$no = 1;
						                		foreach ($listFuse->result_array() as $valueFuse) {
						                			if ($valueFuse['fuse_proses_coas_ins'] == 1) {
						                				$coas = 'Yes';
						                			} else {
						                				$coas = 'No';
						                			}

						                			if ($valueFuse['fuse_proses_splitting_ins'] == 1) {
						                				$splitting = 'Yes';
						                			} else {
						                				$splitting = 'No';
						                			}
						                			
						                			// $branch = $this->db->query("select * from obj_fuse, ref_branch where rbranch_id = fuse_proses_branch");
						                			// $rrbranch = $branch->row_array()
						                	?>
						                	
							                	<tr>
							                		<td><?php echo $no; ?></td>
							                		<td>
							                			<button type="button" class="btn btn-success btn-sm" onclick="loghistory('<?php echo $valueFuse['fuse_id']; ?>')"><i class="fa fa-edit"></i> Log</button>
							                		</td>
							                		<td>
							                			<a href="<?php echo base_url().'admin/edit_fuse/'.$valueFuse['fuse_id'];?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
							                		</td>
							                		<td>
							                			<a href="<?php echo base_url().'admin/deleteFuse/'.$valueFuse['fuse_id'];?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button></a>
													</td>
							                		<td><?php echo $valueFuse['rbranch_name']; ?></td>
							                		<td><?php echo $valueFuse['login_name']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_order_date']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_submit_date']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_order_via']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_start_date']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_aging']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_deadline_pay']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_insured_name']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_partner_name']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_partner_number']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_partner_category']; ?></td>
							                		<td><?php echo $valueFuse['rm_name']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_fuse_code']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_policy_no']; ?></td>
							                		<td><?php echo $coas; ?></td>
							                		<td><?php echo $splitting; ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_proses_premium'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_proses_premium_markup'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_proses_disc'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_proses_admin_fee'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_proses_admin_markup'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_proses_net_payment'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_proses_pct_commission'],0,',','.'); ?></td>
							                		<td><?php echo $valueFuse['rp_sts_name']; ?></td>
							                		<td><?php echo $valueFuse['rins_name']; ?></td>
							                		<td><?php echo $valueFuse['rcoverage_name']; ?></td>
							                		<td><?php echo $valueFuse['fuse_proses_send_scp']; ?></td>
							                		<td><?php echo $valueFuse['fuse_billing_payment_sts']; ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_billing_pct_max_net_pay'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_billing_max_net_pay'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_billing_max_net_after_tax'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_billing_pay_bonus'],0,',','.'); ?></td>
							                		<td><?php echo $valueFuse['fuse_billing_pay_point']; ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_billing_pay_others'],0,',','.'); ?></td>
							                		<td align="right"><?php echo number_format($valueFuse['fuse_billing_pay_total'],0,',','.'); ?></td>
							                		<td><?php echo $valueFuse['rpay_method_name']; ?></td>
							                		<td><?php echo $valueFuse['fuse_billing_date_pay']; ?></td>
							                		<td><?php echo $valueFuse['fuse_billing_cancel_date']; ?></td>
							                		<td><?php echo $valueFuse['fuse_logistic_address']; ?></td>
							                		<td><?php echo $valueFuse['fuse_logistic_delivery_date']; ?></td>
							                		<td><?php echo $valueFuse['rsend_via_name']; ?></td>
							                		<td><?php echo $valueFuse['fuse_logistic_awb_number']; ?></td>
							                	</tr>
							                <?php $no++;} ?>
						                </tbody>
					              	</table>
					            </div>
					          </div>
			        	</div>		        
		      		</div>
		      	</div>
    		</section>

  		</div>

	  	<?php $this->load->view('include/include_footer'); ?>

	  	<aside class="control-sidebar control-sidebar-dark">

	  	</aside>
	</div>
	<div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">History Log</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
			        <div class="row">
			          	<div class="col-md-12">
			          		<table width="100%" border="1" cellpadding="5px" cellspacing="5px">
						        <thead>
									<tr>
										<td style="text-align: center;">Action</td>
										<td style="text-align: center;">Operator</td>
										<td style="text-align: center;">Date Time</td>
										<td style="text-align: center;" widtd="50%">Description</td>
									</tr>
								</thead>
								<tbody id="trhistory">
									<!--  <?php 
									$sqlLog = $this->db->query("SELECT * FROM history_log, userlogin where login_id = his_log_input_user order by his_log_input_datetime desc");
                    				foreach ($sqlLog->result_array() as $rowLog) { ?>
									<tr>
										<td align="center"><?php echo $rowLog['his_log_action']; ?></td>
										<td align="center"><?php echo $rowLog['login_user']; ?></td>
										<td><?php echo date('Y-m-d H:i:s', strtotime($rowLog['his_log_input_datetime'])); ?></td>
										<td><?php echo $rowLog['his_log_short_desc']; ?></td>
									</tr>
									<?php } ?>  -->
								</tbody>
			          		</table>
			          	</div>
			        </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
			</div>
		<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->

	<?php $this->load->view('include/include_basejs'); ?>
	<script>
	  	$(function () {
	    	$("#example1").DataTable();
	  	});
	</script>
	<script type="text/javascript">
		function loghistory(id){
			$.ajax({
				url : "<?php echo site_url('admin/history_fuse')?>/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(sql){
					$('#modal-default').modal('show');
					console.log(sql);
					var tr;
					// var i=sql.length;
					$('#trhistory').html('');
					var key=1;
					$.each(sql, function(k, v) {
					  	tr = $("<tr>");
					  	// tr.append("<td>" + key+ "</td>");
					  	tr.append("<td>" + v.his_log_action + "</td>");
						tr.append("<td>" + v.his_log_short_desc + "</td>");
						tr.append("<td>" + v.his_log_input_datetime + "</td>");
					  	tr.append("<td>" + v.his_log_short_desc + "</td>");
						//th=$("");
						
					  	$("#trhistory").append(tr);
					  	// key++;
					});
				},
				error: function (jqXHR, textStatus, errorThrown){
						alert('Data Error');
				}
			});
		}
	</script>
</body>
</html>
