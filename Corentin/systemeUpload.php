<?php
// Vérifie si le formulaire a été soumis
if(isset($_POST["submit"])) {
    $targetDir = "uploads/"; // Répertoire cible où seront stockés les fichiers uploadés
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]); // Chemin complet du fichier cible
    $uploadOk = 1; // Variable utilisée pour vérifier si l'upload peut être effectué
    $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Récupère l'extension du fichier

    // Vérifie si le fichier est un PDF, une image PNG, JPG ou JPEG
    if($fileType != "pdf" && $fileType != "png" && $fileType != "jpg" && $fileType != "jpeg" && $fileType != "doc" && $fileType != "docx") {
        echo "Seuls les fichiers PDF, PNG, JPG et JPEG sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifie si le fichier existe déjà
    if (file_exists($targetFile)) {
        echo "Le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifie la taille du fichier (commenté pour ne pas limiter la taille)
    /*
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Le fichier est trop volumineux.";
        $uploadOk = 0;
    }
    */

    // Si toutes les vérifications sont passées, upload le fichier
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a été uploadé avec succès.";
        } else {
            echo "Une erreur est survenue lors de l'upload du fichier.";
        }
    }
}
?>
