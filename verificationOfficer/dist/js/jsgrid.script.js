(function ($) {
    "use strict";

    $("#jsGrid").jsGrid({
        height: "500px",
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 50,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete the client?",
        controller: db,
        fields: [
            {name: "Document ", type: "image", width: 150},
            {name: "Freeze", type: "checkbox", title: "Freeze", sorting: false},
            {type: "control"}
        ]
    });


    $("#jsGridSorting").jsGrid({
        height: "80%",
        width: "100%",

        autoload: true,
        selecting: false,

        controller: db,

        fields: [
            {name: "Document ", type: "image", width: 150},
            {name: "Freeze", type: "checkbox", title: "Freeze", sorting: false},
            {type: "control"}
        ]
    });


    $("#sort").click(function () {
        var field = $("#sortingField").val();
        $("#jsGridSorting").jsGrid("sort", field);
    });


 $("#jsGridSortpage").jsGrid({
        height: "80%",
        width: "100%",
 
        autoload: true,
        paging: true,
        pageLoading: true,
        pageSize: 50,
        pageIndex: 2,
 
        controller: {
            loadData: function(filter) {
                var startIndex = (filter.pageIndex - 1) * filter.pageSize;
                return {
                    data: db.clients.slice(startIndex, startIndex + filter.pageSize),
                    itemsCount: db.clients.length
                };
            }
        },
 
        fields: [
            {name: "Document", type: "image", width: 150},
            {name: "Freeze", type: "checkbox", title: "Freeze", sorting: false},
            {type: "control"}
        ]
    });
 
 
    $("#pager").on("change", function() {
        var page = parseInt($(this).val(), 10);
        $("#jsGridSortpage").jsGrid("openPage", page);
    });
 


})(jQuery);
