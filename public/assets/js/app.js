const server = "http://www.encurtador.com";

async function requisitarPagina(url) {
  try {
    let response = await fetch(`${server}/${url}`);
    response = await response.text();

    var parser = new DOMParser();
    var doc = parser.parseFromString(response, 'text/html');

    var content = doc.querySelector(".conteudo").innerHTML;

    document.getElementById("conteudo").innerHTML = content;

    window.history.pushState("page2", "Title", `/${url}`);

  } catch (error) {
    console.log(error);
  }
}

function teste() {
  if (window.confirm('Você tem certeza?')) {
    alert('Você foi deslogado!')
    window.location.href = 'logout'
  } else {
    alert('Você desistiu de deslogar!')
  }
}

function createChart() {
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
}