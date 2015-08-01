<?php
include 'core/init.php';
protect_page();	//redirect to protected.php if not logged in
//include admin protection for accessing
if (admin_rights($user_data['username']) === false) {		//redirects if no access
	header('Location: index.php');
}
include 'includes/overall/headder.php';
?>
<style>
#admin_page li{
	list-style:none;
}
#admin_page table {
    border-collapse: collapse;	/*table lines to single lines*/background: -webkit-linear-gradient(#999, #00CC66); /* For Safari 5.1 to 6.0 */
  	background: -o-linear-gradient(#999, #00CC66); /* For Opera 11.1 to 12.0 */
	background: -moz-linear-gradient(#999, #00CC66); /* For Firefox 3.6 to 15 */
	background: linear-gradient(#999, #00CC66); /* Standard syntax */
	color:#FFF;
}
#admin_page table, #admin_page th, #admin_page td {
    border: 1px solid #FFF;
	height: 50px;
    vertical-align: middle;
	padding: 5px 10px;
	text-align:center;
}
#admin_page th {
    background-color: green;
    color: white;
	text-align:center
}
</style>
<script>
//To issue book
function issue_book(book_id, div_id){
    var hr = new XMLHttpRequest();
    var url = "admin_control_process.php";
    var vars = "book_id="+book_id+"&use=1";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("status"+book_id+div_id).innerHTML = return_data;
	    }
    }
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}
//To activate user
function activate_user(user_id){
    var hr = new XMLHttpRequest();
    var url = "admin_control_process.php";
    var vars = "user_id="+user_id+"&use=2";
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("user_actv"+user_id).innerHTML = return_data;
	    }
    }
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}
</script>
<div id="admin_page">
<div id="topbar">
  <div id="logo"><img src="images/icons/admin.png" /></div>
</div><!-- topbar ens here-->
<h3>Issuing Library books</h3><hr />
<!--book request table-->
<table border="1">
  <col width="50">
  <col width="250">
  <col width="250">
  <col width="100">
  <col width="430">
   <ul> <tr>
    <th>Book no</th>
    <th>Book Name</th>
    <th>Author</th>
    <th>No. of copies</th>
    <th>Action</th>
  </tr>
    <!--------------------------------------------->
    <div id="library_lst">
        <li>
        	<tr>
    <?php
	
	$query = "SELECT * FROM `library` WHERE `unissued` > 0 ORDER BY book_id ASC";
            $result = mysql_query($query);
            while($book_data = mysql_fetch_array($result)){
				$slno = $slno + 1;
				$request_id_1 = $book_data['request_by_1'];
                $request_id_2 = $book_data['request_by_2'];
                $issuer_id_1 = $book_data['issued_to_1'];
                $issuer_id_2 = $book_data['issued_to_2'];
                $request_1_details= user_data($request_id_1, 'user_id', 'first_name', 'last_name');
                $request_2_details= user_data($request_id_2, 'user_id', 'first_name', 'last_name');
                $issuer_1_details= user_data($issuer_id_1, 'user_id', 'first_name', 'last_name');
                $issuer_2_details= user_data($issuer_id_2, 'user_id', 'first_name', 'last_name');
                $request_1_name = $request_1_details['first_name'] . " " . $request_1_details['last_name'];
                $request_2_name = $request_2_details['first_name'] . " " . $request_2_details['last_name'];
                $issuer_1_name = $issuer_1_details['first_name'] . " " . $issuer_1_details['last_name'];
                $issuer_2_name = $issuer_2_details['first_name'] . " " . $issuer_2_details['last_name'];
				/********************************************************************/
				
				if ($book_data['copies'] == 1) {
						if($book_data['unissued'] == 1 && $book_data['not_requested'] == 0) {
							//display issue book button
							//update unissued, and issued_id_1 <-- reqsted_1
							?><td height="50"><?php echo $book_data['book_id']; ?></td>
                            <td><?php echo $book_data['book_name']; ?></td>
                            <td><?php echo $book_data['author']; ?></td>
                            <td><?php echo $book_data['copies']; ?></td>
                            <td><span style="text-align:right">
								<div id="<?php echo "status" . $book_data['book_id']; ?>1">Requested by: <?php echo $request_1_name ?> <input name="myBtn" type="submit" value="Issue this book" onclick="issue_book('<?php echo $book_data['book_id']; ?>' ,1);"></div></span>
							</td><?php
						} 
				} elseif ($book_data['copies'] == 2) {
						if ($book_data['unissued'] == 2 && $book_data['not_requested'] == 1) {
							//display issue book button
							//update unissued, not_requeste and issued_id_1 <-- requested_1
							?><td height="50"><?php echo $book_data['book_id']; ?></td>
                            <td><?php echo $book_data['book_name']; ?></td>
                            <td><?php echo $book_data['author']; ?></td>
                            <td><?php echo $book_data['copies']; ?></td>
                            <td><span style="text-align:right">
								<div id="<?php echo "status" . $book_data['book_id']; ?>1">Requested by: <?php echo $request_1_name ?> <input name="myBtn" type="submit" value="Issue this book" onclick="issue_book('<?php echo $book_data['book_id']; ?>', 1);"></div></span>
							</td><?php
						} elseif ($book_data['unissued'] == 2 && $book_data['not_requested'] == 0) {
							//display two issue book button 
							//update unissued, not requested and issued_id_1 <-- requested_1,
							//									issued_id_2 <-- requested_2
							?><td height="50"><?php echo $book_data['book_id']; ?></td>
                            <td><?php echo $book_data['book_name']; ?></td>
                            <td><?php echo $book_data['author']; ?></td>
                            <td><?php echo $book_data['copies']; ?></td>
                            <td><span style="text-align:right">
								<div id="<?php echo "status" . $book_data['book_id']; ?>1">Requested by: <?php echo $request_1_name ?> <input name="myBtn" type="submit" value="Issue this book" onclick="issue_book('<?php echo $book_data['book_id']; ?>', 1);"></div>
                                <div id="<?php echo "status" . $book_data['book_id']; ?>2">Requested by: <?php echo $request_2_name ?> <input name="myBtn" type="submit" value="Issue this book" onclick="issue_book('<?php echo $book_data['book_id']; ?>', 2);"></div>	
							</span></td><?php
						} elseif ($book_data['unissued'] == 1 && $book_data['not_requested'] == 0) {
							//display issue book button
							//update unissued, not_requeste and issued_id_2 <-- requested_2
							?><td height="50"><?php echo $book_data['book_id']; ?></td>
                            <td><?php echo $book_data['book_name']; ?></td>
                            <td><?php echo $book_data['author']; ?></td>
                            <td><?php echo $book_data['copies']; ?></td>
                            <td><span style="text-align:right">
								<div id="<?php echo "status" . $book_data['book_id']; ?>1">Requested by: <?php echo $request_1_name ?> <input name="myBtn" type="submit" value="Issue this book" onclick="issue_book('<?php echo $book_data['book_id']; ?>', 1);"></div></span>	
							</td><?php
						}
				}
				
				/********************************************************************/
				?>
				</tr>
					</li>
				</div><!--library_lst-->	
			
	<?php
	}
	?>
