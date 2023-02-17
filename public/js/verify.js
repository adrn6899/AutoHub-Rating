(function(e){
    "use strict";

    var starsArr = [];
    // var Arr = [];
    var options = {
        max_value: 5,
        step_size: 1,
    }    

    function createAnswerField(){
        $.each(questions.questions, function(key,value){
            // console.log(value.qst_id);
            $('.answers-card', function(){
                $('.card-body').append('<div class="rating-div" id="'+value.id+'"><label style="font-size:1.5rem;"  id="'+value.id+'">'+value.title+'</label></br><div class="rating-'+key+' starsRating" style="font-size: 5rem;"></div></div><hr class="dashed">');
                $('.rating-'+key+'').rate(options);
                    $(this).on('change','.rating-'+key+'', function(e, data){
                        // var Arr = [];
                        var name = "Arr"+value.qst;
                        name = [];
                        // name.push(value.qst_id,data.to);
                        starsArr.push(name = [
                            value.qst_id,
                            data.to
                        ]);

                    });
            });
        });
    }

    function SubmitReview(){
        $('#submitReview').on('click', function(e){
            e.preventDefault();
            alert();

            var formData = new FormData();

            formData.append('t_id',t_id);
            formData.append('stars',JSON.stringify(starsArr));

            $.ajax({
                type: "POST",
                url: "/response",
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(success){
                  toastRWithTime(success.message,"success");
                },
                error: function(error){
                  console.log(error);
                  toastRWithTime(error);
                }
              });
        });
    }

    $(function(){
        createAnswerField();
        SubmitReview();
    });
})();