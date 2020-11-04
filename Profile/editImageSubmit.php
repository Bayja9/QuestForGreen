<?php
require "../includes/header.php" ;

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $file = (isset($_FILES["imgTodo"]["name"]) && !empty($_FILES["imgTodo"]["name"])) ? $_FILES["imgTodo"] : null;
    $target_file = null;
    if ($file) {
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
        $imageFileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        $imageFileName = strtolower(pathinfo($file["name"], PATHINFO_FILENAME));
        $time = time();
        $target_file = $target_dir . $imageFileName . "-" . $time . "." . $imageFileType;
        move_uploaded_file($file["tmp_name"], $target_file);
    }
}
require "../includes/import-js.php" ;
?>
