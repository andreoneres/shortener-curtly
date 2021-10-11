const server = "http://www.encurtador.com";

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
  var menu = document.querySelectorAll(".create-link");
  var menucreate = document.querySelector(".menu-create-link");
  var menuedit = document.querySelector(".menu-edit-link");
  var closecreate = document.querySelector("#close-create");
  var closeedit = document.querySelector("#close-edit");
  
    menu.forEach(element => {
        element.addEventListener("click", function () {
            menucreate.classList.add("open-menu");
            menucreate.classList.remove("close-menu");
        });
    });

  closecreate.addEventListener("click", function () {
      menucreate.classList.remove("open-menu");
      menucreate.classList.add("close-menu");
  });

  closeedit.addEventListener("click", function () {
    menuedit.classList.remove("open-menu");
    menuedit.classList.add("close-menu");
});
},false);
