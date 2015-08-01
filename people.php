<?php
include 'core/init.php';
protect_page();	//redirect to protected.php if not logged in
include 'includes/overall/headder.php';
?>
<div id="topbar">
  <div id="logo"><img src="images/icons/people.png" /></div>
</div><!-- topbar ens here-->
<div id="people">
<!---------------------------------------------------------->
	<div id="council-members">
    	<h1>MCA Council Members</h1><br />
    	<?php list_council(); ?>
    </div>
    <div id="members">
    	<h1>MCA Registered Users</h1><br />
    	<?php list_members(); ?>
    </div> 

</div><!--People ends here-->
<?php include 'includes/overall/footer.php'; ?>