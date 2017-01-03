<?php

    $CI = & get_instance();

    $CI->load->model(ADMIN_VIEWS . '/model_clubs', 'modelClubAlias');
    $CI->load->model(ADMIN_VIEWS . '/model_members', 'modelMembersAlias');
?>

<div class=" sidebar" role="navigation">
<div class="navbar-collapse">
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
<ul class="nav" id="side-menu">
<li>
  <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Dashboard'?>"><i class="fa fa-home nav_icon"></i>Home</a>
</li>
            <li>
  <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Clubs'?>">
    <i class="fa fa-book nav_icon"></i>Clubs

    <?php $clubCount = $CI->modelClubAlias->countAllRecords();?>

    <?php if($clubCount > 0):?>
      <span class="nav-badge"><?php echo $clubCount;?></span>
    <?php endif;?>

    <span class="fa arrow"></span>
  </a>
</li>
<li>
  <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Clubs/add'?>"><i class="fa fa-plus nav_icon"></i>Add Club</a>
</li>

            <li>
  <a href="create_id.html"><i class="fa fa-certificate nav_icon"></i>Create ID</a>
</li>

            <li>
  <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Members'?>">
    <i class="fa fa-check nav_icon"></i>Approval Requests
    <?php $requestCount = $CI->modelMembersAlias->countAllRecordsByCond(array('is_active' => 'N'));?>

    <?php if($requestCount > 0):?>
      <span class="nav-badge"><?php echo $requestCount;?></span>
    <?php endif;?>
  </a>
</li>

<li>
  <a href="#"><i class="fa fa-envelope nav_icon"></i>Messages<span class="fa arrow"></span></a>
  <ul class="nav nav-second-level collapse">
    <li>
      <a href="inbox.html">Inbox <span class="nav-badge-btm">05</span></a>
    </li>
    <li>
      <a href="compose.html">Compose Message</a>
    </li>
                    <li>
      <a href="send.html">Send Messages</a>
    </li>
                    <li>
      <a href="trash.html">Trashed Messages</a>
    </li>
  </ul>
  <!-- //nav-second-level -->
</li>

</ul>
<div class="clearfix"> </div>
<!-- //sidebar-collapse -->
</nav>
</div>
</div>