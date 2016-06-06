<!DOCTYPE html>
<html>
<head>
   <title>SmartphoneBH </title>
   <link rel="stylesheet" type="text/css" href="SmartphoneBH.css">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script type="text/javascript" src="prikazVremenaObjave.js"></script>
   <script type="text/javascript" src="sortiranjeNovosti.js"></script>
<?php
   session_start();
  
  if(isset($_POST['noviKomentar'])) {
                define('DB_HOST',getenv('OPENSHIFT_MYSQL_DB_HOST'));
        define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
        define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
        define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
        define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

            $servername = DB_HOST;
            $username = DB_USER;
            $password = DB_PASS;
            $dbname = DB_NAME;
            // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname);
               // Check connection
               if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
               } 

               $novost = $_POST['skrivenaVijest'];
               $tekstK = $_POST['tekstKomentara'];
               $dat = $_POST['datum'];
               $aut = $_POST['autor'];

               $sql = "INSERT INTO komentari (novost, tekst, datum, autor) VALUES ('$novost', '$tekstK', '$dat', '$aut')";

            if ($conn->query($sql) === TRUE) {
               print '<div id="poruka">';
               print '<p>Komentar dodan uspješno!';
               print "</p>";
               print "</div>";
            } else {
               echo "Error: " . $sql . "<br>" . $conn->error;
            } 
            $conn->close();
  }
  
 ?>  



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

   <div id="formaNovostDetaljno">
      <?php
         $sveVijesti = $_SESSION['sveVijesti'];
         $var = $_REQUEST['varname'];
         $x = 0;
         foreach ($sveVijesti as $value) {
            $temp = explode(',', $value);
            if($var == $x) {
               $datum = $temp[0];
               $putanja = $temp[1];
               $altSlike = $temp[2];
               $tekst = $temp[5];

               define('DB_HOST',getenv('OPENSHIFT_MYSQL_DB_HOST'));
        define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
        define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
        define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
        define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

            $servername = DB_HOST;
            $username = DB_USER;
            $password = DB_PASS;
            $dbname = DB_NAME;
            // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname);
               // Check connection
               if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
               } 

               $sql = "SELECT id FROM novosti WHERE tekst='$tekst'";
               $result = $conn->query($sql);
               $row = $result->fetch_assoc();
               $idVijesti = $row['id'];
               print '<div id="okvirZaNovosti">';
               print '<div class="novosti">';
               print '<img src="Novostislike/'.$putanja.'" alt="'.$altSlike.'"';
               print "/>";
               print "<p class='novTekst'>".str_replace("?!?error", ",", $tekst); // ovo sam dodao bilo .$tekst
               print "</p>";
               print '<div class="vrijemeObjave">'.$datum;
               print "</div>";
               print '<div class="porukaObjave">';
               print "</div>";
               print "</div>"; 
               print "</div>";
               print "<br>";
               if(isset($_SESSION['username'])) {
                  $temp = $_SESSION['username'];
                  $sql = "SELECT id FROM autori WHERE username='$temp'";
                  $result = $conn->query($sql);
                  $row = $result->fetch_assoc();
                  $idAutora = $row['id'];
               } else {
                  $idAutora=5;
               }
               date_default_timezone_set("Europe/Sarajevo");
               $dateNow = date('Y-m-d H:i:s');
               $sql = "SELECT OtvorenoZaKomentare FROM novosti WHERE id='$idVijesti'";
               $result = $conn->query($sql);
               $temp = $result->fetch_assoc();
               if($temp['OtvorenoZaKomentare'] == "DA") {
                     print "<form action=NovostDetaljno.php method=POST>";
                     print "Komentar:";
                     print "<input type=\"text\" name=\"tekstKomentara\">";
                     print "<input type=\"hidden\" name=\"autor\" value='".$idAutora."'>";
                     print "<p><input type=\"submit\" value=\"Postavi komentar\" name=\"noviKomentar\">";
                     print "<input type=\"hidden\" value=".$idVijesti." name=\"skrivenaVijest\">";
                     print "<input type=\"hidden\" name=\"datum\" value='".$dateNow."'>";
                     print "<input type=\"hidden\" name=\"varname\" value='".$var."'>";
                     print "</form>";
                  //print "<small>".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."</small>";
               } else {
                     print "<p>Vijest se ne može komentarisati";
                     print "</p>";
               }
               $sql = "SELECT autor FROM novosti WHERE id='$idVijesti'";
               $result = $conn->query($sql);
               $row = $result->fetch_assoc();
               $tempIdAutora = $row['autor']; // id autora u tabeli novosti
               $sql = "SELECT ime, prezime FROM autori WHERE id='$tempIdAutora'";
               $result = $conn->query($sql);
               $row = $result->fetch_assoc();
               $autorIme = $row['ime']." ".$row['prezime'];
               
               print '<a href="NovostiOdredenogAutora.php?var=' .$tempIdAutora. '">Sve novosti autora: '.$autorIme;
               print "</a>";
               $conn->close();
            }
            $x = $x + 1;
      }
         
      ?>
      
   </div>
   <div id="prikaziKomentare">
      <h2>Komentari za novost:</h2>
      <?php
          define('DB_HOST',getenv('OPENSHIFT_MYSQL_DB_HOST'));
        define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
        define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
        define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
        define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

            $servername = DB_HOST;
            $username = DB_USER;
            $password = DB_PASS;
            $dbname = DB_NAME;
            // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname);
               // Check connection
               if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
               } 

               $sql = "SELECT tekst FROM komentari WHERE novost='$idVijesti'";
               $result = $conn->query($sql);
               while($row = $result->fetch_assoc()) {
                  print $row['tekst'];
                  print "<br>";
                  print "<br>";
                /*  print "<form method='post' action='NovostDetaljno.php' id='comNacom'>";
                  print "<label>".$row['tekst'];
                  print "</label>";
                  print "<input type='submit' value='Komentarisi' name='comment'>";
                  print "</form>";*/
               }
               
      ?>
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