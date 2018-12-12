<?php 
// Denne siden er utviklet av John. .. Sist gang endret: 08.06.2017
//kontrollert av Leonard 08.06.2017
	$host = "158.36.139.21";
	$username = "brViker";
	$password = "pw_Viker";
	$database = "vikerfjell";
	$port = "3306"; 

	$db = new mysqli($host,$username,$password, $database, $port);
	mysqli_set_charset($db, 'utf8');

	if(mysqli_connect_errno($db)) {
echo "Får ikke koblet til databasen";
}

?>
