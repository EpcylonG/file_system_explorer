<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./css/styles.css">
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="./js/app.js"></script>
    <title>File System Explorer</title>
</head>
<body>
    <nav class="leftbar">
        <!-- <img src="assets/logo.png" alt="Logo" width="150" height="25"> -->
        <div class="logo">
            <span class="material-icons">cloud_upload</span>
            <h1>File Explorer</h1>
        </div>
        <div class="leftbar-items">
            <details>
                <summary>
                    <span class="material-icons">description</span>
                    My Files
                </summary>
                <span>
                    <span class="material-icons">folder</span>
                    Folders
                </span>
            </details>
            <a href="#">
                <span class="material-icons">schedule</span>
                Recents
            </a>
            <a href="#">
                <span class="material-icons">star</span>
                Starred
            </a>
            <a href="#">
                <span class="material-icons">delete</span>
                Trash
            </a>
        </div>
    </nav>
    <main class="container">
        <nav class="topnav">
            <div class="topnav-search">
                <span class="material-icons">search</span>
                <input type="search" class="search" placeholder="Search files, folders"/>
            </div>
            <div class="topnav-buttons">
                <button type="button" class="btn btn-create">Create</button>
                <button type="button" class="btn btn-upload">Upload</button>
            </div>
        </nav>
        <section class="section">
            <section class="rows">
                <h1>My Files</h1>
                <div class="rows-names rows-title">
                    <span>Name</span>
                    <span>Size</span>
                    <span>Last Edited</span>
                    <span>Created</span>
                    <span></span>
                </div>
                <?php
                    $directory = "./root";
                    $scan = scandir("./root");
                    for($i = 2; $i < count($scan); $i++){

                        $path = $directory . "/" . $scan[$i];
                        $info = pathinfo($path);
                        if(isset($info["extension"])){
                            if(file_exists("./assets/icons/" . $info["extension"] . "_icon.png")) $extension = $info["extension"];
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

                        $file = array(
                            "name" => $fileName,
                            "size" => $fileSize,
                            "sizeText" => $fileSizeText,
                            "type" => $extension,
                            "created" => $fileCreated,
                            "lastModify" => $fileLastModify,
                        );
                        $jsonFile = json_encode($file);

                        ?>
                        <div class="rows-names rows-info" value=<?=$jsonFile?>>
                            <div class="file">
                                <img src="assets/icons/<?=$extension?>_icon.png" alt="Icon.png" width="30" height="30">
                                <span><?=$fileName?></span>
                            </div>
                            <span><?=$fileSize . " " . $fileSizeText?> </span>
                            <span><?=$fileLastModify?></span>
                            <span><?=$fileCreated?></span>
                            <span class="options">...</span>
                        </div>
                        <?php
                    }
                ?>
            </section>
            <aside class="information">
                <h2></h2>
                <img width="100" height="100">
                <div class="grid">
                    <span>Size</span>
                    <span></span>
                    <span>Type</span>
                    <span></span>
                    <span>Location</span>
                    <span></span>
                    <span>Created Date</span>
                    <span></span>
                    <span>Last Modify</span>
                    <span></span>
                </div>
            </aside>
        </section>
    </main>
</body>
</html>