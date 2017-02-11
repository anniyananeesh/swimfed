<link href="<?php echo PLUGINS_PATH?>/upload/uploadfile.css" type="text/css" rel="stylesheet" />
<script src="<?php echo PLUGINS_PATH?>/upload/jquery.uploadfile.js"></script>
<script type="text/javascript">/*<![CDATA[*/$(function(){var settings={dragDrop:false,fileName:"profilePic",returnType:"json",showDelete:true,showQueueDiv:"upload-container",showPreview:true,previewHeight:160,previewWidth:160,showProgress:true,showFileSize:false,showFileCounter:false,showDelete:true,showError:true,maxFileCount:1,allowedTypes:"jpg,png",multiple:true,autoSubmit:false,uploadStr:'<i class="fa fa-paperclip"></i> Upload Passport size photo!',acceptFiles:'image/*',maxFileSize:1000*1024,statusBarWidth:160,onSelect:function(files){$("#upload-container").fadeIn(350);$('#upload-passport-photo-default').hide();},afterUploadAll:function(obj){},customProgressBar:function(obj,s){this.statusbar=$("#upload-container");this.container=$("<div class='img-thumb'></div>").appendTo(this.statusbar);this.preview=$("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.container).hide();this.filename=$("<div class='ajax-file-upload-filename' style='display:none;'></div>").appendTo(this.container);this.progressDiv=$("<div class='ajax-file-upload-progress' style='display:none;'>").appendTo(this.container).hide();this.progressbar=$("<div class='ajax-file-upload-bar' style='display:none;'></div>").appendTo(this.progressDiv);this.abort=$("<div style='display:none;'>"+s.abortStr+"</div>").appendTo(this.container).hide();this.cancel=$("<div style='display:none;'>"+s.cancelStr+"</div>").appendTo(this.container).hide();this.done=$("<div style='display:none;'>"+s.doneStr+"</div>").appendTo(this.container).hide();this.download=$("<div style='display:none;'>"+s.downloadStr+"</div>").appendTo(this.container).hide();this.del=$("<span class='del-thumb'><i class='ion-close-circled'></i></span>").appendTo(this.container);}};var settingsOtherDetails={dragDrop:false,fileName:"myfilepassport",returnType:"json",showDelete:true,showQueueDiv:"upload-container2",showPreview:true,previewHeight:120,previewWidth:120,showProgress:true,showFileSize:false,showFileCounter:false,showDelete:true,showError:true,maxFileCount:<?php echo(3-count($passport_visa_images))?>,allowedTypes:"pdf",multiple:true,autoSubmit:false,uploadStr:'<i class="fa fa-paperclip"></i> Upload Passport pages & Emirates ID!',acceptFiles:'.pdf',maxFileSize:3000*1024,statusBarWidth:160,onSelect:function(files){$("#upload-container2").fadeIn(350);},customProgressBar:function(obj,s){this.statusbar=$("#upload-container2");this.container=$("<div class='img-thumb'></div>").appendTo(this.statusbar);this.preview=$("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.container).hide();this.filename=$("<div class='ajax-file-upload-filename' style='display:none;'></div>").appendTo(this.container);this.progressDiv=$("<div class='ajax-file-upload-progress' style='display:none;'>").appendTo(this.container).hide();this.progressbar=$("<div class='ajax-file-upload-bar' style='display:none;'></div>").appendTo(this.progressDiv);this.abort=$("<div style='display:none;'>"+s.abortStr+"</div>").appendTo(this.container).hide();this.cancel=$("<div style='display:none;'>"+s.cancelStr+"</div>").appendTo(this.container).hide();this.done=$("<div style='display:none;'>"+s.doneStr+"</div>").appendTo(this.container).hide();this.download=$("<div style='display:none;'>"+s.downloadStr+"</div>").appendTo(this.container).hide();this.del=$("<span class='del-thumb'><i class='ion-close-circled'></i></span>").appendTo(this.container);}};var settingsSponsor={dragDrop:false,fileName:"sponsorfile",returnType:"json",showDelete:true,showQueueDiv:"upload-container3",showPreview:true,previewHeight:120,previewWidth:120,showProgress:true,showFileSize:false,showFileCounter:false,showDelete:true,statusBarWidth:160,showError:true,maxFileCount:<?php echo(4-count($sponsor_images))?>,allowedTypes:"pdf",multiple:true,autoSubmit:false,uploadStr:'<i class="fa fa-paperclip"></i> Upload Sponsor details!',acceptFiles:'.pdf',maxFileSize:3000*1024,onSelect:function(files){$("#upload-container3").fadeIn(350);},customProgressBar:function(obj,s){this.statusbar=$("#upload-container3");this.container=$("<div class='img-thumb'></div>").appendTo(this.statusbar);this.preview=$("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.container).hide();this.filename=$("<div class='ajax-file-upload-filename' style='display:none;'></div>").appendTo(this.container);this.progressDiv=$("<div class='ajax-file-upload-progress' style='display:none;'>").appendTo(this.container).hide();this.progressbar=$("<div class='ajax-file-upload-bar' style='display:none;'></div>").appendTo(this.progressDiv);this.abort=$("<div style='display:none;'>"+s.abortStr+"</div>").appendTo(this.container).hide();this.cancel=$("<div style='display:none;'>"+s.cancelStr+"</div>").appendTo(this.container).hide();this.done=$("<div style='display:none;'>"+s.doneStr+"</div>").appendTo(this.container).hide();this.download=$("<div style='display:none;'>"+s.downloadStr+"</div>").appendTo(this.container).hide();this.del=$("<span class='del-thumb'><i class='ion-close-circled'></i></span>").appendTo(this.container);}};var settingsClubCertificate={url:"<?php echo HOST_URL?>/Async/<?php echo CLUB_URL?>/upload_club_certificate",dragDrop:false,fileName:"clubfile",returnType:"json",showDelete:true,showQueueDiv:"upload-container4",showPreview:true,statusBarWidth:160,previewHeight:120,previewWidth:120,showProgress:true,showFileSize:false,showFileCounter:false,showDelete:true,showError:true,maxFileCount:1,allowedTypes:"pdf",multiple:true,autoSubmit:false,uploadStr:'<i class="fa fa-paperclip"></i> Upload Club certificate!',acceptFiles:".pdf",maxFileSize:3000*1024,onSelect:function(files){$("#upload-container4").fadeIn(350);},customProgressBar:function(obj,s){this.statusbar=$("#upload-container4");this.container=$("<div class='img-thumb'></div>").appendTo(this.statusbar);this.preview=$("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.container).hide();this.filename=$("<div class='ajax-file-upload-filename' style='display:none;'></div>").appendTo(this.container);this.progressDiv=$("<div class='ajax-file-upload-progress' style='display:none;'>").appendTo(this.container).hide();this.progressbar=$("<div class='ajax-file-upload-bar' style='display:none;'></div>").appendTo(this.progressDiv);this.abort=$("<div style='display:none;'>"+s.abortStr+"</div>").appendTo(this.container).hide();this.cancel=$("<div style='display:none;'>"+s.cancelStr+"</div>").appendTo(this.container).hide();this.done=$("<div style='display:none;'>"+s.doneStr+"</div>").appendTo(this.container).hide();this.download=$("<div style='display:none;'>"+s.downloadStr+"</div>").appendTo(this.container).hide();this.del=$("<span class='del-thumb'><i class='ion-close-circled'></i></span>").appendTo(this.container);}};var uploadPhoto=$("#passportPhotoUploadBtn").uploadFile(settings);var uploadOtherDetails=$("#passportDetailsUploadBtn").uploadFile(settingsOtherDetails);var uploadSponsor=$("#sponsorUploadBtn").uploadFile(settingsSponsor);var uploadClubCertificate=$("#clubCertificateUploadBtn").uploadFile(settingsClubCertificate);})/*]]>*/</script>
<div id="page-wrapper">
<div class="main-page">
<div class="forms">
<div class="row">
<h3 class="title1"> Update Member Info <span>Update / Remove member informations</span></h3>
<div class="form-three widget-shadow">
<div class="tabcontent">
<div class="tab-pane" id="home">
<form class="form-horizontal" id="member_add_frm" action="" method="post" enctype="multipart/form-data">
<?php $this->load->view('shared/alerts');?>
<?php $this->load->view('shared/flash-message');?>
<div class="col-sm-6">
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">First Name</label>
<div class="col-sm-8">
<input type="text" class="form-control1" id="first_name" name="first_name" placeholder="" value="<?php echo ($post['first_name'] != NULL && $post['first_name'] != '') ? $post['first_name'] : '';?>">
<?php if(form_error('first_name')):?>
<div class="error"><?php echo form_error('first_name');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Last Name</label>
<div class="col-sm-8">
<input type="text" class="form-control1" id="last_name" name="last_name" placeholder="" value="<?php echo ($post['last_name'] != NULL && $post['last_name'] != '') ? $post['last_name'] : '';?>">
<?php if(form_error('last_name')):?>
<div class="error"><?php echo form_error('last_name');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Father's Name</label>
<div class="col-sm-8">
<input type="text" class="form-control1" id="father_name" name="father_name" placeholder="" value="<?php echo ($post['father_name'] != NULL && $post['father_name'] != '') ? $post['father_name'] : '';?>">
<?php if(form_error('father_name')):?>
<div class="error"><?php echo form_error('father_name');?></div>
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
<div class="error"><?php echo form_error('gender');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Date of Birth</label>
<div class="col-sm-6">
<input type="text" class="form-control1" id="dob" name="dob" placeholder="DD/MM/YY" value="<?php echo ($post['dob'] != NULL && $post['dob'] != '') ? $post['dob'] : '';?>">
<?php if(form_error('dob')):?>
<div class="error"><?php echo form_error('dob');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Passport Number</label>
<div class="col-sm-8">
<input type="text" class="form-control1" id="passport_no" name="passport_no" placeholder="" value="<?php echo ($post['passport_no'] != NULL && $post['passport_no'] != '') ? $post['passport_no'] : '';?>">
<?php if(form_error('passport_no')):?>
<div class="error"><?php echo form_error('passport_no');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Passport Expiry Date</label>
<div class="col-sm-6">
<input type="text" class="form-control1" name="passport_expiry" id="passport_expiry" placeholder="DD/MM/YY" value="<?php echo ($post['passport_expiry'] != NULL && $post['passport_expiry'] != '') ? $post['passport_expiry'] : '';?>">
<?php if(form_error('passport_expiry')):?>
<div class="error"><?php echo form_error('passport_expiry');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="selector1" class="col-sm-4 control-label">Nationality</label>
<div class="col-sm-8">
<select name="country" id="country" class="form-control1">
<option value="AF">Afghanistan</option>
<option value="AX">Åland Islands</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antarctica</option>
<option value="AG">Antigua and Barbuda</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaijan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrain</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BZ">Belize</option>
<option value="BJ">Benin</option>
<option value="BM">Bermuda</option>
<option value="BT">Bhutan</option>
<option value="BO">Bolivia, Plurinational State of</option>
<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
<option value="BA">Bosnia and Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazil</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="BN">Brunei Darussalam</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodia</option>
<option value="CM">Cameroon</option>
<option value="CA">Canada</option>
<option value="CV">Cape Verde</option>
<option value="KY">Cayman Islands</option>
<option value="CF">Central African Republic</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CX">Christmas Island</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombia</option>
<option value="KM">Comoros</option>
<option value="CG">Congo</option>
<option value="CD">Congo, the Democratic Republic of the</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Côte dIvoire</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CW">Curaçao</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK">Denmark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="DO">Dominican Republic</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="SV">El Salvador</option>
<option value="GQ">Equatorial Guinea</option>
<option value="ER">Eritrea</option>
<option value="EE">Estonia</option>
<option value="ET">Ethiopia</option>
<option value="FK">Falkland Islands (Malvinas)</option>
<option value="FO">Faroe Islands</option>
<option value="FJ">Fiji</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GF">French Guiana</option>
<option value="PF">French Polynesia</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabon</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Greece</option>
<option value="GL">Greenland</option>
<option value="GD">Grenada</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GG">Guernsey</option>
<option value="GN">Guinea</option>
<option value="GW">Guinea-Bissau</option>
<option value="GY">Guyana</option>
<option value="HT">Haiti</option>
<option value="HM">Heard Island and McDonald Islands</option>
<option value="VA">Holy See (Vatican City State)</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran, Islamic Republic of</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IM">Isle of Man</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JE">Jersey</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KP">Korea, Democratic Peoples Republic of</option>
<option value="KR">Korea, Republic of</option>
<option value="KW">Kuwait</option>
<option value="KG">Kyrgyzstan</option>
<option value="LA">Lao Peoples Democratic Republic</option>
<option value="LV">Latvia</option>
<option value="LB">Lebanon</option>
<option value="LS">Lesotho</option>
<option value="LR">Liberia</option>
<option value="LY">Libya</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao</option>
<option value="MK">Macedonia, the former Yugoslav Republic of</option>
<option value="MG">Madagascar</option>
<option value="MW">Malawi</option>
<option value="MY">Malaysia</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malta</option>
<option value="MH">Marshall Islands</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritania</option>
<option value="MU">Mauritius</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexico</option>
<option value="FM">Micronesia, Federated States of</option>
<option value="MD">Moldova, Republic of</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="ME">Montenegro</option>
<option value="MS">Montserrat</option>
<option value="MA">Morocco</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NL">Netherlands</option>
<option value="NC">New Caledonia</option>
<option value="NZ">New Zealand</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk Island</option>
<option value="MP">Northern Mariana Islands</option>
<option value="NO">Norway</option>
<option value="OM">Oman</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestinian Territory, Occupied</option>
<option value="PA">Panama</option>
<option value="PG">Papua New Guinea</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PN">Pitcairn</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="RE">Réunion</option>
<option value="RO">Romania</option>
<option value="RU">Russian Federation</option>
<option value="RW">Rwanda</option>
<option value="BL">Saint Barthélemy</option>
<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
<option value="KN">Saint Kitts and Nevis</option>
<option value="LC">Saint Lucia</option>
<option value="MF">Saint Martin (French part)</option>
<option value="PM">Saint Pierre and Miquelon</option>
<option value="VC">Saint Vincent and the Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome and Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="RS">Serbia</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SX">Sint Maarten (Dutch part)</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia and the South Sandwich Islands</option>
<option value="SS">South Sudan</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard and Jan Mayen</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syrian Arab Republic</option>
<option value="TW">Taiwan, Province of China</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania, United Republic of</option>
<option value="TH">Thailand</option>
<option value="TL">Timor-Leste</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad and Tobago</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="TM">Turkmenistan</option>
<option value="TC">Turks and Caicos Islands</option>
<option value="TV">Tuvalu</option>
<option value="UG">Uganda</option>
<option value="UA">Ukraine</option>
<option value="AE" selected="selected">United Arab Emirates</option>
<option value="GB">United Kingdom</option>
<option value="US">United States</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistan</option>
<option value="VU">Vanuatu</option>
<option value="VE">Venezuela, Bolivarian Republic of</option>
<option value="VN">Viet Nam</option>
<option value="VG">Virgin Islands, British</option>
<option value="VI">Virgin Islands, U.S.</option>
<option value="WF">Wallis and Futuna</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option>
</select>
<?php if(form_error('country')):?>
<div class="error"><?php echo form_error('country');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="selector1" class="col-sm-4 control-label">Current Emirate</label>
<div class="col-sm-8">
<select name="emirate" id="emirate" class="form-control1">
<option value="Abu Dhabi" <?php echo (isset($post['emirate']) && $post['emirate']=='Abu Dhabi') ? 'selected' : '';?>>Abu Dhabi</option>
<option value="Dubai" <?php echo (isset($post['emirate']) && $post['emirate']=='Dubai') ? 'selected' : '';?>>Dubai</option>
<option value="Al Ain" <?php echo (isset($post['emirate']) && $post['emirate']=='Al Ain') ? 'selected' : '';?>>Al Ain</option>
<option value="Sharjah" <?php echo (isset($post['emirate']) && $post['emirate']=='Sharjah') ? 'selected' : '';?>>Sharjah</option>
<option value="Ajman" <?php echo (isset($post['emirate']) && $post['emirate']=='Ajman') ? 'selected' : '';?>>Ajman</option>
<option value="Ras Al Khaimah" <?php echo (isset($post['emirate']) && $post['emirate']=='Ras Al Khaimah') ? 'selected' : '';?>>Ras Al Khaimah</option>
<option value="Fujairah" <?php echo (isset($post['emirate']) && $post['emirate']=='Fujairah') ? 'selected' : '';?>>Fujairah</option>
</select>
<?php if(form_error('emirate')):?>
<div class="error"><?php echo form_error('emirate');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">City</label>
<div class="col-sm-8">
<input type="text" class="form-control1" id="city" name="city" placeholder="" value="<?php echo ($post['city'] != NULL && $post['city'] != '') ? $post['city'] : '';?>">
<?php if(form_error('city')):?>
<div class="error"><?php echo form_error('city');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="focusedinput" class="col-sm-4 control-label">Mobile Number</label>
<div class="col-sm-8">
<input type="text" class="form-control1" id="contact_no" name="contact_no" placeholder="05" value="<?php echo ($post['contact_no'] != NULL && $post['contact_no'] != '') ? $post['contact_no'] : '';?>">
<?php if(form_error('contact_no')):?>
<div class="error"><?php echo form_error('contact_no');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="smallinput" class="col-sm-4 control-label label-input-sm">Discipline</label>
<div class="col-sm-8">
<select name="discipline" id="discipline" class="form-control1">
<option value="Swimming" <?php echo (isset($post['discipline']) && $post['discipline']=='Swimming') ? 'selected' : '';?>>Swimming</option>
<option value="Water Polo" <?php echo (isset($post['discipline']) && $post['discipline']=='Water Polo') ? 'selected' : '';?>>Water Polo</option>
<option value="Diving" <?php echo (isset($post['discipline']) && $post['discipline']=='Diving') ? 'selected' : '';?>>Diving</option>
<option value="Synchronized Swimming" <?php echo (isset($post['discipline']) && $post['discipline']=='Synchronized Swimming') ? 'selected' : '';?>>Synchronized Swimming</option>
</select>
<?php if(form_error('discipline')):?>
<div class="error"><?php echo form_error('discipline');?></div>
<?php endif;?>
</div>
</div>
<div class="form-group">
<label for="txtarea1" class="col-sm-4 control-label">Note</label>
<div class="col-sm-8">
<textarea name="note" id="note" cols="50" rows="8" class="form-control3"><?php echo ($post['note'] != NULL && $post['note'] != '') ? $post['note'] : '';?></textarea>
<?php if(form_error('note')):?>
<div class="error"><?php echo form_error('note');?></div>
<?php endif;?>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="compose-right">
<div class="form-group mb-n">
<h3 style="margin-bottom:10px">Profile image</h3>
<?php if($record->image1 == NULL):?>
<div id="passportPhotoUploadBtn" class="btn btn-default btn-file blue_button2" style="padding:0"><i class="fa fa-paperclip"></i> Upload profile photo!!</div>
<div class="clearfix"></div>
<p class="help-block">Upload profile photo with dimensions 320px 320px! | Max. 1Mb</p>
<div class="upload-container mt-sm" id="upload-container"></div>
<div class="clearfix"></div>
<?php endif;?>
<?php if($record->image1 != NULL):?>
<div class="image_preview">
<div class="image-holder">
<a target="_blank" class="preview-image-holder" href="<?php echo $memberShowPath?>/<?php echo $record->image1?>" style="background:url('<?php echo $memberShowPath?>/<?php echo $record->image1?>') no-repeat;background-size:cover"></a>
<i class="fa fa-times-circle" aria-hidden="true" onclick="javascript:if(delConfirmation()==true){DeleteUserProfilePicFile('<?php echo $record->image1?>','image1',<?php echo $record->id?>)}"></i>
</div>
</div>
<?php else:?>
<div id="upload-passport-photo-default">
<img src="<?php echo ADMIN_IMG_PATH?>/avatar.png" alt="" width="150">
</div>
<?php endif;?>
</div>
</div>
<div class="compose-right">
<div class="form-group mb-n">
<h3 style="margin-bottom:10px">Passport and visa images</h3>
<?php if(count($passport_visa_images) < 3):?>
<div id="passportDetailsUploadBtn" class="btn btn-default btn-file blue_button2" style="padding:0"><i class="fa fa-paperclip"></i> Upload Passport & Emirates ID!</div>
<div class="clearfix"></div>
<p class="help-block">Upload Passport & Emirates ID | Max. 3Mb | PDF Only</p>
<?php endif;?>
<div class="upload-container mt-sm" id="upload-container2"></div>
<?php if($passport_visa_images):?>
<div class="image_preview">
<?php foreach ($passport_visa_images as $key=> $value):?>
<div class="image-holder">
<a target="_blank" class="preview-image-holder" href="<?php echo $passportShowPath?>/<?php echo $value->image_url?>">
View Pdf
</a>
<i class="fa fa-times-circle" aria-hidden="true" onclick="javascript:if(delConfirmation()==true){DeleteVisaFile('<?php echo $value->image_url?>','image_url',<?php echo $record->id?>)}"></i>
</div>
<?php endforeach;?>
</div>
<?php endif;?>
</div>
</div>
<div class="compose-right">
<div class="form-group mb-n">
<h3 style="margin-bottom:10px">Sponsor details</h3>
<?php if(count($sponsor_images) < 4):?>
<div id="sponsorUploadBtn" class="btn btn-default btn-file blue_button2" style="padding:0"><i class="fa fa-paperclip"></i> Upload sponsor details!</div>
<div class="clearfix"></div>
<p class="help-block">Upload sponsor details | Max. 3Mb | PDF Only</p>
<?php endif;?>
<div class="upload-container mt-sm" id="upload-container3"></div>
<?php if($sponsor_images):?>
<div class="image_preview">
<?php foreach ($sponsor_images as $key=> $value):?>
<div class="image-holder">
<a target="_blank" class="preview-image-holder" href="<?php echo $sponsorShowPath?>/<?php echo $value->image_url?>">
View Pdf
</a>
<i class="fa fa-times-circle" aria-hidden="true" onclick="javascript:if(delConfirmation()==true){DeleteSponsorFile('<?php echo $value->image_url?>','image_url',<?php echo $record->id?>)}"></i>
</div>
<?php endforeach;?>
</div>
<?php endif;?>
</div>
</div>
<div class="compose-right">
<div class="form-group mb-n">
<h3 style="margin-bottom:10px">Club Certificate</h3>
<?php if($record->image_club_certificate == NULL):?>
<div id="clubCertificateUploadBtn" class="btn btn-default btn-file blue_button2" style="padding:0"><i class="fa fa-paperclip"></i> Upload Club certificate!</div>
<div class="clearfix"></div>
<p class="help-block">Upload pdf | Max. 1Mb | PDF Only</p>
<?php endif;?>
<div class="upload-container mt-sm" id="upload-container4"></div>
<?php if($record->image_club_certificate != NULL):?>
<div class="image_preview">
<div class="image-holder">
<a target="_blank" class="preview-image-holder" href="<?php echo $clubCertiShowPath?>/<?php echo $record->image_club_certificate?>">
View PDF
</a>
<i class="fa fa-times-circle" aria-hidden="true" onclick="javascript:if(delConfirmation()==true){DeleteUserFile('<?php echo $record->image_club_certificate?>','image_club_certificate',<?php echo $record->id?>)}"></i>
</div>
</div>
<?php endif;?>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="form-group mb-n">
<label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
<div class="col-sm-6">
<input class="green_button" type="submit" id="submit_data" name="Sign In" value="Save Member Details">
</div>
</div>
<div class="clearfix"></div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php echo form_open($ctrlUrl . "/delete_file",'name="frmDelete" id="frmDelete" method="post"'); ?>
<?php echo form_hidden('delete_file',''); ?>
<?php echo form_hidden('file_name',''); ?>
<?php echo form_hidden('field_name',''); ?>
<?php echo form_hidden('member',''); ?>
<?php echo form_close(); ?>
<?php echo form_open($ctrlUrl . "/delete_profile_file",'name="frmProfilePicDelete" id="frmProfilePicDelete" method="post"'); ?>
<?php echo form_hidden('delete_file',''); ?>
<?php echo form_hidden('file_name',''); ?>
<?php echo form_hidden('field_name',''); ?>
<?php echo form_hidden('member',''); ?>
<?php echo form_close(); ?>
<?php echo form_open($ctrlUrl . "/delete_visa_file",'name="frmVisaFileDelete" id="frmVisaFileDelete" method="post"'); ?>
<?php echo form_hidden('delete_file',''); ?>
<?php echo form_hidden('file_name',''); ?>
<?php echo form_hidden('field_name',''); ?>
<?php echo form_hidden('member',''); ?>
<?php echo form_close(); ?>
<?php echo form_open($ctrlUrl . "/delete_sponsor_file",'name="frmSponsorFileDelete" id="frmSponsorFileDelete" method="post"'); ?>
<?php echo form_hidden('delete_file',''); ?>
<?php echo form_hidden('file_name',''); ?>
<?php echo form_hidden('field_name',''); ?>
<?php echo form_hidden('member',''); ?>
<?php echo form_close(); ?>
<script language="javascript">function DeleteUserFile(filename,fieldname,memberID){document.frmDelete.file_name.value=filename;document.frmDelete.field_name.value=fieldname;document.frmDelete.delete_file.value="Y";document.frmDelete.member.value=memberID;document.frmDelete.submit();}
function DeleteUserProfilePicFile(filename,fieldname,memberID){document.frmProfilePicDelete.file_name.value=filename;document.frmProfilePicDelete.field_name.value=fieldname;document.frmProfilePicDelete.delete_file.value="Y";document.frmProfilePicDelete.member.value=memberID;document.frmProfilePicDelete.submit();}
function DeleteVisaFile(filename,fieldname,memberID){document.frmVisaFileDelete.file_name.value=filename;document.frmVisaFileDelete.field_name.value=fieldname;document.frmVisaFileDelete.delete_file.value="Y";document.frmVisaFileDelete.member.value=memberID;document.frmVisaFileDelete.submit();}
function DeleteSponsorFile(filename,fieldname,memberID){document.frmSponsorFileDelete.file_name.value=filename;document.frmSponsorFileDelete.field_name.value=fieldname;document.frmSponsorFileDelete.delete_file.value="Y";document.frmSponsorFileDelete.member.value=memberID;document.frmSponsorFileDelete.submit();}
function delConfirmation(){var a=confirm("Are you sure you want to delete?");if(a==true){return true;}else{return false;}}</script>
