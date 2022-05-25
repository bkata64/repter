<?
include_once('php/Carriers.php');
$carriers = new Carriers();	
$rekord = $carriers->getCarrierById(intval($_GET['id']));
?>
<!DOCTYPE html>
<html lang="hu">

<head>
	<meta charset="UTF-8">
	<title>Légitársaság</title>	
	<link type="text/css" rel="stylesheet" href="css/legi.css">	
	<script src="js/legi.js"></script>
	<script src="js/carrier.js"></script>	
</head>
<body>
	<header>
		<h1>Légitársaság</h1>
	</header>
	<div id="content">
		<nav>
			<a href="index.php">Főoldal</a> > 
			<a href="tarsasagok.php">Légitársaságok listája</a> >
			<a href="#" id="cname"><?= $rekord['name']?></a> 
			
		</nav>
		<h1><?= $rekord['name'] ?></h1>
        <div style="width:50%; float:left; margin-top:16px;">
            <img src="logo/<?= $rekord['code'] ?>.png" alt="<?= $rekord['name']?>" style="max-width:100%; border: 1px solid; padding: 10px;">
        </div>
        <div style="width:40%; float: left;">
            <p style="font-weight:bold">Az összes járat:<p>
            <p id="osszjarat"><?= $carriers->getSumJarat(intval($_GET['id']))['osszesJarat']; ?></p>
            <p style="font-weight:bold">A látogatott repterek száma:</p>
            <p id="repterei">34</p>
            <p style="font-weight:bold">A törölt járatok aránya:</p>
            <p id="torolt">2%</p>
            <p style="font-weight:bold">Az átlagos járat késés:</p>
            <p id="keses">2345</p>
            <p style="font-weight:bold">A legforgalmasabb reptér:</p>
            <p id="legforgalmasabb">ATL</p>
        </div>
	</div>
</body>
</html>