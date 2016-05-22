<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>SmartphoneBH - Admin stranica</title>
	<link rel="stylesheet" type="text/css" href="SmartphoneBH.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="prikazVremenaObjave.js"></script>
	<script type="text/javascript" src="sortiranjeNovosti.js"></script>
	<script type="text/javascript">

	function leapYear(year) {
  		return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
	}

	function validirajVrijemeObjave() {
	var validirano = false;
	//var dateREgex = /^\d{2}\.\d{2}\.\d{4}\ \d{2}\:\d{2}\:\d{2}$/gm;
	var dateREgex = /^\d{4}\-\d{2}\-\d{2}\ \d{2}\:\d{2}\:\d{2}$/gm;

	var vrijemeObjave = document.getElementById("vrijemeObjave");
	var datum = vrijemeObjave.value;
	var brojDanaUMjesecu = [31,28,31,30,31,30,31,31,30,31,30,31];

	
	var d = new Date();


   if(!dateREgex.test(datum)) {
    	vrijemeObjave.style.backgroundColor = "red";
    	document.getElementById("pZaVrijeme").innerHTML = "Format vremena: yyyy-mm.dd hh:mm:ss";
    } else {
    	var temp = datum.split(" ");
		var dautumDio = temp[0].split("-");
		var vrijemeDio = temp[1].split(":");
	
		if(leapYear(dautumDio[2])) brojDanaUMjesecu[1] += 1;
		if(dautumDio[1] > 0 && dautumDio[1] < 13 && dautumDio[2] >0 && dautumDio[2] <= brojDanaUMjesecu[dautumDio[1] - 1] && dautumDio[0] >= d.getFullYear() && vrijemeDio[0] > 0 && vrijemeDio[0] <= 23 && vrijemeDio[1] >= 0 && vrijemeDio[1] <= 59 && vrijemeDio[2] >= 0 && vrijemeDio[2] <= 59) {

    		vrijemeObjave.style.backgroundColor = "white";
    		document.getElementById("pZaVrijeme").innerHTML = "";
    		validirano = true;
    	} else {
    		vrijemeObjave.style.backgroundColor = "red";
    		document.getElementById("pZaVrijeme").innerHTML = "Unesite ispravan datum i vrijeme! + Ne možete unijeti godinu prije trenutne"
    	}
    }
    return validirano;
	}

	function validirajNazivSlike() {
		var nazivRegex = /^[a-z]+\.jpg$/gm;
		var validirano = false;
		var nazivSlike = document.getElementById("slika");
		if(!nazivRegex.test(nazivSlike.value)) {
			nazivSlike.style.backgroundColor = "red";
			document.getElementById("pZaSliku").innerHTML = "Format naziva: aaaaaa....aaaa.jpg";
		} else {
			nazivSlike.style.backgroundColor = "white";
			document.getElementById("pZaSliku").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajTesktVijesti() {
		var validirano = false;
		var tekst = document.getElementById("tekstVijesti");
		if(tekst.value.length < 15) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaTekst").innerHTML = "Tekst ne može biti kraci od 15 znakova!";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaTekst").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajAltNazivSlike() {
		var nazivRegex = /^[a-z 0-9]+$/gm;
		var validirano = false;
		var tekst = document.getElementById("altSlika");
		if(!nazivRegex.test(tekst.value)) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaAlt").innerHTML = "Tekst ne može sadržavati zarez!";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaAlt").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajKodDrzave() {
		var validirano = false;
		var nazivRegex = /^[a-z]{2}$/gm;
		var kod = document.getElementById("kDrzave");
		if(!nazivRegex.test(kod.value)) {
			kod.style.backgroundColor = "red";
			document.getElementById("pZaKodDrzave").innerHTML = "Unesite kod drzave";
		} else {
			kod.style.backgroundColor = "white";
			document.getElementById("pZaKodDrzave").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajBrojAutora() {
		var validirano = false;
		var broj = document.getElementById("bAutora");
		if(broj.value.indexOf(",") != -1 || broj.value.length < 4) {
			broj.style.backgroundColor = "red";
			document.getElementById("pZaAutora").innerHTML = "Unesite broj autora";
		} else {
			broj.style.backgroundColor = "white";
			document.getElementById("pZaAutora").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	

	function validirajVrijeme() {
		setInterval(validirajVrijemeObjave,100);
	}
	function validirajSliku() {
		setInterval(validirajNazivSlike,100);
	}
	function validirajTekst() {
		setInterval(validirajTesktVijesti,100);
	}
	function validirajAltSlike() {
		setInterval(validirajAltNazivSlike,100);
	}
	function validirajKod() {
		setInterval(validirajKodDrzave,100);
	}
	function validirajAutora() {
		setInterval(validirajBrojAutora,100);
	}
	function provjeriKod() {
	var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () 
    {
    	
        if (ajax.readyState == 4 && ajax.status == 200)
        	var x = JSON.parse(ajax.responseText);
        	var pozivniBroj = x[0].callingCodes;
        	var brojAutora = document.getElementById("bAutora").value;
        	if(brojAutora.startsWith("+ " + pozivniBroj)) {
        		document.getElementById("validacija").innerHTML = "ok";
        	}
        	else {
        		document.getElementById("validacija").innerHTML = "nok";
        	}
			var temp = provjeriValidnost();
			if(temp==true && bool == true) {
				document.getElementById("adminPageForma").submit();
			}
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("pZaKodDrzave").innerHTML = "Greska: Nepoznat URL!";
    }
    var g = document.getElementById("kDrzave").value;
   
    g = encodeURIComponent(g);
    ajax.open("GET", "https://restcountries.eu/rest/v1/alpha?codes=" + g, true);
    ajax.send();	
}

	function provjeriValidnost() {
		if(validirajVrijemeObjave() && validirajNazivSlike() && validirajTesktVijesti() && validirajAltNazivSlike() && document.getElementById("validacija").innerHTML == "ok") return true;
		return false;
	}

	</script>
</head>
<body>

<?php
	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

	
	if (isset($_POST['DodajVijest'])) {
            $vijesti = file("vijesti.csv");
            /*
            $nova = $_POST['vrijeme'].",".$_POST['nazivSlike'].",".$_POST['altNazivSlike'].",".$_POST['kodDrzave'].",".$_POST['brojAutora'].",".$_POST['tekst']."\n";*/
            $vrijemeI = test_input($_POST['vrijeme']);
            $nazivSlikeI = test_input($_POST['nazivSlike']);
            $altNazivSlikeI = test_input($_POST['altNazivSlike']);
            $kodDrzaveI = test_input($_POST['kodDrzave']);
            $brojAutoraI = test_input($_POST['brojAutora']);
            $tekstI = test_input($_POST['tekst']);
            $tekstI = str_replace(",", "?!?error", $tekstI); // ovo sam dodao a nije bilo
            $nova =$vrijemeI.",".$nazivSlikeI.",".$altNazivSlikeI.",".$kodDrzaveI.",".$brojAutoraI.",".$tekstI."\n"; 
            array_push($vijesti, $nova);
            file_put_contents("vijesti.csv", $vijesti);
    }
?>

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
                	if(isset($_SESSION['login'])) {
            	?>  
                	<li id="liAdminPage"><a href="AdminPage.php">Admin Page</a></li>
            	<?php
                	}
            	?>  
			</ul>
		</div>
	</div>

	<form method="post" action="AdminPage.php" id="adminPageForma" onsubmit=" return provjeriValidnost()">
		<h2>Unos vijesti</h2>
		<label for="vrijemeObjave">Vrijeme objave:</label> 
		<input type="text" name="vrijeme" id="vrijemeObjave" onfocus="validirajVrijeme()" placeholder="npr. 2016-05-22 14:00:00"> <p id="pZaVrijeme" class="error"></p> <br>
		<label for="slika">Naziv slike:</label>
		<input type="text" name="nazivSlike" id="slika" onfocus="validirajSliku()" placeholder="npr. example.jpg"> <p id="pZaSliku" class="error"></p> <br>
		<label>Alt slike:</label>
		<input type="text" name="altNazivSlike" id="altSlika" onfocus="validirajAltSlike()"> <p id="pZaAlt" class="error"></p> <br>
		<label>Kod države:</label>
		<input type="text" name="kodDrzave" id="kDrzave" onblur="provjeriKod()" onfocus="validirajKod()"> <p id="pZaKodDrzave" class="error"></p> <p id="validacija" class="error"></p> <br>
		<label>Broj autora vijesti:</label>
		<input type="text" name="brojAutora" id="bAutora" onblur="provjeriKod()" onfocus="validirajAutora()"> <p id="pZaAutora" class="error"></p> <br>
		<label for="tekstVijesti">Tekst vijesti:</label> <br>
		<textarea id="tekstVijesti" placeholder="Tekst" rows="5" cols="25" name="tekst" onfocus="validirajTekst()"></textarea> <p id="pZaTekst" class="error"></p> <br> <br>
		<label>. </label>
		<input type="submit" name="DodajVijest" value="Unesi vijest" id="unosVijestiButton">
	</form>

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