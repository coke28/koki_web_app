<x-base-layout>
    {{-- <h1>Manage Promo Name</h1> --}}
    <div class="card card-custom">
      <div class="card-body">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack mb-5">
          <!--begin::Search-->
          <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
            <div class="input-group input-group-solid">
              <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
              <input type="text" id="placeOfContactSearch" class="form-control form-control-lg form-control-solid"
                placeholder="Search">
              <button class="input-group-text clearInp">
                <i class="fas fa-times fs-4"></i>
              </button>
            </div>
          </div>
          <!--end::Search-->
  
          <!--begin::Toolbar-->
          <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
            <!--begin::Add special announcement-->
            <button type="button" class="btn btn-primary" title="Add PlaceOfContact" data-bs-toggle="modal"
              data-bs-target="#addPlaceOfContact">
              <span class="svg-icon svg-icon-2"><i class="bi bi-plus fs-2"></i></span>
              Add Place Of Contact
            </button>
            <!--end::Add special announcement-->
          </div>
          <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Datatable-->
        <table id="place_of_contact_dt" class="table table-rounded table-striped border gy-7 gs-7">
          <thead>
            <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
  
              <th>ID</th>
              <th>Place Of Contact</th>
              <th>Description</th>
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
    @include('admintools/managePlaceOfContact/modals/addPlaceOfContact')
    @include('admintools/managePlaceOfContact/modals/editPlaceOfContact')
  
  
    <!--start::Include your scripts here-->
    @section('scripts')
  
        <script type="text/javascript" src="{{"/".'custom/managePlaceOfContact/place_of_contact_dt.js?v=' . rvndev()->getRandom(30)}}"></script>
        <script type="text/javascript" src="{{"/".'custom/managePlaceOfContact/editPlaceOfContactValidation.js?v=' . rvndev()->getRandom(30)}}"></script>
        <script type="text/javascript" src="{{"/".'custom/managePlaceOfContact/addPlaceOfContactValidation.js?v=' . rvndev()->getRandom(30)}}"></script>
        <script type="text/javascript" src="{{"/".'custom/managePlaceOfContact/deletePlaceOfContactValidation.js?v=' . rvndev()->getRandom(30)}}"></script> 
        @endsection  
      
        <!--start::Include your styles here-->
        @section('styles') <style>
      .dataTables_wrapper .dataTables_filter {
          display: none;
        }
        </style>
        @endsection
      
     
      
    </x-base-layout>