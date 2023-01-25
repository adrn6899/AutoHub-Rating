(function(e){
    "use strict";

    function getQuestions(){
        $.ajax({
            type: "POST",
            url: "/" + id,
            dataType: 'json',
            data: null,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result){

            },
            error: function(error){

            }
        });
        $('.questions-list').append(`<input type="checkbox" value="" id=""><label>Label</label>`);
    }

    $(function(){
        getQuestions();
    });
})();