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
	<h1>HTC phones</h1>
	<table id="tabelaSlike">
		<tr>
			<th>Desire 825</th>
			<th>X9</th>
			<th>Butterfly 3</th>
			<th>A9</th>
			<th>Desire 526</th>
		</tr>
		<tr class="parni">
			<td><img src="Htcslike/desire825.jpg" alt="Htc Desire 825"></td>
			<td><img src="Htcslike/x9.jpg" alt="Htc X9"></td>
			<td><img src="Htcslike/butterfly3.jpg" alt="Htc Butterfly 3"></td>
			<td><img src="Htcslike/a9.jpg" alt="Htc A9"></td>
			<td><img src="Htcslike/desire526.jpg" alt="Htc Desire 526"></td>
		</tr>
		<tr>
			<th>E9</th>
			<th>Nexus 9</th>
			<th>Desire Eye</th>
			<th>Desire 616</th>
			<th>M8</th>
		</tr>
		<tr>
			<td><img src="Htcslike/e9.jpg" alt="Htc E9"></td>
			<td><img src="Htcslike/nexus9.jpg" alt="Htc Nexus 9"></td>
			<td><img src="Htcslike/eye.jpg" alt="Htc Desire Eye"></td>
			<td><img src="Htcslike/desire616.jpg" alt="Htc Desire 616"></td>
			<td><img src="Htcslike/m8.jpg" alt="Htc M8"></td>

		</tr>
		<tr>
			<th>Desire 501</th>
			<th>Desire 700</th>
			<th>Desire L</th>
			<th>Desire P</th>
			<th>Desire U</th>
		</tr>
		<tr class="parni">
			<td><img src="Htcslike/desire501.jpg" alt="Htc Desire 501"></td>
			<td><img src="Htcslike/desire700.jpg" alt="Htc Desire 700"></td>
			<td><img src="Htcslike/desirel.jpg" alt="Htc Desire L"></td>
			<td><img src="Htcslike/desirep.jpg" alt="Htc Desire P"></td>
			<td><img src="Htcslike/desireu.jpg" alt="Htc Desire U"></td>
		</tr>
		<tr>
			<th>Droid DNA</th>
			<th>Windows Phone</th>
			<th>XL</th>
			<th>Evo3D</th>
			<th>Wildfire S</th>
		</tr>
		<tr>
			<td><img src="Htcslike/droiddna.jpg" alt="Htc Droid DNA"></td>
			<td><img src="Htcslike/windowsphone.jpg" alt="Windows Phone"></td>
			<td><img src="Htcslike/xl.jpg" alt="Htc XL"></td>
			<td><img src="Htcslike/evo3d.jpg" alt="Htc Evo3D"></td>
			<td><img src="Htcslike/wildfire.jpg" alt="Htc Wildfire S"></td>
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