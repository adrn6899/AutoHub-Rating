(function(e){
    "use strict";

    $(function(){
        $('#login-btn').on('click', function(e){
            e.preventDefault();

            var formData = new FormData();

            formData.append('id',$('#user_name_login').val());

            $.ajax({
                type: "POST",
                url: "/employeeLogin",
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(success){
                    window.location.href = success;
                },
                error: function(error){
                //   console.log(error);
                  // toastRWithTime(error)
                }
            });
        });
    });
})();