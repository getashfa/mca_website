<?php
//function to protect displaying registration page once logged in
function logged_in_redirect() {
	if (logged_in() === true) {
		header('Location: index.php');
		exit();
	}
}

//function to check and allow access pages if only user is logged in
function protect_page() {
	if (logged_in() === false) {
		header('Location: protected.php');
		exit();
	}
}

// function to redirect normalusers from accessing admin page
function admin_protect() {
	global $user_data;
	if (has_access($user_data['user_id']) === false) {
		header('Location: index.php');
		exit();
	} 
}

function array_sanitize(&$item) {
	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function sanitize($data) {
	return htmlentities(strip_tags(mysql_real_escape_string($data)));
}

function output_errors($errors) {
	$output = array();
	foreach($errors as $error) {
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '<ul>';
}
?>