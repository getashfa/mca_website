<html>
<body>
<?php
$username="root";
$password="straifo";
$database="mca";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query="SELECT post,selCand,count(*) FROM voteTable group by post,selCand order by post";

$result=mysql_query($query);
$num=mysql_numrows($result);mysql_close();?>

<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Post</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Candidate</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Vote</font>
</td>
</tr>
<?php
$i=0;
while ($i < $num) 
	{
		$f1=mysql_result($result,$i,"field1");
		$f2=mysql_result($result,$i,"field2");
		$f3=mysql_result($result,$i,"field3");

<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
</td>
</tr>

		$i++;
	}
?>
</table>
</body>
</html>