<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    <title>Register</title>
</head>

<body>
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$roll = $_POST['rollNo'];
$userid = $_POST['usrid'];

$con = mysql_connect("localhost","root","straifo","mca");
if (mysqli_connect_errno())
    {
        //alert("No database connection");
        print "Inside Database connection check";
        die('Could not connect to local database: ' . mysqli_connect_error());
        exit(0);
    }
             
else
    {
      //  mysqli_select_db($con,"mca") or die( "Mayhem Mayhem!! database alert!!!!!");

        //check if the guy is already there.
        $query_is_there ="Select roll_no from users where roll_no='$roll'";
        $query_is_nominated ="Select ldapid from candidateTable where ldapid='$userid'";
	
		$result_user = mysqli_num_rows(mysqli_query($con,$query_is_there));
		$result_nominated = mysqli_num_rows(mysqli_query($con,$query_is_nominated));
		
		//Debug Statements
		print "<br>Variables used have the following values:</br>";
		print '<br>$roll='.$roll.'<br>$userid='.$userid.'<br>$result_user='.$result_user.'<br>$result_nominated='.$result_nominated.'</br></br></br></br>'; 
		print '<br></br>Query 1: '.$query_is_there.'<br></br>Query 2: '.$query_is_nominated.'<br></br>';
		if($result_user)
      		{
       			if($result_nominated)
         			{
           				print "<h3> You have already submitted your nomination. Don't worry,you will be informed about your candidature. Don't forget to vote :)</h3>";
		           		mysqli_close($con);	
         			}
       			else
         			{
           				print "<br><br><br><center><h3> Please wait..............  </h3>";
           				//query to process insert
           				$query="INSERT INTO candidateTable (post,rollNo,name,ldapid,departmnt,prog,phone,hostel,manifesto,prop1Name,prop1_hostel,prop1_ldap,prop2Name,prop2_hostel,prop2_ldap)VALUES
                 		('$_POST[posit]','$_POST[rollNo]','$_POST[name]','$_POST[usrId]','$_POST[dept]','$_POST[progrm]','$_POST[phone]','$_POST[hstRoom]','$_POST[manifesto]','$_POST[prop1Name]','$_POST[prop1_hostel]','$_POST[prop1_ldap]','$_POST[prop2Name]','$_POST[prop2_hostel]','$_POST[prop2_ldap]')";
     
           				mysqli_query($con,$query) or die ("Bad query");
            
           				print "<br><br><br><center><h3> Thank you for registration. Please send your passport size photograph to iitbmca.elections@gmail.com  </h3>";
          				print "<br><br><center><h3> Also ask your proposer and seconder to send a mail to iitbmca.elections@gmail.com confirming the proposal and seconding of your candidature</h3>";

		 				mysqli_close($con);	
          			}
    		}
		else
      		{
        		print "<br><br><br><center><h3> You have not enrolled in the voters list. Please do that clicking on the enrol button first. </h3>";
            
        		mysqli_close($con);
      		}
    }
?>
</body>


</html>
