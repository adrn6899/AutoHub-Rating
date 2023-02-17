(function(e){
    "use strict";

    $(function(){
        $('#login-btn').on('click', function(){
            var formData = new FormData();

            formData.append('email',$('#user_name_login').val());
            formData.append('password',$('#user_name_password').val());

            $.ajax({
                type:"POST",
                url:"/login",
                dataType: 'json',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(e){
                    window.location.href = '/dashboard';
                },
                error: function(error){
                    toastRWithTime("Wrong username or password","error");
                }
            });
        });
    });
})();