<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.js" integrity="sha512-XcsV/45eM/syxTudkE8AoKK1OfxTrlFpOltc9NmHXh3HF+0ZA917G9iG6Fm7B6AzP+UeEzV8pLwnbRNPxdUpfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="top">
    <div class="top_title">Dashboard</div>
    <div class="top_map">Home > Dashboard</div>
</div>

<div class="container1">
    <div class="tophome_infos">
        <div class="boxs">
            <div class="box_single">
                <div class="box_infos">
                    <h4>CONFERÊNCIAS ATIVAS</h4>
                    <h6><?php echo $params['infos']->conf->COUNT ?></h6>
                </div>
                <div class="box_image"></div>
            </div>
            <div class="box_single">
                <div class="box_infos">
                    <h4>ENTREGAS ATIVAS</h4>
                    <h6><?php echo $params['infos']->entrega->COUNT ?></h6>
                </div>
                <div class="box_image"></div>
            </div>

            <div class="box_single">
                <div class="box_infos">
                    <h4>MONTAGENS ATIVAS</h4>
                    <h6><?php echo $params['infos']->mont->COUNT ?></h6>
                </div>
                <div class="box_image"></div>
            </div>

            <div class="box_single">
                <div class="box_infos">
                    <h4>USUÁRIOS</h4>
                    <h6><?php echo $params['infos']->usuario->COUNT ?></h6>
                </div>
                <div class="box_image"></div>
            </div>
        </div>
    </div>
    <div class="grafico">
        <canvas id="myChart"></canvas>
        <script>
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
        </script>
    </div>
</div>