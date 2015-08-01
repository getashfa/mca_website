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
$userid = $_POST['usrId'];
$password = $_POST['psswrd'];
$ldapserver = "ldap.iitb.ac.in";
$ldapport =389;

print "Inside checking file";
$ldapconn = ldap_connect("ldap.iitb.ac.in",389) or die("Could not connect to server");
if(!$ldapconn)
    {
    	echo $userid;
	print "<center><h1>Connection error</h1><p>";
    exit(0);
    }
else 
    { 
        echo $userid;
	print "Connection Success";
    }


$bind_rdn = "uid=" . $userid . ",ou=people,dc=iitb,dc=ac,dc=in" ;
$bind = ldap_bind($ldapconn);
 if (!$bind){

     //throw error
     print "<center><h3><font color=#ff0000>bind error (Unknown user or password)</font>";
     exit(0);
     }else{
         //update
        print "<center><h3><font color=#ff0000>Bind Successful (Check mysql connection)</font>"
        $base_dn = "ou=people,dc=iitb,dc=ac,dc=in";
	$filter = "uid=" . $userid;
	$inforequired = array("uid", "dn");
	$result = ldap_search($ldapconn,$base_dn,$filter,$inforequired);
        $info = ldap_get_entries($ldapconn,$result);
        ldap_unbind($ldapconn);
        if(!$result){
             print "<center><h3><font color=#ff0000> No user found in LDAP- are you trying to fool us?<font>";
         }
         if ($info["count"]==0){
             print "<center><h3><font color=#ff0000>Oh (wo)man!</font>, wrong id---got amnesia?</h3><p>";
		exit(0);
         }

         //make new connection for uid recived
         $userUID =$info[0]["dn"];
         echo $userUID;
         $ldapconn2 = ldap_connect("ldap.iitb.ac.in",389) or die("Could not connect to server");
         $bindUser =ldap_bind($ldapconn2,$userUID,$password);
         if(!$bindUser){
            print "<center><p><h3> Dude! don't know your password?</h3><p>";
         }else{
             //save the other details
             $con = mysql_connect("localhost","root","straifo");
             if (!$con)
             {
                die('Could not connect to local database: ' . mysql_error());
                exit(0);
             }
             mysql_select_db("mca") or die( "Mayhem Mayhem!! database alert!!!!!");

             //check if the guy is already there.
             $query_is_there ="Select roll_no from users where roll_no='$rollNo'";
             $query_is_nominated ="Select ldapid from candidateTable where ldapid='$userid'";

if(mysql_num_rows(mysql_query($query_is_there)))
      {
       if(mysql_num_rows(mysql_query($query_is_nominated)))
         {
           print "<h3> You have already submitted your nomination. Don't worry,you will be informed about your candidature. Don't forget to vote :)</h3>";
		           mysql_close($con);	
         }
       else
         {
           print "<br><br><br><center><h3> Please wait..............  </h3>";
           //query to process insert
           $query="INSERT INTO candidateTable (post,rollNo,name,ldapid,departmnt,prog,phone,hostel,manifesto,prop1Name,prop1_hostel,prop1_ldap,prop2Name,prop2_hostel,prop2_ldap)VALUES
                 ('$_POST[posit]','$_POST[rollNo]','$_POST[name]','$_POST[usrId]','$_POST[dept]','$_POST[progrm]','$_POST[phone]','$_POST[hstRoom]','$_POST[manifesto]','$_POST[prop1Name]','$_POST[prop1_hostel]','$_POST[prop1_ldap]','$_POST[prop2Name]',$_POST[prop2_hostel]','$_POST[prop2_ldap]')";
     
           mysql_query($query) or die ("Bad query");
            
           print "<br><br><br><center><h3> Thank you for registration. Please send your passport size photograph to iitbmca.elections@gmail.com  </h3>";
          print "<br><br><center><h3> Also ask your proposer and seconder to send a mail to iitbmca.elections@gmail.com confirming the proposal and seconding of your candidature</h3>"

		 mysql_close($con);	
          }
      }
else
      {
        print "<br><br><br><center><h3> You have not enrolled in the voters list. Please do that clicking on the enrol button first. </h3>";
            
        mysql_close($con);
      }



         }
         
     }

?>
</body>


</html>
