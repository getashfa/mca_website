<?php
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/headder.php';
?>
<h1 class="pag-head">Recover login details</h1>
<?php
if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
<br /><p>Thanks, please check you mail. We have emailed you</p>
<p>Depending on network traffic, it may take some time to send mail.</p>
<?php
} else {
	$mode_allowed = array('username', 'password');
	if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
		if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
			if (email_exists($_POST['email']) === true) {
				recover($_GET['mode'], $_POST['email']);
				header('Location: recover.php?success');
			} else {
				echo '<p>Ooops, We couldn\'t find that email address!!</p>';
			}
		}
	?>
    	<div class="recover">
		<form action="" method="post">
			<ul>
				<li>
					<br /><p>Enter your email address:</p><br>
					<input type="text" name="email">
				</li>
				<li>
					<input type="submit" value="Recover">	
				</li>
			</ul>
		</form>
        </div><!--recover-->
	<?php
	} else {
		header('Location: index.php');
		exit();
	}
}
?>