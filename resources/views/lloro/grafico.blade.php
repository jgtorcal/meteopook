@extends('layout.index')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<div class="col">
    <div class="card">
        <div class="card-header">Gráfica de lloros !!!4</div>

        <div class="card-body">

            <div id="chart-container">
                <canvas id="myChart"></canvas>
            </div>

            <script>
                function grab() {
                    /* Promise to make sure data loads */
                    return new Promise((resolve, reject) => {
                        $.ajax({
                            url: "/getdata",
                            method: "POST",
                            dataType: 'JSON',
                            success: function(data) {
                                resolve(data)
                            },
                            error: function(error) {
                                reject(error);
                            }
                        })
                    })
                }
            
                $(document).ready(function() {
                    grab().then((data) => {
                        console.log('Recieved our data', data);
                        let regions = [];
                        let value = [];
            
                        try {
                            data.forEach((item) => {
                                regions.push(item.user)
                                value.push(item.count)
                            });
            
                            let chartdata = {
                                labels: [...regions],
                                datasets: [{
                                    label: 'Lloros',
                                    backgroundColor: 'rgba(78, 173, 243, 0.75)',
                                    borderColor: 'rgba(78, 173, 243, 0.75)',
                                    hoverBackgroundColor: 'rgba(15, 126, 208, 1)',
                                    hoverBorderColor: 'rgba(15, 126, 208, 1)',
                                    data: [...value]
                                }]
                                
                            };
            
                            let ctx = $("#myChart");
            
                            let barGraph = new Chart(ctx, {
                                type: 'bar',
                                data: chartdata,
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
            
                        } catch (error) {
                            console.log('Error parsing JSON data', error)
                        }
            
                    }).catch((error) => {
                        console.log(error);
                    })
                });
            </script>


            






        </div>
    </div>
</div>


@endsection
@section('scripts')
@parent
@endsection