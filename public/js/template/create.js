(function(e){
    "use strict";

    var questionArr = [];
    var id = null;
    var url = null;

    function submitTemplate(){
        $('#template_save').on('click', function(e){
            e.preventDefault();
            questionArr = [];
            $(this).attr('disabled',true);
            $('input[type="checkbox"]:checked').each(function(){
                questionArr.push(this.value);
            }); //push the question id's into an array

            var id = $('[name="edit_id"]').val();
            var formData = new FormData();
            url = "/templates/store";
            if(id){            
              formData.append('id',id);
              url = "templates/update";
            }

            formData.append('title',$('#template_name').val());
            formData.append('questionArr',questionArr);

            $.ajax({
                type: "POST",
                  url: url,
                  dataType: 'json',
                  data: formData,
                  processData: false,
                  contentType: false,
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function(result){
                    $('#templateModal').modal('hide');
                    toastRWithTime("success","success");
                  },
                  error: function(error){
    
                  }
              });
        });
    }

    $(function(){
        submitTemplate();

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
        $('#select_all').on('click', function(e){
          e.preventDefault();
          $('input[type="checkbox"]').each(function(){
            this.checked = true;
          });
          toastRWithTime("Selected all","info");
        });
    });
})();