<!DOCTYPE html>
<html>
<head>
   <title>SmartphoneBH - LoginPage</title>
   <link rel="stylesheet" type="text/css" href="SmartphoneBH.css">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script type="text/javascript" src="prikazVremenaObjave.js"></script>
   <script type="text/javascript" src="sortiranjeNovosti.js"></script>
<?php
   session_start();
  
  $username ='';
  if(isset($_GET['logout']) && isset($_SESSION['login'])) {
        unset($_SESSION['login']);

  }

  if (isset($_SESSION['username']))
        $username = $_SESSION['username'];
    
   if(isset($_POST['login'])) {
        $file = explode( PHP_EOL, file_get_contents( "korisnici.csv" ));
        foreach( $file as $line ) {
            list($username, $password) = explode("," , $line);
            if ($_POST['username'] == $username && password_verify($_POST['password'],$password)) {
                $_SESSION['login'] = true; 
                $_SESSION['username'] = $username;
                break;
        }
      }
  }

  if(isset($_POST['logout'])) {
    unset($_SESSION['login']);
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

   <div id="formaZaLogin">
      <h1>Login page</h1>
      <form id="formaLoginPage" method="post" action="LoginPage.php">
         <label for="ime">Username:</label>
         <input type="text" name="username" placeholder="Username:"><br><br>
         <label for="email">Password:</label>
         <input type="password" name="password" placeholder="Password"><br><br>
         <div id="buttonHolder">
            <input type="submit" value="Login" id="loginButton" name="login">
            <input type="submit" name="logout" value="Logout">
         </div>
      </form>
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