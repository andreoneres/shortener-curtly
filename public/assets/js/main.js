window.addEventListener("load",function(event) {
    var increase = document.querySelector("#increase");
    var decrease = document.querySelector("#decrease");

    //Muda a fonte do corpo da página para 21px
    increase.addEventListener('click', () => document.body.style.fontSize = '21px');

    //Muda a fonte do corpo da página para 5px 
    decrease.addEventListener("click", function () {
        document.body.style.fontSize = '16px';
    }); 
},false);

window.addEventListener("load",function(event) {
    var nocontrast = document.querySelector("#white");
    var contrastblack = document.querySelector("#black");
    var body = document.querySelector("body");
    
    // Adiciona o contraste na página
    contrastblack.addEventListener("click", function () {
        if (!body.classList.contains("contrast")) {
            body.classList.add("contrast");  
        }
    });

    // Retira o contraste da página
    nocontrast.addEventListener("click", function () {
        if (body.classList.contains("contrast")) {
            body.classList.remove("contrast");   
        }
    });
},false);

window.addEventListener("load",function(event) {
    var closealert = document.querySelector(".close-alert");
    var modalalert = document.querySelector(".modal-alert");

    // Fecha o modal de alerta
    closealert.addEventListener("click", function () {
        modalalert.classList.add("closemodal");
        setTimeout(
            function () {
                modalalert.style.display = "none";   
            }, 500); 
    });
},false);

window.addEventListener("load",function(event) {
    var menu = document.querySelector(".menu-icon");
    var menumob = document.querySelector(".menu-mobile");
    var complement = document.querySelector(".complement");
    var close = document.querySelector("#close");
    // Abre o menu do site
    menu.addEventListener("click", function () {
        menumob.classList.add("open-menu");
        complement.classList.add("open-complement");
        menumob.classList.remove("close-menu");
        complement.classList.remove("close-complement");
        
    });

    close.addEventListener("click", function (e) {
        menumob.classList.remove("open-menu");
        complement.classList.remove("open-complement");
        menumob.classList.add("close-menu");
        complement.classList.add("close-complement");
});
},false);

// função que abre e fecha o sidebar
window.addEventListener("load",function(event) {
    var body = document.querySelector("body");
    var menu = document.querySelector(".topbar_icon");
    var aside = document.querySelector(".aside");
    var header = document.querySelector(".header");
    
    menu.addEventListener("click", function () {
        if (aside.style.display == "none") {
            body.classList.remove("nosidebar");
            aside.style.display = "block";
            header.style.left = "253px"; 
            header.style.width = "calc(100% - 253px)";      
        } else {
            aside.style.display = "none";
            body.classList.add("nosidebar");
            header.style.left = "0px";
            header.style.width = "100%";
        }
    });
},false);

//PAINEL ADMINISTRATIVO

// função que abre e fecha o menu do Painel de Gestão
window.addEventListener("load",function(event) {
    var menupainel = document.getElementById("painel");
    var navopen = document.querySelector(".nav-open");
    menupainel.addEventListener("click", function () {
        if (navopen.style.display == "block") {
            navopen.style.display = "none";
        } else {
            navopen.style.display = "block"; 
        }
    });
},false);

// função que abre e fecha o menu de notificação
window.addEventListener("load",function(event) {
    var menunot = document.querySelector(".icon_not");
    var notopen = document.querySelector(".not_open");
    menunot.addEventListener("click", function () {
        if (notopen.style.display == "block") {
            notopen.style.display = "none"; 
        } else {
            notopen.style.display = "block"; 
        }
    });
},false);

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


// window.addEventListener("load",function(event) {
//     var input = document.querySelector("#originallink");
//     var inputperso = document.querySelector("#customlink");
//     var form1 = document.querySelector("#form-1");
//     var form2 = document.querySelector("#form-2");
//     var body = document.querySelector(".body");

//     input.addEventListener("click", function (e) {
//         console.log(e.target.id)
//         if(e.target.id == "originallink") {
//             form1.style.borderBottom = "3px solid #FF9600";
//         } 
//     });

//     inputperso.addEventListener("click", function (e) {
//         if(e.target.id == "customlink") {
//             form2.style.borderBottom = "3px solid #FF9600";
//         } 
//     });

//     body.addEventListener("click", function (e) {
//         console.log(e.target.id)
//         if(e.target.id !== "originallink") {
//             form1.style.borderBottom = "none";
//         } 

//         if(e.target.id !== "customlink") {
//             form2.style.borderBottom = "none";
//         } 
//     });
// },false);