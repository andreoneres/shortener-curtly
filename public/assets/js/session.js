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
        window.location.href = "/home";
      } else {
          document.getElementById('error').innerHTML = response.Dados;
      }
}
