<?php

include('header.php');

$isConnected = (isset($_COOKIE['mail']) || isset($_SESSION['mail'])) ? true : false;
if ($isConnected) {
  $mail = isset($_COOKIE['mail']) ? $_COOKIE['mail'] : $_SESSION['mail'];
}
else{
  echo 'Vous n\'êtes pas connecté, veuillez vous inscrire ou vous connecter sur la page d\'accueil<br><a href="index.php">Retour</a>';
  exit();
}

function getIdUser(){
  require('env.php');
  global $mail;
  $select = $db->query('SELECT id FROM user WHERE mail="'.$mail.'"');
  $result = $select->fetch();
  $counttable = count((is_countable($result)?$result:[]));
  if($counttable!=0){
      return $result['id'];
  }
  else{
    return 'erreur req';
  }
}

$idUser = getIdUser();

if(!is_dir($idUser)){
  mkdir($idUser, 0777);
}

$nameOfDirForWork = $_GET['course'].' '.$_GET['challenge'];
$target_dir = $idUser.'/'.$nameOfDirForWork;

if(!is_dir($target_dir)){
  mkdir($target_dir, 0777);
}

// ici démare la boucle pour un multi upload

$uploadOk = 1;

if(isset($_POST["submit"])) {
  // Count total files
  $countfiles = count($_FILES['fileToUpload']['name']);

  // Looping all files
  for($i=0;$i<$countfiles;$i++){
    $target_file = $target_dir .'/'. basename($_FILES["fileToUpload"]["name"][$i]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Désolé, le fichier " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " existe déjà.<br>";
      $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"][$i] > 500000) {
      echo "Désolé, votre fichier " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " est trop gros.<br>";
      $uploadOk = 0;
    }

    // Allow certain file formats
    $allowed_types=array('jpg','jpeg','png','gif','pdf','ppt','pptx');
    if(!in_array($imageFileType, $allowed_types)) {
      echo "Désolé, seul les JPG, JPEG, PNG, GIF, PDF, PPT & PPTX sont autorisés pour le fichier " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). ".<br>";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo " Votre fichier " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " n'a pas été uploadé.<br>";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " a été uploadé.<br>";
      } else {
        echo "Désolé, il y a eu une erreur durant l'upload du fichier " . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). ".<br>";
      }
    }
  }
}

// ici se termine la boucle pour un multi upload

?>

<br>
<a href="index.php">Retour</a>