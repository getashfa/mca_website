<?php
include 'core/init.php';
protect_page();	//redirect to protected.php if not logged in

include 'includes/overall/headder.php';
?>
<div id="topbar">
  <div id="logo"><img src="images/icons/gallery.png" /></div>
</div><!-- topbar ens here-->

<div id="gallery">
	<ul>
    	<li><a class="fancybox" rel="group" href="images/gallery/large/img01.jpg"><img src="images/gallery/thumbnails/img01.jpg"  width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img02.jpg"><img src="images/gallery/thumbnails/img02.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img03.jpg"><img src="images/gallery/thumbnails/img03.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img04.jpg"><img src="images/gallery/thumbnails/img04.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img05.jpg"><img src="images/gallery/thumbnails/img05.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img06.jpg"><img src="images/gallery/thumbnails/img06.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img07.jpg"><img src="images/gallery/thumbnails/img07.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img08.jpg"><img src="images/gallery/thumbnails/img08.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img09.jpg"><img src="images/gallery/thumbnails/img09.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img10.jpg"><img src="images/gallery/thumbnails/img10.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img11.jpg"><img src="images/gallery/thumbnails/img11.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img12.jpg"><img src="images/gallery/thumbnails/img12.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img13.jpg"><img src="images/gallery/thumbnails/img13.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img14.jpg"><img src="images/gallery/thumbnails/img14.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img15.jpg"><img src="images/gallery/thumbnails/img15.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img16.jpg"><img src="images/gallery/thumbnails/img16.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img17.jpg"><img src="images/gallery/thumbnails/img17.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img18.jpg"><img src="images/gallery/thumbnails/img18.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img19.jpg"><img src="images/gallery/thumbnails/img19.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img20.jpg"><img src="images/gallery/thumbnails/img20.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img21.jpg"><img src="images/gallery/thumbnails/img21.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img22.jpg"><img src="images/gallery/thumbnails/img22.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img23.jpg"><img src="images/gallery/thumbnails/img23.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img24.jpg"><img src="images/gallery/thumbnails/img24.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img25.jpg"><img src="images/gallery/thumbnails/img25.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img26.jpg"><img src="images/gallery/thumbnails/img26.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img27.jpg"><img src="images/gallery/thumbnails/img27.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img28.jpg"><img src="images/gallery/thumbnails/img28.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img29.jpg"><img src="images/gallery/thumbnails/img29.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img30.jpg"><img src="images/gallery/thumbnails/img30.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img31.jpg"><img src="images/gallery/thumbnails/img31.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img32.jpg"><img src="images/gallery/thumbnails/img32.jpg" width="150" width="150"></a></li>
         <li><a class="fancybox" rel="group" href="images/gallery/large/img33.jpg"><img src="images/gallery/thumbnails/img33.jpg" width="150" width="150"></a></li>        
    </ul>
</div>
</div><!-- gallery ends here -->

<!--script and styling for fancy box animation -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link rel="stylesheet" href="css/source/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="css/source/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>


<?php
include 'includes/overall/footer.php';
?>