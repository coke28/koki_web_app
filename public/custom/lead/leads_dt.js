"use strict";

var currentRoleFilter = 0;

// Class definition
var KTDatatablesServerSide = (function () {
    // Shared variables
    var table;
    var dt;
    var filterPayment;

    // alert("in ajax");

    // Private functions
    var initDatatable = function () {
        dt = $("#lead_dt").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[4, "desc"]],
            stateSave: false,
            dom: "<'row'<'col-sm-6 mt-0 mb-5'B>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-1 'l><'col-sm-4 mt-2'i><'col-sm-7'p>>",
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            search: {
                input: $("#leadSearch"),
                key: "dtsearch",
            },
            ajax: {
                url: "/list/leadDataTable",
                type: "post",
                beforeSend: function (request) {
                    request.setRequestHeader(
                        "X-CSRF-TOKEN",
                        $('meta[name="csrf-token"]').attr("content")
                    );
                },
                // data: function(d) {
                //   d.roleFilter = $("#lead_dt")currentRoleFilter
                // }
            },
            language:{
                lengthMenu: ' _MENU_'
            },
            columns: [
                { data: "id" },
                { data: "campaignName" },
                // { data: "product" },
                { data: "customerName" },
                { data: "mobileNumber" },

                { data: "campaignID" },
                { data: null },
            ],

            columnDefs: [
                {

                    targets: 5,
                    orderable: false,
                    render: function (data, type, row) {
                        // console.log(data);
                        if (data.done == 0) {

                            return (
                                `
                                <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                    <a href="/list/editLeadStatus?campaignID=`+data.campaignID+`&mobileNumber=`+data.mobileNumber+'&campaignName='+data.campaignName+`" class="menu-link px-3">
                                        Edit Lead
                                    </a>
                                    </div>
                                <!--end::Menu item-->

                                  `
                            );
                        }else{
                            return (
                                  `
                                    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Check.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "/>
                                        </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                  `
                            );

                        }
                    },
                },
            ],
        });

        // function onEdit(campaignID,mobileNumber){
        //     console.log(campaignID);
        //     console.log(mobileNumber);


        // }





        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on("draw", function () {
            KTMenu.createInstances();
        });
    };

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector("#leadSearch");
        filterSearch.addEventListener("keyup", function (e) {
            dt.search(e.target.value).draw();
        });
    };
    var handleSearchDatatable2 = function () {
        const filterSearch = document.querySelector("#statusSelect");
        filterSearch.addEventListener("change", function (e) {
            dt.search(e.target.value).draw();
        });
    };

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
            handleSearchDatatable2();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();


    jQuery(document).off("change", "#leadSearch");
    jQuery(document).on("change", "#leadSearch", function (e) {
        if ($(this).val().length == 0) {
            $("#lead_dt").DataTable().search($("#leadSearch").val()).draw();
        }
    });

    jQuery(document).off("click", ".clearInp");
    jQuery(document).on("click", ".clearInp", function (e) {
        e.preventDefault();
        $(this).closest(".input-group").find("input").val("").trigger("change");
    });
});
