$(".rows-info").on("click", showInformation);

function showInformation(e){
    e.stopPropagation();
    const file = JSON.parse(e.currentTarget.getAttribute("value"));

    const information = $(".information");
    information[0].children[0].textContent = file.name;
    information[0].children[1].setAttribute("src", e.currentTarget.children[0].children[0].getAttribute("src"));
    information[0].children[2].children[1].textContent = file.size + " " + file.sizeText;
    information[0].children[2].children[3].textContent = file.type;
    information[0].children[2].children[5].textContent = file.directory;
    information[0].children[2].children[7].textContent = file.created;
    information[0].children[2].children[9].textContent = file.lastModify;
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
        <span>New Folder</span>
        <input type="text" id="folderName" name="folderName"/>
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
    alertDiv.style.display = 'block';
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


// Open audio and video files

const items = document.querySelectorAll('.rows-info')
const imageFiles = ["jpg", "jpeg", "png"]
const audioFiles = ["mp3", "wav"]
const videoFiles = ["mp4", "mov", "avi"]
items.forEach(item => {
    item.addEventListener('dblclick', () => {
        let itemObj = JSON.parse(item.getAttribute('value'))
        console.log(itemObj)
        if(audioFiles.includes(itemObj.type)) {
            displayElement(itemObj, "audio")
        } else if (videoFiles.includes(itemObj.type)) {
            displayElement(itemObj, "video")
        } else if (imageFiles.includes(itemObj.type)) {
            displayElement(itemObj, "image")
        }
    })
})

function displayElement(object, type) {
    const element = document.createElement('div')
    element.classList.add('folderModal')
    if (type == "image") {
        element.innerHTML = `<img src="./root/${object.name}.${object.type}" width="300">`;
    } else if (type == "video") {
        element.innerHTML = `
        <video controls width="50%">
            <source src="./root/${object.name}.${object.type}">
        </video>`
    } else if (type == "audio") {
        element.innerHTML = `
        <audio controls
        src="./root/${object.name}.${object.type}">
        </audio>`
    }
    body.appendChild(element);
    const modal = document.querySelector('.folderModal');
    modal.addEventListener('click', closeModal);
}

// Right click menu

items.forEach(item => {
    let element;
    item.addEventListener("contextmenu",function(event){
        event.preventDefault();
        let values = JSON.parse(item.getAttribute('value'))
        var contextElement = document.getElementById("context-menu");
        contextElement.style.top = event.pageY + "px";
        contextElement.style.left = event.pageX + "px";
        contextElement.classList.add("active");
        element = `${values.name}.${values.type}`
        console.log(element)
    });
    window.addEventListener("click",function(){
        document.getElementById("context-menu").classList.remove("active");
    });
    const deleteButtons = document.querySelectorAll('.deleteFile')
    deleteButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            console.log("click")
        })
    })
})