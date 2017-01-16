<!-- main content start-->
<div id="page-wrapper">
  <div class="main-page">
    <div class="forms">
      <div class="row">
        <h3 class="title1">Add Club</h3>
        <div class="form-three widget-shadow">
          <form class="form-horizontal" method="post" enctype="application/x-www-form-urlencoded">

           <div class="form-group">
              <label for="focusedinput" class="col-sm-4 control-label">Club Name</label>
              <div class="col-sm-5">
                <input type="text" class="form-control1" name="name" id="name" value="<?php echo (isset($post) && $post['name'] != '') ? $post['name'] : '';?>"/>
              </div>

              <?php if(form_error('name')):?>
                  <div class="error" ><?php echo form_error('name');?></div>
              <?php endif;?>
            </div>
                            <div class="form-group">
              <label for="focusedinput" class="col-sm-4 control-label">Club ID</label>
              <div class="col-sm-5">
                <div class="input-group">
                                      <input readonly type="text" name="club_code" id="club_code" class="form-control" placeholder="Click button to generate ID" value="<?php echo (isset($post) && $post['club_code'] != '') ? $post['club_code'] : '';?>">
                                      <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button" id="generate_club_code">Generate!</button>
                                      </span>
                                    </div><!-- /input-group -->
              </div>

              <?php if(form_error('club_code')):?>
                  <div class="error" ><?php echo form_error('club_code');?></div>
              <?php endif;?>
            </div>

             <div class="form-group">
              <label for="focusedinput" class="col-sm-4 control-label">Email</label>
              <div class="col-sm-5">
                <input type="email" name="email" id="email" class="form-control1" value="<?php echo (isset($post) && $post['email'] != '') ? $post['email'] : '';?>"/>
              </div>

              <?php if(form_error('email')):?>
                  <div class="error" ><?php echo form_error('email');?></div>
              <?php endif;?>
            </div>

            <div class="form-group">
             <label for="focusedinput" class="col-sm-4 control-label">Emirate</label>
             <div class="col-sm-5">
               <select name="emirate" id="emirate" class="form-control1">
                 <option value="Abu Dhabi" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Abu Dhabi') ? 'selected' : '';?>>Abu Dhabi</option>
                 <option value="Dubai" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Dubai') ? 'selected' : '';?>>Dubai</option>
                 <option value="Al Ain" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Al Ain') ? 'selected' : '';?>>Al Ain</option>
                 <option value="Sharjah" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Sharjah') ? 'selected' : '';?>>Sharjah</option>
                 <option value="Ajman" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Ajman') ? 'selected' : '';?>>Ajman</option>
                 <option value="Ras Al Khaimah" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Ras Al Khaimah') ? 'selected' : '';?>>Ras Al Khaimah</option>
                 <option value="Fujairah" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Fujairah') ? 'selected' : '';?>>Fujairah</option>
               </select>
             </div>

             <?php if(form_error('emirate')):?>
                 <div class="error" ><?php echo form_error('emirate');?></div>
             <?php endif;?>
           </div>

                            <div class="form-group">
              <label for="focusedinput" class="col-sm-4 control-label">Username</label>
              <div class="col-sm-5">
                <input type="text" name="username" id="username" class="form-control1" value="<?php echo (isset($post) && $post['username'] != '') ? $post['username'] : '';?>"/>
              </div>

              <?php if(form_error('username"')):?>
                  <div class="error" ><?php echo form_error('username"');?></div>
              <?php endif;?>
            </div>

                            <div class="form-group">
              <label for="focusedinput" class="col-sm-4 control-label">Password</label>
              <div class="col-sm-5">
                <input type="password" name="password" id="password" class="form-control1" />

              </div>

              <?php if(form_error('password')):?>
                  <div class="error" ><?php echo form_error('password');?></div>
              <?php endif;?>
            </div>
                            <div class="form-group">
              <label for="focusedinput" class="col-sm-4 control-label">Confirm Password</label>
              <div class="col-sm-5">
                <input type="password" name="cpassword" id="cpassword" class="form-control1" />

              </div>

              <?php if(form_error('cpassword')):?>
                  <div class="error" ><?php echo form_error('cpassword');?></div>
              <?php endif;?>
            </div>


                          <div class="form-group mb-n">
              <label for="largeinput" class="col-sm-4 control-label label-input-lg">&nbsp;</label>
              <div class="col-sm-8 ">
                                    <input class="blue_button" type="submit" name="Sign In" value="Create">
                                    <p  class="help-block"> Once you create a copy of details will send to the club mail ID</p>
              </div>
            </div>
                          <div class="clearfix"></div>
          </form>
        </div>
      </div>



    </div>
  </div>
</div>

<script type="text/javascript">

    $(function(){

        $(document).on('click', '#generate_club_code', function(){

              var clubCode = $('#club_code');

              $.get('<?php echo HOST_URL?>/Async/<?php echo ADMIN_URL?>/getUniqueCodeClub', function(res){

                  if(res.code == 200) {
                      clubCode.val(res.data);
                  } else {
                      alert("Error reading data from server");
                  }

              },'json');

              return false;

        });

    })

</script>
