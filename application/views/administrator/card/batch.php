<!-- main content start-->
<div id="page-wrapper">
  <div class="main-page">
          <h3 class="title1">Batch print ID Card</h3>
    <div class="tables">
      <div class="bs-example widget-shadow" data-example-id="hoverable-table">

                    <div class="inbox-row">

                    <nav class="navbar navbar-default">
                      <div class="container-fluid">

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                           <ul class="nav navbar-nav  navbar-left">
                             <li><button onclick="window.location.href='<?php echo $ctrlUrl;?>'" class="blue_button3">Refresh</button></li>
                             <li><button id="btn_batch_print" class="blue_button3" style="margin-left :10px;">Batch print</button></li>
                           </ul>

                          <ul class="nav navbar-nav  navbar-right">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filter <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a href="<?php echo $ctrlUrl?>?q=<?php echo $q?>&type=all">All</a></li>
                                <li><a href="<?php echo $ctrlUrl?>?q=<?php echo $q?>&type=renoac">RENOAC</a></li>
                                <li><a href="<?php echo $ctrlUrl?>?q=<?php echo $q?>&type=abtoyac">ABTOYAC</a></li>
                              </ul>
                            </li>
                          </ul>

                          <form class="navbar-form navbar-right" method="get" enctype="application/x-www-form-urlencoded">
                            <div class="form-group">
                              <input type="text" class="form-control" name="q" id="q" placeholder="Search by Name">
                            </div>
                            <button type="submit" class="btn green_button2">Search</button>
                          </form>

                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                    </nav>

                </div>
                
                <?php $this->load->view('shared/flash-message');?>

        <form action="<?php echo $ctrlUrl;?>/batch_print" method="post" enctype="application/x-www-form-urlencoded" name="batchPrint" id="batchPrint">
          <h4>Registered members</h4>
          <table class="table table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Nationality</th>
                                  <th>Club</th>
                                  <th>Last Update</th>
                                  <th>Submit Date</th>
                                  <th>Status</th>
                                  <th>&nbsp;</th>
                               </tr>
                          </thead>

                          <tbody>

                            <?php if($records):?>

                              <?php foreach ($records as $key => $value):?>
                                <tr>

                                    <th scope="row inbox-page">
                                      <div class="inbox-page">
                                        <input style="margin-top: 8px;" type="checkbox" class="checkbox item-checkbox" name="array_id[]" value="<?php echo $this->mencrypt->encode($value->id);?>">
                                      </div>
                                    </th>
                                    <td><?php echo $value->code?></td>
                                      <td><?php echo $value->first_name?></td>
                                      <td><?php echo $value->last_name?></td>
                                      <td><?php echo $value->emirate?></td>
                                      <td><?php echo $value->name?></td>
                                      <td><?php echo date('d-m-Y <br> h.i a', strtotime($value->updated_on))?></td>
                                      <td><?php echo date('d-m-Y <br> h.i a', strtotime($value->created_on))?></td>
                                      <td><?php echo ($value->is_active == 'Y') ? 'Active' : 'Pending'?></td>
                                      <td><a href="<?php echo HOST_URL . '/' . ADMIN_URL . '/Clubs'?>/view_member/<?php echo $this->mencrypt->encode($value->club_fk)?>/<?php echo $this->mencrypt->encode($value->id)?>" class="blue_button3">View</a></td>
                                  </tr>
                              <?php endforeach;?>

                             <?php else:?>
                             <tr>
                                  <td colspan="11">No records has been found</td>
                              </tr>
                              <?php endif;?>

                          </tbody>
                      </table>
        </form>

      </div>

    </div>
  </div>
</div>
<!--footer-->

<script type="text/javascript">

    $(function(){

        $(document).on('click', '#btn_batch_print', function(){

             var form = $('#batchPrint');
             if(confirm("Do you want to generate the id cards for these members ?")) {
                form.submit();
             }
        });

    })

</script>
