
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
          <label for="focusedinput" class="col-sm-4 control-label">Father's Name :</label>
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
            <?php echo ucfirst($record->type)?>
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
            <?php echo ($value->is_active == 'Y') ? 'Active' : 'Pending'?>
          </div>
        </div>

                      </div>

                      <div class="col-sm-6">

                        <div class="form-group mb-n">
                            <div class="member_img">
                              <h3 style="margin-bottom: 10px;">Profile image</h3>
                              <?php if($record->image1 != NULL):?>
                                <img src="<?php echo $memberShowPath?>/<?php echo $record->image1?>" alt="">
                              <?php else:?>
                                <img src="<?php echo ADMIN_IMG_PATH?>/avatar.png" alt="">
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <div class="member_img">
                              <h3 style="margin-bottom: 10px;">Passport and visa images</h3>
                              <?php if($passport_visa_images):?>
                                    <div class="image_preview">
                                    <?php foreach ($passport_visa_images as $key => $value):?>
                                        <div class="image-holder">
                                          <a target="_blank" class="preview-image-holder" href="<?php echo $passportShowPath?>/<?php echo $value->image_url?>">
                                               View PDF
                                          </a>
                                          <i class="fa fa-times-circle" aria-hidden="true" onclick="javascript:if(delConfirmation()==true){DeleteVisaFile('<?php echo $value->image_url?>', 'image_url', <?php echo $record->id?>)}"></i>
                                        </div>
                                    <?php endforeach;?>
                                    </div>
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <div class="member_img">
                              <h3 style="margin-bottom: 10px;">Sponsor details</h3>
                              <?php if($sponsor_images):?>
                                <div class="image_preview">
                                <?php foreach ($sponsor_images as $key => $value):?>
                                    <div class="image-holder">
                                      <a target="_blank" class="preview-image-holder" href="<?php echo $sponsorShowPath?>/<?php echo $value->image_url?>">
                                        View PDF
                                      </a>
                                      <i class="fa fa-times-circle" aria-hidden="true" onclick="javascript:if(delConfirmation()==true){DeleteSponsorFile('<?php echo $value->image_url?>', 'image_url', <?php echo $record->id?>)}"></i>
                                    </div>
                                <?php endforeach;?>
                                </div>
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <div class="member_img">
                              <h3 style="margin-bottom: 10px;">Club Certificate</h3>
                              <?php if($record->image_club_certificate != NULL):?>
                                <div class="image_preview">
                                    <div class="image-holder">
                                      <a target="_blank" class="preview-image-holder" href="<?php echo $clubCertiShowPath?>/<?php echo $record->image_club_certificate?>">
                                         View PDF
                                      </a>
                                      <i class="fa fa-times-circle" aria-hidden="true" onclick="javascript:if(delConfirmation()==true){DeleteUserFile('<?php echo $record->image_club_certificate?>', 'image_club_certificate', <?php echo $record->id?>)}"></i>
                                    </div>
                                </div>
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <div class="member_img">
                              <h3 style="margin-bottom: 10px;">Club ID Card</h3>
                              <?php if($record->id_card1 != NULL):?>
                                <img src="<?php echo $cardShowPath?>/<?php echo $record->id_card1?>" alt="">
                              <?php else:?>
                                <img src="<?php echo ADMIN_IMG_PATH?>/id_icon.jpg" alt="">
                              <?php endif;?>
                            </div>
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
