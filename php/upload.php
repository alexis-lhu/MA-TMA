<?php
// Définir le répertoire de téléchargement
$uploaddir = '../uploaded/';

// Obtenir le nom et le prénom depuis le formulaire
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];

// Sécurisez les valeurs du nom et du prénom
$nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
$prenom = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');

// Récupération des informations sur le fichier uploadé
$fileName = $_FILES['userfile']['name'];
$fileTmpName = $_FILES['userfile']['tmp_name'];
$fileType = $_FILES['userfile']['type'];
$fileSize = $_FILES['userfile']['size'];

// Récupération de l'extension du fichier
$fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

// Tableau des extensions autorisées
$allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'gif'];

if (in_array($fileExtension, $allowedExtensions)) {
    // Vérification du type de fichier (mime type) pour renforcer la sécurité
    $allowedMimeTypes = ['application/pdf', 'image/jpeg', 'image/png', 'image/gif'];
    if (in_array($fileType, $allowedMimeTypes)) {
        // Formez le nouveau nom de fichier
        $newFileName = $nom . '_' . $prenom . '_' . $fileName;
        $uploadfile = $uploaddir . $newFileName;

        // Déplacement du fichier uploadé vers le dossier de destination
        move_uploaded_file($fileTmpName, $uploadfile);
        header('Location: ../html/redirect.html');
    } else {
        echo "Erreur : Type de fichier non autorisé";
    }} else {
    echo 'Erreur : Extension de fichier non autorisée. Le fichier envoyé est de type ' . $fileType;
}
?>
