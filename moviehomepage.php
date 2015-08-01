<?php
include 'core/init.php';
protect_page();	//redirect to protected.php if not logged in

include 'includes/overall/headder.php';

$movie_id = $_GET['movie_id'];
$movie_data = movie_data($movie_id, 'user', 'movie_name', 'actor', 'actress', 'director', 'year', 'file_location', 'poster_location', 'imdb_rating');
?>
<h1 class="mov-title"><?php echo $movie_data['movie_name']; ?></h1><br />

<div id="mov-hom">
    <div id="poster">
    	<img src="<?php echo $movie_data['poster_location']; ?>" />
    </div><!-- class poster ends here -->
    
    <div id="mov-info">
         <table style="width:90%">
            <tr>
                <td>Actor:</td>
                <td><?php echo $movie_data['actor']; ?></td>
            </tr>
            <tr> 
                <td>Actress:</td>
                <td><?php echo $movie_data['actress']; ?></td>
            </tr>
            <tr>  
                <td>Director:</td>
                <td><?php echo $movie_data['director']; ?></td>
            </tr>
            <tr>    
                <td>Year:</td>		
                <td><?php echo $movie_data['year']; ?></td>
            </tr>
            <?php if (empty($movie_data['imdb_rating']) === false) { ?>
                <tr>    
                    <td>IMDB rating:</td>
                    <td><?php echo $movie_data['imdb_rating']; ?> / 10</td>
                </tr>
            <?php } ?>
            <tr>  
                <td>Uploaded by:</td>
                <td><?php echo $movie_data['user']; ?></td>
            </tr>
        </table>
        <a href=" <?php echo $movie_data['file_location']; ?>" download><img border="0" img src="images/icons/download.png" alt="Download_button" width="160" height="54"/></a>
    </div><!-- class movie-info ends here -->
 
</div><!-- class mov-hom ends here -->

<?php
include 'includes/overall/footer.php';
?>