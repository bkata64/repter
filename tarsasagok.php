<?php
	include_once('php/Carriers.php');
	$carriers = new Carriers();		
?>
<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<title>Légitársaságok Listája</title>	
	<link type="text/css" rel="stylesheet" href="css/legi.css">
	<script src="js/legi.js">
		
	</script>
	
</head>
<body>
	<header>
		<h1>Légitársaságok Listája</h1>
	</header>

	<div id="content">
		<nav>
			<a href="index.php">Főoldal</a> > 
			<a href="#">Légitársaságok listája</a>
		</nav>		
		<ul class="menu">
			<? foreach($carriers->getCarriers() as $key => $carrier) {
			?>
			<li><a href="carrier.php?id=<?= $carrier['id']  ?>"><?=  $carrier['name'] ?></a></li>
			<? } ?>
		</ul>
	</div>
</body>
</html>
		