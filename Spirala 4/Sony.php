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
			<a href="Naslovnica.php" id="linkLogo"><div id="okvirTelefona"></div></a>
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
	<h1>Sony phones</h1>
	<table id="tabelaSlike">
		<tr>
			<th>Xperia X Performance</th>
			<th>Xperia X</th>
			<th>Xperia Z5</th>
			<th>Xperia M5</th>
			<th>Xperia C5</th>
		</tr>
		<tr class="parni">
			<td><img src="Sonyslike/xperiaxperformance.jpg" alt="Xperia X Performance"></td>
			<td><img src="Sonyslike/xperiax.jpg" alt="Xperia x"></td>
			<td><img src="Sonyslike/xperiaz5.jpg" alt="Xperia Z5"></td>
			<td><img src="Sonyslike/xperiam5.jpg" alt="Xperia M5"></td>
			<td><img src="Sonyslike/xperiac5.jpg" alt="Xperia C5"></td>
		</tr>
		<tr>
			<th>Xperia Z3</th>
			<th>Xperia C4</th>
			<th>Xperia Z4 Tablet</th>
			<th>Xperia E4</th>
			<th>Xperia T3</th>
		</tr>
		<tr>
			<td><img src="Sonyslike/xperiaz3.jpg" alt="Xperia Z3"></td>
			<td><img src="Sonyslike/xperiac4.jpg" alt="Xperia C4"></td>
			<td><img src="Sonyslike/xperiaz4tablet.jpg" alt="Xperia Z4 Tablet"></td>
			<td><img src="Sonyslike/xperiae4.jpg" alt="Xperia E4"></td>
			<td><img src="Sonyslike/xperiat3.jpg" alt="Xperia T3"></td>

		</tr>
		<tr>
			<th>Xperia Z2</th>
			<th>Xperia SP</th>
			<th>Xperia V</th>
			<th>Xperia Tablet S</th>
			<th>Xperia Tipo</th>
		</tr>
		<tr class="parni">
			<td><img src="Sonyslike/xperiaz2.jpg" alt="Xperia Z2"></td>
			<td><img src="Sonyslike/xperiasp.jpg" alt="Xperia SP"></td>
			<td><img src="Sonyslike/xperiav.jpg" alt="Xperia V"></td>
			<td><img src="Sonyslike/xperiatablets.jpg" alt="Xperia Tablet S"></td>
			<td><img src="Sonyslike/xperiatipo.jpg" alt="Xperia Tipo"></td>
		</tr>
		<tr>
			<th>Xperia Miro</th>
			<th>Xperia Neo L</th>
			<th>Xperia P</th>
			<th>Xperia Ion</th>
			<th>Xperia S</th>
		</tr>
		<tr>
			<td><img src="Sonyslike/xperiamiro.jpg" alt="Xperia Miro"></td>
			<td><img src="Sonyslike/xperianeol.jpg" alt="Xperia Neo L"></td>
			<td><img src="Sonyslike/xperiap.jpg" alt="Xperia P"></td>
			<td><img src="Sonyslike/xperiaion.jpg" alt="Xperia Ion"></td>
			<td><img src="Sonyslike/xperias.jpg" alt="Xperia S"></td>
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