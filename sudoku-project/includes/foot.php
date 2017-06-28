</div>
	<!-- end page container -->
	
<?php foreach ($js as $value) 
	echo "<script src='".$value."' type='text/javascript'></script>";
?>

	<script>
		$(document).ready(function() {
			App.init();
			Dashboard.init();
		});
	</script>
<!--    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-43074450-1', 'sean-theme.com');
      ga('send', 'pageview');
    
    </script>
-->
</body>
</html>
