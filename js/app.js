$(".rows-info").on("click", showInformation);

let fileGlobal ="";

function showInformation(e){
    e.stopPropagation();
    const file = JSON.parse(e.currentTarget.getAttribute("value"));
    fileGlobal = file;

    const information = $(".information");
    information[0].children[0].textContent = file.name;
    information[0].children[1].setAttribute("src", e.currentTarget.children[0].children[0].getAttribute("src"));
    information[0].children[2].children[1].textContent = file.size + " " + file.sizeText;
    information[0].children[2].children[3].textContent = file.type;
    information[0].children[2].children[5].textContent = file.directory;
    information[0].children[2].children[7].textContent = file.created;
    information[0].children[2].children[9].textContent = file.lastModify;

    if(file.type == "folder"){
        $(".folder-name")[0].textContent = file.name;
        $(".folder-name").attr("value", file.directory + "/" + file.name);
        openFolder(file.name, file.directory);
    }
}

function openFolder(folder, directory){
    $(".rows-info").remove();

    createAjax(folder, directory);
    return;
}

function createAjax(folder, directory){
    ajax = callAjax("scanFolder", folder, directory);
    ajax.done(processData);
}

function callAjax(method, folder, directory){
    return $.ajax({
        url: "php/function.php",
        type: "POST",
        data: { method:method , folder:folder, directory:directory}
    });
}

function processData(response){
    $(".rows").append(response);
    $(".rows-info").on("click", showInformation);
}








const body = document.querySelector('body')
const createBtn =  document.querySelector('.btn-create');

createBtn.addEventListener('click', createFolderModal);

function createFolderModal() {
    const folderModal = document.createElement('div');
    folderModal.classList.add('folderModal')
    folderModal.innerHTML =
    `
    <form class="modalContainer" action="./modules/createFolder.php" method="POST">
        <span>New File/Folder</span>
        <input type="text" id="folderName" name="fileName"/>
        <input type="hidden" name="createdir" value="` + $(".folder-name")[0].attributes[1].value + `"/>
        <div class="btnContainer">
            <button id="btn-cancel" class="btn btn-upload">Cancel</button>
            <button name="submit" id="createFolderBtn" class="btn btn-create">Create</button>
        </div>
    </form>
    `;
    body.appendChild(folderModal)
    const cancelBtn = document.querySelector('#btn-cancel');
    cancelBtn.addEventListener('click', closeModal);
}


function closeModal() {
    body.lastChild.remove()
}
const alertDiv = document.querySelector('.alertMessage');
const alertP = document.querySelector('#alert');

// Alert messages
const alert1 = "Your file is too big!";
const alert2 = "There was an error uploading your file!";
const alert3 = "You cannot upload files of this type!";

if (alertP.innerText === alert1 || alertP.innerText === alert2 || alertP.innerText === alert3) {
    alertDiv.style.backgroundColor = '#EF4444';
    setTimeout(() => {
        alertDiv.classList.add("fadeOut")
    }, 3000)
} else if (alertP.innerText == "Your file was successfully uploaded!") {
    alertDiv.style.backgroundColor = '#22C55E';
    setTimeout(() => {
        alertDiv.classList.add("fadeOut")
    }, 2000)
}

