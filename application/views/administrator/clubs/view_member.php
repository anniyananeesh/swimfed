<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
            <form class="com-mail">
                                    <input type="text" class="form-control1 control3" placeholder="Subject :">
                                    <textarea rows="6" class="form-control1 control2" placeholder="Message :" ></textarea>
                                    <div class="form-group">
                                        <div class="btn green_button2 btn-file">
                                            <i class="fa fa-paperclip"></i> Attachment

                                        </div>
                                        <p class="help-block">Max. 32MB</p>
                                    </div>

                                </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>

<!-- main content start-->
<div id="page-wrapper">
<div class="main-page">
<div class="forms">
  <div class="row">
    <h3 class="title1"> Member Info </h3>

    <?php $this->load->view('shared/flash-message');?>

    <div class="form-three widget-shadow">
      <form class="form-horizontal">

                        <div class="col-sm-6">
                        <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Member ID :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->code?>
          </div>
        </div>
                        <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">First Name :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->first_name?>
          </div>
        </div>

                        <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Last Name :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->last_name?>
          </div>
        </div>

                        <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Father Name :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->father_name?>
          </div>
        </div>

                        <div class="form-group">
          <label for="radio" class="col-sm-4 control-label">Gender :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->gender?>
          </div>
        </div>

                         <!--DATE PICKER-->
                         <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Date of Birth :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->dob?>
          </div>
        </div>


                         <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Passport Number :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->passport_no?>
          </div>
        </div>

                        <!--DATE PICKER-->
                        <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Passport Expiry Date :</label>
          <div class="col-sm-8 infotext">
            23 / 6 / 2024
          </div>
        </div>

                        <!--COUNTRY-->
                        <div class="form-group">
          <label for="selector1" class="col-sm-4 control-label">Nationality :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->country?>
          </div>
        </div>

                        <div class="form-group">
          <label for="selector1" class="col-sm-4 control-label">Current Emirate :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->emirate?>
          </div>
        </div>
         <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">City :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->city?>
          </div>
        </div>
                        <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Mobile Number :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->contact_no?>
          </div>
        </div>

        <div class="form-group">
          <label for="focusedinput" class="col-sm-4 control-label">Club :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->name?>
          </div>
        </div>

        <div class="form-group">
          <label for="smallinput" class="col-sm-4 control-label label-input-sm">Discipline :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->discipline?>
          </div>
        </div>

        <div class="form-group mb-n">
          <label for="largeinput" class="col-sm-4 control-label label-input-lg">Role :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->role?>
          </div>
        </div>
        <div class="form-group">
          <label for="txtarea1" class="col-sm-4 control-label">Note :</label>
          <div class="col-sm-8 infotext">
           <?php echo $record->note?>
          </div>
        </div>
                        <div class="form-group mb-n">
          <label for="largeinput" class="col-sm-4 control-label label-input-lg">Current Status :</label>
          <div class="col-sm-8 infotext">
            <?php echo $record->current_status?>
          </div>
        </div>

                      </div>

                      <div class="col-sm-6">


                        <div class="form-group mb-n">
                            <div class="member_img">
                              <?php if($record->image1 != NULL):?>
                                <img src="<?php echo $memberShowPath?>/<?php echo $record->image1?>" alt="">
                              <?php else:?>
                                <img src="<?php echo ADMIN_IMG_PATH?>/avatar.png" alt="">
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <div class="member_img">
                              <img src="images/passport.jpg" alt="">
                                <img src="images/visa.jpg" alt="">
                            </div>
        </div>

                        <div class="form-group mb-n">
                            <div class="member_img">
                              <?php if($record->id_card1 != NULL):?>
                                <img src="<?php echo $imageShowPath?>/<?php echo $record->id_card1?>" alt="">
                              <?php else:?>
                                <img src="<?php echo ADMIN_IMG_PATH?>/id_icon.jpg" alt="">
                              <?php endif;?>
                            </div>
                        </div>

                      </div>
                      <div class="clearfix"></div>

                      <div class="form-group mb-n">
          <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
          <div class="col-sm-6 ">

            <?php if($record->is_active == 'N'):?>
              <button onclick="window.location.href='<?php echo $ctrlUrl?>/member_status/<?php echo $this->mencrypt->encode($record->club_fk)?>/<?php echo $this->mencrypt->encode($record->id)?>/Y'" class="green_button" type="button" name="Sign In">Approve Request</button>
            <?php else:?>
              <button onclick="window.location.href='<?php echo $ctrlUrl?>/member_status/<?php echo $this->mencrypt->encode($record->club_fk)?>/<?php echo $this->mencrypt->encode($record->id)?>/N'" class="red_button" type="button" name="Sign In">Cancel Request</button>
            <?php endif;?>

            <button  type="button" class="blue_button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Send Report</button>

          </div>
        </div>
                      <div class="clearfix"></div>
      </form>
    </div>




  </div>



</div>
</div>
</div>
<!--footer-->
