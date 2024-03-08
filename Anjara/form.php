<?php

if(isset($_POST["submit"])) {
    $targetDir = "uploadImg/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a PDF, JPEG, PNG, or JPG
    if($fileType != "pdf" && $fileType != "jpeg" && $fileType != "png" && $fileType != "jpg" && $fileType != "doc" && $fileType != "docx") {
        echo "Pas le bon format de fichier.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Le fichier est trop volumineux.";
        $uploadOk = 0;
    }

    // Upload file if all checks pass
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "Le fichier ". basename( $_FILES["fileToUpload"]["name"]). " a été uploadé avec succès.";
            // Rediriger l'utilisateur vers le fichier téléchargé
            header("Location: ".$targetFile);
            exit();
        } else {
            echo "Une erreur est survenue lors de l'upload du fichier.";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EPSI | LON</title>
</head>
<body class="h-14 bg-gradient-to-b from-pink-300 to-purple-500 bg-no-repeat min-h-[100vh] ">
    <div class="grid place-items-center my-64 bg-gradient-to-b from-white bg-no-repeat w-1/5 mx-auto rounded-xl h-2/4">
        <?php include "./header.php"?>
        <form action="" method="POST" enctype="multipart/form-data"class="text-[#22375c] pb-5">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload" name="submit" class="text-center">
        </form>
        <a href="./index.php" class="underline text-purple-600 pt-2">Retour</a>
        <?php include "./footer.php"?>
    </div>
</body>
</html>