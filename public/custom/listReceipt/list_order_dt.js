
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
      dt = $("#order_dt").DataTable({
          searchDelay: 500,
          processing: true,
          serverSide: true,
          order: [[ 6, 'desc' ]],
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
              input: $('#orderSearch'),
              key: 'dtsearch'
          },
          ajax: {
              url: "/list/orderDataTable",
              type: "post",
              beforeSend: function (request) {
                  request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
              },
              data: function(d) {
                  const queryString = window.location.search;
                  const urlParams = new URLSearchParams(queryString);
                 
                  // d.action = "ADDED NEW ENTRY";
                  if(urlParams.has('id')){
                    d.id = urlParams.get('id');
                  }
                //   if(urlParams.has('harvest_name')){
                //     d.harvest_name = urlParams.get('harvest_name');
                //   }
                }
          },
          language:{
              lengthMenu: ' _MENU_'
          },
          columns: [
              { data: 'id' },
              { data: 'batch_id' },
              { data: 'quantity_to_remove' },
              { data: 'quantity_batch' },
              { data: 'quantity_left' },
              { data: 'building_name' },
              { data: 'product_name' },
              
          ],
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
     const filterSearch = document.querySelector('#orderSearch');
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

  jQuery(document).off('change', '#orderSearch');
  jQuery(document).on('change', '#orderSearch', function(e) {
    if($(this).val().length == 0){
      $("#order_dt").DataTable().search($('#orderSearch').val()).draw();
    }
  });

  jQuery(document).off('click', '.clearInp');
  jQuery(document).on('click', '.clearInp', function(e) {
    e.preventDefault();
    $(this).closest('.input-group').find('input').val('').trigger('change');
  });
});



