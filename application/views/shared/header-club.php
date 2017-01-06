<!-- header-starts -->
<div class="sticky-header header-section ">
  <div class="header-left">
    <!--toggle button start-->
    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
    <!--toggle button end-->
    <!--logo -->
    <div class="logo">
      <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Dashboard'?>">
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

            $fields = array(
                TBL_MESSAGES . '.*'
            );

            $messages = $CI->modelMessagesAlias->fetchFields($fields, array( TBL_MESSAGES . '.label' => 'Inbox', TBL_MESSAGES . '.to_fk' => $CI->mencrypt->decode($user['user_id']), TBL_MESSAGES.'.is_read' => 'N'), array( TBL_MESSAGES.'.created_on' => 'DESC'));
 
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
            <li><a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Inbox'?>">
               <div class="user_img"><img src="<?php echo ADMIN_IMG_PATH?>/avatar.png" alt=""></div>
               <div class="notification_desc">
              <p><?php echo character_limiter(stripcslashes(strip_tags($value->message)), 20, '...');?></p>
              <p><span><?php echo date('d.M', strtotime($value->created_on));?></span></p>
              </div>
               <div class="clearfix"></div>
            </a></li>
            <?php endforeach;?>

            <li>
              <div class="notification_bottom">
                <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Inbox'?>">See all messages</a>
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


              <span class="prfil-img">
                <?php if($userProfileInfo->image1 != NULL):?>
                      <img src="<?php echo $clubProfileImagePath?>/<?php echo $userProfileInfo->image1?>" alt="" width="50">
                <?php else:?>
                      <img src="<?php echo ADMIN_IMG_PATH?>/a.png" alt="">
                <?php endif;?>

              </span>

              <div class="user-name">
                <p><?php echo $user['full_name']?></p>
                <span>Administrator</span>
              </div>
              <i class="fa fa-angle-down lnr"></i>
              <i class="fa fa-angle-up lnr"></i>
              <div class="clearfix"></div>
            </div>
          </a>
          <ul class="dropdown-menu drp-mnu">
            <li> <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Dashboard'?>"><i class="fa fa-user"></i> Profile</a> </li>
            <li> <a href="<?php echo HOST_URL .'/'. CLUB_URL . '/' . 'Logout'?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
  <div class="clearfix"> </div>
</div>
<!-- //header-ends -->
