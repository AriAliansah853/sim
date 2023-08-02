
<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>SIM | Insurance</title>
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
			            	<h1 class="m-0 text-dark">Insurance</h1>
			          	</div>
			          	<div class="col-sm-6">
			            	<ol class="breadcrumb float-sm-right">
			              		<li class="breadcrumb-item"><a href="#">Home</a></li>
			              		<li class="breadcrumb-item"><a href="#">Insurance</a></li>
			              		<li class="breadcrumb-item active">Edit Insurance</li>
			            	</ol>
			          	</div>
			        </div>
		     	 </div>
		    </div>

    		<section class="content">
		      	
			        <div class="row">
						<div class="col-md-6">
						<div class="card card-danger">
				              	<div class="card-header">
				                	<h3 class="card-title">Edit Insurance</h3>
				              	</div>
				              	<!-- <?php $data = $this->db->query("SELECT * FROM userlogin where login_id = '".$inser_user."'");
				              		$User = $data->row_array();
				              	?> -->
				              	<form role="form" action="<?php echo base_url('reference/update_insurance/'.$id);?>" method="post" >
					                <div class="card-body">
					                  	<div class="form-group">
						                    <label>Insurance Name</label>
						                    <input type="text" name="insurance" class="form-control" value="<?php echo $nama_insurance; ?>">
					                  	</div>
					                  	<div class="form-group">
						                    <label>Visible</label>
						                    <select class="form-control" name="visible">
						                    	<option value="1">TRUE</option>
						                    	<option value="0">FALSE</option>
						                    </select>
					                  	</div>
					                  	<!-- <div class="form-group">
						                    <label>Insert User</label>
						                    <input type="text" name="insert_user" class="form-control" value="<?php echo $User['login_user']; ?>" readonly>
					                  	</div> -->
					                </div>

					                <div class="card-footer">
					                  	<button type="submit" class="btn btn-danger">Submit</button>
					                </div>
					            </form>
				            </div>
						</div>
						<div class="col-md-6">
						
						</div>
						<div class="col-md-12">

			        	</div>		        
		      		</div>
		      	
    		</section>

  		</div>

	  	<?php $this->load->view('include/include_footer'); ?>

	  	<aside class="control-sidebar control-sidebar-dark">

	  	</aside>
	</div>
		
	<?php $this->load->view('include/include_basejs'); ?>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
	var urlAdd="<?php echo base_url('reference/add_coverage');?>";
	var link="<?php echo base_url('reference/edit_coverage/').''.$rcoverage_id;?>";
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
		
		var cekError=<?php echo $errorData?>;
		 if(cekError == 0){
            swal({
                title: 'Coverage Sudah Ada',
                icon: "warning",
            })
            .then((Ok) => {
                $('#btnSubmit').text('Tambah Coverage Gagal'); 
                $('#btnSubmit').attr('disabled',false);
				window.location.replace(urlAdd); 
            });
			
			
        }else {
				
        }
		
		
	</script>
</body>
</html>
