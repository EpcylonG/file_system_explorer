$(".rows-info").on("click", showInformation);

function showInformation(e){
    e.stopPropagation();
    const file = JSON.parse(e.currentTarget.getAttribute("value"));

    const information = $(".information");
    information[0].children[0].textContent = file.name;
    information[0].children[1].setAttribute("src", e.currentTarget.children[0].children[0].getAttribute("src"));
    information[0].children[2].children[1].textContent = file.size + " " + file.sizeText;
    information[0].children[2].children[3].textContent = file.type;
    information[0].children[2].children[5].textContent = "/" + $(".rows")[0].children[0].textContent;
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

items.forEach(item => {
    item.addEventListener('dblclick', () => {
        let itemObj = JSON.parse(item.getAttribute('value'))
        if(itemObj.type == 'wav') {
            let audio = document.createElement('div')
            audio.classList.add('folderModal')
            audio.innerHTML = 
            `
            <figure>
                <figcaption>${itemObj.name}.${itemObj.type} </figcaption>
                <audio
                controls
                src="./root/${itemObj.name}.${itemObj.type}">
                    Your browser does not support the
                    <code>audio</code> element.
                </audio>
            </figure>
            `
            body.appendChild(audio)
            const modal = document.querySelector('.folderModal');
            modal.addEventListener('click', closeModal);        
        }
    })
})

// let video = document.createElement('div')
// video.classList.add('folderModal')
// video.innerHTML = 
//     `<video controls width="50%">

//         <source src="./root/Showreel - Ivan Gunchev.mp4">

//     </video>`;
// body.appendChild(video)