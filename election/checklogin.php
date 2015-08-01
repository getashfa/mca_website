<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

// username and password sent from form
$userid=$_POST['ldapid'];
$roll=$_POST['rollNo'];
$password=$_POST['password'];

$ldapserver = "ldap.iitb.ac.in";
$ldapport =389;

//echo 'poda';
//print "<center><h1>LDAP Authentication for <font color=#ff00ff> " . $userid. $password. " </font></h1><p>";

//$ldaphost = "ldaps://ldap.iitb.ac.in:389";

//$ldapconn = ldap_connect($ldaphost) ;

$ldapconn = ldap_connect("ldap.iitb.ac.in",389) or die("Could not connect to server");

if(!$ldapconn)
    {
    print "<br>Connection error";
    exit(0);
    }

$bind_rdn = "uid=" . $userid . ",ou=people,dc=iitb,dc=ac,dc=in" ;
//$bind = ldap_bind($ldapconn,$bind_rdn,$password);
//Debug Line 1
print "$bind_rdn";

/*$bind = ldap_bind($ldapconn);
 if (!$bind){

     //throw error
     print "<h3><font color=#ff0000>bind error (Unknown user or password)<font>";
     exit(0);
     }
     else{
         //update

        $base_dn = "ou=people,dc=iitb,dc=ac,dc=in";
		$filter = "uid=" . $userid;
		$inforequired = array("uid", "dn");
		$result = ldap_search($ldapconn,$base_dn,$filter,$inforequired);
        $info = ldap_get_entries($ldapconn,$result);
        ldap_unbind($ldapconn);
        
        if(!$result){
             print "<h3><font color=#ff0000> No user found - are you trying to fool us?<font>";
         }
         
         if ($info["count"]==0){
             
            print "<br>Oh (wo)man!, wrong id---got amnesia?";
			exit(0);
         }

         //make new connection for uid recived
         $userUID =$info[0]["dn"];

  //       echo $userUID;
         $ldapconn2 = ldap_connect("ldap.iitb.ac.in",389) or die("Could not connect to server");
         $bindUser =ldap_bind($ldapconn2,$userUID,$password);
         if(!$bindUser){
            print "<h3> Dude! don't know your password?</h3>";
         }
         else{
             //save the other details
             $con = mysql_connect("localhost","root","straifo");
             if (!$con)
             {
                die('Could not connect to database: ' . mysql_error());
                exit(0);
             }
             mysql_select_db("mca") or die( "Mayhem Mayhem!! database alert!!!!!");
			
			// Debug Line
			print "Reached selection of db";
				
             //check if the guy is already there.
             $query_is_there ="Select roll_no from users where roll_no = '$roll'";

          /*   if(mysql_num_rows(mysql_query($query_is_there))){
                mysql_close($con);
                //redirect
                session_start();
                $_SESSION['userid'] =$userid;
               // echo $_SESSION['userid'];

               header("location:elect.php");
        
             }else{
                 mysql_close($con);
                 print "<h3> you have not registered. Please contact iitbmca.elections@gmail.com  </h3>";
             }*/
         }
     }
?>
