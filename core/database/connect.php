<?php
$connect_error = "<h2>sorry the server is under maintenence, please visit after some time</h2>";	//this is error message
mysql_connect('localhost', 'root', 'straifo') or die($connect_error);
mysql_select_db('mca') or die($connect_error);
?>
