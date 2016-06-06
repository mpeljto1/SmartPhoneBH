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

	/******************************************************************************* za dodavanje autora **************************************/
	function validirajImeAutora() {
		var nazivRegex = /^[A-Z]{1}[a-z]{2,9}$/gm;
		var validirano = false;
		var tekst = document.getElementById("ime");
		if(!nazivRegex.test(tekst.value)) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaIme").innerHTML = "Prvo veliko slovo i max 10 znakova";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaIme").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajPrezimeAutora() {
		var nazivRegex = /^[A-Z]{1}[a-z]{3,14}$/gm;
		var validirano = false;
		var tekst = document.getElementById("prezime");
		if(!nazivRegex.test(tekst.value)) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaPrezime").innerHTML = "Prvo veliko slovo i max 15 znakova";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaPrezime").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajUsernameAutora() {
		var nazivRegex = /^[a-z]{3,10}$/gm;
		var validirano = false;
		var tekst = document.getElementById("username");
		if(!nazivRegex.test(tekst.value)) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaUsername").innerHTML = "Mala slova i min 3 i max 10 znakova";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaUsername").innerHTML = "";
			validirano = true;
		}
		if(tekst.value === "admin") {
			document.getElementById("pZaUsername").innerHTML = "Nemože username biti admin";
			tekst.style.backgroundColor = "red";
			validirano = false;
		}
		return validirano;
	}

	function validirajPasswordAutora() {
		var nazivRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/gm;
		var validirano = false;
		var tekst = document.getElementById("password");
		if(!nazivRegex.test(tekst.value)) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaPassword").innerHTML = "Minimalno 8 slova i jedan broj";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaPassword").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajIme() {
		setInterval(validirajImeAutora,100);
	}
	function validirajPrezime() {
		setInterval(validirajPrezimeAutora,100);
	}
	function validirajUsername() {
		setInterval(validirajUsernameAutora,100);
	}
	function validirajPassword() {
		setInterval(validirajPasswordAutora,100);
	}

	function provjeraKorisnika() {
		if(validirajImeAutora() && validirajPrezimeAutora() && validirajUsernameAutora() && validirajPasswordAutora()) return true;
		return false;
	}
	/**************************************za brisanje novosti i komentara validacija *************************************/
	function validirajIdNov() {
		var nazivRegex = /^[0-9]+$/gm;
		var validirano = false;
		var tekst = document.getElementById("idnov");
		if(!nazivRegex.test(tekst.value)) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaIdN").innerHTML = "Samo brojevi";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaIdN").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajIdKom() {
		var nazivRegex = /^[0-9]+$/gm;
		var validirano = false;
		var tekst = document.getElementById("idkom");
		if(!nazivRegex.test(tekst.value)) {
			tekst.style.backgroundColor = "red";
			document.getElementById("pZaIdK").innerHTML = "Samo brojevi";
		} else {
			tekst.style.backgroundColor = "white";
			document.getElementById("pZaIdK").innerHTML = "";
			validirano = true;
		}
		return validirano;
	}

	function validirajIdN() {
		setInterval(validirajIdNov, 100);
	}
	function validirajIdK() {
		setInterval(validirajIdKom, 100);
	}
	function val() {
		document.getElementById("log").innerHTML = "Logout";
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
           //$vijesti = file("vijesti.csv");
           
            $vrijemeI = test_input($_POST['vrijeme']);
            $nazivSlikeI = test_input($_POST['nazivSlike']);
            $altNazivSlikeI = test_input($_POST['altNazivSlike']);
            $kodDrzaveI = test_input($_POST['kodDrzave']);
            $brojAutoraI = test_input($_POST['brojAutora']);
            $tekstI = test_input($_POST['tekst']);
            $tekstI = str_replace(",", "?!?error", $tekstI); // ovo sam dodao a nije bilo
            $moguceKomentarisati = $_POST['choice'];
            //$nova =$vrijemeI.",".$nazivSlikeI.",".$altNazivSlikeI.",".$kodDrzaveI.",".$brojAutoraI.",".$tekstI."\n"; 
            //array_push($vijesti, $nova);
            //file_put_contents("vijesti.csv", $vijesti); 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smartphonebh";
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 

			$trenutniAutor = $_SESSION['username'];
			$sql = "SELECT id FROM autori WHERE username='$trenutniAutor'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$autorid = $row['id'];
			$sql = "INSERT INTO novosti (datum, putanja, altSlike, kodDrzave, brojAutora, tekst, autor, OtvorenoZaKomentare) VALUES ('$vrijemeI', '$nazivSlikeI', '$altNazivSlikeI', '$kodDrzaveI', '$brojAutoraI', '$tekstI','$autorid', '$moguceKomentarisati')";

			if ($conn->query($sql) === TRUE) {
    			print '<div id="poruka">';
               print '<p>Novost dodana uspješno!';
               print "</p>";
               print "</div>";
			} else {
				print '<div id="poruka">';
    			echo "Error: " . $sql . "<br>" . $conn->error;
    			print "</div>";
			}

			$conn->close();
    }

    if(isset($_POST['dodajButton'])) {
    	$imeI = test_input($_POST['imeAutora']);
    	$prezimeI = test_input($_POST['prezimeAutora']);
    	$usernameI = test_input($_POST['usernameAutora']);
    	$passwordI = test_input($_POST['passwordAutora']);
    	$pass = password_hash($passwordI, PASSWORD_DEFAULT);
    	$ok = true;
    		$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smartphonebh";
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT username, password FROM autori";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()) {
				if($row['username'] == $usernameI || password_verify($passwordI, $row['password'])) {
					$ok = false;
					echo '<script type="text/javascript">alert("Korisnik sa datim username-om ili password-om već postoji.");</script>';
				}
			}
			if($ok) {
				$sql = "INSERT INTO autori (ime, prezime, username, password) VALUES ('$imeI', '$prezimeI', '$usernameI', '$pass')";

				if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Korisnik dodan uspješno!";
    				print "</div>";
				} else {
					print '<div id="poruka">';
    				echo "Error: " . $sql . "<br>" . $conn->error;
    				print "</div>";
				} 
			}	
			$conn->close();
    }

    if(isset($_POST['obrisiButton'])) {
    	$usernameI = test_input($_POST['usernameAutora']);

    	$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smartphonebh";
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "DELETE FROM autori WHERE username='$usernameI'";
			if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Korisnik izbrisan uspješno!";
    				print "</div>";
				} else {
					print '<div id="poruka">';
    				echo "Error: " . $sql . "<br>" . $conn->error;
    				print "</div>";
			} 
			$conn->close();
    }

    if(isset($_POST['izmjeniButton'])) {
    	$korisnikZaIzmjenu = test_input($_POST['izmjUsername']);

    	$imeI = test_input($_POST['iimeAutora']);
    	$prezimeI = test_input($_POST['iprezimeAutora']);
    	$usernameI = test_input($_POST['iusernameAutora']);
    	$passwordI = test_input($_POST['ipasswordAutora']);
    	$pass = password_hash($passwordI, PASSWORD_DEFAULT);
    	$ok = false;
    		$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smartphonebh";
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 

			$sql = "SELECT username, password FROM autori";
			$result = $conn->query($sql);
			while($temp = $result->fetch_assoc()) {
				if($temp['username'] == $korisnikZaIzmjenu) $ok = true;
			}
			while($row = $result->fetch_assoc()) {
				
				if($row['username'] == $usernameI || password_verify($passwordI, $row['password'])) {
					$ok = false;
					echo '<script type="text/javascript">alert("Korisnik sa datim username-om ili password-om već postoji.");</script>';
				}
			}
			if($ok) {
				if(isset($_POST['iimeAutora']) && $_POST['iimeAutora'] != "") {

				$sql = "UPDATE autori SET ime='$imeI' WHERE username='$korisnikZaIzmjenu'";

				if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Ime autora promijenjeno!";
    				print "</div>";
				} else {
					print '<div id="poruka">';
    				echo "Error: " . $sql . "<br>" . $conn->error;
    				print "</div>";
				} 
			}

			if(isset($_POST['iprezimeAutora']) && $_POST['iprezimeAutora'] != "") {

				$sql = "UPDATE autori SET prezime='$prezimeI' WHERE username='$korisnikZaIzmjenu'";

				if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Prezime autora promijenjeno!";
    				print "</div>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				} 
			}

			if(isset($_POST['ipasswordAutora']) && $_POST['ipasswordAutora'] !="") {

				$sql = "UPDATE autori SET password='$pass' WHERE username='$korisnikZaIzmjenu'";

				if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Password autora promijenjeno!";
    				print "</div>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				} 
			}

			if(isset($_POST['iusernameAutora']) && $_POST['iusernameAutora'] != "") {

				$sql = "UPDATE autori SET username='$usernameI' WHERE username='$korisnikZaIzmjenu'";

				if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Username autora promijenjeno!";
    				print "</div>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				} 
			}
			}	
			$conn->close();
    }

    if(isset($_POST['obrisiNovost'])) {
    	$idNovostiI = test_input($_POST['idNovosti']);

    	$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smartphonebh";
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "DELETE FROM komentari WHERE novost='$idNovostiI'";
			$conn->query($sql);
			$sql = "DELETE FROM novosti WHERE id='$idNovostiI'";
			if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Novost izbrisana uspješno!";
    				print "</div>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
			} 
			$conn->close();
    }

    if(isset($_POST['obrisiKomentar'])) {
    	$idNovostiI = test_input($_POST['idKomentara']);

    	$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smartphonebh";
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "DELETE FROM komentari WHERE id='$idNovostiI'";
			if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Komentar izbrisan uspješno!";
    				print "</div>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
			} 
			$conn->close();
    }

    if(isset($_POST['dozvoliKomentare'])) {
    	$idNovostiI = test_input($_POST['idNovosti']);

    	$servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smartphonebh";
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 
			$sql = "SELECT OtvorenoZaKomentare FROM novosti WHERE id='$idNovostiI'";
			$result = $conn->query($sql);
			$temp = $result->fetch_assoc();
			if($temp['OtvorenoZaKomentare'] == "DA") {
				$sql = "UPDATE novosti SET OtvorenoZaKomentare='NE' WHERE id='$idNovostiI'";
				if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Komentarisanje onemogućeno!";
    				print "</div>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}	 
			} else {
				$sql = "UPDATE novosti SET OtvorenoZaKomentare='DA' WHERE id='$idNovostiI'";
				if ($conn->query($sql) === TRUE) {
					print '<div id="poruka">';
    				echo "Komentarisanje dozvoljeno!";
    				print "</div>";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}	 
			}
			$conn->close();
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
				<li id="liLogin"><a href="LoginPage.php">Login/Logout</a></li>
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
		<textarea id="tekstVijesti" placeholder="Tekst" rows="5" cols="25" name="tekst" onfocus="validirajTekst()"></textarea> <p id="pZaTekst" class="error"></p> <br>
		<label>Novost se može komentarisati</label> 
		<input type="radio" name="choice" id="radioDa" value="DA">DA <br>
		<input type="radio" name="choice" id="radioNe" value="NE">NE <br>
		<label>. </label>
		<input type="submit" name="DodajVijest" value="Unesi vijest" id="unosVijestiButton">
	</form>

	<?php 
		if($_SESSION['username'] === "admin") {
	?>	

	<form method="post" action="adminPage.php" id="AdminBrisanjeNovosti">
		<h2>Brisanje novosti / komentara</h2>
		<label for="id">Id novosti</label>
		<input type="text" name="idNovosti" id="idnov" onfocus="validirajIdN()"> <p id="pZaIdN" class="error"></p> <br>
		<label for="id">Id komentara</label>
		<input type="text" name="idKomentara" id="idkom" onfocus="validirajIdK()"> <p id="pZaIdK" class="error"></p> <br> <br>
		<label>. </label>
		<input type="submit" name="obrisiNovost" value="Obriši Novost">
		<input type="submit" name="obrisiKomentar" value="Obriši komentar">
		<input type="submit" name="dozvoliKomentare" value="Dozovoli komentare?">

	</form>	

	<form method="post" action="AdminPage.php" id="adminPageKorisnici" onsubmit="return provjeraKorisnika()">
		<h2>Unos / brisanje korisnika</h2>
		<label for="ime">Ime autora:</label>
		<input type="text" name="imeAutora" id="ime" onfocus="validirajIme()"> <p id="pZaIme" class="error"></p> <br>
		<label for="prezime">Prezime autora:</label>
		<input type="text" name="prezimeAutora" id="prezime" onfocus="validirajPrezime()"> <p id="pZaPrezime" class="error"></p> <br>
		<label for="username">Username autora:</label>
		<input type="text" name="usernameAutora" id="username" onfocus="validirajUsername()"> <p id="pZaUsername" class="error"></p> <br>
		<label for="password">Password autora:</label>
		<input type="password" name="passwordAutora" id="password" onfocus="validirajPassword()"> <p id="pZaPassword" class="error"></p> <br> <br>
		<label>. </label> 
		<input type="submit" name="dodajButton" value="Dodaj" id="dodajAutora">
		<input type="submit" name="obrisiButton" value="Obriši" id="obrisiAutora">
	</form>

	<form method="post" action="adminPage.php" id="adminUpdatePage">
		<h2>Update korisnika</h2>
		<label>Username korisnika za izmjenu:</label>
		<input type="text" name="izmjUsername" id="iuser">  <p id=pZaIusername></p> <br> 
		<p>Novi podaci za korisnika:</p> <br>
		<label for="iime">Ime autora:</label>
		<input type="text" name="iimeAutora" id="iime"> <p id="pZaiIme" class="error"></p> <br>
		<label for="iprezime">Prezime autora:</label>
		<input type="text" name="iprezimeAutora" id="iprezime"> <p id="pZaiPrezime" class="error"></p> <br>
		<label for="iusername">Username autora:</label>
		<input type="text" name="iusernameAutora" id="iusername"> <p id="pZaiUsername" class="error"></p> <br>
		<label for="ipassword">Password autora:</label>
		<input type="password" name="ipasswordAutora" id="ipassword"> <p id="pZaiPassword" class="error"></p> <br> <br>
		<label>. </label>
		<input type="submit" name="izmjeniButton" value="Izmijeni" id="izmjeniAutora">
	</form>


	<?php
		}
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