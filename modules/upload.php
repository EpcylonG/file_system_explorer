<?php

// Check if Submit button has been clicked

// if (isset($_POST["submit"])) { figure out submit button in case we need it

    // Get file information
    $file = $_FILES["file"];

    $fileName = $file["name"];
    $fileTmpName = $file["tmp_name"];
    $fileSize = $file["size"];
    $fileError = $file["error"];
    $fileType = $file["type"];

    // Limit types of files
    $fileExt = explode(".", $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array("doc", "csv", "jpg", "png", "txt", "ppt", "odt", "pdf", "zip", "rar", "exe", "svg", "mp3", "wav", "mp4", "avi", "mov");

    if (in_array($fileActualExt, $allowed)) {
        // check for errors
        if ($fileError === 0) {
            if ($fileSize < 500000000) {
                $fileDestination = "../root/" . $fileName;
                move_uploaded_file($fileTmpName ,$fileDestination);
                header("Location: ../index.php?uploadsucess=1");
            } else {
                echo "Your file is too big!";
                header("Location: ../index.php?error=size");
            }
        } else {
            echo "There was an error uploading your file!";
            header("Location: ../index.php?error=error");
        }
    } else {
        echo "You cannot upload files of this type!";
        header("Location: ../index.php?error=type");
    }
?>