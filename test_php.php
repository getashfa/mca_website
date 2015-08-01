<?php
include 'core/init.php';
	$book_id = $_POST['book_id'];
	$user_id = $user_data['user_id'];
	$email_addr = $user_data['email'];
	$user_name = $user_data['first_name'] . " " . $user_data['last_name'];
	$query = "SELECT * from library WHERE sl_no = $book_id";
	$result = mysql_query($query);
	$book_data = mysql_fetch_array($result);
if ($user_data['issued_book_count'] >= 3) {//already issued 3 books
	echo"You have already holding maximum number of books!, Pls return and try again";	
} else {	
	//book is avilable
		//Book copy 2, issued none
		if ($book_data['copies'] == 2 && $book_data['not_requested'] ==2) {
			$request_by_1 = $user_data['user_id'];
			$not_requested = $book_data['not_requested'] - 1;
			$issued_book_count = $user_data['issued_book_count'] + 1;
			//updating library table
			mysql_query("UPDATE `library` SET `not_requested` = $not_requested, `request_by_1` = $request_by_1 WHERE `book_id` = $book_id");
			//Updating user table
			mysql_query("UPDATE `users` SET `issued_book_count` = $issued_book_count WHERE `user_id` = $user_id");
			//Sending mail to collect book
			sendMail("$email_addr", "MCA-Library Book isssue notification", "Dear " . $user_name . ",\n    You have reserved:  \"" . $book_data['book_name'] . "\", Please collect it with in three days or your reservation wil automatically cancel. collect from:\n
			 Arjun Sasi\n
			 Room no: XXXX\n
			 Hostel:XXXXX\n\n\n~MCA, IIT Bombay");
		}
			
		//Book copy 2, one already issued
		 elseif($book_data['copies'] == 2 && $book_data['not_requested'] ==1) {
			$request_by_2 = $user_data['user_id'];
			$not_requested = $book_data['not_requested'] - 1;
			$issued_book_count = $user_data['issued_book_count'] + 1;
			//updating library table
			mysql_query("UPDATE `library` SET `not_requested` = $not_requested, `request_by_2` = $request_by_2 WHERE `book_id` = $book_id");
			//Updating user table
			mysql_query("UPDATE `users` SET `issued_book_count` = $issued_book_count WHERE `user_id` = $user_id");
			//Sending mail to collect book
			sendMail("$email_addr", "MCA-Library Book isssue notification", "Dear " . $user_name . ",\n    You have reserved:  \"" . $book_data['book_name'] . "\", Please collect it with in three days or your reservation wil automatically cancel. collect from:\n
			 Arjun Sasi\n
			 Room no: XXXX\n
			 Hostel:XXXXX\n\n\n~MCA, IIT Bombay");
		}
			
		//Book copy 1, This condition run most of the time(~99%)
		 elseif($book_data['copies'] == 1) {
			$request_by_1 = $user_data['user_id'];
			$not_requested = $book_data['not_requested'] - 1;
			$issued_book_count = $user_data['issued_book_count'] + 1;
			//updating library table
			mysql_query("UPDATE `library` SET `not_requested` = $not_requested, `request_by_1` = $request_by_1 WHERE `book_id` = $book_id");
			//Updating user table
			mysql_query("UPDATE `users` SET `issued_book_count` = $issued_book_count WHERE `user_id` = $user_id");
			//Sending mail to collect book
			sendMail("$email_addr", "MCA-Library Book isssue notification", "Dear " . $user_name . ",\n    You have reserved:  \"" . $book_data['book_name'] . "\", Please collect it with in three days or your reservation wil automatically cancel. collect from:\n
			 Arjun Sasi\n
			 Room no: XXXX\n
			 Hostel:XXXXX\n\n\n~MCA, IIT Bombay");
		}
		
       	echo "<span style=\"color:blue\">Reserved</span> by " . $user_data['first_name']. " ". $user_data['last_name'] . ", Pls chek your mail for more details";
	}
                          
?>         
