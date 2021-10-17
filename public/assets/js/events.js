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


