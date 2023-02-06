(function(e){

  "use strict";

    var search_type_filter = [];
    var questionnaireList = null;
    var id = null;
    var url = null;
    var questionArr = [];
    var stringVal;

    function submitForm(){
      $('#submitForm').on('click',function(e){
        e.preventDefault();
        questionArr = [];
        $(this).attr('disabled',true);
        $('input[type="checkbox"]:checked').each(function(){
            questionArr.push(this.value);
        });
        var t_id = $('#template_name').val();
        var sys_id = $('#system_name').val();

        var formData = new FormData();
        formData.append('questionArr',questionArr);
        formData.append('t_id',t_id);
        formData.append('s_id',sys_id);
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
                toastRWithTime(result.message,"success");
                window.location.href="/questionnaires";
              },
              error: function(error){
                toastRWithTime(error.responseJSON['message'],'error');
              }
          });
      });
    }

    $(function(){

        submitForm();

        $('#template_name').select2({
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

        $('#system_name').select2({
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
                url:"/systems/select2",
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
        });
        $('#clear_selection').on('click', function(e){
          e.preventDefault();
          $('input[type="checkbox"]').each(function(){
            this.checked = false;
          });
          toastRWithTime("Selection Cleared","info");
        });
    });
})();
