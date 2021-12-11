<html>
<script>
	function first(){
		let p = document.getElementById("first");
			 if (p.style.visibility == "visible") {
				p.style.visibility = "hidden";
			 } else {
				p.style.visibility = "visible";
			 }
	}
</script>
<body onclick='first()'>
 <?php
	 date_default_timezone_set("America/New_York");
	 $random = rand(0,1);
	 if($random == 1){
	 $images = array("rock.jpg", "rain.jpg", "star.jpg", "jump.jpg");
	 $x = $images[rand(0,3)];
	 print "<img style='height:500px; width:500px; display:block; margin:auto;' src = $x />";
	 $date = date(" m/d/Y l h:ia") ;
	 print "<p style='position:fixed; left:43%; bottom:0px;'>$date</p>";
 } else {
	 $quotes = array("Change the world by being yourself. – Amy Poehler", "Never regret anything that made you smile. – Mark Twain",
				"Die with memories, not dreams. – Unknown", "Aspire to inspire before we expire. – Unknown");
	 $y = $quotes[rand(0,3)];
	 print "<p style='position:fixed; top:100px; left:500px;'>";
	 print $y;
	 print "</p>";
	 $date = date(" m/d/Y l h:ia") ;
	 print "<p style='position:fixed; left:43%; bottom:0px;'>$date</p>";
 }
 ?>
 </body>
 </html>