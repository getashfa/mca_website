<?php
include 'core/init.php';
protect_page();	//redirect to protected.php if not logged in

include 'includes/overall/headder.php';
?>
<div id="topbar">
  <div id="logo"><img src="images/icons/Library.png" /></div>
</div><!-- topbar ens here-->

    <p><a href="https://docs.google.com/spreadsheets/d/1MbLTVpI4PquioWQZS83eQXSKsdwMEKGcWVJswZ-qkJA/edit#gid=0" target="_blank">MCA Library</a></p>
    <p><a href="library_test.php" target="_blank">New library page</a></p>
<img src="images/page_under_construction.png" />
<?php
include 'includes/overall/footer.php';
?>