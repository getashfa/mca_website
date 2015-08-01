<link href="css/register.css" rel="stylesheet" type="text/css" media="screen">
<?php 
include 'core/init.php';
protect_page();

include 'includes/overall/headder.php';

if (empty($_POST) === false) {
	//checks field when clicked register. only when clicked register button
	$required_fields = array('first_name', 'email', 'hostel');

// these are to validate data enterd in registration from with diffrent condition	
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Freld marked * are required';
			break 1;
		}
	}
	if (empty($errors) === true) {
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'Please enter a valid email address';
		} else if (email_exists($_POST['email']) == true && $user_data['email'] !== $_POST['email']) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already taken.';
		}
	}
}
?>
	<h1 class="pag-head">Settings</h1>
<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	include 'includes/widgets/accSettingsSuccess.php';
} else {
	if (empty($_POST) === false && empty($errors) === true) {
		//Update the user details and redirect
		$update_data = array(
			'first_name' 	=> $_POST['first_name'],
			'last_name' 	=> $_POST['last_name'],
			'email' 		=> $_POST['email'],
			'mob'			=> $_POST['mob'],
			'mob_display_yes'	=> $_POST['mob_display_yes'],
			'hostel'		=> $_POST['hostel'],
		);
		//update_user($update_data);
		update_user($update_data);
		header('Location: accSettings.php?success');
		exit();
	} else if (empty($errors) === false) {
		//display errors
		include 'includes/widgets/Error.php';
	}
?>
<div id="reg-form">
	<div class="acc_detail">	
    <form action="" method="post">
		<ul>
        	<li>
            	First name<span id="astric">*</span>:<br>
                <input type="text" name="first_name" value="<?php echo $user_data['first_name']; ?>">
            </li>
            <li>
            	Last name:<br>
                <input type="text" name="last_name" value="<?php echo $user_data['last_name']; ?>">
            </li>
            <li>
            	Email<span id="astric">*</span>:<br>
                <input type="text" name="email" value="<?php echo $user_data['email']; ?>">
            </li>
            <li>
            	Mobile no:<br>
                <input type="text" name="mob" value="<?php echo $user_data['mob']; ?>"><br />
                <?php
                	$checkbox = $user_data['mob_display_yes']; 
					if ($checkbox == '1') $checked = 'checked="checked"';
				?>
				<input type="checkbox" name="mob_display_yes" value="1" <?php echo $checked; ?> /> Show my mobile number on MCA.
            </li>
            <li>
            	Hostel no:<span id="astric">*</span>:<br>
                <input type="text" name="hostel" value="<?php echo $user_data['hostel']; ?>">
            </li>           
            <li>
            	<input type="submit" value="Update"> 
            </li>
        </ul>
    </form>
</div>

<div class="profpic">
	<?php 
        if (isset($_FILES['profile']) === true) {
            if (empty($_FILES['profile']['name']) === true) {
                echo 'Please choose a file';
            } else {
                $allowed = array('jpg', 'jpeg', 'gif', 'png');		//allowd file formats
                
                $file_name = $_FILES['profile']['name'];
                $file_extn = strtolower(end(explode('.', $file_name)));	//extracting file extension and make all file extension to lowercase letter
                $file_temp = $_FILES['profile']['tmp_name'];
				$file_size = $_FILES['profile']['size'];				// temporary stroing of files or location data of file
                
                if (in_array($file_extn, $allowed) === true) {
					if ($file_size < 160000) {	//SIZE checkking
						//upload file
						change_profile_image($session_user_id, $file_temp, $file_extn);
						header('Location: index.php');
						exit();
					} else {
						echo "File size should be less than 150KB";
					}
                } else {
                    //incorrect file format
                    echo 'Incorrect file type. Allowed:';
                    echo  implode(', ', $allowed);
                }
            }
        }
        
        if (empty($user_data['profile']) === false) {
            echo '<img src="', $user_data['profile'], '" alt="', $user_data['first_name'], '\'s profile image">';
        } 
    ?>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="profile"> <input type="submit" value="Update profile pic">
    </form>	
</div><!-- profpic ends here -->
</div>   
<?php
}	//this is the closing bracket of else function
include 'includes/overall/footer.php';	
?>