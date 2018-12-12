<?php
// utvilket av Leronard. Sist gang endret: 08.06.2017
//kontrollert av Robert 08.06.2017
include ("include/sjekkLogin.php")
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

      <li><a href="administrator.php">Hovedside</a></li>
        <li><a href="logut.php">logg ut</a></li>
        </ul>
        </header>

    <div class="mainContent">
      <div class="content">
      <article class="topContent">
        <h2>Last opp bilde</a><h2>
        <hr>
       <!-- <div class="Knapper">
            <a href="nyBruker.php">
              <button type="button">Endre bruker</button>
            </a>
            <a href="ed itMeny.php">
             <button type="button">Endre Menylinje</button>
            </a>
            <a href="innhold.php">
              <button type="button">Legg til/endre innhold</button>
            </a>
             <button type="button">Ny / Slett Bruker</button>
             <button type="button">Ny Side</button>

        </div> -->

<form action="uploadBilde.php" method="post" enctype="multipart/form-data">
  <!-- velge bilde å laste opp -->
  <input type="file" name="bildeUp" />
  <input type="submit" name="btn_upload" value="Last opp bilde">
</form>

      </article>
