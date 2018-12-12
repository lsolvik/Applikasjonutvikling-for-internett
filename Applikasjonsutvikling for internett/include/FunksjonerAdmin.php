<?php {
//Denne siden er for det meste utviklet av Robert. Sist gang endret: 09.06.2017
	////kontrollert av John 08.06.2017
//Admin Innhold funksjoner Start
function hentInnhold($db){ // generer input bokser for innhold
	$idInnhold =  mysqli_real_escape_string($db,$_POST['InnholdID']);
	$sql = "SELECT idinnhold FROM innhold WHERE idinnhold = '$idInnhold'";
	$result = mysqli_query($db,$sql);
	$rad = mysqli_fetch_array($result);
	$ID = $rad['idinnhold'];

	// if setning som sjekker om innskrevet id finnes
	if($idInnhold == $ID && $idInnhold != NULL){ 
		$sql="SELECT * From innhold WHERE idinnhold = '$idInnhold' ";
		$records=mysqli_query($db, $sql);
		// while løkke for endre innhold element
		while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){
			echo "<label>ID  </label> <input type='text' name='IDinnhold' value=".$row['idinnhold']." readonly> <br><br>";
			echo "<label>Tittel  </label> <input type='text' name='Tittel' value=".$row['tittel']." ><br><br>";
			echo "<label>Ingress  </label> <input type='text' name='Ingress' value=".$row['ingress']." ><br><br>";
			echo "<label>Tekst  </label> <textarea type='text' name='Tekst'  >".$row['tekst']."</textarea><br><br>";
			echo "<label>Rekke  </label> <input type='text' name='Rekke' value=".$row['rekke']." ><br><br>";
			echo "<label>Side  </label> <input type='text' name='Side' value=".$row['side']." ><br><br>";
			echo "<label>MenyID  </label> <input type='text' name='mID' value=".$row['idmeny']." ><br><br>";

		}//while
	}else{ // input bokser for legge til nytt innhold 
		echo "<input type='text' name='Tittel' placeholder='Tittel' ><br><br>";
		echo "<input type='text' name='Ingress' placeholder='Ingress' ><br><br>";
		echo "<textarea type='text' name='Tekst' placeholder='Tekst' ></textarea><br><br>";
		echo "<input type='text' name='Rekke' placeholder='Rekke' ><br><br>";
		echo "<input type='text' name='Side' placeholder='Side' ><br><br>";
		echo "<input type='text' name='mID' placeholder='Meny ID' ><br><br>";
	}//else
}// funksjon hent innhold
function hentTabelInnhold($db){ // Henter all data fra databsen og putter det inn i en tabell
    $sql="SELECT * From innhold";
    $records=mysqli_query($db, $sql);
    while($meny=mysqli_fetch_array($records,MYSQLI_ASSOC)){
    	echo "<tr>";
        echo "<td><input type='checkbox' name='checkbox[]' value='".$meny['idinnhold']."'></td>";
        echo "<td>".$meny['idinnhold']."</td>";
        echo "<td>".$meny['tittel']."</td>";
        echo "<td>".$meny['ingress']."</td>";
        echo "<td>".$meny['tekst']."</td>";
        echo "<td>".$meny['rekke']."</td>";
        echo "<td>".$meny['side']."</td>";
        echo "<td>".$meny['idmeny']."</td>";
    }// End while
}//Funksjon hentTabellInnhold
function innholdElement($db){ // oppretter eller oppdaterer innhold
	if(isset($_POST['sub'])){
		$IDinnhold = mysqli_real_escape_string($db,$_POST['IDinnhold']);
		$Tittel = mysqli_real_escape_string($db,$_POST['Tittel']);
		$Ingress = mysqli_real_escape_string($db,$_POST['Ingress']);
		$Tekst = mysqli_real_escape_string($db,$_POST['Tekst']);
		$Rekke = mysqli_real_escape_string($db,$_POST['Rekke']);
		$Side = mysqli_real_escape_string($db,$_POST['Side']);

		$sql = "SELECT idinnhold FROM innhold WHERE idinnhold = '".$IDinnhold."'";
		$result = mysqli_query($db,$sql);
		$rad = mysqli_fetch_array($result);
		$ID = $rad['idinnhold'];
		
		if ($Tekst == "" or $Side == "" or $Rekke == "" or $Ingress == "" or $Tittel == "") {
			$msg = "OBS! Fyll inn i alle tekst feltene";

			}
		else {
			if($IDinnhold == $ID  and $ID != NULL){
				$sql = "UPDATE innhold 
				SET tittel  = '".$Tittel."', ingress  = '".$Ingress."', tekst  = '".$Tekst."',rekke = '".$Rekke."', side = '".$Side."'
				WHERE idinnhold = '".$IDinnhold."'";
				mysqli_query($db, $sql);
				$msg = "Innhold element er oppdatert";
			}else{
				$sql = "INSERT INTO innhold(tittel, ingress, tekst, rekke, side) VALUES('$Tittel', '$Ingress', '$Tekst', '$Rekke', '$Side')";
				mysqli_query($db, $sql);

				$msg = "Innhold element er lagt til";
			}// if/else idmeny

		}//if/else empty sjekk
		echo "<script type='text/javascript'>window.alert('$msg');</script>";

	}// if isset// Lagrer nytt eller oppdaterer innhold element
}// funksjon innholdElement
function slettInnholdElement($db){
	if(isset($_POST['slett'])){
	  $del_id = $_POST['checkbox'];

	  foreach ($del_id as $value){
	    $sql = "DELETE FROM innhold WHERE idinnhold = '".$value."'";
	    $result = mysqli_query($db,$sql);
	  }// for
	}// if
}// funksjon slettInnholdElement
function genererInnhold($db, $MenyID){ //generer innhold i frontend------------
	//$MenyID = $_get['$MenyID'];
	$InnholdID =mysqli_real_escape_string($db, $_POST['InnholdID']);
	if(isset($_POST['liste'])){
		$MenyID = mysqli_real_escape_string($db,$_POST['liste']); 
			}else{
		$MenyID = 1;
	}
	$sql="SELECT tekst From meny WHERE idmeny = '$MenyID'";
	$records=mysqli_query($db, $sql);	
	$rad = mysqli_fetch_array($records);
	$Overskrift = $rad['tekst'];

	echo "<h1>$Overskrift</h1>";

			echo "<form action='' method='POST'>";
		if($InnholdID != NULL){
			$sql="SELECT * From innhold WHERE idinnhold = '$InnholdID' ORDER BY rekke";
			$records=mysqli_query($db, $sql);
			while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){	
			echo "<div class='Content'>";
			//echo "<h2><a href='#?=".$row['tittel']."'>".$row['tittel']."</a></h2>";
			echo "<h2>".$row['tittel']."</h2>";
			echo "<hr>";
			echo "<p>".$row['tekst']."</p>";
			echo "</div>";
			}
			echo "</form>";
		}else{
			$sql="SELECT * From innhold WHERE idmeny = '$MenyID' ORDER BY rekke";
			$records=mysqli_query($db, $sql);
			while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){	
				echo "<div class='Content'>";
				//echo "<h2><a href='#?=".$row['tittel']."'>".$row['tittel']."</a></h2>";
				echo "<h2>
				<button type='submit' name='InnholdID' value='".$row['idinnhold']."'>".$row['tittel']."</button>
				</h2>";
				echo "<hr>";
				echo "<p>".$row['ingress']."</p>";
				echo "</div>";
				}
				echo "</form>";
		}
}//funksjon genererInnhold
function tittel($db){
	if(isset($_POST['liste'])){
		$MenyID = mysqli_real_escape_string($db,$_POST['liste']); 
			}else{
		$MenyID = 1;
	}
	$tittelen = "Hjem";
	$sql="SELECT tekst From meny WHERE idmeny = '$MenyID'";
	$records=mysqli_query($db, $sql);	
	$rad = mysqli_fetch_array($records);
	$tittelen = $rad['tekst'];
	echo "<title>$tittelen</title>";
}
//Admin Innhold funskjoner slutt

