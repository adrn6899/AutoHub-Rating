(function(e){
    "use strict";

    var search_type_filter = [];
    var questionnaireList = null;
    var id = null;
    var url = null;
    var questionArr = [];
    var stringVal;

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

    function submitForm(){
      $('.template-create').submit(function(e){
        e.preventDefault();
        $('input[type="checkbox"]:checked').each(function(){
            questionArr.push(this.value);
        });
        // console.log(questionArr);
        var formData = new FormData();
        formData.append('questionArr',questionArr);
        formData.append('t_id',$('#template_name').val());
        formData.append('s_id',$('#system_name').val());
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
    });
})();
