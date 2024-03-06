<?php
$uploaddir = '../uploaded/';

// Obtenir le nom et le prénom depuis le formulaire 
$nom = $_POST['Nom']; 
$prenom = $_POST['Prenom']; 

// Sécurisez les valeurs du nom et du prénom 
$nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
$prenom = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');

// Formez le nouveau nom de fichier
$newFileName = $nom . '_' . $prenom . '_' . basename($_FILES['userfile']['name']);

$uploadfile = $uploaddir . $newFileName;


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    header('Location: ../html/redirect.html');
} else {
    echo '<pre>';
    echo "Le fichier n'a pas été envoyé !";
}
?>
