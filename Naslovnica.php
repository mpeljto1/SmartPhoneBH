<!DOCTYPE html>
<html>
<head>
	<title>SmartphoneBH - Naslovnica</title>
	<link rel="stylesheet" type="text/css" href="SmartphoneBH.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="prikazVremenaObjave.js"></script> 
	<script type="text/javascript" src="sortiranjeNovosti.js"></script>
</head>
<body>
<div class="omotac">
	<div id="header">
		<div id="logo">
			<a href="Naslovnica.php" id="linkLogo">
				<div id="okvirTelefona"></div>
			</a>
			<div id="dugme"></div>
			<div id="zvucnik"></div>
		</div>
		<a href="Naslovnica.php" id="naslovLink"><h1>SmartPhoneBH | Smartphone, Tablet Reviews, Tips and Tricks</h1></a>
		<div id="meni">
			<ul>
				<li id="liNovosti"><a href="Naslovnica.php"><span>Novosti</span></a></li>
				<li id="liPodstranica"><a href="Tabele.php"><span>Telefoni</span></a></li>
				<li id="liForma"><a href="Kontakt.php"><span>Forma za kontakt</span></a></li>
				<li id="liListaLinkova"><a href="Linkovi.php">Lista linkova</a></li>
				<li id="liLogin"><a href="LoginPage.php">Login</a></li>
				<?php
					session_start();
					if(isset($_SESSION['login'])) {
				?>	
						<li id="liAdminPage"><a href="AdminPage.php">Admin Page</a></li>
				<?php
					}
				?>	
			</ul>
		</div>
	</div>
	<?php

		$sveVijesti = file("vijesti.csv");
		$sortirajAbecedno = false;
		function prikaziVijest($datum,$putanja,$altSlike,$kodDrzave,$brojAutora,$tekst) {
			print '<a href="">';
			print '<div class="novosti">';
			print '<img src="Novostislike/'.$putanja.'" alt="'.$altSlike.'"';
			print "/>";
			print "<p>".str_replace("?!?error", ",", $tekst); // ovo sam dodao bilo .$tekst
			print "</p>";
			print '<div class="vrijemeObjave">'.$datum;
			print "</div>";
			print '<div class="porukaObjave">';
			print "</div>";
			print "</div>";
			print "</a>";
		}

		print '<div id="okvirZaNovosti">';
		print "<hr>";
		print "<p>Najnovije vijesti: ";
		print '<a href="" onclick="return danasnjeNovosti()">Danasnje novosti';
		print "</a>";
		print '<a href="" onclick="return novostiOveSedmice()">Novosti ove sedmice';
		print "</a>";
		print '<a href="" onclick="return novostiOvogMjeseca()">Novosti ovog mjeseca';
		print "</a>";
		print '<a href="" onclick="return sveNovosti()">Sve novosti';
		print "</a>";
		print '<a href="">Sortiraj abecedno';
		print "</a>";
		print "</p>";
		print "<hr>";
		$temporalArray = [];
		for($a=0; $a < count($sveVijesti); $a++) {
			$temp = explode(',', $sveVijesti[$a]);
			$veci = false;
			//if(sizeof($temp) > 4)
			//prikaziVijest($temp[0],$temp[1],$temp[2],$temp[3],$temp[4],$temp[5]);
			$zapamtiA = $a;
			for($i=0; $i < count($sveVijesti); $i++) {
				$pom = explode(',', $sveVijesti[$i]);
				$tempDatumiVrijeme = explode(' ', $temp[0]);
				$tempDatum = explode('-', $tempDatumiVrijeme[0]); // godina,mjesec,dan
				$tempVrijeme = explode(':', $tempDatumiVrijeme[1]); // sati,minute,sekunde

				$pomDatumiVrijeme = explode(' ', $pom[0]);
				$pomDatum = explode('-', $pomDatumiVrijeme[0]); // godina,mjesec,dan
				$pomVrijeme = explode(':', $pomDatumiVrijeme[1]); // sati,minute,sekunde

				if($tempDatum[0] > $pomDatum[0]) {
					$veci = true;
				} else if($tempDatum[0] == $pomDatum[0] && $tempDatum[1] < $pomDatum[1]) {
					$veci = true;
				} else if($tempDatum[0] == $pomDatum[0] && $tempDatum[1] == $pomDatum[1] && $tempDatum[2] < $pomDatum[2]) {
					$veci = true;
				} else if($tempDatum[0] == $pomDatum[0] && $tempDatum[1] == $pomDatum[1] && $tempDatum[2] == $pomDatum[2] && $tempVrijeme[0] < $pomVrijeme[0]) {
					$veci = true;
				} else if($tempDatum[0] == $pomDatum[0] && $tempDatum[1] == $pomDatum[1] && $tempDatum[2] == $pomDatum[2] && $tempVrijeme[0] == $pomVrijeme[0] && $tempVrijeme[1] < $pomVrijeme[1]) {
					$veci = true;
				} else if($tempDatum[0] == $pomDatum[0] && $tempDatum[1] == $pomDatum[1] && $tempDatum[2] == $pomDatum[2] && $tempVrijeme[0] == $pomVrijeme[0] && $tempVrijeme[1] == $pomVrijeme[1] && $tempVrijeme[2] < $pomVrijeme[2]) {
					$veci = true;
				} else {
					$veci = false;
					//continue;
					//break;
					$x = $sveVijesti[$a];
					$sveVijesti[$a] = $sveVijesti[$i];
					$sveVijesti[$i] = $x;
				}
			}

		}
		foreach ($sveVijesti as $value) {
			$temp = explode(',', $value);
			prikaziVijest($temp[0],$temp[1],$temp[2],$temp[3],$temp[4],$temp[5]);
		}

		if($sortirajAbecedno) echo "Hello";

		print "</div>";
	?>


	<div id="footer">
		<ul id="drmreze">
			<li><a href="http://www.facebook.com" target="_blank"><img src="facebook.png" alt="Facebook"></a></li>
			<li><a href="http://www.twitter.com" target="_blank"><img src="twitter.png" alt="Twitter"></a></li>
			<li><a href="http://www.youtube.com" target="_blank"><img src="youtube.jpg" alt="Youtube"></a></li>
			<li><a href="https://plus.google.com/explore" target="_blank"><img src="googleplus.png" alt="Google +"></a></li>
		</ul>
		<p id="copyright">Copyright (c) Mirnes Peljto  <a href="#Top">Top</a></p>
	</div>
</div>
</body>
</html>