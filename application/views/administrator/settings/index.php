<div id="page-wrapper">
<div class="main-page">
<div class="forms">
<div class="row">
<h3 class="title1"> Settings</h3>
<div class="form-three widget-shadow">
<form class="form-horizontal" action="" method="post" enctype="application/x-www-form-urlencoded" name="settings-frm">
<?php $this->load->view('shared/alerts');?>
<?php $this->load->view('shared/flash-message');?>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Current Password</label>
<div class="col-sm-5">
<input type="password" class="form-control1" name="current_password" id="current_password" required/>
</div>
<?php if(form_error('current_password')):?>
<div class="error"><?php echo form_error('current_password');?></div>
<?php endif;?>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">New Password</label>
<div class="col-sm-5">
<input type="password" class="form-control1" name="password" id="password" required/>
</div>
<?php if(form_error('password')):?>
<div class="error"><?php echo form_error('password');?></div>
<?php endif;?>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Confirm Password</label>
<div class="col-sm-5">
<input type="password" class="form-control1" value="" name="confirm_password" id="confirm_password" required/>
</div>
<?php if(form_error('confirm_password')):?>
<div class="error"><?php echo form_error('confirm_password');?></div>
<?php endif;?>
</div>
<div class="form-group mb-n">
<label for="largeinput" class="col-sm-4 control-label label-input-lg">&nbsp;</label>
<div class="col-sm-8">
<button type="submit" class="blue_button2">Change Password</button>
</div>
<?php if(form_error('email')):?>
<div class="error"><?php echo form_error('email');?></div>
<?php endif;?>
</div>
<div class="clearfix"></div>
</form>
</div>
</div>
</div>
</div>
</div>
