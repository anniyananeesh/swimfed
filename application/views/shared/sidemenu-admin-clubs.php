<div class=" sidebar" role="navigation">
    <div class="navbar-collapse">
<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
  <ul class="nav" id="side-menu">
    <li>
      <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Dashboard'?>"><i class="fa fa-home nav_icon"></i>Home</a>
    </li>
                <li>
      <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Clubs/view/' . $menuID ?>"><i class="fa fa-book nav_icon"></i>Club info</a>
    </li>
    <li>
      <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Clubs/members/' . $menuID ?>"><i class="fa fa-list nav_icon"></i>Registerd Club Members
        <?php $membersCount = $this->modelMembersAlias->countAllRecordsByCond(array('club_fk' => $this->mencrypt->decode($menuID)));?>

        <?php if($membersCount > 0):?>
          <span class="nav-badge"><?php echo $membersCount;?></span> <span class="fa arrow"></span>
        <?php endif;?>
      </a>
    </li>
    <li>
      <a href="<?php echo HOST_URL .'/'. ADMIN_URL . '/' . 'Clubs/settings/' . $menuID ?>"><i class="fa fa-gear nav_icon"></i>Settings</a>
    </li>
  </ul>
  <div class="clearfix"> </div>
  <!-- //sidebar-collapse -->
</nav>
</div>
</div>
