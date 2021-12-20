<?php
    $folderName = $_POST['folderName'];
    if (isset($folderName)) {
        if (!file_exists($folderName)) {
            mkdir("../root/" . $folderName, 0777, true);
        }
    header("Location: ../index.php?folder=1");
    }

?>