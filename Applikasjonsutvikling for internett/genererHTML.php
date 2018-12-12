<?php
//denne siden er utviklet av John.. Sist gang endret: 08.06.2017
//kontrollert av Robert 08.06.2017

include("include/db.php");

// query for meny:
$sqlM = "SELECT * FROM meny ORDER BY rekke";
$resultM = mysqli_query($db, $sqlM);
$rowM = mysqli_fetch_assoc($resultM);

//kjører loop gjennom hvert element i meny:
do{ 
//query for innhold:
$sqlI = "SELECT * FROM innhold WHERE menyid = '".$rowM["idmeny"]."'";
$resultI = mysqli_query($db, $sqlI);
$rowI = mysqli_fetch_assoc($resultI);

$side = "m-".$rowM['side'];
$tittel = $rowM['tekst'];
$teller = 0;


//query for navigasjon:
  $sqlN= ("SELECT * FROM meny order by rekke");
  $resultsN = mysqli_query($db, $sqlN);
  $rowN = mysqli_fetch_assoc($resultsN);
  $meny = "";

