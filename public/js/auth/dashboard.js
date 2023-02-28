
(function(e){
    "use strict";

    var templates = [];
    var average = [];
    var systems = [];
    var myChart;
    var id;

    function createChart(responseData){
        const ctx = document.getElementById('myChart').getContext('2d');

        var labels = [];
        var values = [];

        for (var i = 0; i < responseData['result'].length; i++) {
            // console.log(responseData[i]);
            // console.log("true");
            
            labels.push(responseData['result'][i].system);
            values.push(responseData['result'][i].average);
        }

        if(myChart){
            myChart.destroy();
        }

        myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                {
                    label: responseData['result'][0].template,
                    data: values,
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }
                ]
            },
            options: {
                scales: {
                y:{
                        beginAtZero: true
                    }
                }
            }
        });

    }

    function ajax(id){
        $.ajax({
            type:"GET",
            url:"/getTopFive",
            data:{id:id},
            dataType: 'json',
            success: function(success){
              createChart(success);
            },
            error: function(error){
              console.log(error);
            }
        });
    }


    $(function(e){
        ajax(id);
        $('#templates_select').select2({
            // theme: 'classic',
            allowClear: true,
            language: {
                noResults: function () {
                return "Select";
                },
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            placeholder: "Select template",
            ajax: {
                url:"/templates/select2",
                dataType: 'json',
                delay: 250,
                data: function (data) {
                    return {
                      search: data.term,
                      limit: 15,
                    };
                  },
                  processResults: function (response) {
                    return {
                      results: response.results,
                    };
                  },
                  cache: true,
            }    
        });
        $('#templates_select').on('change',function(){
            ajax($(this).val());
        });
    });
})();