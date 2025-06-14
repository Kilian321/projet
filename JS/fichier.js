const passwordSettingsBtn = document.querySelector("#passwordSettingsBtn");
const passwordInput = document.querySelector("#passwordInput")

let mode = 1;

passwordSettingsBtn.addEventListener("click", ()=>{
    getPasswordDatas()
})


function getPasswordDatas(){

    const passwordSize = document.querySelector(".password-size");
    const passModeList = document.querySelector(".passModeList");

    switch (passModeList.selectedOptions[0].id){

        case "Alpha" :
            mode = 1
            break
        case "AlphaNum" :
            mode=2
            break
        case "Complet" :
            mode = 3
            break
    }

    console.log(mode,passwordSize?.value)

    if(passwordSize?.value ) {
        fetch('http://127.0.0.1:8000/api/password', {
            method: "POST",
            mode: "cors",
            headers: {
                "Content-Type": "application/json",

            },
            body: JSON.stringify({mode: mode, taille : passwordSize.value})
        }).then(response=>{
            response.json().then(response=>{
                passwordInput.value = response["password"]
            })
        }).catch(error=>{
            console.log(error)
        })


    }

}


