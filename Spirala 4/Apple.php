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
	<h1>Apple phones</h1>
	<table id="tabelaSlike">
		<tr>
			<th>iPhone 6s Plus</th>
			<th>iPhone 6s</th>
			<th>iPad Pro</th>
			<th>iPad Mini 4</th>
			<th>Apple Watch</th>
		</tr>
		<tr class="parni">
			<td><img src="Appleslike/iphone6splus.jpg" alt="iPhone 6s Plus"></td>
			<td><img src="Appleslike/iphone6s.jpg" alt="iPhone 6s"></td>
			<td><img src="Appleslike/ipadpro.jpg" alt="iPad Pro"></td>
			<td><img src="Appleslike/ipadmini4.jpg" alt="iPad Mini 4"></td>
			<td><img src="Appleslike/applewatch.jpg" alt="Apple Watch"></td>
		</tr>
		<tr>
			<th>iPad Air 2</th>
			<th>iPad Mini 3</th>
			<th>iPhone 6 Plus</th>
			<th>iPhone 6</th>
			<th>iPhone 5s</th>
		</tr>
		<tr>
			<td><img src="Appleslike/ipadair2.jpg" alt="iPad Air 2"></td>
			<td><img src="Appleslike/ipadmini3.jpg" alt="iPad Mini 3"></td>
			<td><img src="Appleslike/iphone6plus.jpg" alt="iPhone 6 Plus"></td>
			<td><img src="Appleslike/iphone6.jpg" alt="iPhone 6"></td>
			<td><img src="Appleslike/iphone5s.jpg" alt="iPhone 5s"></td>

		</tr>
		<tr>
			<th>iPhone 5c</th>
			<th>iPad 4</th>
			<th>iPhone 5</th>
			<th>iPhone 4s</th>
			<th>iPhone 4</th>
		</tr>
		<tr class="parni">
			<td><img src="Appleslike/iphone5c.jpg" alt="iPhone 5c"></td>
			<td><img src="Appleslike/ipad4.jpg" alt="iPad 4"></td>
			<td><img src="Appleslike/iphone5.jpg" alt="iPhone 5"></td>
			<td><img src="Appleslike/iphone4s.jpg" alt="iPhone 4s"></td>
			<td><img src="Appleslike/iphone4.jpg" alt="iPhone 4"></td>
		</tr>
		<tr>
			<th>iPad 2</th>
			<th>iPhone 3gs</th>
			<th>iPad</th>
			<th>iPhone 3g</th>
			<th>iPhone</th>
		</tr>
		<tr>
			<td><img src="Appleslike/ipad2.jpg" alt="iPad 2"></td>
			<td><img src="Appleslike/iphone3gs.jpg" alt="iPhone 3gs"></td>
			<td><img src="Appleslike/ipad.jpg" alt="iPad"></td>
			<td><img src="Appleslike/iphone3g.jpg" alt="iPhone 3g"></td>
			<td><img src="Appleslike/iphone.jpg" alt="iPhone"></td>
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