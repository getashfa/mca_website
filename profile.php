<?php 
include 'core/init.php';
include 'includes/overall/headder.php';

if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
	$username		= $_GET['username'];
	if (user_exists($username) === true) {
		$user_id		= user_id_from_username($username);
		$profile_data	= user_data($user_id, 'first_name', 'last_name', 'email', 'profile');
	?>
		<div id="">    
			<h1 class="pag-head"><?php echo $profile_data['first_name']; ?>'s Profile</h1>
			<p><?php echo $profile_data['email']; ?></p>
		</div>
        
        <div class="profpic">
			<?php
            		if (empty($profile_data['profile']) === false) {
                        echo '<img src="', $profile_data['profile'], '" alt="', $user_data['first_name'], '\'s profile image">';
            		}
			?>
        </div>
        
	<?php
	
	} else {
		echo 'Sorry, that user doesn\'t exist!';
	}
	
} else {
	header('Location: index.php');
	exit();
}
	

include 'includes/overall/footer.php';

?>