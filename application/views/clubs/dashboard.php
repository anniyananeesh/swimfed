<div id="page-wrapper">
<div class="main-page login-page">
<h3 class="title12"><?php echo $user['full_name'];?></h3>
<div class="text-center col-sm-12">
<?php $this->load->view('shared/alerts');?>
<?php $this->load->view('shared/flash-message');?>
<div class="col-sm-6 text-center">
<a href="<?php echo HOST_URL . '/' . CLUB_URL?>/Info"><button class="green_button5">CLUBS INFO</button></a>
</div>
<div class="col-sm-6 text-center">
<a href="<?php echo HOST_URL . '/' . CLUB_URL?>/Members"><button class="green_button5">CLUB MEMBERS</button></a>
</div>
<div class="col-sm-6 text-center">
<a href="<?php echo HOST_URL . '/' . CLUB_URL?>/Members/add"><button class="green_button5">ADD NEW MEMBER</button></a>
</div>
<div class="col-sm-6 text-center">
<a href="<?php echo HOST_URL . '/' . CLUB_URL?>/Inbox">
<button class="green_button5">MESSAGES
<?php if($unreadMessages> 0):?>
<span class="badge"><?php echo $unreadMessages;?></span>
<?php endif;?>
</button>
</a>
</div>
</div>
</div>
</div>
