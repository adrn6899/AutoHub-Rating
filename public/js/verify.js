(function(e){
    "use strict";

    var starsArr = [];

    function createAnswerField(){
        $.each(questions.questions, function(key,value){
            // console.log(value.qst_id);
            $('.answers-card', function(){
                $('.card-body').append('<div class="rating-div" id="'+value.id+'"><label style="font-size:1.5rem;"  id="'+value.id+'">'+value.title+'</label></br><div class="rating-'+key+' starsRating" style=""></div></div>');
                $('.rating-'+key+'').starRating(
                    {
                        starSize: 1.5,
                        showInfo: false,
                        hoverColor: 'salmon',
                        callback: function(currentRating){
                            console.log(currentRating);
                        }     
                    });
                // $.each('.rating-div', function(e){
                //     var id = $(this).attr('id');
                    $(this).on('change','.rating-'+key+'', function(e, stars, index){
                        console.log(value.title,stars);
                        var Arr = [];
                        Arr.push(value.qst_id,stars);
                        starsArr.push(Arr);
                    });
                // })
            });
        });
    }

    function SubmitReview(){
        // $('.starsRating').each(function(e){
        //     // console.log(this.val);
        //     // starsArr.push(value);
        //     // return starsArr;
        // });
        console.log(starsArr);
    }

    $(function(){
        createAnswerField();
        $('#submitReview').on('click', function(e){
            e.preventDefault();
            SubmitReview();
        });
    });
})();