//Admin Meny funksjoner Start
function hentMeny($db){ // gennere input bokser for meny
	$idMeny =  mysqli_real_escape_string($db,$_POST['MenyID']);
	$sql = "SELECT idmeny FROM meny WHERE idmeny = '$idMeny'";
	$result = mysqli_query($db,$sql);
	$rad = mysqli_fetch_array($result);
	$ID = $rad['idmeny'];
 // if settning som sjekker om innskrevet id finnes
	if($idMeny == $ID && $idMeny != NULL){
		$sql = "SELECT * FROM meny WHERE idmeny ='$idMeny'";
		$records = mysqli_query($db, $sql);
		// while løkke for endre meny element

		while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){ 
			echo "<input type='text' name='IDmeny' value=".$row['idmeny']." readonly><br><br>";
			echo "<input type='text' name='Tekst' value=".$row['tekst']." ><br><br>";
			echo "<input type='text' name='Side' value=".$row['side']." ><br><br>";
			echo "<input type='text' name='Rekke' value=".$row['rekke']." ><br><br>";
			echo "<input type='text' name='Tooltip' value=".$row['toolTip']." ><br><br>";
			echo "<input type='text' name='Alt' value=".$row['alt']." ><br><br>";
		} //while
		// input bokser for legge til nytt meny elemnt
	}else{ 
		echo "<input type='text' name='Tekst' placeholder='Navn' ><br><br>";
		echo "<input type='text' name='Side' placeholder='Side' ><br><br>";
		echo "<input type='text' name='Rekke' placeholder='Rekke' ><br><br>";
		echo "<input type='text' name='Tooltip' placeholder='ToolTip' ><br><br>";
		echo "<input type='text' name='Alt' placeholder='Alt' ><br><br>";
	}//else
}// funksjon hentMeny
function hentTabelMeny($db){ // Henter all data fra databsen og putter det inn i en tabell
    $sql="SELECT * From meny";
    $records=mysqli_query($db, $sql);
    while($meny=mysqli_fetch_array($records,MYSQLI_ASSOC)){
  	    echo "<tr>";
        echo "<td><input type='checkbox' name='checkbox[]' value='".$meny['idmeny']."'></td>";
        echo "<td>".$meny['idmeny']."</td>";
        echo "<td>".$meny['tekst']."</td>";
        echo "<td>".$meny['side']."</td>";
        echo "<td>".$meny['rekke']."</td>";
        echo "<td>".$meny['toolTip']."</td>";
        echo "<td>".$meny['alt']."</td>";
    }// End while
}//Funksjon hentTabellMeny
function menyElement($db){ // Lagrer nytt eller oppdaterer meny element
	if(isset($_POST['sub'])){
		$IDmeny = mysqli_real_escape_string($db,$_POST['IDmeny']);
		$Tekst = mysqli_real_escape_string($db,$_POST['Tekst']);
		$Side = mysqli_real_escape_string($db,$_POST['Side']);
		$Rekke = mysqli_real_escape_string($db,$_POST['Rekke']);
		$Tooltip = mysqli_real_escape_string($db,$_POST['Tooltip']);
		$Alt = mysqli_real_escape_string($db,$_POST['Alt']);

		$sql = "SELECT idmeny FROM meny WHERE idmeny = '".$IDmeny."'";
		$result = mysqli_query($db,$sql);
		$rad = mysqli_fetch_array($result);
		$ID = $rad['idmeny'];

		if ($Tekst == "" or $Side == "" or $Rekke == "" or $Tooltip == "" or $Alt == "") {
			$msg = "OBS! Fyll inn i alle tekst feltene";

			}
		else {
			if($IDmeny == $ID and $ID != NULL){
				$sql = "UPDATE meny 
				SET tekst  = '".$Tekst."',side = '".$Side."',rekke = '".$Rekke."', 
				toolTip = '".$Tooltip."', alt = '".$Alt."'
				WHERE idmeny = '".$IDmeny."'";
				mysqli_query($db, $sql);
				$msg = "Meny element er oppdatert";
			}else{
				$sql = "INSERT INTO meny(tekst, side, rekke, toolTip, alt) VALUES('$Tekst', '$Side', '$Rekke', '$Tooltip', '$Alt')";
				mysqli_query($db, $sql);

				$msg = "Meny element er lagt til";
			}// if/else idmeny

		}//if/else empty sjekk
		echo "<script type='text/javascript'>window.alert('$msg');</script>";

	}// if isset
}// Funksjon MenyElement
function slettMenyElement($db){ //Sletter valgte elementer fra menyen
	if(isset($_POST['slett'])){
	  $del_id = $_POST['checkbox'];

	  foreach ($del_id as $value){
	    $sql = "DELETE FROM meny WHERE idmeny = '".$value."'";
	    $result = mysqli_query($db,$sql);
	  }// for
	}// if
}// Funksjon slettMenyElement
function genererMeny($db,$MenyID){// generer meny i frontend
	$sql="SELECT * From meny WHERE rekke != 0 ORDER BY rekke";
	$records=mysqli_query($db, $sql);
		echo("<form action='' method='POST'>");
	while($meny=mysqli_fetch_array($records,MYSQLI_ASSOC)){
		echo "<li>
		<button type='submit' name='liste' value='".$meny['idmeny']."'>".$meny['tekst']."</button>
			</li>";	
	}//while
	echo("</form>");
}// Funksjon genererMeny
//Admin Meny funskjoner slutt

