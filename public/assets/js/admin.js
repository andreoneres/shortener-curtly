const iduser = sessionStorage.getItem("iduser");
//PAINEL ADMINISTRATIVO
async function searchLink() {
  var form = document.querySelector(".form-search-link");
  var search = form.search.value;

  let response = await sendRequest(`home?search=${search}`, "GET");
  response = await response.text();

  var parser = new DOMParser();
  var doc = parser.parseFromString(response, "text/html");
  var content = doc.querySelector(".links-created").innerHTML;
  document.querySelector(".links-created").innerHTML = content;

  var content = doc.querySelector("#total-results").innerHTML;
  document.querySelector("#total-results").innerHTML = content;
  updateDetails;
}

//
async function updateLinks() {
  let response = await sendRequest("home", "GET");

  response = await response.text();

  var parser = new DOMParser();
  var doc = parser.parseFromString(response, "text/html");
  var content = doc.querySelector(".links-created").innerHTML;
  document.querySelector(".links-created").innerHTML = content;
}

async function updateDetails(idlink) {
  let response = await sendRequest("home", "GET");

  response = await response.text();

  var parser = new DOMParser();
  var doc = parser.parseFromString(response, "text/html");
  var content = doc.querySelector(".links-details").innerHTML;
  document.querySelector(".links-details").innerHTML = content;
}

async function viewDetailsLink(idlink) {
  let data = {
    idlink: idlink,
  };

  let response = await sendRequest("home", "POST", data);

  response = await response.text();

  var parser = new DOMParser();
  var doc = parser.parseFromString(response, "text/html");

  var content = doc.querySelector(".links-details").innerHTML;
  document.querySelector(".links-details").innerHTML = content;
}

async function alterPagination(page) {
  let data = {
    pagina: page,
  };

  let response = await sendRequest("home", "POST", data);

  response = await response.text();

  var parser = new DOMParser();
  var doc = parser.parseFromString(response, "text/html");
  var content = doc.querySelector(".links-created").innerHTML;
  document.querySelector(".links-created").innerHTML = content;
}

async function createLink() {
  var form = document.getElementById("form-link-create");
  document.getElementById("create-link-btn").disabled = true;
  let data = {
    title: form.titlecreate.value,
    iduser: iduser,
    originallink: form.originalcreate.value,
    customlink: form.customcreate.value,
  };

  let response = await sendRequest("criarlink", "POST", data);

  response = await response.json();

  console.log(response);
  if(response.Status !== 200) {
    swal("Oops!", `${response.Dados}`, "warning");
    document.getElementById("create-link-btn").disabled = false;
  } else {
    var menucreate = document.querySelector(".menu-create-link");
    menucreate.classList.remove("open-menu");
    menucreate.classList.add("close-menu");
    updateLinks();

    swal("Sucesso!", "Link criado com sucesso.", "success");
    document.getElementById("create-link-btn").disabled = false;
    form.reset();
  }

}

async function editLink() {
  var form = document.getElementById("form-link-edit");
  var id = document.querySelector(".links-info").id;
  var menuedit = document.querySelector(".menu-edit-link");
  document.getElementById("edit-link-btn").disabled = true;
  let data = {
    title: form.titleedit.value,
    iduser: iduser,
    customlink: form.customedit.value,
    idlink: id,
  };

  let response = await sendRequest("editarlink", "POST", data);

  response = await response.json();
  console.log(response);

  if(response.Status !== 200) {
    swal("Oops!", `${response.Dados}`, "warning");
    document.getElementById("edit-link-btn").disabled = false;
  } else {
    menuedit.classList.remove("open-menu");
    menuedit.classList.add("close-menu");
  
    swal("Sucesso!", "Link editado com sucesso.", "success");
    document.getElementById("edit-link-btn").disabled = false;
  
    updateLinks();
    viewDetailsLink(id);
  }
}

async function deleteLink(idlink) {
  let data = {
    idlink: idlink,
    iduser: iduser,
  };

  const willDelete = await swal({
    title: "Atenção!",
    text: "Você tem certeza que quer apagar esse link? Essa é uma ação irreversível.",
    icon: "warning",
    dangerMode: true,
    buttons: ["Cancelar", "Confirmar"],
  });

  if (willDelete) {
    let response = await sendRequest("deletarlink", "POST", data);

    response = await response.json();

    console.log(response);

    updateLinks();
    updateDetails();

    swal("Sucesso!", "Link excluído com sucesso.", "success");
  }
}

async function getDataLink(idlink) {
  var menu = document.querySelector("#edit-link");
  var menumob = document.querySelector(".menu-edit-link");
  var close = document.querySelector("#close");
  menumob.classList.add("open-menu");
  menumob.classList.remove("close-menu");

  let response = await sendRequest(`link/${idlink}`, "GET");

  response = await response.json();

  document.getElementById("titleedit").value = response.Dados.TITLE;
  document.getElementById("customedit").value = response.Dados.CUSTOM;
  document.getElementById("expirationedit").value = response.Dados.EXPIRATION;
}

async function sendRequest(url, method, data = null) {
  if (method == "GET") {
    var response = await fetch(`${server}/${url}`, {
      method: method,
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
    });
  } else if (method == "POST") {
    var response = await fetch(`${server}/${url}`, {
      method: method,
      body: new URLSearchParams(data),
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
    });
  }

  return response;
}

function logout() {
  sessionStorage.clear();
  document.location.href = "/logout";
}

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

function openCreateLink() {
  var menucreate = document.querySelector(".menu-create-link");
  menucreate.classList.add("open-menu");
  menucreate.classList.remove("close-menu");
}

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