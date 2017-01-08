<!-- main content start-->
<div id="page-wrapper">
  <div class="main-page">
          <h3 class="title1">Clubs</h3>
    <div class="tables">
      <div class="bs-example widget-shadow" data-example-id="hoverable-table">

                    <div class="inbox-row">

                    <nav class="navbar navbar-default">
                      <div class="container-fluid">

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav  navbar-left">
                             <li><button onclick="window.location.href='<?php echo $ctrlUrl;?>'" class="blue_button3">Refresh</button></li>
                           </ul>

                          <form action="" class="navbar-form navbar-right" method="post" enctype="application/x-www-form-urlencoded">
                            <div class="form-group">
                              <input type="text" name="q" id="q" <?php echo(isset($post['q']) && $post['q'] != "") ? $post['q'] : '';?> class="form-control" placeholder="Search by Name">
                            </div>
                            <button type="submit" class="btn green_button2">Search</button>

                          </form>

                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>

                </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">New message</h4>
              </div>
              <form class="com-mail" action="<?php echo HOST_URL . '/' . ADMIN_URL?>/Message" method="post" enctype="application/x-www-form-urlencoded">
              <div class="modal-body">

                   <input type="hidden" name="emailID" id="emailID" value=""/>
                   <input type="hidden" name="redirect_uri" id="redirect_uri" value="<?php echo $ctrlUrl?>"/>
                   <input type="text" class="form-control1 control3" placeholder="Subject :" name="subject" id="subject" />
                   <textarea rows="6" class="form-control1 control2" placeholder="Message :" name="message" id="message"></textarea>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
              </div>

              </form>

            </div>
          </div>
        </div>

        <?php $this->load->view('shared/flash-message');?>

        <h4>Registered Clubs:</h4>
        <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>ID</th>
                                <th>Club Name</th>
                                <th>Emirate</th>
                                <th>Mail</th>
                                <th>Last Update</th>
                                <th>Submit Date</th>
                                <th>&nbsp;</th>
                             </tr>
                        </thead>
                        <tbody>

                          <?php if($records):?>

                          <?php foreach ($records as $key => $value) :?>
                          <tr>
                                <th scope="row"><?php echo $value->club_code?></th>
                                <td><?php echo $value->name?></td>
                                <td><?php echo $value->emirate?></td>
                                <td>
                                  <a  class="cursor send-email" data-email="<?php echo $this->mencrypt->encode($value->id)?>" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><?php echo $value->email?></a>
                                </td>
                                <td><?php echo date('d-m-Y <br> h.i a', strtotime($value->updated_on))?></td>
                                <td><?php echo date('d-m-Y <br> h.i a', strtotime($value->created_on))?></td>
                                <td><a href="<?php echo $ctrlUrl?>/view/<?php echo $this->mencrypt->encode($value->id)?>" target="_blank" class="blue_button3">View</a></td>
                            </tr>
                          <?php endforeach;?>

                          <?php else:?>
                            <tr>
                                  <td colspan="7">No records has been found</td>
                              </tr>
                          <?php endif;?>

                        </tbody>
                    </table>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">

    $(function(){

        $(document).on('click', '.send-email', function(){
            var email = $(this).attr('data-email');
            $(document).find('#emailID').val(email);
            return false;
        });

    })

</script>
