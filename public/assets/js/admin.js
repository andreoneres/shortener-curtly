const iduser = sessionStorage.getItem("iduser")

/**
  * Função responsável por criar um novo link.
  * @return null
  */
 async function createLink() {
  var form = document.getElementById("form-link-create")
  document.getElementById("create-link-btn").disabled = true
  let data = {
    title: form.titlecreate.value,
    iduser: iduser,
    originallink: form.originalcreate.value,
    customlink: form.customcreate.value,
    expiration: form.expirationcreate.value
  }

  let response = await sendRequest("criarlink", "POST", data)

  response = await response.json()

  if(response.Status !== 200) {
    swal("Oops!", `${response.Dados}`, "warning")
    document.getElementById("create-link-btn").disabled = false
  } else {
    var menucreate = document.querySelector(".menu-create-link")
    menucreate.classList.remove("open-menu")
    menucreate.classList.add("close-menu")
    updateLinks()

    swal("Sucesso!", "Link criado com sucesso.", "success")
    document.getElementById("create-link-btn").disabled = false
    form.reset()
  }

}

/**
  * Função responsável por editar um novo link.
  * @return null
  */
async function editLink() {
  var form = document.getElementById("form-link-edit")
  var id = document.querySelector(".links-info").id
  var menuedit = document.querySelector(".menu-edit-link")
  document.getElementById("edit-link-btn").disabled = true
  let data = {
    title: form.titleedit.value,
    iduser: iduser,
    customlink: form.customedit.value,
    expiration: form.expirationedit.value,
    idlink: id,
  }

  let response = await sendRequest("editarlink", "POST", data)

  response = await response.json()

  if(response.Status !== 200) {
    swal("Oops!", `${response.Dados}`, "warning")
    document.getElementById("edit-link-btn").disabled = false
  } else {
    menuedit.classList.remove("open-menu")
    menuedit.classList.add("close-menu")
  
    swal("Sucesso!", "Link editado com sucesso.", "success")
    document.getElementById("edit-link-btn").disabled = false
  
    updateLinks()
    viewDetailsLink(id)
  }
}

/**
  * Função responsável por deletar um link.
  * @return null
  */
async function deleteLink(idlink) {
  let data = {
    idlink: idlink,
    iduser: iduser,
  }

  const willDelete = await swal({
    title: "Atenção!",
    text: "Você tem certeza que quer apagar esse link? Essa é uma ação irreversível.",
    icon: "warning",
    dangerMode: true,
    buttons: ["Cancelar", "Confirmar"],
  })

  if (willDelete) {
    let response = await sendRequest("deletarlink", "POST", data)

    response = await response.json()



    updateLinks()
    updateDetails()

    swal("Sucesso!", "Link excluído com sucesso.", "success")
  }
}

/**
  * Função responsável por editar os dados do usuário.
  * @return null
  */
async function editUser() {
  var form = document.getElementById("form-edituser")
  document.getElementById("btn-edituser").disabled = true
  let data = {
    name: form.name.value,
    email: form.email.value,
    password: form.password.value,
    newpassword: form.newpassword.value,
    confirmpassword: form.confirmpassword.value,
  }

  let response = await sendRequest("editarusuario", "POST", data)

  response = await response.json()

  if(response.Dados == 'Dados atualizados com sucesso!') {
    swal("Sucesso!", "Dados atualizados com sucesso.", "success")
    document.getElementById("btn-edituser").disabled = false
    document.querySelector(".modal-background").style.display = "none"
    form.reset()
    document.getElementById("name").value = form.name.value
    document.getElementById("email").value = form.email.value
    let response = await sendRequest("home", "GET")

    response = await response.text()

    var parser = new DOMParser()
    var doc = parser.parseFromString(response, "text/html")
    
    var content = doc.querySelector(".username").innerHTML
    document.querySelector(".username").innerHTML = content
  } else {
    swal("Oops!", `${response.Dados}`, "warning")
    document.getElementById("btn-edituser").disabled = false
  }
}

/**
  * Função responsável por pesquisar links a partir da busca do usuário.
  * @return null
  */
async function searchLink() {
  var form = document.querySelector(".form-search-link")
  var search = form.search.value

  let response = await sendRequest(`home?search=${search}`, "GET")
  response = await response.text()

  var parser = new DOMParser()
  var doc = parser.parseFromString(response, "text/html")
  var content = doc.querySelector(".links-created").innerHTML
  document.querySelector(".links-created").innerHTML = content

  var content = doc.querySelector("#total-results").innerHTML
  document.querySelector("#total-results").innerHTML = content
  updateDetails
}

/**
  * Função responsável por atualizar os links da tela.
  * @return null
  */
