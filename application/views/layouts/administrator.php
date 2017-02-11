<!DOCTYPE HTML>
<html>
<head>
<title><?php echo SITE_NAME?> </title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8" />
<meta name=keywords content="Aqautic Green Gate Admin" />
<script type=application/x-javascript>addEventListener("load",function(){setTimeout(hideURLbar,0);},false);function hideURLbar(){window.scrollTo(0,1);}</script>
<link href="<?php echo ADMIN_CSS_PATH?>/bootstrap.css" rel=stylesheet />
<link href="<?php echo ADMIN_CSS_PATH?>/style.css" rel=stylesheet />
<link href="<?php echo ADMIN_CSS_PATH?>/font-awesome.css" rel=stylesheet>
<script src="<?php echo ADMIN_JS_PATH?>/jquery-1.11.1.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH?>/modernizr.custom.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel=stylesheet type=text/css>
<link href="<?php echo ADMIN_CSS_PATH?>/animate.css" rel=stylesheet type=text/css media=all>
<script src="<?php echo ADMIN_JS_PATH?>/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="<?php echo ADMIN_JS_PATH?>/metisMenu.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH?>/custom.js"></script>
<link href="<?php echo ADMIN_CSS_PATH?>/custom.css" rel=stylesheet>
</head>
<body class="<?php echo ($this->router->fetch_class() == 'Dashboard') ? 'cbp-spmenu-push_login' : 'cbp-spmenu-push';?>">
<div class=main-content>
<?php if($this->router->fetch_class() != 'Dashboard'):?>
<?php $this->load->view('shared/' . ((isset($sidemenu_club_active) && $sidemenu_club_active != '') ? 'sidemenu-admin-clubs' : 'sidemenu'), array('menuID' => (isset($club_id)) ? $club_id : NULL));?>
<?php $this->load->view('shared/header');?>
<?php endif;?>
<?php $this->load->view($content);?>
<div class=footer>
<p>&copy; 2016 Aqautic Greengate Admin Panel. All Rights Reserved | Design by <a href=http://www.digitalgateweb.com/ target=_blank>Digital Gate</a></p>
</div>
</div>
<script src="<?php echo ADMIN_JS_PATH?>/classie.js"></script>
<script>var menuLeft=document.getElementById('cbp-spmenu-s1'),showLeftPush=document.getElementById('showLeftPush'),body=document.body;showLeftPush.onclick=function(){classie.toggle(this,'active');classie.toggle(body,'cbp-spmenu-push-toright');classie.toggle(menuLeft,'cbp-spmenu-open');disableOther('showLeftPush');};function disableOther(button){if(button!=='showLeftPush'){classie.toggle(showLeftPush,'disabled');}}
$(function(){$(document).on('click','.action-download-attachment',function(){var href=$(this).attr('href');window.open(href,'_blank');});});</script>
<script src="<?php echo ADMIN_JS_PATH?>/jquery.nicescroll.js"></script>
<script src="<?php echo ADMIN_JS_PATH?>/scripts.js"></script>
<script src="<?php echo ADMIN_JS_PATH?>/bootstrap.js"> </script>
</body>
</html>
