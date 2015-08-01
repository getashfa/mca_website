<?php 
include 'core/init.php';
protect_page();

// checkking diffrent conditons of password
if (empty($_POST) === false) {
	$required_fields = array('current_password', 'password', 'password_again');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Freld marked * are required';
			break 1;
		}
	}
	if (md5($_POST['current_password']) === $user_data['password']) {
		if (trim($_POST['password']) !== trim($_POST['password_again'])) {
			$errors[] = 'Your passwords do not match';
		} else if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be atleast 6 letters';
		}
	} else {
		$errors[] = 'You entered current password incorrect';
	}
}

include 'includes/overall/headder.php';
?>
<h1 class="pag-head">Change password</h1><br>

<?php
if (isset($_GET['success']) && empty($_GET['success'])){
		include 'includes/widgets/passwdChangSuccess.php';
}  else {
	
	if (isset($_GET['force']) === true && empty($_GET['force']) === true) {
		?>
        	<div class="warning"><p>You must change your password!.</p></div>
        <?php
		}
	
	if (empty($_POST) === false && empty($errors) === true) {
		//change password in db and redirect
		change_password($session_user_id, $_POST['password']);
		header('Location: changepassword.php?success');
	} else if (empty($errors) === false) {
		//Output errors
		include 'includes/widgets/Error.php';
	}
	?>
<link href="css/register.css" rel="stylesheet" type="text/css" media="screen">
<div id="reg-form">
	<form action="" method="post">
		<ul>
			<li>
				Current password<span id="astric">*</span>:<br>
				<input type="password" name="current_password">
			</li>
			<li>
				New password<span id="astric">*</span>:<br>
				<input type="password" name="password">
			</li>
			<li>
				Confirm password<span id="astric">*</span>:<br>
				<input type="password" name="password_again">
			</li>
			<li>
				<input type="submit" value="Change password">
			</li>
		</ul>
	</form>      
</div><!-- changepass ends here -->
		  
<?php 
}
include 'includes/overall/footer.php';	
?>