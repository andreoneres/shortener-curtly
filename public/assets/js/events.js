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