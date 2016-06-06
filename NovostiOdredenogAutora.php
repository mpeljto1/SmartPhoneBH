<!DOCTYPE html>
<html>
<head>
   <title>SmartphoneBH</title>
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
   <div id="okvirZaNovosti">
   
   <?php
   session_start();
  
      $idAutora = $_REQUEST['var'];
   
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
      $sql = "SELECT datum, putanja, altSlike, tekst FROM novosti WHERE autor='$idAutora'";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
          $putanja = $row['putanja'];
          $altSlike = $row['altSlike'];
          $tekst = $row['tekst'];
          $datum = $row['datum'];

          $sveVijesti = $_SESSION['sveVijesti'];
          $x = 0;
         foreach ($sveVijesti as $value) {
            $temp = explode(',', $value);
            if($temp[5] == $tekst) $idVijesti = $x;
             $x = $x +1;
           }

          
          print '<a href="NovostDetaljno.php?varname=' .$idVijesti . '">';
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
      $conn->close();
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