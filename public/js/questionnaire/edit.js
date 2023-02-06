(function(e){
    "use strict";

    var questionArr = [];

    function toastRWithTime(message, type, btnType){
    
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "3000",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
          }
    
          switch (type){
            case 'success':
                toastr.success(message)
                break;
            case 'info':
                toastr.info(message)
                break;
            case 'warning':
                toastr.warning(message)
                break;
            case 'error':
                toastr.error(message)
                break;
            }  
        }

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
                $('#edit_link').val(result.link[0].link);
                $.each(result.result, function(key,value){
                    idArr.push(value.q_id);
                });
                // console.log(idArr);
                $.each(result.questions, function(key, value){
                    console.log(value.id);
                    if($.inArray(value.id,idArr) >= 0){
                        $('.questions-list').append(`<input class="form-check-input mt-1" type="checkbox" id="`+value.title+`" value="`+value.id+`" checked="">\n<label class="form-check-label" for="`+value.title+`" style="font-size: 1rem">`+value.title+`</label></br>`);
                    } else {
                        $('.questions-list').append(`<input class="form-check-input mt-1" type="checkbox" id="`+value.title+`" value="`+value.id+`">\n<label class="form-check-label" for="`+value.title+`" style="font-size: 1rem">`+value.title+`</label></br>`);
                    }

                });
                $('input[type="checkbox"]').change(function(){
                    questionArr = [];
                    console.log("popping");
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

            var formData = new FormData();
            formData.append('t_id',template_id);
            formData.append('s_id',system_id);    
            formData.append('questionArr',questionArr);    

            $.ajax({
                type: "POST",
                url: "/questionnaires/update",
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e){
                    toastRWithTime("success",'success');
                },
                error: function(e){

                }
            });
        });
    }

    $(function(){
        getQuestions();
        submitEdit();

        $('input[type="checkbox"]').change(function(){
            questionArr = [];
            console.log("popping");
        });

        $('#copy_link').on('click', function(e){
            e.preventDefault();

            var copyText = document.getElementById("edit_link");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard
            .writeText(copyText.value)
            .then(() => {
                alert("successfully copied");
            })
            .catch(() => {
                alert("something went wrong");
            });
        });

    });
})();