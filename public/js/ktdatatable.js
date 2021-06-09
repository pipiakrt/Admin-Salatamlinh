"use strict";
var KTDatatableDataLocalDemo = {
    init: function () {
        Window.checkboxID = $("#kt_datatable").KTDatatable({
            data: { source: Window.datatables },
            search: {
                input: $("#kt_datatable_search_query"),
            },
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
                { field: "name", title: 'Tên Danh Mục' },
                { field: "slug", title: 'Đường Dẫn' },
                { field: "created_at", title: 'Ngày Tạo' },
                { field: "updated_at", title: 'Ngày Cập Nhật' },
            ],
        });
    },
};
jQuery(document).ready(function () {
    KTDatatableDataLocalDemo.init();
});