//Bruker Funksjoner

function login($db){
	if(isset($_POST['Sjekk'])){
		$Brukernavn = mysqli_real_escape_string($db, $_POST['Brukernavn']);
		$salt = "IT2_2017";
		$pwd = mysqli_real_escape_string($db, $_POST['pwd']);
		$passord = sha1($salt.$pwd);

		// sjekker om feltene er tomme
		if ($Brukernavn == "" or $passord == "") {
			$msg = "OBS! Fyll inn brukernavn og passord";
			}
			else {
				// sql spørring
				$sql = "SELECT * FROM bruker WHERE Brukernavn='$Brukernavn' AND
				passord='$passord'";
				$result = mysqli_query($db, $sql);



		 		// Sjekker brukernavn opp mot databasen
		 		if ($row = mysqli_fetch_assoc($result)) {
						// Fått resultat på brukernavn
					if($row['passord'] == $passord) {
						$_SESSION['login'] = $Brukernavn;
						Header("Location: administrator.php");
						exit;
					}
					else {
						// Passordet er feil:
						$_SESSION['login'] = "";
						$msg = "Brukernavn/Passord er feil 1";
					}
				}
				else{
					// brukernavn er feil
					$_SESSION['login'] = "";
								//Lagre antall 


								/*	$date = date("Y-m-d H:i:s"); 
						"UPDATE bruker SET feilLogginnSiste =CURRENT_DATE($date) WHERE 
						brukerNavn= '$Brukernavn'"; */
					$msg = "Brukernavn/Passord er feil 2";
				}

			}


			echo "<script type='text/javascript'>window.alert('$msg');";
			echo "window.location.href='inlogg.php';</script>";
	}// if tom // Sjekker brukernavn og passord ved innlogin
}// Funksjon Login
function lagInputbokser($db){ //generer inputbokser og henter informasjon om en bruker skal endres
	$idBruker =  mysqli_real_escape_string($db,$_POST['BrukerID']);
	$sql = "SELECT idbruker FROM bruker WHERE idbruker = '$idBruker'";
	$result = mysqli_query($db,$sql);
	$rad = mysqli_fetch_array($result);
	$ID = $rad['idbruker'];
 // if settning som sjekker om inskrevet id finnes
	if($idBruker == $ID && $idBruker != NULL){
		$sql = "SELECT * FROM bruker WHERE idbruker ='$idBruker'";
		$records = mysqli_query($db, $sql);
		// while løkke for å lage input bokser for oppdatere en bruker

		while($row=mysqli_fetch_array($records,MYSQLI_ASSOC)){ 
			echo "<input type='text' name='IDbruker' value=".$row['idbruker']." readonly><br><br>";
			echo "<input type='text' name='Brukernavn' value=".$row['brukerNavn']." autofocus><br><br>";
		    echo "<input type='password' name='pwd' placeholder='Passord'><br><br>";
		    echo "<input type='text' name='Epost' value=".$row['ePost']."><br><br>";
		} //while
		// input bokser for legge til en ny bruker
	}else{ 
	echo "<input type='text' name='Brukernavn' placeholder='Brukernavn' autofocus><br><br>";
    echo "<input type='password' name='pwd' placeholder='Passord'><br><br>";
    echo "<input type='text' name='Epost' placeholder='Epost'><br><br>";
}//if
}// funksjon lagInputbokser
function registrerBruker($db){ // oppretter eller oppdatere en ny bruker
	if(isset($_POST['registrer'])){
		$brukerID = mysqli_real_escape_string($db,$_POST['IDbruker']);
		$brukerNavn = mysqli_real_escape_string($db, $_POST['Brukernavn']);
		$pwd = mysqli_real_escape_string($db, $_POST['pwd']);
		$salt = "IT2_2017";
		$Epost = mysqli_real_escape_string($db, $_POST['Epost']);
		$passord = sha1($salt.$pwd);

		$sql = "SELECT idbruker FROM bruker WHERE idbruker = '".$brukerID."'";
		$result = mysqli_query($db,$sql);
		$rad = mysqli_fetch_array($result);
		$ID = $rad['idbruker'];

		if ($brukerNavn == "" or $pwd == "" or $Epost == ""){
			$msg = "OBS! Fyll ut inputboksene";
			}
		else {
			if (!filter_var($Epost, FILTER_VALIDATE_EMAIL)) {
		  $msg = "Skriv inn en gyldig epost adresse";
			}
			else { // Oppdaterer bruker
				if($brukerID == $ID && $ID != NULL){
					$sql = "UPDATE bruker 
					SET brukerNavn = '".$brukerNavn."', passord = '".$passord."',ePost = '".$Epost."'
					WHERE idbruker = '".$brukerID."'";
					$result = mysqli_query($db, $sql);
					$msg = "Bruker er oppdatert";
				}else{ // oppretter bruker
					$sql = "INSERT INTO bruker(brukerNavn, passord, ePost, feilLogginnTeller, feilLogginnSiste, feilIP) VALUES('$brukerNavn', '$passord', '$Epost', 0, NULL, NULL)";
					$result = mysqli_query($db, $sql);
					$msg = "bruker er opprettet";
			}
			}
		}
		// flere if settninger som sjekker brukernavn osv...
			echo "<script type='text/javascript'>window.alert('$msg');";
			echo "window.location.href='nybruker.php';</script>";
	}// if tom
}// funksjon registrerBruker
function hentBrukere($db){// henter Brukere fra databasen og viser de i en tabell
	$sql="SELECT * From bruker";
	$records = mysqli_query($db, $sql);

	while($brukere=mysqli_fetch_array($records,MYSQLI_ASSOC)){
        echo "<tr>";
        echo "<td><input type='checkbox' name='checkbox[]' value='".$brukere['idbruker']."'></td>";
        echo "<td>".$brukere['idbruker']."</td>";
        echo "<td>".$brukere['brukerNavn']."</td>";
        echo "<td>".$brukere['ePost']."</td>";
        echo "</tr>";
    }// End while
}// funksjon hentBrukere
function slettBruker($db){
if(isset($_POST['slett'])){
	  $del_id = $_POST['checkbox'];

	  foreach ($del_id as $value){
	    $sql = "DELETE FROM bruker WHERE idbruker = '".$value."'";
	    $result = mysqli_query($db,$sql);
	  }// for
	}// if
}// funksjon slett bruker
function logut(){ // logger bruker ut fra admin sidene
	SESSION_START();
	session_destroy();
 	header('location: hjem.php');
} // logut funksjon
//Slutt Bruker Funksjoner

} ?>