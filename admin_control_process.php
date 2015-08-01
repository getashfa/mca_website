<?php
include 'core/init.php';
if (admin_rights($user_data['username']) === false) {		//redirects if no access
	header('Location: index.php');
}
$use = $_POST['use'];
//this is for use 1 => issue books
if ($use == 1) {
		$book_id = $_POST['book_id'];
		$user_id = $user_data['user_id'];
		$query = "SELECT * from library WHERE sl_no = $book_id";
		$result = mysql_query($query);
		$book_data = mysql_fetch_array($result);
		
	//book is avilable
		//Book copy 2, issued none
		if ($book_data['copies'] == 2) {
				if ($book_data['unissued'] == 2 && $book_data['not_requested'] ==1) {
					$issued_to_1 = $book_data['request_by_1'];
					//updating library table
					mysql_query("UPDATE `library` SET `not_requested` = 1, `issued_to_1` = $issued_to_1, `unissued` = 1 WHERE `book_id` = $book_id");
					
				//Book copy 2, one already issued
				} elseif($book_data['unissued'] == 2 && $book_data['not_requested'] ==0) {
					$issued_to_1 = $book_data['request_by_1'];
					$issued_to_2 = $book_data['request_by_2'];
					//updating library table
					mysql_query("UPDATE `library` SET `not_requested` = 0, `issued_to_2` = $issued_to_2, `issued_to_1` = $issued_to_1,`unissued` = 1 WHERE `book_id` = $book_id");
				//Book copy 2, one already issued
				} elseif($book_data['unissued'] == 1 && $book_data['not_requested'] ==0) {
					$issued_to_2 = $book_data['request_by_2'];
					//updating library table
					mysql_query("UPDATE `library` SET `not_requested` = 0, `issued_to_2` = $issued_to_2, `unissued` = 0 WHERE `book_id` = $book_id");
				}	
				//Book copy 1, This condition run most of the time(~99%)
		} elseif($book_data['copies'] == 1) {
				$issued_to_1 = $book_data['request_by_1'];
				mysql_query("UPDATE `library` SET `not_requested` = 1, `unissued` = 0, `issued_to_1` = '$issued_to_1' WHERE `book_id` = $book_id");
				
		}
			
			echo "Issued ";
			
//User @ => user activation
} elseif($use == 2) {
	$user_id = $_POST['user_id'];
	//update user table
	mysql_query("UPDATE `users` SET `active` = 1 WHERE `user_id` = $user_id");
	//Send activation mail
	$user_details = user_data(1, 'first_name', 'last_name', 'email');
	$email_addr = $user_details['email'];
	$user_name = $user_details['first_name'] . " " . $user_details['last_name']; 
	sendMail("$email_addr", "MCA-website User Activation Mail", "Dear " . $user_name . ",\n    Your Account have been activated. We are glad that you are with us.\n\n~MCA, IIT Bombay");
	echo "Activated..!!";
}
                          
?>         
