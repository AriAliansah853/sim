<?php
	$sidebar = '';
	$sidebarStatus = $sidebar;
  	$sidebarDashboard = '';
  	$sidebarTask = '';
  	$sidebarMenuAdminFuse = '';
	$sidebarMenuAdminCekpremi = '';
	$sidebarTaskDokLengkap = ''; 
	$sidebarTaskHardLengkap = ''; 
	$sidebarReferensi = '';
	$sidebarDaftar = '';  
  	$sidebarUser = '';
  	$sidebarMenu = '';
  	$sidebarSource = '';
  	$openMenuTask = '';
  	$openMenuUser = '';

  	if ($sidebarStatus == 'dashboard') {
		$sidebarDashboard = 'active';
	} else if ($sidebarStatus == 'task_no_permintaan') {
		$sidebarTask = 'active';
    	$sidebarMenuAdminFuse = 'active';
	} else if ($sidebarStatus == 'task_daftar_permintaan') {
	    $sidebarTask = 'active';
	    $sidebarMenuAdminCekpremi = 'active';
	} else if ($sidebarStatus == 'task_dok_lengkap') {
		$sidebarTask = 'active';
		$sidebarTaskDokLengkap = 'active';
	} else if ($sidebarStatus == 'task_hardcopy') {
	    $sidebarTask = 'active';
	    $sidebarTaskHardLengkap = 'active';
	} else if ($sidebarStatus == 'task_hardcopy') {
	    $sidebarDaftar = 'active';
	} else {}

	if ($sidebarStatus == 'daftar') {
		$sidebarDaftar = 'active';
	}

	if ($sidebarStatus == 'data') {
		$sidebarDaftar = 'active';
	}

	if ($sidebarTask == 'active') {
	    $openMenuTask = 'menu-open';
	}

	if ($sidebarReferensi == 'active') {
	    $openMenuUser = 'menu-open';
	}
	
	
	
?>


