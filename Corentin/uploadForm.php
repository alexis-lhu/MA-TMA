<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Upload</title> <!-- Titre de la page -->
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'> <!-- Lien vers la feuille de style CSS -->
</head>
<body>
    <div class="container">
        <div class="corp">
            <?php require 'header.php'; ?> <!-- Inclusion du header -->
            <div class="form">
                <form action="systemeUpload.php" method="POST" enctype="multipart/form-data"> <!-- Formulaire de sélection de fichier à envoyer sur le serveur -->
                    <input type="file" name="fileToUpload" id="fileToUpload"> <!-- Champ de sélection du fichier -->
                    <input type="submit" value="Upload" name="submit"> <!-- Bouton d'envoi du fichier -->
                </form>
                <a href="index.php">Retour</a> <!-- Lien de retour vers la page d'accueil -->
            </div>
            <?php require 'footer.php'; ?> <!-- Inclusion du footer -->
        </div>
    </div>
</body>
</html>
