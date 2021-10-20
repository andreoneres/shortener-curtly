const server = "http://www.encurtador.com";

async function createLink() {
  var form = document.getElementById("form-create-link");
  document.getElementById("btn-1").disabled = true;
  let data = {
    originallink: form.originallink.value,
    customlink: form.customlink.value,
  };

  let response = await fetch(`${server}/criarlink`, {
    method: "POST",
    body: new URLSearchParams(data),
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  });

  response = await response.json();
  console.log(response);
  if (typeof response.Dados.linkshortened !== "undefined") {
    const willCopy = await swal({
      title: "Bom trabalho!",
      text: "Link encurtado com sucesso.",
      icon: "success",
      content: {
        element: "input",
        attributes: {
          type: "text",
          value: `${server}/${response.Dados.linkshortened}`,
          disabled: true
        },
      },
      button: "COPIAR"
    })
    .then((value) => {
       if(value !== null) {
           copyText()
       }
    });
  } else {
    swal("Oops!", `${response.Dados}`, "warning");
  }

  document.getElementById("btn-1").disabled = false;
}

function copyText() {
    var range = document.createRange();
    range.selectNode(document.querySelector(".swal-content__input"));
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();
}