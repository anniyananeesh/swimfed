
   <?php if($records):?>

   <?php $alreadyShown = false;?>
   <?php foreach ($records as $key => $v):?>
   <div class="inbox-page <?php echo (!$alreadyShown) ? 'row' : ''?>">
    <h4>
    <?php

        switch ($key) {

          case $dateToday:
              echo 'Today';
            break;

          case $dateYesterday:
              echo 'Yesterday Messages';
            break;

          default:
              echo (!$alreadyShown) ? 'Old Messages' : '';
              $alreadyShown = true;
            break;
        }

    ?>
    </h4>

    <?php foreach ($v as $key => $value):?>
    <div class="inbox-row widget-shadow">

      <div class="mail ">
          <input type="checkbox" class="checkbox item-checkbox <?php echo ($value->is_read == 'Y') ? 'read' : 'unread';?>" name="array_id[]" value="<?php echo $this->mencrypt->encode($value->id);?>">
      </div>

      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $this->mencrypt->encode($value->id);?>" aria-expanded="true" aria-controls="collapseFour">
          <div class="mail">
              <img src="<?php echo ADMIN_IMG_PATH?>/a.png" alt=""/>
          </div>
          <div class="mail mail-name"><h6><?php echo $value->club_name?></h6></div>
          <div class="mail"><p><?php echo character_limiter(stripslashes(strip_tags($value->message)), 30, '...')?></p></div>
      </a>

      <div class="mail-right">
        <div class="dropdown">
          <a href="#"  data-toggle="dropdown" aria-expanded="false">
            <p><i class="fa fa-ellipsis-v mail-icon"></i></p>
          </a>
          <ul class="dropdown-menu float-right">
            <li>
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $this->mencrypt->encode($value->id);?>" aria-expanded="true" aria-controls="collapsefour">
                <i class="fa fa-reply mail-icon"></i>
                Reply
              </a>
            </li>

            <?php if($value->attachment_url != NULL):?>
            <li>
              <a class="action-download-attachment" target="_blank" href="<?php echo $fileShowPath?>/<?php echo $value->attachment_url?>" title="Download Attachment" data-id="<?php echo $this->mencrypt->encode($value->id);?>">
                <i class="fa fa-download mail-icon"></i>
                Download Attachment
              </a>
            </li>
            <?php endif;?>

            <li>
              <a href="#" class="font-red action-delete-single-email-trash" title="" data-id="<?php echo $this->mencrypt->encode($value->id);?>">
                <i class="fa fa-trash-o mail-icon"></i>
                Delete
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="mail-right"><p><?php echo date("d M", strtotime($value->created_on))?></p></div>

      <?php if($value->attachment_url != NULL):?>
      <div class="mail-right" style="padding-top:5px;">
          <a class="action-download-attachment" href="<?php echo $fileShowPath?>/<?php echo $value->attachment_url?>" target="_blank"><i class="fa fa-download mail-icon"></i></a>
      </div>
      <?php endif;?>

      <div class="clearfix"> </div>
      <div id="<?php echo $this->mencrypt->encode($value->id);?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="mail-body">
          <?php echo $value->message?>
          <form role="form" action="" method="get">
            <input type="hidden" value="<?php echo $this->mencrypt->encode($value->from_fk);?>" name="emailID" class="emailID"/>
            <input type="hidden" value="0" name="fromID" class="fromID"/>
            <input type="text" placeholder="Reply to sender" required name="reply-message" class="reply-message">
            <input type="submit" value="Send" class="reply-btn">
          </form>
        </div>
      </div>
    </div>
    <?php endforeach;?>

    </div>

    <?php endforeach;?>

<?php else:?>

    <div class="no-emails">No messages in Trash</div>

<?php endif;?>
