<?php
//recover username and password
function recover($mode, $email) {
	$mode = sanitize($mode);
	$email = sanitize($email);
	$user_id = user_id_from_email($email);
	$user_data = user_data($user_id, 'user_id', 'first_name', 'username');
	if ($mode === 'username') {
		//recover username
		sendMail("$email", "MCA-website username recovery mail", "Hello " . $user_data['first_name']. ", \n\n Your username for mca page is " . $user_data['username'] . "\n\n~MCA, IIT Bombay");
		
	} else if ($mode === 'password') {
		//recover password
		$generated_password = substr(md5(rand(999, 999999)), 0, 8);
		change_password($user_data['user_id'], $generated_password);	//changing password with new genrated password
		
		//this is to force user to change password after resetting password
		mysql_query("UPDATE `users` SET `password_recover` = 1 WHERE `user_id` = $user_id");
		
		sendMail("$email", "MCA-website password reset mail", "Hello " . $user_data['first_name']. ", \n\n Your password for mca page is reset and the new password is  " . $generated_password . ". Please change your password after logging in.\n\n~MCA, IIT Bombay");
	}
}
//function to validate current user have any special rights or not
function has_access($user_id, $type) {
	$user_id	=(int)$user_id;
	$type		=(int)$type;
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = $user_id AND `type` = $type"), 0) == 1) ? true : false;
}

//functon used to update / add profile pic
function change_profile_image($user_id, $file_temp, $file_extn) {
	$file_path = 'images/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extn;	// taking current time -> md5 hashing -> and we change to a length of 10 charector ->adding file extension
	move_uploaded_file($file_temp, $file_path);
	mysql_query("UPDATE `users` SET `profile` = '" .  mysql_real_escape_string($file_path) .  "' WHERE `user_id` = " . (int)$user_id );
}

function update_user($update_data) {
	global $session_user_id;
	$update = array();
	array_walk($update_data, 'array_sanitize');
	
	foreach($update_data as $field=>$data) {
		$update[] = '`' . $field . '` = \'' . $data . '\'';
	}
	
	//updating a user by quireing
	mysql_query("UPDATE `users` SET " . implode(', ', $update) . "WHERE `user_id` = $session_user_id");
}


function change_password($user_id, $password) {
	$user_id = (int)$user_id;
	$password = md5($password);
	
	mysql_query("UPDATE `users` SET `password` = '$password', `password_recover` = 0 WHERE `user_id` = $user_id");
}

function register_user($register_data) {
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	
	//creating a user by quireing
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
}


function user_activation_pending() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 0"), 0);	
}

function user_count() {
	return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `active` = 1"), 0);	
}

function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;	//makeing sure user id is intiger.
	
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {	//removing or avoiding user_id, if other details are there.
		unset($func_get_args[0]);
		
		$fields ='`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;	//returning all details of user 
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");	//dont confuse with backtick(`) and quotations(')
	return (mysql_result($query, 0) == 1) ? true : false;	//here any thing just after ? is taken if condition valid, if fails anything after":" will taken.
}

function email_exists($email) {
	$email = sanitize($email);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");	//dont confuse with backtick(`) and quotations(')
	return (mysql_result($query, 0) == 1) ? true : false;	//here any thing just after ? is taken if condition valid, if fails anything after":" will taken.
}

function roll_no_exists($roll_no) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `roll_no` = '$roll_no'");	//dont confuse with backtick(`) and quotations(')
	return (mysql_result($query, 0) == 1) ? true : false;	//here any thing just after ? is taken if condition valid, if fails anything after":" will taken.
}
function admin_rights($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `type` < 3");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_active($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function user_id_from_username($username) {
	$username = sanitize($username);
	$query = mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");
	return mysql_result($query, 0, 'user_id');
}

function user_id_from_email($email) {
	$email = sanitize($email);
	$query = mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '$email'");
	return mysql_result($query, 0, 'user_id');
}

function login($username, $password) {
	$user_id = user_id_from_username($username);
	
	$username = sanitize($username);
	$password = md5($password);
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'"), 0) == 1) ? $user_id : false;
}
?>