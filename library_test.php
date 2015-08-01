<?php
include 'core/init.php';
protect_page();	//redirect to protected.php if not logged in
include 'includes/overall/headder.php';
//display library rules only once
if (isset($_SESSION['library_popup']) == false) {
	//show the popup window
	include 'includes/widgets/library_popup.html';
	$_SESSION['library_popup'] = 1;
}
?>
<style>
#library_lst li{
	list-style:none;
}
table {
    border-collapse: collapse;	/*table lines to single lines*/background: -webkit-linear-gradient(#999, #00CC66); /* For Safari 5.1 to 6.0 */
  	background: -o-linear-gradient(#999, #00CC66); /* For Opera 11.1 to 12.0 */
	background: -moz-linear-gradient(#999, #00CC66); /* For Firefox 3.6 to 15 */
	background: linear-gradient(#999, #00CC66); /* Standard syntax */
	color:#FFF;
}
table, th, td {
    border: 1px solid #FFF;
	height: 50px;
    vertical-align: middle;
	padding: 5px 10px;
	text-align:center;
}

th {
    background-color: green;
    color: white;
	text-align:center
}
</style>
<script>
function ajax_post(book_id){
    var hr = new XMLHttpRequest();
    var url = "test_php.php";
    var vars = "book_id="+book_id;
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
		    var return_data = hr.responseText;
			document.getElementById("status"+book_id).innerHTML = return_data;
	    }
    }
    hr.send(vars); // Actually execute the request
    document.getElementById("status").innerHTML = "processing...";
}
</script><div id="topbar">
  <div id="logo"><img src="images/icons/Library.png" /></div>
</div><!-- topbar ens here-->



<table border="1">
  <col width="100">
  <col width="250">
  <col width="250">
  <col width="170">
  <col width="295">
   <ul> <tr>
    <th>Sl no</th>
    <th>Book Name</th>
    <th>Author</th>
    <th>No. of copies</th>
    <th>Avilability</th>
  </tr>
	<?php
    list_books();
    function list_books() {
		$slno = 0;
        $query = "SELECT * FROM library ORDER BY book_id ASC";
        $result = mysql_query($query);
        while($book_data = mysql_fetch_array($result)){   //Creates a loop to loop through results
            $slno = $slno + 1;
            //Extract user details only if book is issued
            if ($book_data['unissued'] < $book_data['copies'] | $book_data['not_requested'] < $book_data['copies']) {
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
            }
            ?>
            <!--------------------------------------------->
            <div id="library_lst">
                <li>
                 <tr>
                    <td height="50"><?php echo $slno; ?></td>
                    <td><?php echo $book_data['book_name']; ?></td>
                    <td><?php echo $book_data['author']; ?></td>
                    <td><?php echo $book_data['copies']; ?></td>
                    <td>
                        <?php
                        //Number of copies = 1
                        if($book_data['copies'] == 1) {
                                //number of book = 1, avilable = 1
                                if($book_data['unissued'] == true  && $book_data['not_requested'] == true) {
                                    //display issue button
                                    ?><div id="<?php echo "status" . $book_data['book_id']; ?>"><input name="myBtn" type="submit" value="Issue this book" onclick="ajax_post('<?php echo $book_data['book_id']; ?>');"></div>
                                    <?php
                                //number of book =1, but <span style="color:blue">Reserved</span> by somebody
                                }elseif($book_data['unissued'] == true  && $book_data['not_requested'] == false){
                                    echo "<span style=\"color:blue\">Reserved</span> by " . $request_1_name;
                                //number of book =1, but it is issued	
                                }elseif($book_data['unissued'] == false) {
                                    // display reserver name
                                    echo "Issued to " . $issuer_1_name;
                                }
                        } elseif($book_data['copies'] == 2) {
								//no of book =2, avilable =2
								if($book_data['unissued'] == 2 && $book_data['not_requested'] == 2) {
									//issue one book and display issue button
									?><div id="<?php echo "status" . $book_data['book_id']; ?>"><input name="myBtn" type="submit" value="Issue this book" onclick="ajax_post('<?php echo $book_data['book_id']; ?>');"></div>
									<?php
								} elseif($book_data['unissued'] == 2 && $book_data['not_requested'] == 1) {
									//display issue button and show name of requester
									?><div id="<?php echo "status" . $book_data['book_id']; ?>"><input name="myBtn" type="submit" value="Issue this book" onclick="ajax_post('<?php echo $book_data['book_id']; ?>');"></div><?php echo "One copy <span style=\"color:blue\">Reserved</span> by " . $request_1_name;?><?php
								} elseif($book_data['unissued'] == 2 && $book_data['not_requested'] == 0) {
									//display both requesters
									echo "<span style=\"color:blue\">Reserved</span> by: " . $request_1_name . ", " . $request_2_name;
								//one book is un isssued and climed
								} elseif ($book_data['unissued'] == 1 && $book_data['not_requested'] == 1) {
									?><div id="<?php echo "status" . $book_data['book_id']; ?>"><input name="myBtn" type="submit" value="Issue this book" onclick="ajax_post('<?php echo $book_data['book_id']; ?>');"></div><?php echo "One copy issued to " . $issuer_1_name;?><?php
								} elseif ($book_data['unissued'] == 1 && $book_data['not_requested'] == 0) {
									// display one issued and issue button
									?></div><?php echo "One copy issued to " . $issuer_1_name . ", and One copy is <span style=\"color:blue\">Reserved</span> by ". $request_1_name;?><?php
								} else if($book_data['unissued'] == 0) {
									//display both issuer name
									echo "Isued to " . $issuer_1_name . ", " . $issuer_2_name;
								}
                        }
                        
                        ?>
                    </td>
                </tr>
                </li>
            </div><!--user-DP-->
            <div class="clearer"></div>
            <!--------------------------------------------->
            <?php
        }
        echo "<br />";
    }
    ?>
   </ul>
   
</table>
<?php
include 'includes/overall/footer.php';

?>
