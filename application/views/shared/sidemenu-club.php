
<?php
    $CI = & get_instance();

    $CI->load->model(ADMIN_VIEWS . '/model_members', 'modelMembersAlias');
    $CI->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessagesAlias');
?>

<div class=" sidebar" role="navigation">
    <div class="navbar-collapse">
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
  <ul class="nav" id="side-menu">
    <li>
      <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Dashboard'?>"><i class="fa fa-home nav_icon"></i>Home</a>
    </li>
                <li>
      <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Info'?>"><i class="fa fa-book nav_icon"></i>Club info</a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-list nav_icon"></i>Registerd Club Members

        <?php $memberCount = $CI->modelMembersAlias->countAllRecordsByCond(array('club_fk' => $CI->mencrypt->decode($user['user_id'])));?>

        <?php if($memberCount > 0):?>
          <span class="nav-badge"><?php echo $memberCount;?></span>
        <?php endif;?>

        <span class="fa arrow"></span>
      </a>

      <ul class="nav nav-second-level collapse">
        <li>
          <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Members'?>">Members List</a>
        </li>
        <li>
          <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Members/add'?>">Add New Member</a>
        </li>
      </ul>
      <!-- /nav-second-level -->
    </li>

    <li>
      <a href="#"><i class="fa fa-envelope nav_icon"></i>Messages<span class="fa arrow"></span></a>
      <ul class="nav nav-second-level collapse">
        <li>
          <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Inbox'?>">Inbox
            <?php $unreadMessages = $CI->modelMessagesAlias->countAllRecordsByCond(array('label' => 'Inbox', 'is_read' => 'N', 'to_fk' => $CI->mencrypt->decode($user['user_id'])));?>

            <?php if($unreadMessages > 0):?>
              <span class="nav-badge-btm" id="admin-mail-unread-count"><?php echo $unreadMessages;?></span>
            <?php endif;?>
          </a>
        </li>
        <li>
          <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Compose'?>">Compose Message</a>
        </li>
       <!-- <li>
          <a href="<?php //echo HOST_URL .'/'. CLUB_URL . '/' . 'Send'?>">Send Messages</a>
        </li>-->
                        <li>
          <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Trash'?>">Trashed Messages</a>
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