</ul></table>
<br /><h3>Activating user</h3><hr /><br />
<!--Users to activate table-->
<table border="1"><!---user activation table-->
  <col width="50" />
  <col width="250" />
  <col width="130" />
  <col width="80" />
  <col width="150" />
  <col width="230" />
  <col width="190" />
   <tr>
    <th>Sl no</th>
    <th>User name</th>
    <th>Roll no:</th>
    <th>Gender</th>
    <th>Programme</th>
    <th>Department</th>
    <th>Action</th>
  </tr>
	<ul>
	<?php
		$sl = 0;
		$query_notactive = "SELECT * FROM `users` WHERE `active` = 0 ORDER BY `user_id` ASC";
		$not_active = mysql_query($query_notactive);
		while($user_not_activated_data = mysql_fetch_array($not_active)){
			$sl = $sl + 1;
			echo "<li>";
	?>
			<tr>
            	<td><?php echo $sl; ?></td>
				<td><?php echo $user_not_activated_data['first_name'] . " " . $user_not_activated_data['last_name']; ?></td>
				<td><?php echo $user_not_activated_data['roll_no']; ?></td>		
				<td><?php echo $user_not_activated_data['gender']; ?></td>	
				<td><?php echo $user_not_activated_data['programme']; ?></td>	
				<td><?php echo $user_not_activated_data['department']; ?></td>
                <td><div id="user_actv<?php echo $user_not_activated_data['user_id']; ?>"><input name="myBtn" type="submit" value="Activate User" onclick="activate_user('<?php echo $user_not_activated_data['user_id']; ?>');"></div></td>
		 	</tr>
    <?php
			echo "</li>";
		}
	?>
	</ul>
</table><!---user activation table ends-->
</div><!--admin_page-->
<?php
include 'includes/overall/footer.php';
?>
