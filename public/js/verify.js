(function(e){
    "use strict";

    function createAnswerField(){
        console.log(questions);
        $.each(questions, function(key,value){
            $('.answers-card', function(){
                $('.card-body').append('<label style="font-size:1.5rem;">'+value+'</label></br><div class="rating-'+key+'" style=""></div>');
                $('.rating-'+key+'').starRating(
                    {
                        starSize: 1.5,
                        showInfo: false,
                        hoverColor: 'salmon',
                    });
            });

        });
    }

    $(function(){
        createAnswerField();
        
    });
})();