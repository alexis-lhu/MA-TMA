
<!DOCTYPE html> 
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css.css" rel="stylesheet"/>
</head>
<body>
  <div class="principal-2">
    <div class="epsilon-2">
      <form action="" method="post" enctype="multipart/form-data">
          <h1>Upload</h1>
          <p>
            <label for="monfichier">Sélectionnez un fichier : </label>
            <input type="file" name="monfichier" id="monfichier" />
          </p>    
          <p>
            <input type="submit" value="Envoyer le fichier" />
          </p>
      </form>
      <a href="index.php">return</a>
    </div>
  </div>
</body>
</html>


<?php
$dest = "upload/";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['monfichier'])) {
    $filename = $_FILES['monfichier']['name'];
    $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Liste des extensions autorisées
    $allowedExtensions = array("pdf", "jpg", "jpeg", "png", "gif", "doc", "docx");

    if (in_array($fileExtension, $allowedExtensions)) {
        if ($_FILES['monfichier']['error'] === UPLOAD_ERR_OK) {
            $resultat = move_uploaded_file($_FILES['monfichier']['tmp_name'], $dest . $filename);
            if ($resultat) {
                echo "Fichier téléchargé avec succès !  ";
            } else {
                echo "Erreur lors du téléchargement du fichier.";
            }
        } else {
            echo "Erreur lors du transfert du fichier.";
        }
    } else {
        echo "Seuls les fichiers PDF, JPG, JPEG, PNG et GIF sont autorisés.";
    }
}
?>



</body>
</html>


</body>
</html>