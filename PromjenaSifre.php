<?php
   session_start();

   	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
			if(isset($_POST['promijeni'])) {
			$nova = test_input($_POST['novaSifra']);
			$pass = password_hash($nova, PASSWORD_DEFAULT);
   			define('DB_HOST',getenv('OPENSHIFT_MYSQL_DB_HOST'));
        define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
        define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
        define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
        define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

            $servername = constant("DB_HOST");
            $username = constant("DB_USER");
            $password = constant("DB_PASS");
            $dbname = constant("DB_NAME");
            // Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			} 
			$x = $_SESSION['username'];
			$sql = "UPDATE autori SET password='$pass' WHERE username= '$x'";

				if ($conn->query($sql) === TRUE) {
    				echo "Password autora promijenjeno!";
				} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
				} 
			}

			if(isset($_POST['nazad'])) {
				header('Location: LoginPage.php');
			}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Promjena šifre</title>
	<script type="text/javascript">
		function validirajPasswordAutora() {
		var nazivRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/gm;
		var validirano = false;
		var tekst = document.getElementById("novipass");
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
	function validiraj() {
		set_interval(validirajPasswordAutora, 100);
	}
	</script>
</head>
<body>
	<form method="post" action="PromjenaSifre.php" onsubmit="return validirajPasswordAutora()">
		<label>Nova šifra:</label>
		<input type="password" name="novaSifra" id="novipass" onfocus="validiraj()"> <p id="pZaPassword" class="error"></p> <br> <br>
		<input type="submit" name="promijeni" value="Promijeni šifru">
	</form>
	<form method="post" action="PromjenaSifre.php">
		<input type="submit" name="nazad" value="Nazad">		
	</form>

</body>
</html>