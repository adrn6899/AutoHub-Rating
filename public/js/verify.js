(function(e){
    "use strict";

    var starsArr = [];
    // var Arr = [];
    var options = {
        max_value: 5,
        step_size: .5,
    }    

    function createAnswerField(){
        $.each(questions.questions, function(key,value){
            $('.container-fluid', function(){
                $('.q-list2').append('<div class="rating-div" id="'+value.id+'"><label style="font-size:1.5rem;"  id="'+value.id+'">'+value.title+'</label></br><div class="rating-'+key+' starsRating" style="font-size: 5rem;"></div></div><hr class="dashed">');
                $('.rating-'+key+'').rate(options);
                    $(this).on('change','.rating-'+key+'', function(e, data){
                        var name = "Arr"+value.qst;
                        name = [];
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

            var formData = new FormData();

            formData.append('t_id',t_id);
            formData.append('s_id',s_id);
            formData.append('stars',JSON.stringify(starsArr));
            formData.append('comment',$('#comment').val());

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
                  toastRWithTime("Duplicate entry","error");
                }
              });
        });
    }
    2974
    $(function(){
        createAnswerField();
        SubmitReview();
        $('#proceed_rating').on('click', (e) => {
            e.preventDefault();
            if($('#data-privacy').prop("checked")){
                $('.data-privacy').hide();
                $('.q-list').show();
            }else{
                toastRWithTime('Please agree to the terms and agreements first','error');
            }
        });
    });
})();