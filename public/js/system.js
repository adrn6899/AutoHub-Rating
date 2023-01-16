    (function(e){
        "use strict";
        function initList(){
            var cols = [
                {
                    title: "ID",
                    data: 'id',
                    className: '',
                    orderable: true,
                    width: "5%",
                },
                {
                    title: "Name",
                    data: 'name',
                    className: '',
                    orderable: true,
                    width: "40%",
                },
                {
                    title: "Action",
                    data: null,
                    orderable: false,
                    width: "20%",
                    // className: "align-middle p-1 dt-center",
                    render: function (data, type, row, meta) {
                      return `
                               <div class="row justify-content-center">
                                       <a data-action-update style="cursor:pointer; width: fit-content;" class="m-1 btn btn-md btn-primary btn-icon" title="Edit">Edit</a> 
                                       <a data-action-remove style="cursor:pointer; width: fit-content;" class="m-1 btn btn-md btn-danger btn-icon" title="Remove">Remove</a>
                               </div>
                               `;
                    },
                },
                
            ];
            $('#systemsTable').DataTable({
                order: [[0, "asc"]],
                retrieve: true,
                columns: cols,
                paging: true,
                lengthChange: false,
                searching: true,
                pageLength: 10,
                info: true,
                autoWidth: true,
                responsive: true,
                processing: true,
                fixedColumns: true,
                serverSide: true,
                ajax: {
                    url:'/systems/fetchall',
                    // data: function (d){
                    //     return $.extend({},d,{
                            
                    //     })
                    // }
                },
                sDom: "lrtip",
            });
        }
        $(function(){
            initList();
        });
    })();
