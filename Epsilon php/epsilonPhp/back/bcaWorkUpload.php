<?php

$work[0][2] = 'Exemple de travaux 1';
$work[2][4] = 'Exemple de travaux 2';

include('header.php');

$isConnected = (isset($_COOKIE['mail']) || isset($_SESSION['mail'])) ? true : false;

if($isConnected) {
	include('bcaAccessCodeSystem.php');
}

$course = 'course'.$_GET['course'];
$challenge = 'rank'.$_GET['challenge'];

echo '<h2>Description du travail</h2><strong>
			Parcours actuel</strong> : '.$$course.'<br>';
echo '<strong>Challenge visé</strong> : '.$$challenge.'<br>';
echo '<strong>Défi demandé</strong> : <u>'.$work[$_GET['course']][$_GET['challenge']].'</u><br><br>';

?>

<h2>Upload du travail</h2>

<form action="bcaWorkUpload-validation.php?course=<?=$_GET['course']?>&challenge=<?=$_GET['challenge']?>" method="post" enctype="multipart/form-data">
  Selectionnez un fichier à uploader:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="hidden" name="course" value="<?=$_GET['course'] ?>">
  <input type="hidden" name="challenge" value="<?=$_GET['challenge'] ?>">
  <input type="submit" value="Upload" name="submit">
</form>

<?php
// Affichage du listing des fichiers dans le dossier correspondant au parcours et au challenge
$target_dir = $_GET['course'].' '.$_GET['challenge'];
$files = scandir($target_dir);

echo "<h2>Liste des fichiers dans le dossier $target_dir :</h2>";
echo "<ul>";
foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        echo "<li>$file</li>";
    }
}
echo "</ul>";
?>

<br>
<a href="index.php">Retour</a>

</body>
</html>

