<!-- header-starts -->
<div class="sticky-header header-section ">
  <div class="header-left">
    <!--toggle button start-->
    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
    <!--toggle button end-->
    <!--logo -->
    <div class="logo">
      <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Dashboard'?>">
        <h1>AQUATICS</h1>
        <span>GREEN GATE</span>
      </a>
    </div>
    <!--//logo-->
    <div class="clearfix"> </div>
  </div>
  <div class="header-right">
    <div class="profile_details_left"><!--notifications of menu start -->
      <ul class="nofitications-dropdown">

        <?php

          $CI = & get_instance();
          $CI->load->model(ADMIN_VIEWS . '/model_messages', 'modelMessagesAlias');
          $CI->load->model(ADMIN_VIEWS . '/model_members', 'modelMembersAlias');

          $join = array(
              array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MESSAGES . '.from_fk', 'join' => 'LEFT')
          );

          $join_request = array(
              array('table' => TBL_CLUBS, 'condition' => TBL_CLUBS . '.id = ' . TBL_MEMBERS . '.club_fk', 'join' => 'LEFT')
          );

          $fields = array(
              TBL_CLUBS . '.name as club_name',
              TBL_CLUBS . '.image1 as club_logo',
              TBL_MESSAGES . '.*'
          );

          $messages = $CI->modelMessagesAlias->fetchFields($fields, array( TBL_MESSAGES . '.label' => 'Inbox', TBL_MESSAGES . '.to_fk' => 0, TBL_MESSAGES.'.is_read' => 'N'), array( TBL_MESSAGES.'.created_on' => 'DESC'), null, null, $join);

          $fields_requests = array(
              TBL_MEMBERS . '.first_name',
              TBL_MEMBERS . '.last_name',
              TBL_MEMBERS . '.created_on',
              TBL_MEMBERS . '.image1',
              TBL_MEMBERS . '.club_fk',
              TBL_MEMBERS . '.id'
          );

          $requests = $CI->modelMembersAlias->fetchFields($fields_requests, array(TBL_MEMBERS . '.is_active' => 'N'), array( TBL_MEMBERS.'.created_on' => 'DESC'), null, null, $join_request);

        ?>

        <?php if($messages):?>
        <li class="dropdown head-dpdn">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge"><?php echo count($messages)?></span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="notification_header">
                <h3>You have <?php echo count($messages)?> new messages</h3>
              </div>
            </li>

            <?php foreach($messages as $key => $value):?>
            <li>
              <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Inbox'?>">
               <div class="user_img">

                 <?php if($value->club_logo != NULL):?>
                     <img src="<?php echo CLUBS_SHOW_PATH?>/<?php echo $value->club_logo?>" alt=""/>
                 <?php else:?>
                     <img src="<?php echo ADMIN_IMG_PATH?>/a.png" alt=""/>
                 <?php endif;?>
               </div>
               <div class="notification_desc">
              <p><?php echo character_limiter(stripcslashes(strip_tags($value->message)), 20, '...');?></p>
              <p><span><?php echo date('d.M', strtotime($value->created_on));?></span></p>
              </div>
               <div class="clearfix"></div>
            </a>
          </li>
            <?php endforeach;?>

            <li>
              <div class="notification_bottom">
                <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Inbox'?>">See all messages</a>
              </div>
            </li>
          </ul>
        </li>
        <?php endif;?>

        <?php if($requests):?>
       <li class="dropdown head-dpdn">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo count($requests);?></span></a>
          <ul class="dropdown-menu">
            <li>
              <div class="notification_header">
                <h3>You have <?php echo count($requests);?> new Requests</h3>
              </div>
            </li>

            <?php foreach ($requests as $key => $value):?>
            <li><a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Clubs/view_member/' . $CI->mencrypt->encode($value->club_fk) . '/' . $CI->mencrypt->encode($value->id)?>">
              <div class="user_img">
                  <?php if($value->image1 != NULL):?>
                      <img src="<?php echo MEMBER_SHOW_PATH?>/<?php echo $value->image1?>" alt="">
                  <?php else:?>
                      <img src="<?php echo ADMIN_IMG_PATH?>/avatar.png" alt="">
                  <?php endif;?>
              </div>
               <div class="notification_desc">
              <p><?php echo $value->first_name . ' ' . $value->last_name?></p>
              <p><span><?php echo date('d.M', strtotime($value->created_on));?></span></p>
              </div>
              <div class="clearfix"></div>
             </a></li>
            <?php endforeach;?>
             <li>
              <div class="notification_bottom">
                <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Members'?>">See all Requests</a>
              </div>
            </li>
          </ul>
        </li>
        <?php endif;?>

      </ul>
      <div class="clearfix"> </div>
    </div>
    <!--notification menu end -->
    <div class="profile_details">
      <ul>
        <li class="dropdown profile_details_drop">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <div class="profile_img">
              <span class="prfil-img"><img src="<?php echo ADMIN_IMG_PATH?>/a.png" alt=""> </span>
              <div class="user-name">
                <p>AQUATICS GREENGATE</p>
                <span>Administrator</span>
              </div>
              <i class="fa fa-angle-down lnr"></i>
              <i class="fa fa-angle-up lnr"></i>
              <div class="clearfix"></div>
            </div>
          </a>
          <ul class="dropdown-menu drp-mnu">
            <li> <a href="<?php echo HOST_URL . '/' . ADMIN_URL . '/'?>Dashboard"><i class="fa fa-home"></i> Dashboard</a> </li>
            <li> <a href="<?php echo HOST_URL . '/' . ADMIN_URL . '/'?>Settings"><i class="fa fa-gear"></i> Change Password</a> </li>
            <li> <a href="<?php echo HOST_URL . '/' . ADMIN_URL . '/'?>Logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="clearfix"> </div>
</div>
<!-- //header-ends -->
