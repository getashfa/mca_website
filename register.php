<?php 
include 'core/init.php';
logged_in_redirect();	//is to donot display registration forms even if tried when once user logged in
include 'includes/overall/headder.php';

if (empty($_POST) === false) {
	//checks field when clicked register. only when clicked register button
	$required_fields = array('username', 'password', 'password_again', 'first_name', 'email', 'roll_no');

// these are to validate data enterd in registration from with diffrent condition	
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Freld marked * are required';
			break 1;
		}
	}
	
	// the first if chek is used, if all * fields are not filled this will not exicute
	if (empty($errors) === true) {
		
		
		// checks is roll_no is already taken or not
		if (roll_no_exists($_POST['roll_no']) === true) {
			$errors[] = 'Sorry, the Roll number \'' . $_POST['roll_no'] . '\' is already registerd.';
		}
		// checks is username is already taken or not
		if (user_exists($_POST['username']) === true) {
			$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		}
		
		//check for spaces in username: this is done with regular expression
		if (preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'User name must not contain spaces.';
		}
		//check minimum password length
		if (strlen($_POST['password']) < 6) {
			$errors[] = 'Your password must be atleast 6 letters';
		}
		if ($_POST['password'] != $_POST['password_again']) {
			$errors[] = 'Your passwords do not match';
		}
		//chekking the email address syntax
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = 'Please enter a valid email address';
		}
		//chekking if email already exists
		if (email_exists($_POST['email']) === true) {
			$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already taken.';
		}
	}
}
?>
<link href='css/register.css' rel="stylesheet" type="text/css" />

<div id="reg-heading"><h1>Register</h1></div><br />
<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
		//Sucess full registration
		include 'includes/widgets/registerSuccess.php';
} else {
	//user registration failed. or just came to register page
	if (empty($_POST) === false && empty($errors) === true) {
		//register user
		print_r($register_data);
		$register_data = array(
			'roll_no'		=> $_POST['roll_no'],
			'gender'		=> $_POST['gender'],
			'username' 		=> $_POST['username'],
			'password' 		=> $_POST['password'],
			'first_name' 	=> $_POST['first_name'],
			'last_name' 	=> $_POST['last_name'],
			'email' 		=> $_POST['email'],
			'programme'		=> $_POST['programme'],
			'department'	=> $_POST['department'],
			'hostel'		=> $_POST['hostel'],
			'mob'			=> $_POST['mob'],
		);
		register_user($register_data);
		//redirect
		header('Location: register.php?success');
		//exit if any unknown error occurs
		exit();
	} else {
		//output errors;
		include 'includes/widgets/Error.php';
	}

?>
<div id="reg-form">
    <form action="" method="post">
        <ul>
        	<li>
                IITB Rollno / Emp code:<span id="astric">*</span>:<br>
                <input type="text" name="roll_no">
            </li>
            <li>
            	Gender:<br>
                 <select name="gender">
                	<option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </li>
            <li>
                Username<span id="astric">*</span>:<br>
                <input type="text" name="username">
            </li>
            <li>
                Password<span id="astric">*</span>:<br>
                <input type="password" name="password">
            </li>
            <li>
                Password again<span id="astric">*</span>:<br>
                <input type="password" name="password_again">
            </li>
            <li>
                First name<span id="astric">*</span>:<br>
                <input type="text" name="first_name">
            </li>
            <li>
                Last name:<br>
                <input type="text" name="last_name">
            </li>
            <li>
                Email<span id="astric">*</span>:<br>
                <input type="text" name="email">
            </li>
            <li>
            	Mobile no (Mumbai):<br>
                <input type="text" name="mob">
            </li>
            <li>
            	Programme:<br />
                <select name="programme">
                	<option value="B.Tech">B.Tech</option>
                    <option value="M.Tech">M.Tech</option>
                    <option value="M.Des">M.Des</option>
                    <option value="Msc">Msc</option>
                    <option value="MBA">MBA</option>
                    <option value="Ph.D">Ph.D</option>
                    <option value="Project staff">Project staff</option>
                    <option value="Teaching staff">Teaching staff</option>
                    <option value="Non-Teaching staff">Non-Teaching staff</option>
                </select>
            </li>
            <li>
            	Department:<br />
                <select name="department">
                	<option value="Aerospace Engineering">Aerospace Engineering</option>
                    <option value="Biosciences and Bioengineering">Biosciences and Bioengineering</option>
                    <option value="Chemical Engineering">Chemical Engineering</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                    <option value="Earth Sciences">Earth Sciences</option>
                    <option value="Electrical Engineering">Electrical Engineering</option>
                    <option value="Energy Science and Engineering">Energy Science and Engineering</option>
                    <option value="Humanities & Social Science">Humanities & Social Science</option>
                    <option value="Industrial Design Centre">Industrial Design Centre</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Metallurgical Engineering & Materials Science">Metallurgical Engineering & Materials Science</option>
                    <option value="Physics'">Physics</option>
                    <option value="Centre for Research in Nanotechnology and Science (CRNTS)">Centre for Research in Nanotechnology and Science (CRNTS)</option>
                    <option value="Centre for Aerospace Systems Design and Engineering (CASDE)">Centre for Aerospace Systems Design and Engineering (CASDE)</option>
                    <option value="Computer Centre (CC)'">Computer Centre (CC)</option>
                    <option value="Centre for Distance Engineering Education Programme (CDEEP)">Centre for Distance Engineering Education Programme (CDEEP)</option>
                    <option value="Centre for Environmental Science and Engineering (CESE)">Centre for Environmental Science and Engineering (CESE)</option>
                    <option value="Centre of Studies in Resources Engineering (CSRE)">Centre of Studies in Resources Engineering (CSRE)</option>
                    <option value="Centre for Technology Alternatives for Rural Areas (CTARA)">Centre for Technology Alternatives for Rural Areas (CTARA)</option>
                    <option value="Centre for Formal Design and Verification of Software (CFDVS)">Centre for Formal Design and Verification of Software (CFDVS)</option>
                    <option value="Centre for Urban Science and Engineering (C-USE)">Centre for Urban Science and Engineering (C-USE)</option>
                    <option value="Sophisticated Analytical Instrument Facility (SAIF)">Sophisticated Analytical Instrument Facility (SAIF)</option>
                    <option value="Tata Center for Technology and Design (TCTD)">ata Center for Technology and Design (TCTD)</option>
                    <option value="Climate Studies">Climate Studies</option>
                    <option value="Educational Technology">Educational Technology</option>
                    <option value="Industrial Engineering and Operations Research (IEOR)">Industrial Engineering and Operations Research (IEOR)</option>
					<option value="Systems and Control Engineering'">Systems and Control Engineering</option>
                    <option value="SJSOM">SJSOM</option>
                    <option value="Other">Others</option
                ></select>
            </li>
            <li>
            	Hostel:<br />
                <select name="hostel">
                	<option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="Tansa">Tansa</option>
                    <option value="QIP">QIP</option>
                    <option value="Quarters">Quarters</option>
                    <option value="Outside">Outside</option>
                    <option value="Other">Other</option>
                </select>
            </li>
            <li>
            	<input type="submit" value="Register" />
            </li>
        </ul>
    </form>      
</div>
<?php
}// This is the closing bracket of else
 include 'includes/overall/footer.php';	
?>