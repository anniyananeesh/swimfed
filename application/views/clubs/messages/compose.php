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
<div class="form-group">
<input type="text" class="form-control1" value="To : Swimming federation" disabled>
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
<input type="file" name="userfile[]" multiple>
</div>
<p class="help-block">Max. 15MB . pdf, doc, docx, png, jpg supported</p>
<?php if(isset($FileError) && $FileError=='Y'):?>
<div class="error"><?php echo $FileMSG;?></div>
<?php endif;?>
</div>
<input type="submit" value="Send Message" name="send_email"/>
</form>
</div>
</div>
</div>
<div class="clearfix"> </div>
</div>
</div>
