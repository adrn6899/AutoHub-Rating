(function(e){
    "use strict";

    var questionArr = [];
    var url = "";

    function submitTemplate(){
        $('#template_save').on('click', function(e){
            e.preventDefault();
            questionArr = [];
            $(this).attr('disabled',true);
            $('input[type="checkbox"]:checked').each(function(){
                questionArr.push(this.value);
            }); //push the question id's into an array

            var formData = new FormData();

            formData.append('id',template.id);
            url = "/templates/update";    

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
                    toastRWithTime("success","success");
                    location.replace('/templates');
                  },
                  error: function(error){
    
                  }
              });
        });
    }

    $(function(){
        var qs = template.q_id;
        $('#template_name').val(template.title);
        questions.forEach(function(item){
            if(qs.includes(item.id.toString())){
                $('.questions-list').append(`<input class="form-check-input mt-1" type="checkbox" id="`+item.title+`" value="`+item.id+`" checked="">\n<label class="form-check-label" for="`+item.title+`" style="font-size: 1rem">`+item.title+`</label></br>`);
            } else {
                $('.questions-list').append(`<input class="form-check-input mt-1" type="checkbox" id="`+item.title+`" value="`+item.id+`">\n<label class="form-check-label" for="`+item.title+`" style="font-size: 1rem">`+item.title+`</label></br>`);
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
        $('#select_all').on('click', function(e){
            e.preventDefault();
            $('input[type="checkbox"]').each(function(){
              this.checked = true;
            });
            toastRWithTime("Selected all","info");
        });

        submitTemplate();

    });
})();