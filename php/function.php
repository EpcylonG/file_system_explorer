<?php

    if(isset($_POST["method"])) echo $_POST["method"]();

    function scanFolder(){

        if(isset($_POST["method"])){
            if($_POST["directory"] === "./root") {
                $directory = "." . $_POST["directory"] . "/". $_POST["folder"];
                $assets = "./assets/";
            }
            else {
                $directory = $_POST["directory"] . "/". $_POST["folder"];
                $assets = "./assets/";
            }
        } else {
            $directory = "./root";
            $assets = "assets/";
        }

        $scan = scandir($directory);
        for($i = 2; $i < count($scan); $i++){
            $path = $directory . "/" . $scan[$i];
            $info = pathinfo($path);
            if(isset($info["extension"])){
                if($directory === "./root") {
                    if(file_exists("./assets/icons/" . $info["extension"] . "_icon.png")) $extension = $info["extension"];    
                }
                else if(file_exists("../assets/icons/" . $info["extension"] . "_icon.png")) $extension = $info["extension"];
                else $extension = "unknown";
            } else $extension = "folder";
            $fileName = $info["filename"];
            $fileSize = filesize($path);

            $sz = array("0" => "bytes", "1" => "KB", "2" => "MB", "3" => "GB", "4" => "TB");
            $fileSizeText = $sz[0];
            $count = 0;
            while($fileSize >= 1000){
                $operation = $fileSize/1024;
                $count++;
                $fileSizeText = $sz[$count];
                $fileSize = number_format((float)$operation, 2, '.', '');
            }    
            $fileLastModify = date("d-m-Y", filemtime($path));
            $fileCreated = date("d-m-Y", filectime($path));
            $fileDir = $info["dirname"];

            $file = array(
                "name" => $fileName,
                "size" => $fileSize,
                "sizeText" => $fileSizeText,
                "type" => $extension,
                "directory" => $fileDir,
                "created" => $fileCreated,
                "lastModify" => $fileLastModify,
            );
            $jsonFile = json_encode($file);

            echo "<div class='rows-names rows-info' value='$jsonFile'>" .
                    "<div class='file'>" .
                        "<img src='" . $assets . "icons/" . $extension . "_icon.png' width='30' height='30'>" .
                        "<span>$fileName</span>" .
                    "</div>" .
                    "<span>" . $fileSize . " " . $fileSizeText . "</span>" .
                    "<span>$fileLastModify</span>" .
                    "<span>$fileCreated</span>" .
                    "<span class='options'>...</span>" . 
                "</div>";
        }
    }
?>