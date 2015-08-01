<?php
function movie_exists($movie_name) {
	$movie_name = sanitize($movie_name);
	$query = mysql_query("SELECT COUNT(`movie_id`) FROM `movie` WHERE `movie_name` = '$movie_name'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function retrive_movies_all() {
	$db_conx = mysqli_connect("localhost", "root", "straifo", "mca");
	$sql = "SELECT COUNT(movie_id) FROM movie";
	$query = mysqli_query($db_conx, $sql);
	$row = mysqli_fetch_row($query);
	$rows = $row[0];
	$page_rows = 20;	//this value dertermines the number of movies loading
	$last = ceil($rows/$page_rows);
	if($last < 1){
		$last = 1;
	}
	$pagenum = 1;
	if(isset($_GET['pn'])){
		$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
	}
	if ($pagenum < 1) { 
		$pagenum = 1; 
	} else if ($pagenum > $last) { 
		$pagenum = $last; 
	}
	$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
	$sql = "SELECT * FROM movie ORDER BY uploaded_date DESC $limit";
	$query = mysqli_query($db_conx, $sql);
	$textline1 = " $rows ";
	$textline2 = "Page $pagenum of $last";
	$paginationCtrls = '';
	if($last != 1){
		if ($pagenum > 1) {
			$previous = $pagenum - 1;
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
			for($i = $pagenum-4; $i < $pagenum; $i++){
				if($i > 0){
					$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
				}
			}
		}
		$paginationCtrls .= ''.$pagenum.' &nbsp; ';
		for($i = $pagenum+1; $i <= $last; $i++){
			$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			if($i >= $pagenum+4){
				break;
			}
		}
		if ($pagenum != $last) {
			$next = $pagenum + 1;
			$paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
		}
	}
	echo '<div id="pagination_controls"><p>' . $textline2 . '<p></div>';
	echo '<ul>';
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		if (empty($row['poster_location']) === false){
				$movie_id = $row['movie_id'];
				$movie_name_tmp = $row['movie_name'];
			if (strlen($movie_name_tmp) > 27) {
				$movie_name_tmp = substr($movie_name_tmp, 0, 25) . ".."; //returns first 25 letters
			}
			$imdb_rating_tmp = $row['imdb_rating'];
			if(empty($row['imdb_rating']) == true) {
				$imdb_rating_tmp = "NA";
			}
				echo "<li><a href=\"moviehomepage.php?movie_id=$movie_id\"><img src=" . $row['poster_location'] . "></a><p>" . $movie_name_tmp . "</p><p>IMDB rating: " . $imdb_rating_tmp . "</p></li>";
		}	
	}
	echo '</ul>';
	echo '<div class="clearer"></div>';
	echo '<div id="pagination_controls">' . $paginationCtrls . '</div>';
	mysqli_close($db_conx);
}



function retrive_movies_by_actor($actor, $actress, $director, $year) {
	echo "<ul>";
	
$result = mysql_query("SELECT * FROM `movie` WHERE `actor` LIKE $actor AND `actress` LIKE $actress AND `director` LIKE $director AND `year` LIKE $year ORDER BY `uploaded_date` DESC LIMIT 30");
	while($row = mysql_fetch_array($result)) {
		if (empty($row['poster_location']) === false){
			$movie_id = $row['movie_id'];
			$movie_name_tmp = $row['movie_name'];
			if (strlen($movie_name_tmp) > 27) {
				$movie_name_tmp = substr($movie_name_tmp, 0, 25) . ".."; //returns first 25 letters
			}
			$imdb_rating_tmp = $row['imdb_rating'];
			if(empty($row['imdb_rating']) == true) {
				$imdb_rating_tmp = "NA";
			}
			echo "<li><a href=\"moviehomepage.php?movie_id=$movie_id\"><img src=" . $row['poster_location'] . "></a><p>" . $movie_name_tmp . "</p><p>IMDB rating: " . $imdb_rating_tmp . "</p></li>";
		}}
	echo "</ul>";
}

function movie_data($movie_id) {
	
	$data = array();
	$movie_id = (int)$movie_id;	//makeing sure user id is intiger.
	
	$func_num_args = func_num_args();	//to pass multipple arguments
	$func_get_args = func_get_args();
	
	if ($func_num_args > 1) {	//removing or avoiding user_id, if other details are there.
		unset($func_get_args[0]);
		
		$fields ='`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `movie` WHERE `movie_id` = $movie_id"));
		return $data;	//returning all details of user 
		
		
	}
}
?>