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
        <a href="./index.php" class='logoLink'>
            <div class="logo">
                <span class="material-icons">cloud_upload</span>
                <h1>File Explorer</h1>
            </div>
        </a>
        <div class="leftbar-items">
            <a id="mainFolder" href="./modules/directories.php">
                <details>
                    <summary>
                        <span class="material-icons">description</span>
                        My Files
                    </summary>
                    <?php
                        require_once('./modules/directories.php');
                        listFolderFiles("./root");
                    ?>
                    
                </details>
            </a>
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
                    <button class="btn btn-create">Create</button>
                    <form action="./modules/upload.php" method="post" enctype="multipart/form-data" class="upload-form">
                        <label for="file-upload" class="btn btn-upload">
                            Upload
                        </label>
                        <input id="file-upload" type="file" name="file" onchange='this.form.submit()';/>
                    </form>
                </div>
            </nav>
        <section class="section">
            <section class="rows">
                <h1 class="folder-name" value="../root">My Files</h1>
                <div class="rows-names rows-title">
                    <span>Name</span>
                    <span>Size</span>
                    <span>Last Edited</span>
                    <span>Created</span>
                    <span></span>
                </div>
                <?php
                    require_once('./php/function.php');
                    scanFolder();
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
    <div class="alertMessage">
        <p id="alert">
            <?php                 
                if(isset($_GET['error'])){
                    if ($_GET['error'] == 'size') echo "Your file is too big!";
                    elseif ($_GET['error'] == 'error') echo "There was an error uploading your file!";
                    elseif($_GET['error'] == 'type') echo "You cannot upload files of this type!";
                    elseif ($_GET['uploadsucess']) echo "Your file was successfully uploaded!";
                }
            ?>
        </p>
    </div>


    <div id="context-menu">
        <div class="item deleteFile">
            <a href="#">Delete</a>
        </div>
        <hr>
        <div class="item">
            <a href="#">Rename</a>
        </div>
    </div>


</body>
</html>