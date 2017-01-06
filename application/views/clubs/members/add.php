<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="forms">
            <div class="row">
                <h3 class="title1"> Add Member  <span>Please add all the mentatory informations</span></h3>
                <div class="form-three widget-shadow">

                    <?php $this->load->view(CLUB_VIEWS . '/members/tabs.php', array('activeTab' => $activeTab))?>

                    <!--******TAB CONTEND************-->
                    <div class="tabcontent">

                        <!--******FORM PLAYER START************-->
                        <div class="tab-pane" id="home">

                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                <?php $this->load->view('shared/alerts');?>
                                <?php $this->load->view('shared/flash-message');?>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">First Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="first_name" name="first_name" placeholder="***** Athletic Club" value="<?php echo ($post['first_name'] != NULL && $post['first_name'] != '') ? $post['first_name'] : '';?>">
                                            <?php if(form_error('first_name')):?>
                                                <div class="error" ><?php echo form_error('first_name');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Last Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="last_name" name="last_name" placeholder="***** Athletic Club" value="<?php echo ($post['last_name'] != NULL && $post['last_name'] != '') ? $post['last_name'] : '';?>">
                                            <?php if(form_error('last_name')):?>
                                                <div class="error" ><?php echo form_error('last_name');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Father Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="father_name" name="father_name" placeholder="***** Athletic Club" value="<?php echo ($post['father_name'] != NULL && $post['father_name'] != '') ? $post['father_name'] : '';?>">
                                            <?php if(form_error('father_name')):?>
                                                <div class="error" ><?php echo form_error('father_name');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="radio" class="col-sm-4 control-label">Gender</label>
                                        <div class="col-sm-8">
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="male" checked> Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="female"> Female
                                            </label>

                                            <?php if(form_error('gender')):?>
                                                <div class="error" ><?php echo form_error('gender');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <!--DATE PICKER-->
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Date of Birth</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control1" id="dob" name="dob" placeholder="DD/MM/YY" value="<?php echo ($post['dob'] != NULL && $post['dob'] != '') ? $post['dob'] : '';?>">
                                            <?php if(form_error('dob')):?>
                                                <div class="error" ><?php echo form_error('dob');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Passport Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="passport_no" name="passport_no" placeholder="" value="<?php echo ($post['passport_no'] != NULL && $post['passport_no'] != '') ? $post['passport_no'] : '';?>">
                                            <?php if(form_error('passport_no')):?>
                                                <div class="error" ><?php echo form_error('passport_no');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <!--DATE PICKER-->
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Passport Expiry Date</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control1" name="passport_expiry" id="passport_expiry" placeholder="DD/MM/YY" value="<?php echo ($post['passport_expiry'] != NULL && $post['passport_expiry'] != '') ? $post['passport_expiry'] : '';?>">
                                            <?php if(form_error('passport_expiry')):?>
                                                <div class="error" ><?php echo form_error('passport_expiry');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <!--COUNTRY-->
                                    <div class="form-group">
                                        <label for="selector1" class="col-sm-4 control-label">Nationality</label>
                                        <div class="col-sm-8">
                                            <select name="country" id="country" class="form-control1">
                                                <option value="United Arab Emirates" <?php echo (isset($post['country']) && $post['country'] == 'United Arab Emirates') ? 'selected' : '';?>>United Arab Emirates</option>
                                                <option value="Saudi Arabia" <?php echo (isset($post['country']) && $post['country'] == 'Saudi Arabia') ? 'selected' : '';?>>Saudi Arabia</option>
                                                <option value="India" <?php echo (isset($post['country']) && $post['country'] == 'India') ? 'selected' : '';?>>India</option>
                                                <option value="United Kingdom" <?php echo (isset($post['country']) && $post['country'] == 'United Kingdom') ? 'selected' : '';?>>United Kingdom</option>
                                                <option value="Pakistan" <?php echo (isset($post['country']) && $post['country'] == 'Pakistan') ? 'selected' : '';?>>Pakistan</option>
                                                <option value="Qatar" <?php echo (isset($post['country']) && $post['country'] == 'Qatar') ? 'selected' : '';?>>Qatar</option>
                                            </select>

                                            <?php if(form_error('country')):?>
                                                <div class="error" ><?php echo form_error('country');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selector1" class="col-sm-4 control-label">Current Emirate</label>
                                        <div class="col-sm-8">
                                            <select name="emirate" id="emirate" class="form-control1">
                                                <option value="Abu Dhabi" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Abu Dhabi') ? 'selected' : '';?>>Abu Dhabi</option>
                                                <option value="Dubai" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Dubai') ? 'selected' : '';?>>Dubai</option>
                                                <option value="Sharjah" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Sharjah') ? 'selected' : '';?>>Sharjah</option>
                                                <option value="Ajman" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Ajman') ? 'selected' : '';?>>Ajman</option>
                                                <option value="Ras Al Khaima" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Ras Al Khaima') ? 'selected' : '';?>>Ras Al Khaima</option>
                                                <option value="Fujairah" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Fujairah') ? 'selected' : '';?>>Fujairah</option>
                                            </select>

                                            <?php if(form_error('emirate')):?>
                                                <div class="error" ><?php echo form_error('emirate');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="city" name="city" placeholder="" value="<?php echo ($post['city'] != NULL && $post['city'] != '') ? $post['city'] : '';?>">
                                            <?php if(form_error('city')):?>
                                                <div class="error" ><?php echo form_error('city');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Mobile Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="contact_no" name="contact_no" placeholder="05" value="<?php echo ($post['contact_no'] != NULL && $post['contact_no'] != '') ? $post['contact_no'] : '';?>">
                                            <?php if(form_error('contact_no')):?>
                                                <div class="error" ><?php echo form_error('contact_no');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="smallinput" class="col-sm-4 control-label label-input-sm">Descipline</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1 input-sm" id="discipline" name="discipline" placeholder="" value="<?php echo ($post['discipline'] != NULL && $post['discipline'] != '') ? $post['discipline'] : '';?>">
                                            <?php if(form_error('discipline')):?>
                                                <div class="error" ><?php echo form_error('discipline');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-n">
                                        <label for="largeinput" class="col-sm-4 control-label label-input-lg">Role</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1 input-lg" id="role" name="role" placeholder="" value="<?php echo ($post['role'] != NULL && $post['role'] != '') ? $post['role'] : '';?>">
                                            <?php if(form_error('role')):?>
                                                <div class="error" ><?php echo form_error('role');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtarea1" class="col-sm-4 control-label">Note</label>
                                        <div class="col-sm-8">
                                            <textarea name="note" id="note" cols="50" rows="8" class="form-control3"><?php echo ($post['note'] != NULL && $post['note'] != '') ? $post['note'] : '';?></textarea>
                                            <?php if(form_error('note')):?>
                                                <div class="error" ><?php echo form_error('note');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-n">
                                        <label for="largeinput" class="col-sm-4 control-label label-input-lg">Current Status</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1 input-lg" id="current_status" name="current_status" placeholder="" value="<?php echo ($post['current_status'] != NULL && $post['current_status'] != '') ? $post['current_status'] : '';?>">
                                            <?php if(form_error('current_status')):?>
                                                <div class="error" ><?php echo form_error('current_status');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="compose-right">

                                        <div class="form-group mb-n">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload Passport size photo!
                                                <input type="file" name="userfile" id="userfile">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/avatar.png" alt="">
                                        </div>

                                    </div>

                                    <div class="compose-right">

                                        <div class="form-group mb-n">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload Passport front page
                                                <input type="file" name="passportfront" id="passportfront">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/passport.jpg" alt="">
                                        </div>

                                    </div>

                                    <div class="compose-right">

                                        <div class="form-group mb-n">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload Passport visa page
                                                <input type="file" name="passportvisa" id="passportvisa">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/visa.jpg" alt="">
                                        </div>

                                    </div>

                                    <div class="compose-right">

                                        <div class="form-group">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload your ID card!
                                                <input type="file" name="idcard" id="idcard">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/id_icon.jpg" alt="">
                                        </div>

                                    </div>

                                </div>
                                <div class="clearfix"></div>

                                <div class="form-group mb-n">
                                    <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
                                    <div class="col-sm-6 ">
                                        <input class="green_button" type="submit" name="Sign In" value="Save Member Details">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>

                        </div>
                        <!--******FORM PLAYER END************-->

                    </div>
                    <!--/*TAB END*/-->

                </div>

            </div>

        </div>

    </div>

</div>
