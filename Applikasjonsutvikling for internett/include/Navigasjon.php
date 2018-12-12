<?php include("include/db.php");

session_start();

$sql= ("SELECT * FROM meny order by rekke");
$results = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($results);

?>

<?php

echo $tittelside;

?>
<div class="nav">
<ul>
<li class="admin"><a href="#" onclick="vis()">Logg inn</li></a>

<?php do {	?>

<li><a href="m-<?php echo $row["side"];?>"> <?php echo $row["tekst"]; ?></a>

<?php
} while ($row = mysqli_fetch_assoc($results));?>
</ul>
</div>
