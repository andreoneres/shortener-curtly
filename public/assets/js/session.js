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
          swal("Oops!", `${response.Dados}`, "warning");
      }
}

async function register() {
    var form = document.getElementById('form-register');

    let data = {
        name: form.name.value,
        email: form.email.value,
        password: form.password.value,
        confirmpassword: form.confirmpassword.value
    }

    var response = await fetch(`${server}/cadastro`, {
        method: "POST",
        body: JSON.stringify(data),
      });

    response = await response.json();
    console.log(response);

    if(response.Dados == 'Dados registrados com sucesso!') {
        let login = await fetch(`${server}/login`, {
            method: "POST",
            body: JSON.stringify(data),
        });
        login = await login.json()
        sessionStorage.setItem('iduser', login.Dados.ID_USER);
        swal("Sucesso!", "Sua conta foi criada com sucesso! Você será logado em alguns segundos...", "success");
        setInterval(() => {
            window.location.href = "/home";
        }, 4000);
    } else {
        swal("Oops!", `${response.Dados}`, "warning");
    }
}
