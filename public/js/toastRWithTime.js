
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

