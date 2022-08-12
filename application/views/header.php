<div class="header">
	<div class="header-left">
		<img width="45" src="<?php echo base_url();?>/vendors/images/apple-touch-icon.png" alt="" class="ml-5 mr-3">
		<h5 class="">SIKABUNGAH</h5>
	</div>
	<div class="header-right">
		<div class="user-info-dropdown">
			<div class="dropdown">
				<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<span class="user-icon">
						<img src="<?php echo base_url();?>/vendors/images/photo1.jpg" alt="">
					</span>
					<span class="user-name text-capitalize"><?php echo $login_name;?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
					<a class="dropdown-item" href="<?php echo base_url('logout');?>"><i class="dw dw-logout"></i> Log Out</a>
				</div>
			</div>
		</div>
		<div class="github-link">
			<a href="javascript:void(0)"><img src="<?php echo base_url();?>/vendors/images/github.svg" alt=""></a>
		</div>
	</div>
</div>