<!-- main content start-->
<div id="page-wrapper1">
    <div class="main-page">
        <div class="forms">
            <div class="row">
                <h3 class="title1"> Welcome to Aquatic Green Gate  <span>Please add all the mentatory informations</span></h3>
                <div class="form-three widget-shadow">
                    <form class="form-horizontal" class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                        <?php $this->load->view('shared/alerts');?>
                        <?php $this->load->view('shared/flash-message');?>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Club Name</label>
                            <div class="col-sm-6">
                              <input type="text" autofocus class="form-control1" id="name" name="name" value="<?php echo ($post['name'] != NULL && $post['name'] != '') ? $post['name'] : '';?>">
                              <?php if(form_error('name')):?>
                                  <div class="error" ><?php echo form_error('name');?></div>
                              <?php endif;?>
                            </div>
                            <div class="col-sm-2">
                                <p class="help-block">Enter the club name here!</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="txtarea1" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-6">
                              <textarea name="address" id="address" cols="53" rows="3" class="form-control3"><?php echo ($post['address'] != NULL && $post['address'] != '') ? $post['address'] : '';?></textarea>
                              <?php if(form_error('address')):?>
                                  <div class="error" ><?php echo form_error('address');?></div>
                              <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Post Code</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control1" id="pincode" name="pincode" placeholder="Postbox Number / Post Code" value="<?php echo ($post['pincode'] != NULL && $post['pincode'] != '') ? $post['pincode'] : '';?>" />
                              <?php if(form_error('pincode')):?>
                                  <div class="error" ><?php echo form_error('pincode');?></div>
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="selector1" class="col-sm-2 control-label">Emirate</label>
                            <div class="col-sm-6">
                              <select name="emirate" id="emirate" class="form-control1">
                                  <option value="Abu Dhabi" <?php echo (isset($post['emirate']) && $post['emirate'] != 'Abu Dhabi') ? 'selected' : '';?>>Abu Dhabi</option>
                                  <option value="Dubai" <?php echo (isset($post['emirate']) && $post['emirate'] != 'Dubai') ? 'selected' : '';?>>Dubai</option>
                                  <option value="Sharjah" <?php echo (isset($post['emirate']) && $post['emirate'] != 'Sharjah') ? 'selected' : '';?>>Sharjah</option>
                                  <option value="Ajman" <?php echo (isset($post['emirate']) && $post['emirate'] != 'Ajman') ? 'selected' : '';?>>Ajman</option>
                                  <option value="Ras Al Khaima" <?php echo (isset($post['emirate']) && $post['emirate'] != 'Ras Al Khaima') ? 'selected' : '';?>>Ras Al Khaima</option>
                                  <option value="Fujairah" <?php echo (isset($post['emirate']) && $post['emirate'] != 'Fujairah') ? 'selected' : '';?>>Fujairah</option>
                              </select>
                              <?php if(form_error('emirate')):?>
                                  <div class="error" ><?php echo form_error('emirate');?></div>
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="smallinput" class="col-sm-2 control-label label-input-sm">Web Url</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control1 input-sm" id="url" name="url" placeholder="www.something.com" value="<?php echo ($post['url'] != NULL && $post['url'] != '') ? $post['url'] : '';?>"/>
                              <?php if(form_error('url')):?>
                                  <div class="error" ><?php echo form_error('url');?></div>
                              <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mediuminput" class="col-sm-2 control-label">Email Id</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control1" id="email" name="email" value="<?php echo ($post['email'] != NULL && $post['email'] != '') ? $post['email'] : '';?>"/>
                              <?php if(form_error('email')):?>
                                  <div class="error" ><?php echo form_error('email');?></div>
                              <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">Contact Person</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control1 input-lg" id="contact_person" name="contact_person" value="<?php echo ($post['contact_person'] != NULL && $post['contact_person'] != '') ? $post['contact_person'] : '';?>" />
                              <?php if(form_error('contact_person')):?>
                                  <div class="error" ><?php echo form_error('contact_person');?></div>
                              <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">Telephone Number</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control1 input-lg" id="contact_no" name="contact_no" value="<?php echo ($post['contact_no'] != NULL && $post['contact_no'] != '') ? $post['contact_no'] : '';?>" />
                              <?php if(form_error('contact_no')):?>
                                  <div class="error" ><?php echo form_error('contact_no');?></div>
                              <?php endif;?>
                            </div>
                        </div>
                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">Fax</label>
                            <div class="col-sm-6">
                              <input type="text" class="form-control1 input-lg" id="fax_no" name="fax_no" value="<?php echo ($post['fax_no'] != NULL && $post['fax_no'] != '') ? $post['fax_no'] : '';?>" />
                              <?php if(form_error('fax_no')):?>
                                  <div class="error" ><?php echo form_error('fax_no');?></div>
                              <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
                            <div class="col-sm-6 ">
                                <input class="green_button" type="submit" name="Sign In" value="Save details and continue"> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
