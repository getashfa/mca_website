<div id="error">
<h3>We tired to log you in but....</h3><br>
<?php 
if (empty($errors) === false) {

	echo output_errors($errors);
}
?>
</div>