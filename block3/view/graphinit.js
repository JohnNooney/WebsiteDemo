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

            var ctx = document.getElementById('tempChart').getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'line',
            data: {
                datasets: [{
                    label: 'Pin 8',
                    backgroundColor: ["rgba(500, 0, 0, 1)"],
                    fill: false,
                    data: pin8Temps
                    
                    
                },
                {
                    label: 'Pin 9',
                    backgroundColor: ["rgba(0, 0, 500, 1)"],
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
                        }
                    }],
                    xAxes:[{
                        scaleLabel:{
                            display: true,
                            labelString: 'Time'
                        }
                    }]
                }
            }
            });

        }
    });
   
    
});