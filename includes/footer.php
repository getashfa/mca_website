 	 </div><!--wrapper ends here-->
</div><!-- container ends here-->
	
    <div class="clearer"></div>
    <div id="footer-wrap">
    <div id="footer">
    	<div id="copyright">
        	<p>Copyright &#169; 2015.<br />
        
			<?php
            $user_count_z = user_count();
            $suffix = ($user_count_z != 1) ? 's' : '';
            ?>
            Currently we have <?php echo $user_count_z; ?> registerd user<?php echo $suffix; ?></p>
     	</div><!-- Copyright ends here -->
     
		<div id="about">
            <p><a href="about.php" target="_blank">Developers</a></p>
         </div>
	</div><!--- footer ends here -->
    </div><!--footer-wrap ends here -->
     
</body>
</html>