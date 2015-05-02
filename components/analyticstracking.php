<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('set', '&uid', '<?php $dotaz = 'SELECT jmeno FROM hraci WHERE idhrace='.$_SESSION['hrac']; $vysledek = mysql_query($dotaz) or die(mysql_error($db));	$zaznam = mysql_fetch_array($vysledek);	echo $zaznam['jmeno'];?>');
ga('create', 'UA-62034614-3', 'auto');
ga('send', 'pageview');
</script>
