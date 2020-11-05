<?php
if ($_FILES) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($result["nom_image"]) {
        deleteImg($target_dir . $result["nom_image"]);
    }
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
        if (file_exists($target_file)) {
            echo "<div class='white-background'>Sorry, file already exists.</div>";
            $uploadOk = 0;
        }
    // Check file size
        if ($_FILES["img"]["size"] > 500000) {
            echo "<div class='white-background'>Sorry, your file is too large.</div>";
            $uploadOk = 0;
        }

    // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "<div class='white-background'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
            $uploadOk = 0;
        }

    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<div class='white-background'>Sorry, your file was not uploaded.</div>";
    // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                $requete = $bdd->prepare("UPDATE utilisateur SET nom_image = '". $_FILES["img"]["name"]. "' where id_utilisateur=:id");
                $requete->bindParam(':id', $_SESSION['id']);
                if($requete->execute()){
                    echo "<div class='white-background'>Votre photo de profil a bien été modifié</div>";
                }
            } else {
                echo "<div class='white-background'>Il y a eu une erreur lors du changement de votre image</div>";
            }
        }
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    }
}
function deleteImg($path){
    if(file_exists($path)){
        unlink($path);
    }
}
require "../includes/import-js.php" ;
?>