<aside class="main-sidebar sidebar-dark-danger elevation-4">

    <a href="<?php echo base_url(); ?>dashboard" class="brand-link">
      	<img src="<?php echo base_url();?>assets/img/sim.jpeg" alt="Admin System Logo" class="brand-image img-circle elevation-3"
        	style="opacity: .5">
      	<span class="brand-text font-weight-light">SIM</span>
    </a>

    <div class="sidebar">

      	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        	<div class="image">
          		<img src="<?php echo base_url(); ?>assets/alte_theme/dist/img/default.png" class="img-circle elevation-2" alt="User Image">
        	</div>
	        <div class="info">
	          	<a href="#" class="d-block"><?php echo ucfirst($this->session->userdata('username')); ?></a>
	        </div>
      	</div>

      	<nav class="mt-2">
        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          	<li class="nav-item has-treeview">
            	<a href="<?php echo base_url(); ?>dashboard" class="nav-link <?php echo $sidebarDashboard; ?>">
              		<i class="nav-icon fa fa-dashboard"></i>
	              	<p>
	                	Dashboard
	              	</p>
            	</a>
          	</li>
			<?php $sqlCekTask=$this->db->from('map_user_menu')
					->join('ref_menu','map_umenu_ref_id=rmenu_id')
					->where('map_umenu_login_id',$this->session->userdata('userId'))
					->where('rmenu_title','Menu Admin')
					->get();
          // die(print_r($this->session->userdata('userId')));
				if($sqlCekTask->num_rows()>0){

					
			?>	
          	<li class="nav-item has-treeview <?php echo $openMenuTask; ?>">
            	<a href="#" class="nav-link <?php echo $sidebarTask; ?>">
              		<i class="fa fa-align-justify text-red"></i>
              		<p>
                		Menu Admin
                		<i class="right fa fa-angle-left"></i>
              		</p>
            	</a>
            	<ul class="nav nav-treeview">
              		<li class="nav-item">
                		<a href="<?php echo base_url(); ?>Admin/form_view" class="nav-link <?php echo $sidebarMenuAdminFuse; ?>">
	                  		<i class="fa fa-user nav-icon"></i>
	                  		<p>Admin Fuse</p>
                		</a>
              		</li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Admin/view" class="nav-link <?php echo $sidebarMenuAdminFuse; ?>">
                        <i class="fa fa-cubes nav-icon"></i>
                        <p>Data Admin Fuse</p>
                    </a>
                  </li>
              		<li class="nav-item">
                		<a href="<?php echo base_url(); ?>Admin/form_view_cekpremi" class="nav-link <?php echo $sidebarMenuAdminCekpremi; ?>">
		                  	<i class="fa fa-user nav-icon"></i>
		                  	<p>Admin Cekpremi</p>
                		</a>
              		</li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Admin/view_cekpremi" class="nav-link <?php echo $sidebarMenuAdminFuse; ?>">
                        <i class="fa fa-cubes nav-icon"></i>
                        <p>Data Admin Cekpremi</p>
                    </a>
                  </li>
				
            	</ul>
          	</li>
			<?php }else{}
			$sqlCekData=$this->db->from('map_user_menu')
						->join('ref_menu','map_umenu_ref_id=rmenu_id')
						->where('map_umenu_login_id',$this->session->userdata('userId'))
						->where('rmenu_title','Reference')
						->get();
				if($sqlCekData->num_rows()>0){
			
			
			?>
			<!-- // -->
            <li class="nav-item has-treeview <?php echo $openMenuTask; ?>">
              <a href="#" class="nav-link <?php echo $sidebarTask; ?>">
                  <i class="nav-icon fa fa-cog"></i>
                  <p>
                    Reference
                    <i class="right fa fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/branch" class="nav-link ">
                        <i class="fa fa-files-o nav-icon"></i>
                        <p>Branch</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/coverage" class="nav-link ">
                        <i class="fa fa-building nav-icon"></i>
                        <p>Coverage</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/insurance" class="nav-link ">
                        <i class="fa fa-handshake-o nav-icon"></i>
                        <p>Insurace</p>
                    </a>
                  </li>
          		  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/menu" class="nav-link">
                        <i class="fa fa-align-justify nav-icon"></i>
                        <p>Menu</p>
                    </a>
                  </li>
                <!--  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference" class="nav-link">
                        <i class="fa  nav-icon"></i>
                        <p>Payment Status</p>
                    </a>
                  </li> -->
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/pay_method" class="nav-link">
                        <i class="fa fa-credit-card nav-icon"></i>
                        <p>Pay Method</p>
                    </a>
                  </li>
                 <!--  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference" class="nav-link">
                        <i class="fa  nav-icon"></i>
                        <p>Policy Status</p>
                    </a>
                  </li>  -->
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/rm" class="nav-link">
                        <i class="fa fa-registered nav-icon"></i>
                        <p>RM</p>
                    </a>
                  </li> 
                  <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/sales" class="nav-link">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Sales</p>
                    </a>
                  </li>
                  <!-- <li class="nav-item">
                    <a href="<?php echo base_url(); ?>Reference/send_via" class="nav-link">
                        <i class="fa fa-send nav-icon"></i>
                        <p>Send VIA</p>
                    </a>
                  </li>  --> 
          		 <li class="nav-item">
                    <a href="<?php echo base_url(); ?>user" class="nav-link">
                        <i class="fa fa-user-circle-o nav-icon"></i>
                        <p>User</p>
                    </a>
                  </li>
              </ul>
            </li>
			
			<?php }else{}?>
          	<li class="nav-item">
            	<a href="<?php echo base_url(); ?>auth/logout" class="nav-link">
              		<i class="nav-icon fa fa-arrow-circle-left"></i>
              		<p>
                		Logout
              		</p>
            	</a>
          	</li>
        </ul>
    </div>
</aside>