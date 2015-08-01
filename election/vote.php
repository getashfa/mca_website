<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

if(isset ($_SESSION['user_id'])){
$user_id =  $_SESSION['user_id'];
$userIP = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : getenv('REMOTE_ADDR');


//get data base conection
 $con = mysql_connect("localhost","root","straifo");
 if (!$con)
             {
                die('Could not connect to database: ' . mysql_error());
                exit(0);
             }
 mysql_select_db("mca") or die( "Mayhem Mayhem!! database alert!!!!!");
 $isVotedquery="Select mcaid from userVoteTable where mcaid='$user_id'";


  if(mysql_num_rows(mysql_query($isVotedquery))){

                 print "<h3> You have already voted. Please cast your vote next year! :) </h3>";
                 session_destroy();
                  mysql_close($con);
                 exit(0);
  }

//president query
  $qpres="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','president','$_POST[president]')";
  mysql_query($qpres) or die ("Bad query". mysql_error());

//vice president query
  $qvp1="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','vice-president-1','$_POST[vp1]')";
  mysql_query($qvp1) or die ("Bad query". mysql_error());

   $qvp2="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','vice-president-2','$_POST[vp2]')";
  mysql_query($qvp2) or die ("Bad query". mysql_error());
 

//secretary query
  $qsec="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','secretary','$_POST[secretary]')";
  mysql_query($qsec) or die ("Bad query". mysql_error());

//joint secretary -1 query
  $qjsec1="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','joint-secretary-1','$_POST[jsec1]')";
  mysql_query($qjsec1) or die ("Bad query". mysql_error());

  //joint secretary -2 query
  $qjsec2="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','joint-secretary-2','$_POST[jsec2]')";
  mysql_query($qjsec2) or die ("Bad query". mysql_error());

   //sysad query
  $qsys="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','sysad','$_POST[sysad]')";
  mysql_query($qsys) or die ("Bad query". mysql_error());

   //tresearur query
  $qtreas="INSERT INTO voteTable (mcaid,post,selCand) VALUES
                 ('$_SESSION[user_id]','treasurer','$_POST[treasurer]')";
  mysql_query($qtreas) or die ("Bad query". mysql_error());

  //insert the info that user has voted
  $dat = date("m/d/y:H:i:s",time());
  $qvoted = "INSERT INTO userVoteTable (mcaid,ip,timeStamp) VALUES
                 ('$_SESSION[user_id]','$userIP','$dat')";
mysql_query($qvoted) or die ("Bad query". mysql_error());
   mysql_close($con);
    session_destroy();
 header("location:logout.php");   

}
else
{
    echo "User id is ".$_SESSION['user_id']."<br>";
    echo "<br>Session error - contact MCA Election Committee \n or just remember THIS IS IIT!";
     session_destroy(); 
    exit (1);
}

?>
