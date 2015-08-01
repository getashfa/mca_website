<div id="regError">

<?php 
if (empty($errors) === false) {
	echo '<h3>Following errors occourd</h3><br>';
	echo output_errors($errors);
}
?>
</div>