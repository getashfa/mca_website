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
$con = mysqli_connect("localhost","root","straifo","mca");

if (mysqli_connect_errno())
    {
        //alert("No database connection");
        print "Inside Database connection check";
        die('Could not connect to local database: ' . mysqli_connect_error());
        exit(0);
    }
             
else
    {
		print "Database connection success";
		$result = mysqli_query($con,"SELECT DATABASE()");
		
		$row = mysqli_fetch_row($result);
		print "<br>Currently connected to ".$row[0]." database";
		mysqli_free_result($result);
		
		$query_is_there ="Select roll_no from users where roll_no='124380002'";
        $query_is_nominated ="Select ldapid from candidateTable where ldapid='jayakrishnan.m'";

		print "<br>".$query_is_there." </br>";
		print "<br>".$query_is_nominated."</br>";
		

		$result_user = mysqli_num_rows(mysqli_query($con,$query_is_there));
		print "<br>There are ". $result_user." entry in the user table</br>";
		
		$result_nominated = mysqli_num_rows(mysqli_query($con,$query_is_nominated));
		print "<br>There are ".$result_nominated."entry in the nomination table</br>";
		
		if($result_user)
      		{
       			print "<br>Inside Loop 1</br>";
      			if($result_nominated)
         			{
           				print "<br>Inside Loop 2.a</br>";
           				print "<h3> You have already submitted your nomination. Don't worry,you will be informed about your candidature. Don't forget to vote :)</h3>";
		           		mysqli_close($con);	
         			}
       				else
         			{
           				print "<br><br><br><center><h3> Please wait..............Inside Loop 2.b  </h3>";
           				//query to process insert
           				$query = "INSERT INTO candidateTable (post,rollNo,name,ldapid,departmnt,prog,phone,hostel,manifesto,prop1Name,prop1_hostel,prop1_ldap,prop2Name,prop2_hostel,prop2_ldap)VALUES ('President','124380002','Jayakrishnan M','jayakrishnan.m','Educational Technology','PhD','9819469268','H1-171','I would do a. b. c.','ABCD','H1-171','abcd','HIJK','H2','hijk')";
           				
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