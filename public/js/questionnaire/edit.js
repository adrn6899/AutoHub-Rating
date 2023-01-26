(function(e){
    "use strict";

    var questionArr = [];

    function getQuestions(){
        var type = "";
        // var idArr = [];
        var formData = new FormData();
        formData.append('t_id',template_id);
        formData.append('s_id',system_id);
        $.ajax({
            type: "POST",
            url: "/questionnaires/getQuestions",
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result){
                var idArr = [];
                // console.log(result.template[0].title);
                $('#edit_template_name').val(result.template[0].title);
                $('#edit_system_name').val(result.system[0].system_name);
                $.each(result.result, function(key,value){
                    idArr.push(value.q_id);
                });
                // console.log(idArr);
                $.each(result.questions, function(key, value){
                    // console.log(value.id);
                    if($.inArray(value.id,idArr) >= 0){
                        $('.questions-list').append(`<input type="checkbox" value="`+value.id+`" checked="">\n<label style="font-size: 2rem">`+value.title+`</label></br>`);
                    } else {
                        $('.questions-list').append(`<input type="checkbox" value="`+value.id+`" >\n<label style="font-size: 2rem">`+value.title+`</label></br>`);
                    }
                });
            },
            error: function(error){

            }
        });
    }

    function submitEdit(){
        $('.template-edit').submit(function(e){
            e.preventDefault();
            $('input[type="checkbox"]:checked').each(function(){
                questionArr.push(this.value);
            });

            console.log(questionArr);

        });
    }

    $(function(){
        getQuestions();
        submitEdit();

        $('input[type="checkbox"]').change(function(){
            questionArr = [];
        });
    });
})();