<div id="page-wrapper">
<div class="main-page">
<div class="forms">
<div class="row">
<h3 class="title1"> Aquatics Greengate <span>Create ID Card</span></h3>
<div class="form-three widget-shadow">
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="create-id-frm">
<?php $this->load->view('shared/alerts');?>
<?php $this->load->view('shared/flash-message');?>
<div class="col-sm-6">
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">First Name</label>
<div class="col-sm-8">
<input type="text" class="form-control1" value="<?php echo (isset($post) && $post['first_name'] != "") ? $post['first_name'] : '';?>" name="first_name" id="first_name">
<?php if(form_error('first_name')):?>
<div class="error"><?php echo form_error('first_name');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Last Name</label>
<div class="col-sm-8">
<input type="text" class="form-control1" name="last_name" id="last_name" value="<?php echo (isset($post) && $post['last_name'] != "") ? $post['last_name'] : '';?>">
<?php if(form_error('last_name')):?>
<div class="error"><?php echo form_error('last_name');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Father Name</label>
<div class="col-sm-8">
<input type="text" class="form-control1" name="father_name" id="father_name" value="<?php echo (isset($post) && $post['father_name'] != "") ? $post['father_name'] : '';?>">
<?php if(form_error('father_name')):?>
<div class="error"><?php echo form_error('father_name');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Email address</label>
<div class="col-sm-8">
<input type="email" class="form-control1" placeholder="Email to which card to be sent" name="email" id="email" value="<?php echo (isset($post) && $post['email'] != "") ? $post['email'] : '';?>">
<?php if(form_error('email')):?>
<div class="error"><?php echo form_error('email');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">ID Number</label>
<div class="col-sm-6">
<input type="text" class="form-control1" name="code" id="code" placeholder="" value="<?php echo (isset($post) && $post['code'] != "") ? $post['code'] : '';?>">
<?php if(form_error('code')):?>
<div class="error"><?php echo form_error('code');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Date of Birth</label>
<div class="col-sm-6">
<input type="text" class="form-control1" name="dob" id="dob" placeholder="DD/MM/YYYY" value="<?php echo (isset($post) && $post['dob'] != "") ? $post['dob'] : '';?>">
<?php if(form_error('dob')):?>
<div class="error"><?php echo form_error('dob');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Club</label>
<div class="col-sm-8">
<input type="text" class="form-control1" name="club_name" id="club_name" value="<?php echo (isset($post) && $post['club_name'] != "") ? $post['club_name'] : '';?>">
<?php if(form_error('club_name')):?>
<div class="error"><?php echo form_error('club_name');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Age</label>
<div class="col-sm-8">
<input type="text" class="form-control1" name="age" id="age" value="<?php echo (isset($post) && $post['age'] != "") ? $post['age'] : '';?>">
<?php if(form_error('age')):?>
<div class="error"><?php echo form_error('age');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Member Type</label>
<div class="col-sm-8">
<input type="text" class="form-control1" name="type" id="type" placeholder="Athlete" value="<?php echo (isset($post) && $post['type'] != "") ? $post['type'] : '';?>">
<?php if(form_error('type')):?>
<div class="error"><?php echo form_error('type');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Upload Image</label>
<div class="compose-right">
<div class="btn btn-default btn-file">
<i class="fa fa-paperclip"></i> Upload Photo
<input type="file" name="userfile" id="userfile">
</div>
<p class="help-block">Max. 800KB | png, jpg supported | Resolution 320px 320px square</p>
</div>
</div>
</div>
<div class="col-sm-6">
<p class="text-center">AFTER GENERATE PREVIEW ID CARD</p>
<div class="idcard">
<?php if($card_image==NULL):?>
<img src="<?php echo ADMIN_IMG_PATH?>/id.png" />
<?php else:?>
<img src="<?php echo $imageShowPath?>/<?php echo $card_image?>" />
<?php endif;?>
</div>
<?php if($card_image !=NULL):?>
<div class="col-sm-12" style="text-align:center">
<a download="IDCard.png" href="<?php echo $imageShowPath?>/<?php echo $card_image?>" class="red_button" type="button">Download</a>
<button class="red_button" type="button" id="send-async-email-attachment" data-card="<?php echo $card_image?>" data-email="<?php echo (isset($post) && $post['email'] != "") ? $post['email'] : '';?>">Mail</button>
</div>
<?php endif;?>
</div>
<div class="clearfix"></div>
<div class="form-group mb-n">
<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
<div class="col-sm-6">
<button class="green_button" type="submit">Generate ID Card</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">/*<![CDATA[*/$(function(){$(document).on("click","#send-async-email-attachment",function(){var a=$(this).attr("data-card"),b=$(this).attr("data-email");if(confirm("Do you want to send this id card to the email?")){$.post("<?php echo HOST_URL . "/Async/" . ADMIN_URL ?>/send_card_email/",{image:a,email:b},function(c){if(c.code==200){alert("Your email has been send as attachment.")}else{alert("Response error")}},"json")}return false})});/*]]>*/</script>
