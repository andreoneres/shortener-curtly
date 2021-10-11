const iduser = sessionStorage.getItem('iduser')
//PAINEL ADMINISTRATIVO
async function updateLinks() {

    let response = await fetch(`${server}/home`);
        
    response = await response.text();
    
    var parser = new DOMParser();
    var doc = parser.parseFromString(response, 'text/html');
    var content = doc.querySelector(".links-created").innerHTML;
    document.querySelector(".links-created").innerHTML = content;
}

async function viewDetailsLink(idlink) {

    let data = {
        idlink: idlink,
    };
        
    let response = await fetch(`${server}/home`, {
        method: "POST",
        body: new URLSearchParams(data),
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
    });
        
    response = await response.text();
    
    var parser = new DOMParser();
    var doc = parser.parseFromString(response, 'text/html');
    var content = doc.querySelector(".links-details").innerHTML;
    document.querySelector(".links-details").innerHTML = content;
}

async function alterPagination(page) {

    let data = {
        pagina: page,
    };
        
    let response = await fetch(`${server}/home`, {
        method: "POST",
        body: new URLSearchParams(data),
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
    });
        
    response = await response.text();
  
    var parser = new DOMParser();
    var doc = parser.parseFromString(response, 'text/html');
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
        customlink: form.customcreate.value
    }
    
        let response = await fetch(`${server}/criarlink`, {
            method: "POST",
            body: new URLSearchParams(data),
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
        });
            
        response = await response.text();

        console.log(response);

        var menucreate = document.querySelector(".menu-create-link");
        menucreate.classList.remove("open-menu");
        menucreate.classList.add("close-menu");
        updateLinks()

        swal("Sucesso!", "Link criado com sucesso.", "success");
        document.getElementById("create-link-btn").disabled = false;

        form.reset()
}

async function editLink() {

    var form = document.getElementById("form-link-edit");
    var id = document.querySelector(".links-info").id
    document.getElementById("edit-link-btn").disabled = true;
    let data = {
        title: form.titleedit.value,
        iduser: iduser,
        customlink: form.customedit.value,
        idlink: id
    }

    let response = await fetch(`${server}/editarlink`, {
        method: "POST",
        body: new URLSearchParams(data),
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
    });
        
    response = await response.text();
    console.log(response)
    var menuedit = document.querySelector(".menu-edit-link");
    menuedit.classList.remove("open-menu");
    menuedit.classList.add("close-menu");
    
    swal("Sucesso!", "Link editado com sucesso.", "success");
    document.getElementById("edit-link-btn").disabled = false;

    // console.log(response)

}

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
      });
      
      if (willDelete) {
        let response = await fetch(`${server}/deletarlink`, {
            method: "POST",
            body: new URLSearchParams(data),
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
        });
            
        response = await response.json();

        console.log(response);

        updateLinks()

        swal("Sucesso!", "Link excluído com sucesso.", "success");
      }
}



async function getDataLink(idlink) {
    var menu = document.querySelector("#edit-link");
    var menumob = document.querySelector(".menu-edit-link");
    var close = document.querySelector("#close");
    menumob.classList.add("open-menu");
    menumob.classList.remove("close-menu");

    let response = await fetch(`${server}/link/${idlink}`);
        
    response = await response.json();
    
    document.getElementById("titleedit").value = response.Dados.TITLE
    document.getElementById("customedit").value = response.Dados.CUSTOM
    document.getElementById("expirationedit").value = response.Dados.EXPIRATION
}

async function sendRequest(url, method, data) {

    let response = await fetch(`${server}/${url}`, {
        method: method,
        body: new URLSearchParams(data),
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
    });
        
    response = await response.json();

    return response
}

function logout() {
    sessionStorage.clear();
    document.location.href = "/logout";
    swal("Sucesso!", "Você foi deslogado com sucesso.", "success");
}