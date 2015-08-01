<?php
$prog = array ('B.Tech','DD','M.Tech','MBA','M.Sc','M.DES','PhD','Others');
$posit = array ('President', 'Vice-President','Secretary','Joint-Secretary','System Administrator');
function generateSelect($name = '', $options = array()) {
	$html = '<select name="'.$name.'">';
	foreach ($options as $option => $value) {
		$html .= '<option value='.$value.'>'.$value.'</option>';
	}
	$html .= '</select>';
	return $html;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="ltr">
    <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta http-equiv="Content-Style-Type" content="/text/css; charset=utf-8">
    <script language="JavaScript" type="text/javascript">
   
   <!--style type="text/css"-->
   /*blankrow
   {
      height: 10px !important; 
      background-colour: #FFFFFF;
   }*/
  /* table { display: inline-block; vertical-align: top; border: 1px solid;}
   </style>

  <!--[if lte IE7]>
      <style>
         table.ieh-fl {float:left;}
      </style>
 <![endif]-->*/

 function validateForm(oForm)
 {
 	
        //oForm refers to the form which you want to validate
 	oForm.onsubmit = function() // attach the function to onsubmit event
 	{
 		
               
                var mesg = "";
 		if(oForm.elements['rollNo'].value.length<1)
 		{

                        mesg = mesg +"Please fill your Roll Number \n";
                       
 		}
		
		if(oForm.elements['name'].value.length<1)
 		{

                        mesg = mesg +"Please fill your Name \n";
                       
 		}

                if(oForm.elements['dept'].value.length<1)
 		{

                        mesg = mesg + "Please fill your department \n";

 		}



                   if(oForm.elements['hstRoom'].value.length<1)
 		{

                        mesg = mesg + "Please fill your Hostel room \n";

 		}
                   if(oForm.elements['phone'].value.length<10 )
 		{
	
			if(oForm.elements['phone'].value.length<1 ){
			 mesg = mesg + "You forgot to enter your Pone number  \n";	
			}else{                       
			 mesg = mesg + "You have entered an invalid Phone number  \n";
			}
 		}


                if(mesg!="")
                {
                     alert(mesg);
                     return false;
                } 
 		
 		return true;
 	}
 }
 </script>
        <title></title>
    <title>Candidate Registration</title>



</head>

<body>
<p></p>
<h1>MCA Election Nomination Form - IIT Bombay</h1>
<p></p>
<p></p>
<hr/>
<p></p>
<form name="candidate" action="accepted.php" method=post>
<table class="ieh-fl">
<tr>

<td><label for="posit">POST CONTESTING FOR:</label></td>
<?php
$html = generateSelect('posit', $posit);
echo '<td>'.$html. '</td>';

?>

</tr>
    <tr>
<td width="250">Roll Number:</td>
<td width="247"><input name="rollNo" size="16" autocomplete="off" value="" type="text" /></td>

</tr>
    <tr>
<td width="250">LDAP Id:</td>
<td width="247"><input name="usrid" size="16" autocomplete="off" value="" type="text" /></td>

</tr>
    
    
    <tr>
<td width="250">Name:</td>
<td width="247"><input name="name" size="30" autocomplete="off" value="" type="text" /></td>

</tr>

<tr>
<td>Department:</td>
<td><input name="dept" size="100" type="text" /></td>

</tr>
<tr>

<td><label for="progrm">Programme:</label></td>
<?php
$html = generateSelect('progrm', $prog);
echo '<td>'.$html. '</td>';

?>

</tr>
<tr>

<td>Hostel-Room Number:</td>
<td><input name="hstRoom" size="30" type="text" /></td>

</tr>

<tr>

<td>Mobile:</td>
<td><input name="phone" size="30" maxlength="10" /></td>

</tr>

<tr>
   <td colspan=3>&nbsp;</td>
</tr>

<<tr>
<td>In a few lines, write what you propose to do if you are elected to this post (100 words max)</td>
<td><textarea name="manifesto" cols="130" rows="10"></textarea></td>

</tr>

<tr>
   <td colspan=3>&nbsp;</td>
</tr>

<tr> <td style="font-weight:bold" align="center">PROPOSER</td></tr>
<tr>
<td>Proposer Name:</td>
<td><input name="prop1Name" size="30" type="text"/></td>
</tr>

<tr>
<td>Proposer Ldap:</td>
<td><input name="prop1_ldap" size="30" autocomplete="off" value="" type="text" /></td>
</tr>

<tr>

<td>Proposer Hostel-Room Number:</td>
<td><input name="prop1_hostel" size="30" type="text" /></td>

<tr>
   <td colspan=3>&nbsp;</td>
</tr>
<tr> <td style="font-weight:bold" align="center">SECONDER</td></tr>

<tr>
<td>Seconder Name:</td>
<td><input name="prop2Name" size="30" type="text"/></td>
</tr>

<tr>
<td>Seconder Ldap:</td>
<td><input name="prop2_ldap" size="30" autocomplete="off" value="" type="text" /></td>
</tr>

<tr>

<td>Seconder Hostel-Room Number:</td>
<td><input name="prop2_hostel" size="30" type="text" /></td>

</tr>
 <br><br>
<tr>
 <br><br>
<tr>
</tr>
<tr></tr> <tr></tr><tr></tr><tr></tr> <tr></tr>
</table>
</table>


<h2><p align="center">Undertaking</h2>
<p>I hereby declare that the information given above is true to the best of my knowledge. I promise to abide by the rules and regulations governing the election.</p>
<p><input type="submit" class="button" value=“Submit“ /></p>
</form>

<tr>&nbsp</tr>
<tr>&nbsp</tr>
<tr>&nbsp</tr>
<tr>&nbsp</tr>
<tr>&nbsp</tr>
<tr>&nbsp</tr>
<tr>&nbsp</tr>
<tr>&nbsp</tr>
<hr/>
<p>Please contact iitbmca.elections@gmail.com for any queries</p>
</body>
 <script language="JavaScript">
 new validateForm(document.forms['candidate']);
 </script>

</html>
