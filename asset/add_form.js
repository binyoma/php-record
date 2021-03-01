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
    console.log(0);
    if (variables['title'][0].test(document.getElementById('title').value)) {
        console.log('01');
        Envoi[0] = true
    } else {
        console.log('02');
        Envoi[0] = false;
        spanTitle.textContent = variables['title'][1];
    }
}
function checkArtist() {
    console.log(1);
    if (document.getElementById('artist').value === "") {
        console.log('11');
        Envoi[1] = false;
        spanArtist.textContent = variables['artist'][0];
    } else {
        console.log('12');
        Envoi[1] = true;
    }
}
function checkYear() {
    console.log('2');
    if (variables['year'][0].test(document.getElementById('year').value)) {
        console.log('21');
        Envoi[2] = true
    } else {
        console.log('22');
        Envoi[2] = false;
        spanYear.textContent = variables['year'][1];
    }
}
function checkGenre() {
    console.log(3);
        if (variables['genre'][0].test(document.getElementById('genre').value)) {
            console.log('31');
            Envoi[3] = true
        } else {
            console.log('32');
            Envoi[3] = false;
            spanGenre.textContent = variables['genre'][1];
        }
    }


function checkLabel() {
    console.log(4);
    if (variables['label'][0].test(document.getElementById('label').value)) {
        console.log('41');
        Envoi[4] = true
    } else {
        console.log('42');
        Envoi[4] = false;
        spanLabel.textContent = variables['label'][1];
    }
}
function checkPrice() {
    console.log(5);
    if (variables['price'][0].test(document.getElementById('price').value)) {
        console.log('51');
        Envoi[5] = true
    } else {
        console.log('52');
        Envoi[5] = false;
        spanPrice.textContent = variables['price'][1];
    }
}

function checkPicture() {
    console.log(6);
    if (document.getElementById('picture').value === "") {
        console.log('61');
        Envoi[6] = false;
        spanPicture.textContent = variables['picture'][0];
    } else {
        console.log('62');
        Envoi[6] = true;
    }
}


envoyer.addEventListener("click",function (event){
        console.log('envoi');

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
    console.log(Envoi);
        if (ok==false) {
            event.preventDefault();
        } else {
            form.submit();
        }
    })

