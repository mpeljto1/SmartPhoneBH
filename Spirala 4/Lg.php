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
	<h1>Lg phones</h1>
	<table id="tabelaSlike">
		<tr>
			<th>G5</th>
			<th>K8</th>
			<th>K10</th>
			<th>Nexus 5X</th>
			<th>V10</th>
		</tr>
		<tr class="parni">
			<td><img src="LGslike/g5.jpg" alt="Lg G5"></td>
			<td><img src="LGslike/k8.jpg" alt="Lg K8"></td>
			<td><img src="Lgslike/k10.jpg" alt="Lg K10"></td>
			<td><img src="Lgslike/5x.jpg" alt="Lg Nexus 5X"></td>
			<td><img src="Lgslike/v10.jpg" alt="Lg V10"></td>
		</tr>
		<tr>
			<th>G3</th>
			<th>G Flex 2</th>
			<th>L Prime</th>
			<th>Nexus 5</th>
			<th>G Pro 2</th>
		</tr>
		<tr>
			<td><img src="Lgslike/g3.jpg" alt="Lg G3"></td>
			<td><img src="Lgslike/gflex2.jpg" alt="Lg G Flex 2"></td>
			<td><img src="Lgslike/lprime.jpg" alt="Lg L Prime"></td>
			<td><img src="Lgslike/nexus5.jpg" alt="Lg Nexus 5"></td>
			<td><img src="Lgslike/gpro2.jpg" alt="Lg G Pro 2"></td>

		</tr>
		<tr>
			<th>4X</th>
			<th>F7</th>
			<th>G Flex</th>
			<th>G Pad 8.0</th>
			<th>G</th>
		</tr>
		<tr class="parni">
			<td><img src="Lgslike/4x.jpg" alt="Lg Optimus 4x"></td>
			<td><img src="Lgslike/f7.jpg" alt="Lg F7"></td>
			<td><img src="Lgslike/gflex.jpg" alt="Lg G Flex"></td>
			<td><img src="Lgslike/gpad8.0.jpg" alt="Lg G Pad 8.0"></td>
			<td><img src="Lgslike/g.jpg" alt="Lg Optimus G"></td>
		</tr>
		<tr>
			<th>2X</th>
			<th>G2 Mini</th>
			<th>G4</th>
			<th>L5</th>
			<th>Nexus 4</th>
		</tr>
		<tr>
			<td><img src="Lgslike/2x.jpg" alt="Lg Optimus 2X"></td>
			<td><img src="Lgslike/g2mini.jpg" alt="Lg G2 Mini"></td>
			<td><img src="Lgslike/g4.jpg" alt="Lg G4"></td>
			<td><img src="Lgslike/l5.jpg" alt="Lg L5"></td>
			<td><img src="Lgslike/nexus4.jpg" alt="Lg Nexus 4"></td>
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