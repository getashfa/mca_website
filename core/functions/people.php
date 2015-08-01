<?php
/**************** Council members***********************/
function list_council() {
	$query_1 = "SELECT * FROM users WHERE type = 2 ORDER BY mca_member_order ASC";
	$result_1 = mysql_query($query_1);
	while($council_data = mysql_fetch_array($result_1)){   //Creates a loop to loop through results
		?>
		<!--------------------------------------------->
		<div class="council-info">
			<div class="user-details">
            	<h3><span style="color:#FFF"><?php echo $council_data['mca_posistion'];?></span></h3>
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
				<img class="Dp-thumbnail" src="<?php echo $council_data['profile']; ?>" alt="profile_pic.jpg">
				<img class="Dp-full" src="<?php echo $council_data['profile']; ?>" alt="profile_pic.jpg">
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
	//mysql_close(); //Make sure to close out the database connection
}
/*****************************************************************************************************/
?>