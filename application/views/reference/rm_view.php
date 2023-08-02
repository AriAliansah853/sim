
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>SIM | RM</title>
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
			            	<h1 class="m-0 text-dark">RM</h1>
			          	</div>
			          	<div class="col-sm-6">
			            	<ol class="breadcrumb float-sm-right">
			              		<li class="breadcrumb-item"><a href="#">Home</a></li>
			              		<li class="breadcrumb-item active">RM</li>
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
					            <div class="card-header">
					              	<h3 class="card-title">RM</h3>
					              	<div class="card-tools">
					              	 	<a href="<?php echo base_url(); ?>reference/Add_rm"><button type="button" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add RM</button></a>
					              	</div>					             
					            </div>

					            <div class="card-body table-responsive">
					              	<table id="example1" class="table table-bordered table-striped " width="100%">
						                <thead>
							                <tr>
							                  	<th>No.</th>
							                  	<th>Nama RM</th>
							                  	<th>Visible</th>
							                  	<th>Insert User RM</th>
							                  	<th>Insert Date Time</th>
							                  	<th style="text-align: center;">Action</th>
							                </tr>
						                </thead>
						                <tbody>
						                	<?php 
						                	 
						                		$no = 1;
						                		foreach ($listRm->result_array() as $valueRm) {
						                			if ($valueRm['rm_visible'] == 1) {
						                				$visible = 'Active';
						                			} else {
						                				$visible = 'Non Active';
						                			}
						                			$data = $this->db->query("SELECT * FROM userlogin where login_id = '".$valueRm['rm_insert_user']."'");
				              						$User = $data->row_array();
						                	?>
							                	<tr>
							                		<td><?php echo $no; ?></td>
							                		<td><?php echo $valueRm['rm_name']; ?></td>
							                		<td><?php echo $visible; ?></td>
							                		<td><?php echo $User['login_name']; ?></td>
							                		<td><?php echo $valueRm['rm_insert_datetime']; ?></td>
							                		<td style="text-align: center;">
							                			<a href="<?php echo base_url().'reference/edit_rm/'.$valueRm['rm_id'];?>"><button type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
							                			<a href="<?php echo base_url().'reference/deleteRm/'.$valueRm['rm_id'];?>"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button></a>
													</td>
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

	<?php $this->load->view('include/include_basejs'); ?>
	<script>
	  	$(function () {
	    	$("#example1").DataTable();
	    	$('#example2').DataTable({
	      		"paging": true,
	      		"lengthChange": false,
	      		"searching": false,
	      		"ordering": true,
	      		"info": true,
	      		"autoWidth": false
	    	});
	  	});
	</script>
</body>
</html>
