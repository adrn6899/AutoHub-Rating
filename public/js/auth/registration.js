(function(e){
    "use strict";

    $(function(){
        $('#cancel-btn').on('click', function(e){
            window.location.href = "/";
        });
        $('.register_user').submit(function(e){
            e.preventDefault();
            e.preventDefault();
            var formData = new FormData(this);

            // formData.append('name',$('#register_name').val());
            // formData.append('email',$('#register_email').val());
            // formData.append('password',$('#register_password').val());
            // formData.append('confirm_password',$('#register_confirm_password').val());

            $.ajax({
                type:"POST",
                url:"/register",
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e){
                    window.location.href = '/dashboard';
                    // alert(e);
                },
                error: function(error){
                    console.log(error);
                    $.each(error.responseJSON.message, function(key,value){
                        toastRWithTime(value,"error");
                    });
                }
            });
        });
    });
})();