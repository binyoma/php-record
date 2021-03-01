let Envoi =[];  // mémoire temporaire des vérifications saisies
const variables = [];
variables['title']=[new RegExp("^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,100}$"), "error on title", "spanTitle"];
variables['year']=[new RegExp("^\\d{1,4}$"), "error on year", "spanYear"];
variables['artist']=[ "error on artist", "spanArtist"];
variables['genre']=[new RegExp("^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,100}$"), "error on genre", "spanGenre"];
variables['label']=[new RegExp("^[A-Za-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,100}$"), "error on label", "spanLabel"];
variables['price']=[new RegExp("^[0-9\\., ]{1,1030}$"), "error on price", "spanPrice"];
variables['picture']=[ "error on picture", "spanPicture"];

const spanTitle = document.getElementById(variables['title'][2]);
const spanArtist = document.getElementById(variables['artist'][1]);
const spanYear = document.getElementById(variables['year'][2]);
const spanGenre = document.getElementById(variables['genre'][2]);
const spanLabel = document.getElementById(variables['label'][2]);
const spanPrice = document.getElementById(variables['price'][2]);
const spanPicture = document.getElementById(variables['picture'][1]);
const form = document.getElementById("add");
let envoyer=document.getElementById("submit");

let ok=true; // boolean true seulement si les saisies sont correctes

function checkTitle() {
    if (variables['title'][0].test(document.getElementById('title').value)) {
        Envoi[0] = true
    } else {
        Envoi[0] = false;
        spanTitle.textContent = variables['title'][1];
    }
}
function checkArtist() {
    if (document.getElementById('artist').value === "") {
        Envoi[1] = false;
        spanArtist.textContent = variables['artist'][0];
    } else {
        Envoi[1] = true;
    }
}
function checkYear() {
    if (variables['year'][0].test(document.getElementById('year').value)) {
        Envoi[2] = true
    } else {
        Envoi[2] = false;
        spanYear.textContent = variables['year'][1];
    }
}
function checkGenre() {
        if (variables['genre'][0].test(document.getElementById('genre').value)) {
            Envoi[3] = true
        } else {
            Envoi[3] = false;
            spanGenre.textContent = variables['genre'][1];
        }
    }


function checkLabel() {
    if (variables['label'][0].test(document.getElementById('label').value)) {
        Envoi[4] = true
    } else {
        Envoi[4] = false;
        spanLabel.textContent = variables['label'][1];
    }
}
function checkPrice() {
    if (variables['price'][0].test(document.getElementById('price').value)) {
        Envoi[5] = true
    } else {
        Envoi[5] = false;
        spanPrice.textContent = variables['price'][1];
    }
}

function checkPicture() {
    if (document.getElementById('picture').value === "") {
        Envoi[6] = false;
        spanPicture.textContent = variables['picture'][0];
    } else {
        Envoi[6] = true;
    }
}


envoyer.addEventListener("click",function (event){
        checkTitle();
        checkArtist();
        checkYear();
        checkLabel();
        checkGenre();
        checkPrice();
        checkPicture()

    for (let i=0; i< Envoi.length;i++){
        if (Envoi[i] ==false){
            ok=false;
        }else {
            ok= true ;
        }
    }
        if (ok==false) {
            event.preventDefault();
        } else {
            form.submit();
        }
    })

