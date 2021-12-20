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