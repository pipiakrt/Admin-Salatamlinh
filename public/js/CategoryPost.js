"use strict";
var KTDatatableDataLocalDemo = {
    init: function () {
        Window.checkboxID = $("#kt_datatable").KTDatatable({
            data: { source: Window.datatables, pageSize: 15 },
            search: {
                input: $("#kt_datatable_search_query"),
            },
            sortable: !0,
            sortable: true,
            columns: [
                {
                    field: "id",
                    title: "#",
                    sortable: !1,
                    width: 20,
                    type: "number",
                    selector: !0,
                    textAlign: "center",
                },
                { field: "name", title: 'Từ khóa' },
                { field: "slug", title: 'Đường dẫn' },
            ],
        });
    },
};
jQuery(document).ready(function () {
    KTDatatableDataLocalDemo.init();
});
