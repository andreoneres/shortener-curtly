
//PAINEL ADMINISTRATIVO
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
    
    console.log(response);
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
