<!DOCTYPE html>
<html>
<head>
	<title>SmartphoneBH - Tabele</title>
	<link rel="stylesheet" type="text/css" href="SmartphoneBH.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="omotac">
<div id="header">
	<div id="logo">
			<a href="Naslovnica.html" id="linkLogo"><div id="okvirTelefona"></div></a>
			<div id="dugme"></div>
			<div id="zvucnik"></div>
		</div>
	<a href="Naslovnica.html" id="naslovLink"><h1>SmartPhoneBH | Smartphone, Tablet Reviews, Tips and Tricks</h1></a>
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

<div id="lijevo">
	<ul>
		<li class="tabelaBrendovi"><a href="Samsung.php">Samsung</a></li>
		<li class="tabelaBrendovi"><a href="Apple.php">Apple</a></li>
		<li class="tabelaBrendovi"><a href="Sony.php">Sony</a></li>
		<li class="tabelaBrendovi"><a href="Lg.php">LG</a></li>
		<li class="tabelaBrendovi"><a href="Htc.php">HTC</a></li>
		<li class="tabelaBrendovi"><a href="Huawei.php">Huawei</a></li>
		<li class="tabelaBrendovi"><a href="Motorola.php">Motorola</a></li>
	</ul>
		
		
</div>

<div id="okvirZaTabelu">
	<h1>Huawei phones</h1>
	<table id="tabelaSlike">
		<tr>
			<th>Mate 8</th>
			<th>G7 Plus</th>
			<th>Honor 5X</th>
			<th>Nexus 6P</th>
			<th>Mate S</th>
		</tr>
		<tr class="parni">
			<td><img src="Huaweislike/mate8.jpg" alt="Huawei Mate 8"></td>
			<td><img src="Huaweislike/g7plus.jpg" alt="Huawei G7 Plus"></td>
			<td><img src="Huaweislike/honor5x.jpg" alt="Huawei Honor 5X"></td>
			<td><img src="Huaweislike/nexus6p.jpg" alt="Huawei Nexus 6P"></td>
			<td><img src="Huaweislike/mates.jpg" alt="Huawei Mate S"></td>
		</tr>
		<tr>
			<th>G8</th>
			<th>Honor 7</th>
			<th>MediaPad M2</th>
			<th>Honor 4C</th>
			<th>P8 Max</th>
		</tr>
		<tr>
			<td><img src="Huaweislike/g8.jpg" alt="Huawei G8"></td>
			<td><img src="Huaweislike/honor7.jpg" alt="Huawei Honor 7"></td>
			<td><img src="Huaweislike/m2.jpg" alt="Huawei MediaPad M2"></td>
			<td><img src="Huaweislike/honor4c.jpg" alt="Huawei Honor 4C"></td>
			<td><img src="Huaweislike/p8max.jpg" alt="Huawei P8 Max"></td>

		</tr>
		<tr>
			<th>P8 Lite</th>
			<th>P8</th>
			<th>Mate 7</th>
			<th>Honor 6</th>
			<th>Ascend P7</th>
		</tr>
		<tr class="parni">
			<td><img src="Huaweislike/p8lite.jpg" alt="Huawei P8 Lite"></td>
			<td><img src="Huaweislike/p8.jpg" alt="Huawei P8"></td>
			<td><img src="Huaweislike/mate7.jpg" alt="Huawei Mate 7"></td>
			<td><img src="Huaweislike/honor6.jpg" alt="Huawei Honor 6"></td>
			<td><img src="Huaweislike/ascendp7.jpg" alt="Huawei Ascend P7"></td>
		</tr>
		<tr>
			<th>Honor 3C</th>
			<th>Ascend P6</th>
			<th>Honor 2</th>
			<th>5S</th>
			<th>Y6</th>
		</tr>
		<tr>
			<td><img src="Huaweislike/honor3c.jpg" alt="Huawei Honor 3C"></td>
			<td><img src="Huaweislike/ascendp6.jpg" alt="Huawei Ascend P6"></td>
			<td><img src="Huaweislike/honor2.jpg" alt="Huawei Honor 2"></td>
			<td><img src="Huaweislike/5s.jpg" alt="Huawei 5S"></td>
			<td><img src="Huaweislike/y6.jpg" alt="Huawei Y6"></td>
		</tr>
	</table>
</div>

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