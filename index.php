<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./sass/styles.css">
    <script defer src="./js/app.js"></script>
    <title>File System Explorer</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-2" style="background-color: rgb(100, 100, 216)">
                File Explorer
            </aside>
            <div class="col p-0">
                <div class="d-flex" style="margin-bottom: 40px; padding-top: 40px;">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-success">Upload</button>
                </div>
                <div class="col row">
                    <main class="container col-9 border-right border-light">
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-4">
                                Name
                            </div>
                            <div class="col">
                                Size
                            </div>
                            <div class="col">
                                Last Edited
                            </div>
                            <div class="col d-flex justify-content-center">
                                Label
                            </div>
                            <div class="col"></div>
                        </div>
                        <!-- To repeat -->
                        <div class="row border-top border-light d-flex align-items-center">
                            <div class="col-4">
                                <icon>
                                    icon
                                </icon>
                                <span>
                                    Name
                                </span>
                            </div>
                            <div class="col">
                                16.5 MB
                            </div>
                            <div class="col">
                                25-6-2021
                            </div>
                            <div class="col d-flex justify-content-center">
                                O
                            </div>
                            <div class="col d-flex justify-content-center">
                                ...
                            </div>
                        </div> 
                        <!--  -->
                        <!-- To repeat -->
                        <div class="row border-top border-bottom border-light d-flex align-items-center">
                            <div class="col-4">
                                <icon>
                                    icon
                                </icon>
                                <span>
                                    Name
                                </span>
                            </div>
                            <div class="col">
                                16.5 MB
                            </div>
                            <div class="col">
                                25-6-2021
                            </div>
                            <div class="col d-flex justify-content-center">
                                O
                            </div>
                            <div class="col d-flex justify-content-center">
                                ...
                            </div>
                        </div> 
                        <!--  -->
                    </main>
                    <aside class="col">
                        Right
                    </aside>
                </div>
            </div>
        </div>
    </div>
</body>
</html>