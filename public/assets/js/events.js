/**
  * Evento responsável por alterar o tamanho da fonte da Main.
  * @return null
  */
window.addEventListener("load",function(event) {
    var increase = document.querySelector("#increase")
    var decrease = document.querySelector("#decrease")

    //Muda a fonte do corpo da página para 21px
    increase.addEventListener('click', () => document.body.style.fontSize = '21px')

    //Muda a fonte do corpo da página para 5px 
    decrease.addEventListener("click", function () {
        document.body.style.fontSize = '16px'
    }) 
},false)

/**
  * Evento responsável por adicionar e remover o contraste do site.
  * @return null
  */
window.addEventListener("load",function(event) {
    var nocontrast = document.querySelector("#white")
    var contrastblack = document.querySelector("#black")
    var body = document.querySelector("body")
    
    // Adiciona o contraste na página
    contrastblack.addEventListener("click", function () {
        if (!body.classList.contains("contrast")) {
            body.classList.add("contrast")  
        }
    })

    // Retira o contraste da página
    nocontrast.addEventListener("click", function () {
        if (body.classList.contains("contrast")) {
            body.classList.remove("contrast")   
        }
    })
},false)

/**
  * Evento responsável por abrir e fechar o menu mobile.
  * @return null
  */
window.addEventListener("load",function(event) {
    var menu = document.querySelector(".menu-icon")
    var menumobile = document.querySelector(".menu-mobile")
    var closemenu = document.querySelector("#close")
  
    menu.addEventListener("click", function () {
        menumobile.classList.add("open-menu")
        menumobile.classList.remove("close-menu")
    })
  
    closemenu.addEventListener("click", function () {
        menumobile.classList.remove("open-menu")
        menumobile.classList.add("close-menu")
  })
},false)

/**
  * Evento responsável por alterar as abas do menu mobile.
  * @return null
  */
window.addEventListener("load",function(event) {
    var menu = document.querySelector("#menu-tab-select")
    var menutab = document.querySelector(".menu-tab")
    var account = document.querySelector("#account-tab-select")
    var accounttab = document.querySelector(".account-tab")
  
    menu.addEventListener("click", function () {
        menutab.classList.add("active")
        accounttab.classList.remove("active")    
        menu.classList.add("active-color")
        account.classList.remove("active-color")   
    })
  
    account.addEventListener("click", function () {
        accounttab.classList.add("active")
        menutab.classList.remove("active")
        account.classList.add("active-color")
        menu.classList.remove("active-color")
  })
},false)

