<?php
session_start();
error_reporting(0);	//this is to avoid giving error details to users. security issue
require 'database/connect.php';
require 'functions/general.php';
require 'functions/users.php';
require 'functions/media.php';
require 'functions/people.php';
require 'functions/mca_mail.php';
$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);

if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'gender', 'username', 'password', 'password_recover', 'first_name', 'last_name', 'email', 'mob', 'mob_display_yes', 'profile', 'hostel', 'issued_book_count');
	/*the method shown above is the easiest method to retrive information from database. if you add new field in db, add it in the above line and 
	will be able to get data form that.
	eg: echo $user_data['first_name'];*/
	
	if (user_active($user_data['username']) === false) {		//this is to force logout users which deactivated while browsing
	session_destroy();
	header('Location: index.php');
	exit();
	}
	
	
	if ($current_file !== 'changepassword.php' && $user_data['password_recover'] == 1) {
		header('Location: changepassword.php?force');
		exit();
	}
}
$errors = array();
//print_r($_SESSION);
?>