async function updateLinks() {
  let response = await sendRequest("home", "GET")

  response = await response.text()

  var parser = new DOMParser()
  var doc = parser.parseFromString(response, "text/html")
  
  var content = doc.querySelector(".links-created").innerHTML
  document.querySelector(".links-created").innerHTML = content

  var content = doc.querySelector("#total-results").innerHTML
  document.querySelector("#total-results").innerHTML = content
}

/**
  * Função responsável por atualizar os detalhes do link selecionado.
  * @return null
  */
async function updateDetails(idlink) {
  let response = await sendRequest("home", "GET")

  response = await response.text()

  var parser = new DOMParser()
  var doc = parser.parseFromString(response, "text/html")
  var content = doc.querySelector(".links-details").innerHTML
  document.querySelector(".links-details").innerHTML = content
}

/**
  * Função responsável por atualizar o modal com os detalhes do link selecionado.
  * @return null
  */
async function viewDetailsLink(idlink) {
  let data = {
    idlink: idlink,
  }

  let response = await sendRequest("home", "POST", data)

  response = await response.text()

  var parser = new DOMParser()
  var doc = parser.parseFromString(response, "text/html")

  var content = doc.querySelector(".links-details").innerHTML
  document.querySelector(".links-details").innerHTML = content
}

/**
  * Função responsável por alterar a paginação dos links.
  * @return null
  */
async function alterPagination(page) {
  let data = {
    pagina: page,
  }

  let response = await sendRequest("home", "POST", data)

  response = await response.text()

  var parser = new DOMParser()
  var doc = parser.parseFromString(response, "text/html")
  var content = doc.querySelector(".links-created").innerHTML
  document.querySelector(".links-created").innerHTML = content
}

/**
  * Função responsável por puxar os dados de um link ao clicar em Editar.
  * @return null
  */
async function getDataLink(idlink) {
  var menuedit = document.querySelector(".menu-edit-link")
  menuedit.classList.add("open-menu")
  menuedit.classList.remove("close-menu")

  let response = await sendRequest(`link/${idlink}`, "GET")

  response = await response.json()

  document.getElementById("titleedit").value = response.Dados.TITLE
  document.getElementById("customedit").value = response.Dados.CUSTOM
  document.getElementById("expirationedit").value = response.Dados.EXPIRATION
}

/**
  * Função responsável por realizar uma requisição e retornar a resposta.
  * @return promise
  */
async function sendRequest(url, method, data = null) {
  if (method == "GET") {
    var response = await fetch(`${server}/${url}`, {
      method: method,
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
    })
  } else if (method == "POST") {
    var response = await fetch(`${server}/${url}`, {
      method: method,
      body: new URLSearchParams(data),
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
    })
  }

  return response
}

/**
  * Função responsável por encerrar a sessão do usuário.
  * @return null
  */
function logout() {
  sessionStorage.clear()
  document.location.href = "/logout"
}

/**
  * Função responsável por abrir o modal para criação de link.
  * @return null
  */
function openCreateLink() {
  var menucreate = document.querySelector(".menu-create-link")
  menucreate.classList.add("open-menu")
  menucreate.classList.remove("close-menu")
}

/**
  * Evento responsável por abrir e fechar o modal de alteração de dados do usuário.
  * @return null
  */
window.addEventListener("load",function(event) {
  var profile = document.querySelector("#profile")
  var modaledituser = document.querySelector(".modal-background")

  profile.addEventListener("click", function () {
    modaledituser.style.display = "flex"
  })

  modaledituser.addEventListener("click", function (e) {
    if(e.target.id == 'modal-background') {
      modaledituser.style.display = "none"
    }
  })

},false)

/**
  * Evento responsável por abrir e fechar o menu de configuração.
  * @return null
  */
window.addEventListener("load",function(event) {
  var menuconf = document.querySelector(".icon_conf")
  var confopen = document.querySelector(".conf_open")
  menuconf.addEventListener("click", function () {
      if (confopen.style.display == "block") {
          confopen.style.display = "none" 
      } else {
          confopen.style.display = "block" 
      }
  })
},false)

/**
  * Evento responsável por abrir e fechar o modal para criação de link.
  * @return null
  */
 window.addEventListener("load",function(event) {
  var menu = document.querySelector(".create-link")
  var menucreate = document.querySelector(".menu-create-link")
  var menuedit = document.querySelector(".menu-edit-link")
  var closecreate = document.querySelector("#close-create")
  var closeedit = document.querySelector("#close-edit")
  
    menu.addEventListener("click", function () {
      menucreate.classList.add("open-menu")
      menucreate.classList.remove("close-menu")
    })

  closecreate.addEventListener("click", function () {
      menucreate.classList.remove("open-menu")
      menucreate.classList.add("close-menu")
  })

  closeedit.addEventListener("click", function () {
    menuedit.classList.remove("open-menu")
    menuedit.classList.add("close-menu")
  })

},false)
