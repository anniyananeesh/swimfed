<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">
        <div class="forms">
            <div class="row">
                <h3 class="title1"> Add Member  <span>Please add all the mentatory informations</span></h3>
                <div class="form-three widget-shadow">

                    <?php $this->load->view(CLUB_VIEWS . '/members/tabs.php', array('activeTab' => $activeTab))?>

                    <!--******TAB CONTEND************-->
                    <div class="tabcontent">

                        <!--******FORM PLAYER START************-->
                        <div class="tab-pane" id="home">

                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                <?php $this->load->view('shared/alerts');?>
                                <?php $this->load->view('shared/flash-message');?>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">First Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="first_name" name="first_name" placeholder="***** Athletic Club" value="<?php echo ($post['first_name'] != NULL && $post['first_name'] != '') ? $post['first_name'] : '';?>">
                                            <?php if(form_error('first_name')):?>
                                                <div class="error" ><?php echo form_error('first_name');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Last Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="last_name" name="last_name" placeholder="***** Athletic Club" value="<?php echo ($post['last_name'] != NULL && $post['last_name'] != '') ? $post['last_name'] : '';?>">
                                            <?php if(form_error('last_name')):?>
                                                <div class="error" ><?php echo form_error('last_name');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Father Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="father_name" name="father_name" placeholder="***** Athletic Club" value="<?php echo ($post['father_name'] != NULL && $post['father_name'] != '') ? $post['father_name'] : '';?>">
                                            <?php if(form_error('father_name')):?>
                                                <div class="error" ><?php echo form_error('father_name');?></div>
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
                                                <div class="error" ><?php echo form_error('gender');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <!--DATE PICKER-->
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Date of Birth</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control1" id="dob" name="dob" placeholder="MM/DD/YY" value="<?php echo ($post['dob'] != NULL && $post['dob'] != '') ? $post['dob'] : '';?>">
                                            <?php if(form_error('dob')):?>
                                                <div class="error" ><?php echo form_error('dob');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Passport Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="passport_no" name="passport_no" placeholder="" value="<?php echo ($post['passport_no'] != NULL && $post['passport_no'] != '') ? $post['passport_no'] : '';?>">
                                            <?php if(form_error('passport_no')):?>
                                                <div class="error" ><?php echo form_error('passport_no');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <!--DATE PICKER-->
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Passport Expiry Date</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control1" name="passport_expiry" id="passport_expiry" placeholder="DD/MM/YY" value="<?php echo ($post['passport_expiry'] != NULL && $post['passport_expiry'] != '') ? $post['passport_expiry'] : '';?>">
                                            <?php if(form_error('passport_expiry')):?>
                                                <div class="error" ><?php echo form_error('passport_expiry');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <!--COUNTRY-->
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
                                                <div class="error" ><?php echo form_error('country');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="selector1" class="col-sm-4 control-label">Current Emirate</label>
                                        <div class="col-sm-8">
                                            <select name="emirate" id="emirate" class="form-control1">
                                                <option value="Abu Dhabi" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Abu Dhabi') ? 'selected' : '';?>>Abu Dhabi</option>
                                                <option value="Dubai" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Dubai') ? 'selected' : '';?>>Dubai</option>
                                                <option value="Sharjah" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Sharjah') ? 'selected' : '';?>>Sharjah</option>
                                                <option value="Ajman" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Ajman') ? 'selected' : '';?>>Ajman</option>
                                                <option value="Ras Al Khaima" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Ras Al Khaima') ? 'selected' : '';?>>Ras Al Khaima</option>
                                                <option value="Fujairah" <?php echo (isset($post['emirate']) && $post['emirate'] == 'Fujairah') ? 'selected' : '';?>>Fujairah</option>
                                            </select>

                                            <?php if(form_error('emirate')):?>
                                                <div class="error" ><?php echo form_error('emirate');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">City</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="city" name="city" placeholder="" value="<?php echo ($post['city'] != NULL && $post['city'] != '') ? $post['city'] : '';?>">
                                            <?php if(form_error('city')):?>
                                                <div class="error" ><?php echo form_error('city');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="focusedinput" class="col-sm-4 control-label">Mobile Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" id="contact_no" name="contact_no" placeholder="05" value="<?php echo ($post['contact_no'] != NULL && $post['contact_no'] != '') ? $post['contact_no'] : '';?>">
                                            <?php if(form_error('contact_no')):?>
                                                <div class="error" ><?php echo form_error('contact_no');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="smallinput" class="col-sm-4 control-label label-input-sm">Descipline</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1 input-sm" id="discipline" name="discipline" placeholder="" value="<?php echo ($post['discipline'] != NULL && $post['discipline'] != '') ? $post['discipline'] : '';?>">
                                            <?php if(form_error('discipline')):?>
                                                <div class="error" ><?php echo form_error('discipline');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group mb-n">
                                        <label for="largeinput" class="col-sm-4 control-label label-input-lg">Role</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1 input-lg" id="role" name="role" placeholder="" value="<?php echo ($post['role'] != NULL && $post['role'] != '') ? $post['role'] : '';?>">
                                            <?php if(form_error('role')):?>
                                                <div class="error" ><?php echo form_error('role');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="txtarea1" class="col-sm-4 control-label">Note</label>
                                        <div class="col-sm-8">
                                            <textarea name="note" id="note" cols="50" rows="8" class="form-control3"><?php echo ($post['note'] != NULL && $post['note'] != '') ? $post['note'] : '';?></textarea>
                                            <?php if(form_error('note')):?>
                                                <div class="error" ><?php echo form_error('note');?></div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">

                                    <div class="compose-right">

                                        <div class="form-group mb-n">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload Passport size photo!
                                                <input type="file" name="userfile" id="userfile">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/avatar.png" alt="">
                                        </div>

                                    </div>

                                    <div class="compose-right">

                                        <div class="form-group mb-n">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload Passport front page
                                                <input type="file" name="passportfront" id="passportfront">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/passport.jpg" alt="">
                                        </div>

                                    </div>

                                    <div class="compose-right">

                                        <div class="form-group mb-n">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload Passport visa page
                                                <input type="file" name="passportvisa" id="passportvisa">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/visa.jpg" alt="">
                                        </div>

                                    </div>

                                    <div class="compose-right">

                                        <div class="form-group">
                                            <div class="btn btn-default btn-file blue_button2">
                                                <i class="fa fa-paperclip"></i> Upload your ID card!
                                                <input type="file" name="idcard" id="idcard">
                                            </div>
                                            <p class="help-block">Upload Passport size photo! | Max. 1Mb</p>
                                        </div>

                                        <div class="member_img">
                                            <img src="<?php echo ADMIN_IMG_PATH?>/id_icon.jpg" alt="">
                                        </div>

                                    </div>

                                </div>
                                <div class="clearfix"></div>

                                <div class="form-group mb-n">
                                    <label for="largeinput" class="col-sm-2 control-label label-input-lg">&nbsp;</label>
                                    <div class="col-sm-6 ">
                                        <input class="green_button" type="submit" name="Sign In" value="Save Member Details">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </form>

                        </div>
                        <!--******FORM PLAYER END************-->

                    </div>
                    <!--/*TAB END*/-->

                </div>

            </div>

        </div>

    </div>

</div>
