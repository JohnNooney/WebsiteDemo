$(document).ready(function () {
    //create ajax call to function to get data from tables
    $.ajax({
        type: 'POST',
        url: '../controller/getGraphData.php',
        success: function (result) {
            //parse the json data
            var jsonResult = JSON.parse(result);
            var times = jsonResult.time;
            var pin8Temps = jsonResult.pin8Temps;
            var pin9Temps = jsonResult.pin9Temps;

            //place the two most recent values above the graph
            $("#temp8First").text("Pin 8: " + pin8Temps[0]);
            $("#temp9First").text("Pin 9: " + pin9Temps[0]);
            var ctx = document.getElementById('tempChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
            data: {
                datasets: [{
                    label: 'Internal Temp - pin8',
                    backgroundColor: "rgb(250, 0, 0)",
                    fill: false,
                    data: pin8Temps
                    
                    
                },
                {
                    label: 'External Temp - pin9',
                    backgroundColor: "rgb(0, 0, 250)",
                    fill: false, 
                    data: pin9Temps

                }],
                labels: times
            },
            options: {
                scales:{
                    yAxes:[{
                        scaleLabel:{
                            display: true,
                            labelString: 'Temperature (Celcius)'
                        },
                        ticks: {
                            beginAtZero: false,
                            stepSize: 2
                        }
                    }],
                    xAxes:[{
                        scaleLabel:{
                            display: true,
                            labelString: 'Time'
                        }
                    }]
                },
                tooltips: {
                    mode: 'index'
                },
                maintainAspectRatio: false
            }
            });

        }
    });
   
    //update chart every 30min
    setTimeout(function() {
        myChart.update();
      }, 1800000);
});