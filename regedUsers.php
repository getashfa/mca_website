<?php
include 'core/init.php';
?>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
.user-info {
	width:900px;
	margin:0 auto;
	padding:10px 20px;
	color:#FFF;
	background: -webkit-linear-gradient(#3D8799, #14A7CC); /* For Safari 5.1 to 6.0 */
  	background: -o-linear-gradient(#3D8799, #14A7CC); /* For Opera 11.1 to 12.0 */
	background: -moz-linear-gradient(#3D8799, #14A7CC); /* For Firefox 3.6 to 15 */
	background: linear-gradient(#3D8799, #14A7CC); /* Standard syntax */
	overflow:auto;
}
.council-info {
	width:900px;
	margin:0 auto;
	padding:10px 20px;
	color:#000;
	background: -webkit-linear-gradient(#20CC4F, #39FF9B); /* For Safari 5.1 to 6.0 */
  	background: -o-linear-gradient(#20CC4F, #39FF9B); /* For Opera 11.1 to 12.0 */
	background: -moz-linear-gradient(#20CC4F, #39FF9B); /* For Firefox 3.6 to 15 */
	background: linear-gradient(#20CC4F, #39FF9B); /* Standard syntax */
}
.DP-holder {
	float:right;
}
.user-details {
	float:left;
}
.Dp-thumbnail{
	width:80px;
	height:80px;
}
.Dp-full{
	position: fixed;
	left:433px;
	top:100px;
	width:0px;
	-webkit-transition:width 0.3s linear 0s;
	-o-transition:width 0.3s linear 0s;
	-moz-transition:width 0.3s linear 0s;
	transition:width 0.3s linear 0s;
	z-index:10;
}
.Dp-thumbnail:hover + .Dp-full{
	width:500px;
}

</style>
<?php
/**************** Council members***********************/
function list_council() {
	echo "<h1>MCA Council Members</h1>";
	$query_1 = "SELECT * FROM users WHERE type = 2 ORDER BY first_name ASC";
	$result_1 = mysql_query($query_1);
	while($council_data = mysql_fetch_array($result_1)){   //Creates a loop to loop through results
		?>
		<!--------------------------------------------->
		<div class="council-info">
			<div class="user-details">
				<h4><?php echo $council_data['first_name'] . " " . $council_data['last_name'];?></h4>
				<p>email: <?php echo $council_data['email']; ?></p>
                <?php
					if (empty($council_data['mob']) === false) {
						echo "<p>Mob: " . $council_data['mob'] . "</p>";
					}
				?>
				<p>Department : <?php echo $council_data['department'];?></p>
				<p>Hostel: <?php echo $council_data['hostel'];?></p>
			</div><!-- user-deatils-->
			<div class="DP-holder">
            	<?php
					if (empty($council_data['profile']) === false) {
				?>
				<img class="Dp-thumbnail" src="<?php echo $council_data['profile']; ?>" alt="ashfaque.jpg">
				<img class="Dp-full" src="<?php echo $council_data['profile']; ?>" alt="ashfaque.jpg">
                <?php
					} else {
						echo "<img class=\"Dp-thumbnail\" src=\"images/icons/noImageAvailable.jpg\" alt=\"No Image Available\"> ";
					}
				?>
			</div><!--user-DP-->
			<div class="clearer"></div>
		</div><!--user-info-->
		<!--------------------------------------------->
		<?php
	}
	echo "<br />";
}

/************************* MCA members ********************************/
function list_members() {
	$query = "SELECT * FROM users WHERE type = 3 ORDER BY first_name ASC";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
		?>
		<!--------------------------------------------->
		<div class="user-info">
			<div class="user-details">
				<h4><?php echo $row['first_name']. " " . $row['last_name'];?></h4>
				<p>email: <?php echo $row['email']; ?></p>
                <?php
					if (empty($row['mob']) === false && $row['mob_display_yes'] == 1) {
						echo "<p>Mob: " . $row['mob'] . "</p>";
					}
				?>
				<p>Department : <?php echo $row['department'];?></p>
				<p>Hostel: <?php echo $row['hostel'];?></p>
			</div><!-- user-deatils-->
			<div class="DP-holder">
            	<?php
					if (empty($row['profile']) === false) {
				?>
				<img class="Dp-thumbnail" src="<?php echo $row['profile']; ?>" alt="ashfaque.jpg">
				<img class="Dp-full" src="<?php echo $row['profile']; ?>" alt="ashfaque.jpg">
                <?php
					} else {
						echo "<img class=\"Dp-thumbnail\" src=\"images/icons/noImageAvailable.jpg\" alt=\"No Image Available\"> ";
					}
				?>
			</div><!--user-DP-->
			<div class="clearer"></div>
		</div><!--user-info-->
		<!--------------------------------------------->
		<?php
	}
	mysql_close(); //Make sure to close out the database connection
}
/*****************************************************************************************************/
list_council();
list_members();
?>

