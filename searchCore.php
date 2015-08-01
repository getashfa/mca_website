<?php
// codes for searching ---------

$db = new MySQLi('localhost','root','straifo','mca');
if(isset($_GET['keywords'])) {
	$keywords = $db->escape_string($_GET['keywords']);
	
	$query = $db->query("
		SELECT movie_id, movie_name 
		FROM movie
		WHERE movie_name LIKE '%{$keywords}%'
		OR actor LIKE '%{$keywords}%'
		LIMIT 20
	");
	?>
    
    <div class="result-count">
    	Found <?php echo $query->num_rows; ?> results.
    </div>
    
    <?php
		include 'core/init.php';	
		include 'includes/overall/headder.php';
		include 'includes/widgets/spacer.php';
		include 'search.php';
		include 'includes/widgets/spacer.php';
	if($query->num_rows) {
		while($r = $query->fetch_object())	{	//object because using oops style ( mysqli )
		?>
        	<div id="search_result">
            	<a href="moviehomepage.php?movie_id=<?php echo $r->movie_id; ?>"><?php echo $r->movie_name; ?></a>
            </div>
        <?php
		}
	}
}
include 'includes/overall/footer.php';
?>
<!---- PHP code for search ends here ----->

