const btnBlog = document.querySelector("#blog");
const btnChantier = document.querySelector("#chantier");
const ongletBlogs =document.querySelector("#ongletBlog");
const ongletChantier = document.querySelector("#ongletChantier");

ongletChantier.addEventListener("click", ()=>{
    btnBlog.style.display="none";
    btnChantier.style.display="flex";

})

ongletBlogs.addEventListener("click", ()=>{
    btnChantier.style.display="none";
    btnBlog.style.display="flex";

})