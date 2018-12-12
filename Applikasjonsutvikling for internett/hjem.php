<?php
// Denne siden er utviklet Eirik .. Sist gang endret: 08.06.2017
//kontrollert av Robert 08.06.2017
include 'include/db.php';
include 'include/FunksjonerAdmin.php';
$MenyID = $_POST['liste'];
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="iso-8859">
    <?php tittel($db); ?>
    <link rel="stylesheet" type="Text/css" href="stilHjem.css">
    <link rel="icon" href="bilder/VikerfjellLogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <header class="mainHeader">
      <img Class ="coverPhoto" src="bilder/CoverPhoto1.jpg">
      <img Class ="coverPhoto" src="bilder/CoverPhoto2.jpg">
      <img Class ="coverPhoto" src="bilder/CoverPhoto3.jpg">
      <img Class ="coverPhoto" src="bilder/CoverPhoto4.jpg">
      <ul class="topnav" id="myTopnav">
        <li><img src="bilder/VikerfjellLogo.png" class = "logo"></li>
        <li><form class="Søk">
          <input class="search" type="text" placeholder="Search..." required>
          <input class="button" type="button" value="Search">
        </form></li>
        <?php
          genererMeny($db,$MenyID);
        ?>
        <li class="icon">
          <a href="javascript:void(0);" onclick="responsiveNav()">&#9776;</a>
        </li>
      </ul>
      <div class="tittel">
        <h1>
        Vikerfjell
        </h1>
        <h3>
        Oslos Nærmeste Høgfjell
        </h3>
      </div>
      <img src="img/VikerfjellLogo.png" class = "logoRes">
    </header>
    <?php genererInnhold($db, $MenyID); ?>

    <footer class="mainFooter">
      <div class="socialMedia">
        <img src="bilder/socialMedia.png">
      </div>
      <hr width = "60%;">
      <p><a href="inlogg.php">Admin login</a></p>
      <a href="#">©Univeristy College of Southeastern Norway</a>
    </footer>
    <script src="jsHjem.js"></script>
  </body>
</html>