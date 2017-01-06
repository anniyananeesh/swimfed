
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">Reset Password</h4>
          </div>
          <form action="" enctype="application/x-www-form-urlencoded" role="form" method="post">
          <div class="modal-body">

              <div class="form-group">
                <label for="recipient-name" class="control-label">New Password:</label>
                <input type="text" class="form-control" id="password" name="password" />
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Confirm Password:</label>
                <input type="text" class="form-control" id="cpassword" name="cpassword" />
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="reset-password-btn">Reset</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <script type="text/javascript">

        $(function(){

            $(document).on('click', '#reset-password-btn', function(e){

                var password = $(document).find("#password").val(), cpassword = $(document).find("#cpassword").val();

                if((password != cpassword) && (password != "" && cpassword != "")) {
                   alert("Both the passwords must be equal and not empty");
                   e.preventDefault();
                   return false;
                } else {
                    return true;
                }
            });

        })

    </script>

    <!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="forms">
            <div class="row">
                <h3 class="title1"> Settings</h3>
                <div class="form-three widget-shadow">
                    <form class="form-horizontal" action="" method="post" enctype="application/x-www-form-urlencoded" name="settings-frm">

                        <?php $this->load->view('shared/alerts');?>
                        <?php $this->load->view('shared/flash-message');?>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-4 control-label">Club Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control1" value="<?php echo $record->name?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-4 control-label">Club ID</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control1" value="<?php echo $record->club_code?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control1" value="<?php echo $record->username?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control1" value="<?php echo $record->r_password?>" disabled>
                            </div>
                        </div>

                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-4 control-label label-input-lg">&nbsp;</label>
                            <div class="col-sm-8 ">
                                <button type="button" class="blue_button2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Reset Password</button>
                                <input class="green_button" type="button" name="Sign In" value="Send to Club" id="send-password-club" data-id="<?php echo $menuID;?>">
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

        $(document).on('click', '#send-password-club', function(){

            var userID = $(this).attr('data-id');

            if(confirm("Do you want to send the new password to club")) {

                $.post('<?php echo HOST_URL . '/Async/' . ADMIN_URL ?>/send_password_club/', {'user' : userID}, function(res){

                      if(res.code == 200) {
                          alert("New password has been send");
                      } else {
                          alert(" Response error . please refresh the page");
                      }

                },'json');

            }

        });

    })

</script>
