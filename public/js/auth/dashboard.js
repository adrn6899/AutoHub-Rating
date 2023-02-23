
(function(e){
    "use strict";

    var templates = [];
    var average = [];

    function createChart(result){
        $.each(result, function(key,value){
            templates.push(value.template);
            average.push([value.system,value.average]);
        });
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: templates,
            datasets: [{
                label: 'Top 5 Rated Systems',
                data: [65, 59, 80, 81, 56, 55, 40],
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

    function getDefault(){
        $.ajax({
            type:"GET",
            url:"/default",
            data: null,
            success: function(result){
                createChart(result);
            },
            error: function(error){

            }
        });
    }

    $(function(e){
        getDefault();
    });
})();