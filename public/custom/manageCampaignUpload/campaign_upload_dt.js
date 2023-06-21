
  "use strict";

  var currentRoleFilter = 0;

  // Class definition
  var KTDatatablesServerSide = function () {
    // Shared variables
    var table;
    var dt;
    var filterPayment;

    // alert("in ajax");

    // Private functions
    var initDatatable = function () {
        dt = $("#campaign_upload_dt").DataTable({
            searchDelay: 500,
            processing: true,
            serverSide: true,
            order: [[ 7, 'desc' ]],
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
                input: $('#campaignUploadSearch'),
                key: 'dtsearch'
            },
            ajax: {
                url: "/campaignUploadDataTable",
                type: "post",
                beforeSend: function (request) {
                    request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                },
                // data: function(d) {
                //   d.roleFilter = currentRoleFilter
                // }
            },
            language:{
                lengthMenu: ' _MENU_'
            },
            columns: [
                { data: 'id' },
                { data: 'campaignID' },
                { data: 'campaignName' },
                { data: 'campaignUploader' },
                { data: 'leadUserAssignment' },
                { data: 'campaignDateUploaded' },
                { data: 'schedType' },
                { data: 'schedule' },
                { data: null }
            ],
            columnDefs: [
              {
                targets: 8,
                orderable: false,
                render: function(data, type, row) {
                  return `
                            <a href="#" id="delete_campaign_upload" data-id="`+data.id+`" data-campaignID="`+data.campaignID+`" class="btn btn-danger" data-kt-docs-table-filter="delete_row">Delete</a>
                        `;
                }
              }
            ]
        });

        // <!--begin::Menu item-->
        // <div class="menu-item px-3">
        //     <a href="#" class="menu-link px-3" data-kt-docs-table-filter="cpass_row" id="changeuser_password_btn" data-id="`+data.id+`" data-bs-toggle="modal" data-bs-target="#changeUserPasswordModal">
        //         Change Password
        //     </a>
        // </div>
        // <!--end::Menu item-->

        table = dt.$;

        // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
        dt.on('draw', function () {
            KTMenu.createInstances();
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
   var handleSearchDatatable = function () {
       const filterSearch = document.querySelector('#campaignUploadSearch');
       filterSearch.addEventListener('keyup', function (e) {
           dt.search(e.target.value).draw();
       });
   }

    // Public methods
    return {
        init: function () {
            initDatatable();
            handleSearchDatatable();
        }
    }
  }();

  // On document ready
  KTUtil.onDOMContentLoaded(function () {
    KTDatatablesServerSide.init();

    jQuery(document).off('change', '#campaignUploadSearch');
    jQuery(document).on('change', '#campaignUploadSearch', function(e) {
      if($(this).val().length == 0){
        $("#campaign_upload_dt").DataTable().search($('#campaignUploadSearch').val()).draw();
      }
    });

    jQuery(document).off('click', '.clearInp');
    jQuery(document).on('click', '.clearInp', function(e) {
      e.preventDefault();
      $(this).closest('.input-group').find('input').val('').trigger('change');
    });
  });
