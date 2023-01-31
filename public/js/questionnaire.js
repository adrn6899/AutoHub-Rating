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

    var search_type_filter = [];
    var questionnaireList = null;
    var id = null;
    var url = null;

    function getDataTableData(){
        var data    =   {};

        return data;
    }

    function initActionUpdate(){
      $("[data-action-update]").each(function () {
        $(this).on("click", function () {
          var row = $(this).closest("tr");
          var sys_id;
          id = questionnaireList.row(row).data().tmp_id;
          sys_id = questionnaireList.row(row).data().sys_id;

          window.location.href = "questionnaires/edit/" + id + "/" + sys_id;
          // console.log(sys_id);
        });
      });
    }

    function initActionRemove(){
      $("[data-action-remove]").each(function () {
        $(this).on("click", function () {
          var row = $(this).closest("tr");
          var sys_id;
          id = questionnaireList.row(row).data().tmp_id;
          sys_id = questionnaireList.row(row).data().sys_id;

          var formData = new FormData();
          formData.append('tmp_id',id);
          formData.append('sys_id',sys_id);

          $.ajax({
            type: "POST",
            url: "/questionnaires/destroy",
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(success){
              toastRWithTime(success.message,"success");
              questionnaireList.draw(false);
            },
            error: function(error){
              console.log(error);
              // toastRWithTime(error)
            }
          });
          // window.location.href = "questionnaires/destroy/" + id + "/" + sys_id;
          // console.log(sys_id);
        });
      });
    }

    function initList(){
        $('.txt_search').on("keyup",delay(function(e){
            questionnaireList.search($('.txt_search').val()).draw()
        },500));

        const search_type_default = "Title";
        const search_types = ["ID", "Title"];

        $.each(search_types, function (i, n) {
            $(".system-search-type").append(
              `<li class="dropdown-item cursor-pointer py-0"><span class="text-sm">` +
                n +
                `</span></li>`
            );
        });

        $(".system-search-type li").each(function () {
            if ($(this).text() == search_type_default) {
              $(this).removeClass("active").addClass("active");
              var active_items_arr = [];
              active_items_arr.push(search_type_default);
              search_type_filter = JSON.stringify(active_items_arr);
            }
      
            $(this).on("click", function () {
              //remove all selected menu
              $(".system-search-type")
                .find("li.active")
                .map(function () {
                  $(this).removeClass("active");
                });
      
              $(this).toggleClass("active");
      
              var active_items = $(".system-search-type")
                .find("li.active")
                .map(function () {
                  var item = {};
                  // item.id = this.value;
                  item.status = $(this).text();
                  return item;
                });
      
              var active_items_arr = [];
              $.each(active_items, function (i, n) {
                active_items_arr.push(n.status);
              });
      
              search_type_filter = JSON.stringify(active_items_arr);
              //  refreshOrcrPlateTable();
              //  if ($('#txt_search').val() != '') {
                questionnaireList.draw(false);
              //  }
            });
          });
        
        var cols = [
            {
                title: "ID",
                data: 'tmp_id',
                className: 'align-middle p-1 dt-left',
                orderable: true,
                width: "5%",
                // visible: false
            },
            // {
            //   title: "ID",
            //   data: 'count',
            //   className: 'align-middle p-1 dt-left',
            //   orderable: true,
            //   width: "5%",
              
            // },
            {
                title: "Title",
                data: 'title',
                className: 'align-middle p-1 dt-left',
                orderable: true,
                width: "40%",
            },
            {
              title: "System",
              data: 'sys_id',
              className: 'align-middle p-1 dt-left',
              orderable: true,
              width: "40%",
              visible: false
            },
            {
                title: "System",
                data: 'system',
                className: 'align-middle p-1 dt-left',
                orderable: true,
                width: "40%",
            },
            {
                title: "Action",
                data: null,
                orderable: false,
                width: "20%",
                className: "align-middle p-1 dt-center",
                render: function (data, type, row, meta) {
                  return `
                           <div class="row justify-content-center">
                                   <a data-action-update style="cursor:pointer; width: fit-content;" class="m-1 btn btn-sm btn-primary btn-icon" title="Edit">Edit</a> 
                                   <a data-action-remove style="cursor:pointer; width: fit-content;" class="m-1 btn btn-sm btn-danger btn-icon" title="Remove">Remove</a>
                           </div>
                           `;
                },
            },
            
        ];
        questionnaireList = $('#questionnaireTable').DataTable({
            fnDrawCallback: function () {
                initActionRemove();
                initActionUpdate();
            },
            order: [[0, "asc"]],
            retrieve: true,
            columns: cols,
            paging: true,
            lengthChange: false,
            searching: true,
            pageLength: 5,
            info: true,
            autoWidth: true,
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: true,
            columnDefs: [
              { width: '20%', targets: 0 }
            ],
            fixedColumns: true,
            ajax: {
                url:'questionnaires/fetchall',
                data: function (d){
                    return $.extend({},d,{
                        search_type: search_type_filter,
                        data: getDataTableData(),
                    })
                }
            },
            sDom: "lrtip",
        });
    }

    $(function(){

        initList();

        $('#create_questionnaire').on('click', function(e){
          window.location.href = "questionnaires/create";
        });

    });
})();
