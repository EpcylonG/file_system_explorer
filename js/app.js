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