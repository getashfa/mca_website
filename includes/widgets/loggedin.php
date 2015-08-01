<link href="../../css/loggedin.css" rel="stylesheet" type="text/css" />
<div id="nav-wrapper">
<div id="nav-menu">
	<ul>
    	<li>
        	<a href="#">
            <?php if (empty($user_data['profile']) === false) {
				 ?>
            <img src="<?php echo $user_data['profile']; ?>" height="35" width="40" align="absmiddle"/>
            <?php }else {
					if ($user_data['gender'] === 'male') {
					?>
            			<img src="images/icons/user_male.png" height="35" width="40" align="absmiddle"/>
           			<?php
					} else if ($user_data['gender'] === 'female') {
					?>
            			<img src="images/icons/user_female.png" height="35" width="40" align="absmiddle"/>
           			<?php	
					}
					} ?>
              <?php echo $user_data['first_name']; ?> &#9660;</a>
            	<ul>
                	<!--<li><a href="<?php echo $user_data['username']; ?>">Profile</a></li>-->
                	<li><a href="accSettings.php">Account settings</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <?php if (admin_rights($user_data['username']) === true) { ?>
								<li><a href="admin_control.php">Administration</a></li> <?php } ?>
                    <li><a href="logout.php">Logout</a></li>
                </ul><!-- nested UL ends here -->
        </li><!-- main LI ends here -->
    </ul><!-- main UL ends here -->
    <br class="clear-float" />
</div><!-- nav-menu ends here -->
</div><!-- nav-wrapper ends here -->
</div><!-- headding ends here -->
</div><!--heading-wrapper-->