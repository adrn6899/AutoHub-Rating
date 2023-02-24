
(function(e){
    "use strict";

    var templates = [];
    var average = [];
    var systems = [];

    function createChart(responseData){
        const ctx = document.getElementById('myChart').getContext('2d');
        const labels = [responseData['template']];
        var datasets = [];

        $.each(responseData,(group,index)=>{
            $.each(index,(key,value)=>{
                // console.log(key);
                datasets.push({
                    label: index[key].system,
                    backgroundColor:"red",
                    data:index[key].average
                });
            });
        });
        console.log(datasets);
       new Chart(ctx, {
            type: 'bar',
            data: {
                labels:labels,
                datasets:datasets,
            },
            options:{
                scales:{
                    y:{
                        beginAtZero:true,
                    }
                }
            }
        });
    }

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function getDefault(){
        $.ajax({
            type:"GET",
            url:"/default",
            data: null,
            success: function(data){
                var groupedData = {};
        $.each(data, function(index, item) {
            var system = item.system;
            var template = item.template;
            var value = item.value;
            if (!groupedData[system]) {
                groupedData[system] = {};
            }
            if (!groupedData[system][template]) {
                groupedData[system][template] = [];
            }
            groupedData[system][template].push(value);
        });

        var averagedData = {};
        $.each(groupedData, function(system, templates) {
            averagedData[system] = {};
            $.each(templates, function(template, values) {
                var sum = 0;
                $.each(values, function(index, value) {
                    sum += value;
                });
                var average = sum / values.length;
                averagedData[system][template] = average;
            });
        });

        // Create chart
        var labels = Object.keys(averagedData[Object.keys(averagedData)[0]]);
        var datasets = [];

        $.each(averagedData, function(system, values) {
            var data = [];
            $.each(labels, function(index, label) {
                data.push(values[label] || 0);
            });

            var color = getRandomColor();
            var dataset = {
                label: 'System ' + system,
                data: data,
                backgroundColor: color + '33',
                borderColor: color,
                borderWidth: 1
            };
            datasets.push(dataset);
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: datasets
            },
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
            },
            error: function(error){

            }
        });
    }

    $(function(e){
        getDefault();
    });
})();