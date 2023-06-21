<x-base-layout>
      {{-- <div class="card card-custom"> --}}
        <div class="card-body">
          <!--begin::Wrapper-->
          <div class="d-flex justify-content-end mb-5" style="position: relative; z-index:10;">
              <!--begin::Search-->
              <div class="d-flex align-items-center position-absolute my-1 mb-md-0">
                  <div class="input-group input-group-solid">
                      <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                      <input type="text" id="auditLogSearch" class="form-control form-control-lg form-control-solid" placeholder="Search">
                      <button class="input-group-text clearInp">
                          <i class="fas fa-times fs-4"></i>
                      </button>
                  </div>
              </div>
              <!--end::Search-->
    
              <!--begin::Toolbar-->
              <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                  <!--begin::Add special announcement-->
                
                  <!--end::Add special announcement-->
              </div>
              <!--end::Toolbar-->
          </div>
          <!--end::Wrapper-->
          <!--begin::Datatable-->
          <table id="audit_log_dt" class="table">
              <thead>
                <tr class="fw-semibold fs-6 text-black-800 align-items-center">
                    <th>ID</th>
                    <th>User</th>
                    <th>Action</th>
                    <th>Table</th>
                    <th>Inserted/Updated</th>
                    <th>IP Address</th>
                    <th>Datetime</th>
                    <th>Tools</th>
                </tr>
              </thead>
              <tbody class="text-black-600 fw-bold">
              </tbody>
          </table>
          <!--end::Datatable-->
        </div>
      {{-- </div> --}}
    
      <!--start::Include your modals here-->
  
    
      <!--start::Include your scripts here-->
      @section('scripts')
      <script type="text/javascript" src="{{"/".'custom/auditLog/audit_log_dt.js?v=' . rvndev()->getRandom(30)}}"></script>
      <script type="text/javascript" src="{{"/".'custom/auditLog/deleteAuditLogValidation.js?v=' . rvndev()->getRandom(30)}}"></script>
 
       
      @endsection 
    
      <!--start::Include your styles here-->
      @section('styles')
      <style>
      .dataTables_wrapper .dataTables_filter {
        display: none;
      }
      </style>
      @endsection
    
   
    
  </x-base-layout>
    