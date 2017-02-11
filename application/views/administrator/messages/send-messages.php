<div id="page-wrapper">
<div class="main-page">
<h3 class="title1">Send Messages</h3>
<div class="inbox-row">
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
</div>
</div>
<div id="inbox-async-partial" class="inbox-row2"> </div>
</div>
<script type="text/javascript">/*<![CDATA[*/$(function(){var a=$("#inbox-async-partial");showLoader();loadInboxPartial(a,"");$(document).on("click","#action-select-all",function(c){c.preventDefault();var b=$(this);$(".item-checkbox").each(function(){if(!$(this).prop("checked")){$(this).prop("checked",true);b.html("Unselect All")}else{$(this).prop("checked",false);b.html("Select All")}});return false});$(document).on("click","#email-search-btn",function(){var b=$("#search").val();showLoader();loadInboxPartial(a,b)});$(document).on("click","#action-delete-email",function(){var b=new Array();$(".item-checkbox").each(function(){if($(this).prop("checked")){b.push($(this).val())}});if(b.length>0){if(confirm("Do you want to delete this email? there is no UNDO")){$.post("<?php echo HOST_URL . "/Async/" . ADMIN_URL ?>/trash_message_delete/",{emails:b},function(c){if(c.code==200){loadInboxPartial(a,$("#search").val())}else{alert("Error from async response => Please refresh the page")}},"json")}else{}}else{alert("No emails has been selected ")}return false});$(document).on("click",".action-delete-single-email",function(c){var b=$(this).attr("data-id");if(confirm("Do you want to move this message to trash?")){$.post("<?php echo HOST_URL . "/Async/" . ADMIN_URL ?>/trash_single_email_delete/",{email:b},function(d){if(d.code==200){loadInboxPartial(a,$("#search").val())}else{}},"json")}return false})});function showLoader(){}function hideLoader(){}function loadInboxPartial(b,a){b.load("<?php echo HOST_URL . "/Async/" . ADMIN_URL ?>/send_message_partial/"+a,function(c){hideLoader()})};/*]]>*/</script>
