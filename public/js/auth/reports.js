(function(e){
    "use strict";


    $(function(){
        $('#qst_masterfile').load('css/datatables.bootstrap5.min.css')
        $('#reports_display').attr('src','/blank');
        $('#js_tree').jstree();
        $('#js_tree').on("changed.jstree", function (e, data) {
            // console.log(data.node.li_attr.value);
            $('#reports_display').attr('src',data.node.li_attr.value);
        });
        
    });
})();