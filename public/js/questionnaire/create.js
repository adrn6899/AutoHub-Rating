(function(e){
    "use strict";

    var search_type_filter = [];
    var questionnaireList = null;
    var id = null;
    var url = null;
    var questionArr = [];
    var stringVal;

    function submitForm(){
      $('.template-create').submit(function(e){
        e.preventDefault();
        $('input[type="checkbox"]:checked').each(function(){
            questionArr.push(this.value);
        });
        console.log(questionArr);
        var formData = new FormData();
        formData.append('questionArr',questionArr);
        formData.append('template',$('#template_name').val());
        $.ajax({
            type: "POST",
              url: "/questionnaires/store",
              dataType: 'json',
              data: formData,
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
      });
    }

    $(function(){

        submitForm();

        $('#template_name').select2({
            theme: 'classic',
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
        $('input[type="checkbox"]').change(function(){
            questionArr = [];
            console.log("popping");
        });
    });
})();
