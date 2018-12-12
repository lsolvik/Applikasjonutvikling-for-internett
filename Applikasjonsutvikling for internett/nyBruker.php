<?php
// Denne siden er utviklet av Robert og John. Sist gang endret: 08.06.2017
//kontrollert av Leonard 08.06.2017
include 'include/db.php';
include 'include/FunksjonerAdmin.php';
include ("include/sjekkLogin.php");
registrerBruker($db);
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
        <li><a href="logut.php">Logg ut</a></li>
      </ul>
    </header>
    <div class="registrerWrapper">
    <div class="meny">
    <h2>Registrer ny bruker</h2>
    <form action="" method="POST">
      <!--<input type='text' name='Brukernavn' placeholder='Brukernavn' autofocus><br><br>
      <input type='password' name='pwd' placeholder='Passord'><br><br>
      <input type='text' name='Epost' placeholder='Epost'><br><br>-->
      <?php lagInputbokser($db); ?>
      <button class="btn-login" name='registrer' type="submit">Submit</button><br><br>
    </form>
        <form action="" method="POST">
          <label>Endre bruker</label><br></br>
          <input type="text" name="BrukerID" placeholder="ID"><br></br>
          <button class="btn-login" type="submit">Endre</button><br><br>
        </form>
    </div>
    <div class="liste">
    <form action="" method="POST">
      <?php slettBruker($db); ?>
    <table width="600" border="1" cellpadding="1" cellspacing="1">
      <tr>
        <th>Slett</th>
        <th>ID</th>
        <th>Brukernavn</th>
        <th>Epost</th>
        <tr>
          <?php
            hentBrukere($db);
          ?>
        </tr>
      </tr>
    </table>
      <button class="slett" name="slett" value="slette" type="submit">Slett</button><br><br>
    </form>
    </div>
    </div>
  </body>
</html>