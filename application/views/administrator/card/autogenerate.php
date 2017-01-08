<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="forms">
            <div class="row">
                <h3 class="title1"> Aquatics Greengate  <span>Autogenerate ID Card</span></h3>
                <div class="form-three widget-shadow">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="create-id-frm">

                      <?php $this->load->view('shared/alerts');?>
                      <?php $this->load->view('shared/flash-message');?>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="focusedinput" class="col-sm-12 mb-n" style="margin-bottom: 15px;">Enter member code</label>
                                <div class="clearfix"></div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" value="<?php echo (isset($post) && $post['member_code'] != "") ? $post['member_code'] : '';?>" name="member_code" id="member_code">
                                    <?php if(form_error('member_code')):?>
                                        <div class="error" ><?php echo form_error('member_code');?></div>
                                    <?php endif;?>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <p class="text-center">AFTER GENERATE PREVIEW ID CARD</p>
                            <div class="idcard">
                                <?php if($card_image == NULL):?>
                                    <img src="<?php echo ADMIN_IMG_PATH?>/id.png" />
                                <?php else:?>
                                    <img src="<?php echo $imageShowPath?>/<?php echo $card_image?>" />
                                <?php endif;?>
                            </div>

                            <?php if($card_image != NULL):?>
                            <div class="col-sm-12" style="text-align: center;">
                              <a download="IDCard.png" href="<?php echo $imageShowPath?>/<?php echo $card_image?>" class="red_button" type="button">Download</a>
                              <button class="red_button" type="button" id="send-async-email-attachment" data-card="<?php echo $card_image?>" data-email="<?php echo (isset($post) && $post['email'] != "") ? $post['email'] : '';?>">Mail</button>
                            </div>
                            <?php endif;?>
                        </div>

                        <div class="clearfix"></div>
                        <div class="form-group mb-n">
                            <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
                            <div class="col-sm-6 ">
                                <button class="green_button" type="submit">Generate ID Card</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript">

    $(function(){

        $(document).on('click', '#send-async-email-attachment', function(){

            var imageIDCard = $(this).attr('data-card'), imageCardEmail = $(this).attr('data-email');

            if(confirm("Do you want to send this id card to the email?")) {

                $.post('<?php echo HOST_URL . '/Async/' . ADMIN_URL ?>/send_card_email/', {'image': imageIDCard, 'email': imageCardEmail}, function(res){
                      if(res.code == 200) {
                          alert("Your email has been send as attachment.");
                      } else {
                          alert("Response error");
                      }
                },'json');

            }

            return false;

        });

    })

</script>
