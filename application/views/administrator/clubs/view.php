<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">New message</h4>
</div>
<form class="com-mail" action="<?php echo HOST_URL . '/' . ADMIN_URL?>/Message" method="post" enctype="application/x-www-form-urlencoded">
<div class="modal-body">
<input type="hidden" name="emailID" id="emailID" value="<?php echo $this->mencrypt->encode($record->id)?>"/>
<input type="hidden" name="redirect_uri" id="redirect_uri" value="<?php echo $ctrlUrl?>/view/<?php echo $menuID?>"/>
<input type="text" class="form-control1 control3" placeholder="Subject :" name="subject" id="subject" />
<textarea rows="6" class="form-control1 control2" placeholder="Message :" name="message" id="message"></textarea>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Send message</button>
</div>
</form>
</div>
</div>
</div>
<div id="page-wrapper">
<div class="main-page">
<div class="forms">
<div class="row">
<h3 class="title1"><?php echo $record->name?></h3>
<div class="form-three widget-shadow">
<form class="form-horizontal">
<?php $this->load->view('shared/flash-message');?>
<div class="col-sm-6">
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Club Name :</label>
<div class="col-sm-8 infotext">
<?php echo $record->name?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Club ID :</label>
<div class="col-sm-8 infotext">
<?php echo $record->club_code?>
</div>
</div>
<?php if($record->address != NULL):?>
<div class="form-group">
<label for="txtarea1" class="col-sm-4 control-label">Adress :</label>
<div class="col-sm-8 infotext">
<?php echo nl2br($record->address)?>
</div>
</div>
<?php endif;?>
<?php if($record->address != NULL):?>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Post Code :</label>
<div class="col-sm-8 infotext">
<?php echo $record->pincode?>
</div>
</div>
<?php endif;?>
<div class="form-group">
<label for="selector1" class="col-sm-4 control-label">Emirate :</label>
<div class="col-sm-8 infotext">
<?php echo $record->emirate?>
</div>
</div>
<?php if($record->url != NULL):?>
<div class="form-group">
<label for="smallinput" class="col-sm-4 control-label label-input-sm">Web Url :</label>
<div class="col-sm-8 infotext">
<a href="<?php echo prep_url($record->url)?>" target="_blank"><?php echo $record->url?></a>
</div>
</div>
<?php endif;?>
<div class="form-group">
<label for="mediuminput" class="col-sm-4 control-label">Email Id :</label>
<div class="col-sm-8 infotext">
<a class="cursor" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><?php echo $record->email?></a>
</div>
</div>
<?php if($record->contact_person != NULL):?>
<div class="form-group mb-n">
<label for="largeinput" class="col-sm-4 control-label label-input-lg">Contact Person :</label>
<div class="col-sm-8 infotext">
<?php echo $record->contact_person?>
</div>
</div>
<?php endif;?>
<?php if($record->contact_no != NULL):?>
<div class="form-group mb-n">
<label for="largeinput" class="col-sm-4 control-label label-input-lg">Telephone nUmber :</label>
<div class="col-sm-8 infotext">
<?php echo $record->contact_no?>
</div>
</div>
<?php endif;?>
<?php if($record->fax_no != NULL):?>
<div class="form-group mb-n">
<label for="largeinput" class="col-sm-4 control-label label-input-lg">Fax :</label>
<div class="col-sm-8 infotext">
<?php echo $record->fax_no?>
</div>
</div>
<?php endif;?>
</div>
<div class="col-sm-6">
<div class="form-group mb-n">
<?php if($record->image1 != NULL):?>
<div class="member_img">
<img src="<?php echo $imageShowPath?>/<?php echo $record->image1;?>" alt="">
</div>
<?php endif;?>
</div>
</div>
<div class="clearfix"></div>
<div class="form-group mb-n">
<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
<div class="col-sm-6">
<button type="button" class="green_button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Send Message</button>
<button type="button" class="red_button3" data-toggle="modal" data-target=".bs-example-modal-sm">Remove Club</button>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title" id="mySmallModalLabel">Remove Club</h4>
</div>
<div class="modal-body">
<p>Once you Click on confirm button, will remove all the informations about this club from the database</p>
<button type="button" class="red_button3" data-toggle="modal" data-target=".bs-example-modal-sm" onclick="window.location.href='<?php echo $ctrlUrl ?>/delete/<?php echo $club_id?>'">Confirm</button>
<button type="button" class="blue_button2" data-toggle="modal" data-target=".bs-example-modal-sm">Cancel</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="clearfix"></div>
</form>
</div>
</div>
</div>
</div>
</div>
