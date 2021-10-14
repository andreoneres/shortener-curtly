var server = "http://www.encurtador.com";

async function login() {

    var form = document.getElementById('form-login');

    let data = {
        email: form.email.value,
        password: form.password.value,
    }

    let response = await fetch(`${server}/login`, {
        method: "POST",
        body: JSON.stringify(data),
      });
      response = await response.json();

      if(typeof response.Dados.ID_USER !== "undefined") {
        sessionStorage.setItem('iduser', response.Dados.ID_USER);
        const willDelete = await swal({
          title: "Sucesso!",
          text: "Você logado com sucesso.",
          icon: "sucess",
          dangerMode: true,
          buttons: ["Confirmar"],
        });
      
        if (willDelete) {
          window.location.href = "/home";
        }
      } else {
          document.getElementById('error').innerHTML = response.Dados;
      }
}
