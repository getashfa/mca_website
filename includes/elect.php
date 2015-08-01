<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php
$user_id =  $_SESSION['user_id'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>MCA ELECTION 2015-16</title>
    </head>
    <body>
        <form name="elect" action=vote.php method=post>
            <center><table width="600" border="3" align="center" cellpadding="10" cellspacing="10" bgcolor="#DDDDDD">
        <table colspan="5"  width="100%" border="0" cellpadding="8" cellspacing="30" bgcolor="#FFFFDD">
             <tr>
                <td colspan="5" cellpadding="6"><center><h1>Please select your candidate</h1> </center></td>
            </tr>
             <tr>
                <td colspan="5" cellpadding="6"><center><h2>&nbsp</h2> </center></td>
            </tr>
<!--President -->
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>President Post</h2> </center></td>
            </tr>

            <tr>
                    <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/President_01.jpg" height="200" width="150"><br><center><input type="radio" name="president" value="rakesh">&nbsp;Rakesh V</td>
                    
                    
                                <td width="20%" ></td>
                               <!-- <td width="20%" ><center><img src="MCAimages/aruna.jpg"  height="200" width="150"><br><input type="radio" name="president" value="aruna">&nbsp;Aruna B M</td>
                                     <td width="20%" ></td>
                                    </tr>


              <tr>
                  <tr>-->
                      <td width="20%" ></td>
                      <td width="20%" ></td>
                          <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="president" value="none" checked >&nbsp;Mr/Ms X </td>
                      <td width="20%" ></td>
                      <td width="20%" ></td>
                  </tr>
                <td colspan="5" cellpadding="6"><center><h2>&nbsp</h2> </center></td>
            </tr>

            
<!--vice president -->
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>Vice president  Post 1</h2> </center></td>
            </tr>

            <tr>
                <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/ViceP_01.jpg" height="200" width="150"><br><center><input type="radio" name="vp1" value="arjun">&nbsp;Arjun Sasi </td>
                        <td width="20%" ></td>


                        <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="vp1" value="none" checked>&nbsp;Mr/Ms X </td>
                        <td width="20%" ></td>

            </tr>
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>Vice president (Female)  Post 2</h2> </center></td>
            </tr>

            <tr>
                <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/ViceP_02.jpg" height="200" width="150"><br><center><input type="radio" name="vp2" value="lakshmim">&nbsp;Lakshmi Mahadevan </td>
                        <td width="20%" ></td>


                        <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="vp2" value="none" checked >&nbsp;Mr/Ms X </td>
                        <td width="20%" ></td>

            </tr>


              <tr>
                <td colspan="5" cellpadding="6"><center><h2>&nbsp</h2> </center></td>
            </tr>


<!--Secretary -->
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>Secretary Post</h2> </center></td>
            </tr>

            <tr>
                <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/Secretary_01.jpg" height="200" width="150"><br><center><input type="radio" name="secretary" value="jishnu">&nbsp;Jishnu T R</td>
                        <td width="20%" ></td>

            
                        <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="secretary" value="none" checked >&nbsp;Mr/Ms X </td>
                        <td width="20%" ></td>
                        
            </tr>

              <tr>
                <td colspan="5" cellpadding="6"><center><h2>&nbsp</h2> </center></td>
            </tr>
<!--Joint Secretary -->
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>Joint Secretary  Post 1</h2> </center></td>
            </tr>

            <tr>
                <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/JointSecy_01.jpg" height="200" width="150"><br><center><input type="radio" name="jsec1" value="joel">&nbsp;Joel Jose </td>
                        <td width="20%" ></td>


                        <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="jsec1" value="none" checked>&nbsp;Mr/Ms X </td>
                        <td width="20%" ></td>

            </tr>
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>Joint Secretary (Female)  Post 2</h2> </center></td>
            </tr>

            <tr>
                <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/JointSecy_02.jpg" height="200" width="150"><br><center><input type="radio" name="jsec2" value="anusha">&nbsp;Anusha Parayil</td>
                        <td width="20%" ></td>


                        <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="jsec2" value="none" checked>&nbsp;Mr/Ms X </td>
                        <td width="20%" ></td>

            </tr>


              <tr>
                <td colspan="5" cellpadding="6"><center><h2>&nbsp</h2> </center></td>
            </tr>

<!--Treseurer -->
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>Treasurer Post</h2> </center></td>
            </tr>

            <tr>
                <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/Treasurer_01.jpg" height="200" width="150"><br><center><input type="radio" name="treasurer" value="jithin">&nbsp;Jithin Raj</center> </td>
                        <td width="20%" ></td>


                        <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="treasurer" value="none" checked>&nbsp;Mr/Ms X </td>
                        <td width="20%" ></td>

            </tr>

              <tr>
                <td colspan="5" cellpadding="6"><center><h2>&nbsp</h2> </center></td>
            </tr>



<!--Sysad -->
            <tr>
                <td colspan="5" cellpadding="6"><center><h2>SYSAD Post</h2> </center></td>
            </tr>

            <tr>
                <td width="20%" ></td>
                <td width="20%" ><img src="MCAimages/Sysad.jpg" height="200" width="150"><br><center><input type="radio" name="sysad" value="ashfaque">&nbsp;Ashfaque Ahammed </td>
                        <td width="20%" ></td>


                        <td width="20%" ><center><img src="MCAimages/MrX.png"  height="200" width="150"><br><input type="radio" name="sysad" value="none" checked>&nbsp;Mr/Ms X </td>
                        <td width="20%" ></td>

            </tr>

              <tr>
                <td colspan="5" cellpadding="6"><center><h2>&nbsp</h2> </center></td>
            </tr>

            <tr>
                  <td width="20%" ></td>
                    <td width="20%" ></td>
                    <td width="20%" > <center><input type="submit" class="button" value="Vote!" /></center></td>
                        <td width="20%" ></td>
                          <td width="20%" ></td>

            </tr>

            </table>
</table>
            </form>




                                        <?php
                                        // put your code here
                                        ?>
                                        </body>
                                        </html>
