<?php
//denne siden er utviklet av John. .. Sist gang endret: 08.06.2017
//kontrollert av Leonard 08.06.2017
	Session_start();
	if(!$_SESSION['login']){
		$Melding = "Du må logge inn for å se denne siden.";
		echo "<script type='text/javascript'>alert('$Melding');";
		echo "window.location.href='inlogg.php';</script>";
	};
?>