(function(e){
    "use strict";

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

    $(function(){
        $('.register_user').submit(function(e){
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
                    window.location.href = "/";
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