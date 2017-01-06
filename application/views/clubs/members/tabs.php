<ul id="myTabs" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="<?php echo ($activeTab == 'player') ? 'active' : ''?>">
      <a href="<?php echo $ctrlUrl?>/add/player" id="home-tab" role="tab">
        PLAYER
      </a>
    </li>
    <li role="presentation" class="<?php echo ($activeTab == 'technical') ? 'active' : ''?>">
      <a href="<?php echo $ctrlUrl?>/add/technical" role="tab" id="profile-tab">
        TECHNICAL STAFF
      </a>
    </li>
    <li role="presentation" class="<?php echo ($activeTab == 'administrative') ? 'active' : ''?>">
      <a href="<?php echo $ctrlUrl?>/add/administrative" role="tab" id="dropdown1-tab">
        ADMINISTRATIVE STAFF
      </a>
    </li>
</ul>
