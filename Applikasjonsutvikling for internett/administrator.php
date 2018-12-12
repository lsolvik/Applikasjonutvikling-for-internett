<?php
// Denne siden er utviklet av Leonard .. Sist gang endret: 08.06.2017
//kontrollert av John 08.06.2017
include ("include/sjekkLogin.php");
?>

<!DOCTYPE HTML>
<html>
  <head>
  <title> Admin </title>
  <link rel="stylesheet" type="Text/css" href="stilAdmin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
    <body>

   <header>
      <ul class="topnav" id="myTopnav">

      <li><a href="#home">Hovedside</a></li>
        <li><a href="logut.php">logg ut</a></li>
        </ul>
        </header>

    <div class="funksjonerWrapper">
        <h2>Funksjoner</a></h2>
        <hr width="75%">
      <section class="menyKnapper">
        <button class="nyBruker" onclick="window.location='nyBruker.php';">Brukere</button>
        <button class="editMeny" onclick="window.location='m-admin.php';">Menylinje</button>
        <button class="innhold" onclick="window.location='i-admin.php';">Innhold</button>
        <button class="nySide" onclick="window.location='lastOppBilde.php';">Last opp bilde</button>

      </section>


      </article>
