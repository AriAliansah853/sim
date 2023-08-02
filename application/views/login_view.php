<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Login &mdash; LEGAL</title>
  	<!-- Tell the browser to be responsive to screen width -->
 	 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	
  	<?php $this->load->view('include/include_basecss'); ?>
  	
</head>
<body class="hold-transition login-page">
<div class="login-box">
  	<div class="login-logo">
    	<a href="<?php echo base_url(); ?>"><b>SIM</b></a>
  	</div>
  	<!-- /.login-logo -->
  	<div class="login-box-body">
    	<p class="login-box-msg">Masukkan User dan Password Anda</p>

    	<form action="<?php echo base_url(); ?>auth/login" method="post">
	    	<?php echo validation_errors(); ?>
	    	<?php 
	      		if (isset($errorMsg)){
	        ?>
	          <p><?php echo $errorMsg; ?></p>
	        <?php
	      		} 
	    	?>    	

	      	<div class="form-group has-feedback">
	        	<input type="text" autofocus name="username" class="form-control" placeholder="User">
	        	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	      	</div>
	      	<div class="form-group has-feedback">
	        	<input type="password" name="password" class="form-control" placeholder="Password">
	        	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	      	</div>
	      	<div class="row">
	        	<div class="col-xs-12 col-md-12">
	          		<button type="submit" class="btn btn-primary btn-block btn-flat">Masuk ke Legal</button>
	        	</div>
	      	</div>
	      	<br>
	      	<p class="login-box-msg">IP Kamu : <?php echo $ipAddress; ?></p>
	    </form>


  	</div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $this->load->view('include/include_basejs'); ?>
</body>
</html>
