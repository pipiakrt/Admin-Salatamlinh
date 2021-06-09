"use strict";
var KTDefaultDatatableDemo = {
    init: function () {
        var t, a;
        (t = {
            data: { type: "local", source: Window.datataba, pageSize: 100, serverPaging: !0, serverFiltering: !0, serverSorting: !0 },
            layout: { scroll: !0, height: 550, footer: !1 },
            sortable: !0,
            pagination: !0,
            search: { input: $("#kt_datatable_search_query"), key: "generalSearch" },
            columns: [
                {
                    field: "id",
                    title: "#",
                    sortable: !1,
                    type: "number",
                    width: 30,
                    selector: !0,
                    textAlign: "center",
                    template: function (t) {
                        return t.RecordID;
                    },
                },
                { field: "name", title: "name", type: "text" },
                { field: "slug", title: "Order ID" },
                { field: "created_at", title: "Ship Date", type: "date", format: "MM/DD/YYYY" },
                { field: "updated_at", title: "Ship Date", type: "date", format: "MM/DD/YYYY" },
            ],
        })
        (a = $("#kt_datatable").KTDatatable(t))
    }
};
jQuery(document).ready(function () {
    KTDefaultDatatableDemo.init();
});
