<script type="text/javascript" src='<?php echo PLUGINS_PATH?>/chosen/chosen.jquery.min.js'></script>
<link rel='stylesheet' media="screen" href="<?php echo PLUGINS_PATH?>/chosen/chosen.css"/>
<div id="page-wrapper">
<div class="main-page compose">
<div class="col-md-8 compose-right widget-shadow">
<div class="panel-default">
<div class="panel-heading">
Compose New Message
</div>
<div class="panel-body">
<?php $this->load->view('shared/alerts');?>
<?php $this->load->view('shared/flash-message');?>
<form class="com-mail" action="" enctype="multipart/form-data" method="post" name="compose-email">
<label style="margin-bottom:10px">
<input type="checkbox" name="send_all" id="send_all" /> Send to all Clubs
</label>
<div id="show-to-address-selector">
<select data-placeholder="To: " multiple name="to_address[]" id="to_address" class="chosen-select form-control1 control3">
<<option value=""></option>
<?php if($records_clubs):?>
<?php foreach ($records_clubs as $key=> $value):?>
<option value="<?php echo $this->mencrypt->encode($value->id)?>" <?php echo (isset($post['to_address']) && in_array($this->mencrypt->encode($value->id),$post['to_address'])) ? 'selected' : '';?>><?php echo $value->name . ' - ' . $value->club_code?></option>
<?php endforeach;?>
<?php endif;?>
</select>
</div>
<div class="form-group">
<input type="text" value="<?php echo (isset($post) && $post['subject'] != "") ? $post['subject'] : '';?>" class="form-control1" placeholder="Subject :" name="subject" id="subject" style="margin-top: 10px;"/>
<?php if(form_error('subject')):?>
<div class="error"><?php echo form_error('subject');?></div>
<?php endif;?>
</div>
<div class="form-group">
<textarea rows="6" class="form-control1 control2" placeholder="Message :" name="message" id="message"><?php echo (isset($post) && $post['message'] != "") ? $post['message'] : '';?></textarea>
<?php if(form_error('message')):?>
<div class="error"><?php echo form_error('message');?></div>
<?php endif;?>
</div>
<div class="form-group">
<div class="btn btn-default btn-file">
<i class="fa fa-paperclip"></i> Attachment
<input type="file" name="userfile" id="userfile">
</div>
<p class="help-block">Max. 15MB . pdf, doc, docx, png, jpg supported</p>
</div>
<input type="submit" value="Send Message" name="send_email"/>
</form>
</div>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
<script type="text/javascript">$(function(){$('.chosen-select').chosen({'placeholder':'To: '});$(document).on('click','#send_all',function(){var toAddress=$("#show-to-address-selector");if($(this).prop('checked')){toAddress.hide();}else{toAddress.show();}});})</script>
