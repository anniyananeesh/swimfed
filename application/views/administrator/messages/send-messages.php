<!-- main content start-->
<div id="page-wrapper">
  <div class="main-page">
    <h3 class="title1">Send Messages</h3>

    <div class="inbox-row">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

              <form class="navbar-form navbar-right">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search Messages " name="search" id="search">
                    </div>
                    <button type="button" class="btn green_button2" id="email-search-btn" class="email-search-btn">Search</button>

               </form>

              <ul class="nav navbar-nav navbar-letf">

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Select <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#" class="action-select-all" id="action-select-all">Select All</a></li>
                  </ul>
                </li>
                <li><a href="#" class="action-delete-email" id="action-delete-email"><i class="fa fa-trash-o"></i> Delete</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
    </div>

    <div id="inbox-async-partial" class="inbox-row2"> </div>


</div>


<script type="text/javascript">

    $(function(){

        var inboxLoader = $("#inbox-async-partial");

        showLoader();

        //init loader to show the basic version of inbox partial
        loadInboxPartial(inboxLoader, "");


        //Action select all emails
        $(document).on('click', '#action-select-all', function(e){

            e.preventDefault();
            var elemHref = $(this);

            $('.item-checkbox').each(function(){

                if(!$(this).prop('checked')) {
                    $(this).prop('checked', true);
                    elemHref.html('Unselect All');
                } else {
                    $(this).prop('checked', false);
                    elemHref.html('Select All');
                }

            });

            return false;

        });

        //On search email with any keyword
        $(document).on('click', '#email-search-btn', function(){

            var searchQry = $("#search").val();

            showLoader();

            loadInboxPartial(inboxLoader, searchQry);

        });

        //Delete email from database
        $(document).on('click','#action-delete-email',function(){

              var selectedEmails = new Array();

              $('.item-checkbox').each(function(){

                  if($(this).prop('checked')) {
                      selectedEmails.push($(this).val());
                  }

              });

              if (selectedEmails.length > 0) {

                  if(confirm("Do you want to delete this email? there is no UNDO")) {

                      $.post('<?php echo HOST_URL . '/Async/' . ADMIN_URL ?>/trash_message_delete/', {'emails' : selectedEmails}, function(res){

                            if(res.code == 200) {

                                //Load the inbox after emails has been deleted
                                loadInboxPartial(inboxLoader, $('#search').val());

                            } else {

                                alert("Error from async response => Please refresh the page");
                            }

                      }, 'json');

                  } else {

                  }

              } else {
                  alert("No emails has been selected ");
              }

              return false;

        });

        //Delete single email from inbox to trash
        $(document).on('click', '.action-delete-single-email', function(e){

            var emailID = $(this).attr('data-id');

            if(confirm("Do you want to move this message to trash?")) {

                $.post('<?php echo HOST_URL . '/Async/' . ADMIN_URL ?>/trash_single_email_delete/', {'email' : emailID }, function(res){

                    if(res.code == 200) {
                        //Load the inbox after emails has been deleted
                        loadInboxPartial(inboxLoader, $('#search').val());
                    } else {

                    }

                }, 'json');

            }

            return false;
        })


    })

    function showLoader() {

    }

    function hideLoader() {

    }

    function loadInboxPartial(elem, search) {

        elem.load('<?php echo HOST_URL . '/Async/' . ADMIN_URL ?>/send_message_partial/' + search, function(res){
            hideLoader();
        });
    }

</script>
