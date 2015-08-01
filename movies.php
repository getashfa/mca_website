<?php
include 'core/init.php';
protect_page();	//redirect to protected.php if not logged in

include 'includes/overall/headder.php';
include 'includes/widgets/filter.php';
?>
    <div id="movies">    
      
       <?php
		   if (empty($_POST) === false) {
			   
				$actor		= $_POST['actor'];
				$actress	= $_POST['actress'];
				$director	= $_POST['director'];
				$year		= $_POST['year'];
			
				retrive_movies_by_actor($actor, $actress, $director, $year);
			}else {
				retrive_movies_all();
			}
		
        ?>
         
    </div><!-- div movie end here -->
<?php
include 'includes/overall/footer.php';
?>



