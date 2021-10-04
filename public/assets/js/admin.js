
//PAINEL ADMINISTRATIVO

// função que abre e fecha o menu de configuração
window.addEventListener("load",function(event) {
    var menuconf = document.querySelector(".icon_conf");
    var confopen = document.querySelector(".conf_open");
    menuconf.addEventListener("click", function () {
        if (confopen.style.display == "block") {
            confopen.style.display = "none"; 
        } else {
            confopen.style.display = "block"; 
        }
    });
},false);

//CRIAR LINK
window.addEventListener("load",function(event) {
    var menu = document.querySelector(".create-link");
    var menumob = document.querySelector(".menu-create-link");
    var close = document.querySelector("#close");
    // Abre o menu do site
    menu.addEventListener("click", function () {
        menumob.classList.add("open-menu");
        menumob.classList.remove("close-menu");
        document.querySelector(".title").innerHTML = "ENCURTAR LINK"
        document.querySelector(".btn-submit").innerHTML = "ENCURTAR"
    });

    close.addEventListener("click", function (e) {
        menumob.classList.remove("open-menu");
        menumob.classList.add("close-menu");
});
},false);


//EDITAR LINK
window.addEventListener("load",function(event) {
    var menu = document.querySelector("#edit-link");
    var menumob = document.querySelector(".menu-create-link");
    var close = document.querySelector("#close");
    // Abre o menu do site
    menu.addEventListener("click", function () {
        menumob.classList.add("open-menu");
        menumob.classList.remove("close-menu");
        document.querySelector(".title").innerHTML = "EDITAR LINK"
        document.querySelector(".btn-submit").innerHTML = "EDITAR"
    });

    close.addEventListener("click", function (e) {
        menumob.classList.remove("open-menu");
        menumob.classList.add("close-menu");
});
},false);

