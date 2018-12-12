<?php
// Denne Siden er utviklet av Robert.. Sist gang endret: 08.06.2017
//kontrollert av Eirik 08.06.2017
include 'include/db.php';
include 'include/FunksjonerAdmin.php';
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
        <li><a href="administrator.php">Hovedside</a></li>
        <li><a href="logut.php">logg ut</a></li>
      </ul>
    </header>
    <div class="navWrapper">
      <div class="meny">
        <form action="" method="POST">
          <h3>Legg til meny element</h3>
          <!--
          <input type="text" name="Tekst" placeholder="Navn" ><br><br>
          <input type="text" name="Side" placeholder="Side" ><br><br>
          <input type="text" name="Rekke" placeholder="Rekke" ><br><br>
          <input type="text" name="Tooltip" placeholder="Tooltip" ><br><br>
          <input type="text" name="Alt" placeholder="Alt" ><br><br>-->
          <?php
            menyElement($db);
            hentMeny($db);
          ?>
          <button class="btn-login" name="sub" type="submit">Submit</button><br><br>
        </form>
        <form action="" method="POST">
        	<label>Endre meny element</label><br></br>
          <input type="text" name="MenyID" placeholder="ID"><br></br>
          <button class="btn-login" type="submit">Endre</button><br><br>
        </form>
      </div>
      <div class = "liste">
        <form action="" method="POST">
        <?php
          slettMenyElement($db);
        ?>
          <table class="List" width="840" border="1" cellpadding="1" cellspacing="1">
            <tr>
              <th>Slette</th>
              <th>Id</th>
              <th>Tekst</th>
              <th>side</th>
              <th>rekke</th>
              <th>tooltip</th>
              <th>alt</th>
              <tr>
                <?php
                  hentTabelMeny($db);
                ?>
                </tr>
              </tr>
            </table>
            <button class="slett" name="slett" value="slette" type="submit">Slett</button><br><br>
          </form>
        </div>
      </div>
      <!--<form name="testform" action="/test.asp" method="get">
        <input type="text" name="testedit" value="20" disabled="true">
        <input type="button" name="edit text" value="edit text" onClick="document.testform.testedit.disabled=false;">
      </form>-->
    </body>
  </html>