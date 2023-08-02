
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
			              		<li class="breadcrumb-item"><a href="#">RM</a></li>
			              		<li class="breadcrumb-item active">Add</li>
			            	</ol>
			          	</div>
			        </div>
		     	 </div>
		    </div>

    		<section class="content">
		      	<div class="container-fluid">
			        <div class="row">

			          	<div class="col-md-12">

			            	<div class="card card-danger">
				              	<div class="card-header">
				                	<h3 class="card-title">Tambah RM</h3>
				              	</div>
				              
				              	<form role="form" action="<?php echo base_url();?>reference/save_rm" method="post" >
					                <div class="card-body">
					                  	
					                  	<div class="form-group">
						                    <label>Nama RM</label>
						                    <input type="text" name="rm" class="form-control" placeholder="Nama RM">
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
										          <select id="multiple2" class="js-states form-control" name="insert_user">
										          	<?php
	                                    				 $User = $this->db->query("SELECT * FROM userlogin WHERE login_visible = 1 ");
	                                    				  foreach ($User->result_array() as $rrUser) { 
		                                        				$select_User = '';
		                                        				if($rrUser['login_id'] == $user) {
			                                        				$select_cate= 'selected="selected"';
			                                        			}
	                                        		?>
	                                    				 	<option  value="<?php echo $rrUser['login_id']; ?>" <?php echo $select_User; ?> ><?php echo $rrUser['login_name']; ?></option>	                                        		
	                                    			<?php }
	                                    			?>
	                                    		</select>
										        </div>  -->
					                </div>

					                <div class="card-footer">
					                  	<button type="submit" class="btn btn-danger">Submit</button>
					                </div>
					            </form>
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
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
		
		var cekError=<?php echo $errorData?>;
		 if(cekError == 0){
            swal({
                title: 'Sudah Ada',
                icon: "warning",
            })
            .then((Ok) => {
                $('#btnSubmit').text('Tambah RM Gagal'); 
                $('#btnSubmit').attr('disabled',false);
				// location='http://micro.fuse.co.id/crowdo/user/add'; 
            });
			
			
        }else {
				
        }

	</script>
</body>
</html>
