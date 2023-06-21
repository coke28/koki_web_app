<x-base-layout>
  {{-- <h1>Manage Category</h1> --}}
    <div class="card card-custom">
      <div class="card-body">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack mb-5">
            
  
            <!--begin::Toolbar-->
            <div class="justify-content-end" data-kt-docs-table-toolbar="base">
                <!--begin::Add special announcement-->
                <button type="button" class="btn btn-primary" title="Add category" data-bs-toggle="modal" data-bs-target="#addCategory">
                    <span class="svg-icon svg-icon-2"><i class="bi bi-plus fs-2"></i></span>
                    Add Category
                </button>
                <!--end::Add special announcement-->
            </div>

            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
              <div class="input-group input-group-solid">
                  <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                  <input type="text" id="categorySearch" class="form-control form-control-lg form-control-solid" placeholder="Search">
                  <button class="input-group-text clearInp">
                      <i class="fas fa-times fs-4"></i>
                  </button>
              </div>
          </div>
          <!--end::Search-->
            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Datatable-->
        <table id="category_dt" class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
              <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                  <th>ID</th>
                  <th>Category</th>
                  <th>Main Category</th>
                  <th>Status</th>
                  <th>Tools</th>
              </tr>
            </thead>
            <tbody class="text-black-600 fw-bold">
            </tbody>
        </table>
        <!--end::Datatable-->
      </div>
    </div>
  
    <!--start::Include your modals here-->
    @include('admintools/manageCategory/modals/addCategory')
    @include('admintools/manageCategory/modals/editCategory')
 
  
    <!--start::Include your scripts here-->
    {{-- <script type="text/javascript" src="{{ srcasset('custom/managespecannouncement/scripts/announcementdt.js').'?v='.rvndev()->getrandomstring(30) }}"></script> --}}
    @section('scripts')
      {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
      <script type="text/javascript" src="{{ "/".'custom/manageCategory/category_dt.js?v=' . rvndev()->getRandom(30)}}"></script>
      <script type="text/javascript" src="{{ "/".'custom/manageCategory/addCategoryValidation.js?v=' . rvndev()->getRandom(30)}}"></script>
      <script type="text/javascript" src="{{ "/".'custom/manageCategory/editCategoryValidation.js?v=' . rvndev()->getRandom(30)}}"></script>
      <script type="text/javascript" src="{{ "/".'custom/manageCategory/deleteCategoryValidation.js?v=' . rvndev()->getRandom(30)}}"></script>
      {{-- <script type="text/javascript" src="{{ "/".'custom/manageUser/user_dt.js?v='. rvndev()->getRandom(30) }}"></script>
      <script type="text/javascript" src="{{ "/".'custom/manageUser/editUserValidation.js?v='. rvndev()->getRandom(30) }}"></script>
      <script type="text/javascript" src="{{ "/".'custom/manageUser/deleteUserValidation.js?v='. rvndev()->getRandom(30) }}"></script> --}}
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
  