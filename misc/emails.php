<?php

			$image_path = "http://" .$_SERVER["HTTP_HOST"]."/images";
			$txt_site_name = $_SERVER["HTTP_HOST"];
			$host_url = "http://" .$_SERVER["HTTP_HOST"]."/en";


$id_card_email = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
      <table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
        <tbody>
          <tr>
            <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
                <tr>
                  <td align='left' valign='top'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align='left' valign='middle' style='background-color:#B83954'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                            <tr>
                              <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>Swimming Federation UAE</td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                            <tr>
                              <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear
                                 member,</b></font></p>
                                <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Admin contacted you from <strong>$txt_site_name</strong>

                                  Below are details: <strong><br>
                                    --------------------<br>
        <br>

        We have generated the id card for you please find the attachment with this email.<br>
        <br />
                                  Wishing you the
                                  best.</font></p>
                                <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                              <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align='left' valign='bottom' style='background-color:#B83954;font-size:2px;height:2px;'>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                      </tr>
                      <tr>
                        <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                            <tr>
                              <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                                This has been generated upon request and not a part of spam mails.</td>
                            </tr>
                          </table></td>
                      </tr>


                      <tr>
                        <td align='left' valign='bottom'>&nbsp;</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='top'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
        </tbody>
      </table>
      </body>";

$new_password_reset = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#B83954'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>Swimming Federation UAE</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear
                            $full_name,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Admin contacted you from <strong>$txt_site_name</strong> (Contact us Form).

                            <br>
                            Your new password is here  <strong><br>
                              --------------------<br>
  <br>

  <strong>Password :</strong> $password<br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#B83954;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";

$common_message_format = "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#B83954'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>Swimming Federation UAE</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear
                            Club,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Admin contacted you from <strong>$txt_site_name</strong> (Contact us Form).

                            <br>
                            Your new password is here  <strong><br>
                              --------------------<br>
  <br>

	<strong>Message :</strong> $message_body<br>

  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#B83954;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>


                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";

$loginUrl = HOST_URL . '/' . CLUB_URL . '/Login';

$activation_email =  "<body leftmargin='0' topmargin='0' style='background-color:#E2E2E2'>
<table border='0' cellSpacing='0' cellPadding='0' width='100%' leftmargin='0' topmargin='0'>
  <tbody>
    <tr>
      <td vAlign='top' align='center'><table width='700' border='0' align='center' cellpadding='0' cellspacing='0' bgColor='#E2E2E2'>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
          <tr>
            <td align='center' valign='top'><table width='600' border='0' cellspacing='0' cellpadding='0'>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#4D924F;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#B83954'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:18px;color:#FFF;font-style:italic'>Swimming Federation UAE</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle'><table width='100%' border='0' align='center' cellpadding='10' cellspacing='5' bgcolor='#FFF'>
                      <tr>
                        <td align='left' valign='top' style='color:#555'><p><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><font size='5'>D</font><b>ear
                            $full_name,</b></font></p>
                          <p><font size='2' face='Verdana, Arial, Helvetica, sans-serif'>Admin contacted you from <strong>$txt_site_name</strong> (Contact us Form).

                            <br>
                            Your account details area here  <strong><br>
                              --------------------<br>
  <br>

  <strong>Name :</strong> $full_name<br>
	<strong>Club Code :</strong> $club_code<br>
	<strong>Username :</strong> $username<br>
	<strong>Password :</strong> $password<br>
	<strong>Login url :</strong> <a href='$loginUrl' target='_blank'>Club Admin Panel</a><br>
  <br />
                            Wishing you the
                            best.</font></p>
                          <p><font face='Verdana, Arial, Helvetica, sans-serif' size='5'>S</font><font face='Verdana, Arial, Helvetica, sans-serif' size='2'><b>incerely,</b><br />
                        <font color='#000066'><a href='http://$txt_site_name' style='color:#555'>$txt_site_name</a></font></font></p></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='background-color:#B83954;font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='bottom' style='font-size:2px;height:2px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td align='left' valign='middle' style='background-color:#FFF'><table width='600' border='0' align='center' cellpadding='10' cellspacing='2'>
                      <tr>
                        <td align='left' valign='middle' style='font-family:Georgia;font-size:11px;color:#666;font-style:italic'>This mail is automatically sent to you by $txt_site_name. Please do not reply to this email. <br />
                          This has been generated upon request and not a part of spam mails.</td>
                      </tr>
                    </table></td>
                </tr>

                <tr>
                  <td align='left' valign='bottom'>&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align='left' valign='top'>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
  </tbody>
</table>
</body>";
