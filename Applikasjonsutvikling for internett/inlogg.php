<?php
	// Denne siden er Utviklet av Robert og John... Sist gang endret: 08.06.2017
//kontrollert av John 08.06.2017
	session_start();
	include 'include/db.php';
	include 'include/FunksjonerAdmin.php';
	login($db);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="stilLogin.css">
	</head>
	<body>
		<div class="wrap">
			<a href="Hjem.php"><img src="bilder/VikerfjellLogo.png"></a>
			<h1>Login</h1>
			<form action="" method="POST">
				<input type="text" name="Brukernavn" placeholder="Brukernavn" autofocus><br>
				<input type="password" name="pwd" placeholder="Passord"><br>
				<button class="btn-login" name="Sjekk" type="submit">Login</button><br><br>
			</form>
		</div>
		<?php
		if (isset( $_SESSION{'brukerNavn'})){
			echo $_SESSION{'brukerNavn'};
		} else{
			echo "";
		}
		?>
		<br><br>
		<!--<form action="signup.php" method="POST">
				<input type="text" name="Navn" placeholder="Navn"><br>
				<input type="text" name="Brukernavn" placeholder="Brukernavn"><br>
				<input type="password" name="pwd" placeholder="Passord"><br>
				<input type="text" name="Epost" placeholder="Epost"><br>
				<button type="submit"> SIGN UP</button>
		</form>
		<form action="logout.php">
				<button>Log out</button>
		</form>
		-->
		<h1><?php $msg = isset($_REQUEST['msg']) ? $_REQUEST['msg']: '';
		echo($msg); ?></h1>
	</body>
</html>