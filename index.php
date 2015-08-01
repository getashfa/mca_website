<?php
include 'core/init.php';

include 'includes/overall/headder.php';
include 'includes/overall/middile.php';
if (has_access($session_user_id, 1) === true) {
	$user_activation_pending = user_activation_pending();
	if ($user_activation_pending > 0) {
	$suffix = ($user_activation_pending != 1) ? 's' : '';
	?>
    <div class="clearer"></div>
    <h3>Hi <?php echo $user_data['first_name']; ?>,</h3> <p>We have <?php echo $user_activation_pending; ?> user<?php echo $suffix; ?> to be activated!. </p>
	<?php
	}
}
include 'includes/overall/footer.php';
?>
