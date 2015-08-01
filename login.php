<?php
// this file does the background functions of loging in of user . the form s are done in widget/login.php file.
include 'core/init.php';
logged_in_redirect();	//this is to protect displaying logging error if tried manually when logged in. find function in general.php
if (empty($_POST) === false){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a username and password';
	} else if (user_exists($username) === false) {
		$errors[] = 'we can\'t find this username';
	} else if (user_active($username) === false) {
		$errors[] = 'You have\'t activated your account';
	} else {
		$login = login($username, $password);
		if ($login === false) {
			$errors[] = ' This username / password combination is incorrect';
		}
		else if (isset($_SESSION['redirect_url'])){
			$_SESSION['user_id'] = $login;
			$redirect_url = (isset($_SESSION['redirect_url'])) ? $_SESSION['redirect_url'] : '/';
			unset($_SESSION['redirect_url']);
			header("Location: $redirect_url", true, 303);
			exit();
		} 
		else {
			$_SESSION['user_id'] = $login;
			
			header('Location: index.php');
			exit();
		}
	}

} else {
	$errors[] = 'No data received';
}
include 'includes/overall/headder.php';
include 'includes/widgets/loginerror.php';
include 'includes/overall/middile.php';
include 'includes/overall/footer.php';
?>
<h2>We tried to log you in but</h2>