<?php
    $fileName = $_POST['fileName'];
    if (isset($fileName)) {
        if (!file_exists($fileName)) {
            if(str_contains($fileName, ".")) { if(isset($_POST["createdir"])) fopen($_POST["createdir"] . "/" . $fileName, "w", true); }
            else mkdir($_POST["createdir"] . "/" . $fileName, 0777, true);
        }
    header("Location: ../index.php");
    }
?>