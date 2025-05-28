const passwordSettingsBtn = document.querySelector("#passwordSettingsBtn");

console.log("chargé")

let mode = 1;

passwordSettingsBtn.addEventListener("click", ()=>{
    getPasswordDatas()
})


function getPasswordDatas(){

    const passwordSize = document.querySelector(".password-size");
    const passModeSel = document.querySelector(".passModeSel");

    console.log(passModeSel)


}

/*switch (element.id){

    case "Alpha" :
        mode = 1
        break
    case "AlphaNum" :
        mode=2
        break
    case "Complet" :
        mode = 3
        break
}*/
