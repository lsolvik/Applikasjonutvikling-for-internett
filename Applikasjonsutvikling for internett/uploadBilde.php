<?php
//Denne Siden er utviklet av Leonard... Sist gang endret: 08.06.2017
//kontrollert av Robert 08.06.2017
if(isset($_POST['btn_upload']))
{
    $filetmp = $_FILES["bildeUp"]["tmp_name"];
    $filename = $_FILES["bildeUp"]["name"];
    $filetype = $_FILES["bildeUp"]["type"];
    $filepath = "bilder/".$filename;

move_uploaded_file($filetmp, $filepath);


}
Header("Location: lastOppBilde.php");
?>