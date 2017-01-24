<!-- main content start-->
<div id="page-wrapper">
  <div class="main-page login-page ">
    <h3 class="title12">AQUATICS GREENGATE</h3>
    <div class="text-center col-sm-12">

              <div class="col-sm-6 text-center">
                  <a href="<?php echo HOST_URL . '/' . ADMIN_URL?>/Clubs"><button class="green_button5">CLUBS</button></a>
                </div>
                <div class="col-sm-6 text-center">
                <a href="<?php echo HOST_URL . '/' . ADMIN_URL?>/Clubs/add"><button class="green_button5">ADD CLUB</button></a>
                </div>
                <div class="col-sm-6 text-center">
                <a href="<?php echo HOST_URL . '/' . ADMIN_URL?>/Card/autogenerate"><button class="green_button5">CREATE ID</button></a>
                </div>
                <div class="col-sm-6 text-center">
                <a href="<?php echo HOST_URL . '/' . ADMIN_URL?>/Inbox">
                  <button class="green_button5">MESSAGES

                    <?php if($unreadMessages > 0):?>
                      <span class="badge"><?php echo $unreadMessages;?></span>
                    <?php endif;?>

                  </button>
                </a>

                </div>

            </div>
  </div>
</div>
