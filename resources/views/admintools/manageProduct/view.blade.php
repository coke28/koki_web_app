<x-base-layout>
  {{-- <h1>Manage Product</h1> --}}
    <div class="card card-custom">
      <div class="card-body">
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack mb-5">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                <div class="input-group input-group-solid">
                    <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" id="product_search" class="form-control form-control-lg form-control-solid" placeholder="Search">
                    <button class="input-group-text clearInp">
                        <i class="fas fa-times fs-4"></i>
                    </button>
                </div>
            </div>
            <!--end::Search-->
  
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                <!--begin::Add special announcement-->
                <button type="button" class="btn btn-primary" title="Add product" data-bs-toggle="modal" data-bs-target="#add_product_modal">
                    <span class="svg-icon svg-icon-2"><i class="bi bi-plus fs-2"></i></span>
                    Add Product
                </button>
                <!--end::Add special announcement-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Datatable-->
        <table id="product_dt" class="table table-rounded table-striped border gy-7 gs-7">
            <thead>
              <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                  <th>ID</th>
                  <th>Product Name</th>
                  <th>Product Code</th>
                  <th>Product Description</th>
                  
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
    @include('admintools/manageProduct/modals/addProduct')
    @include('admintools/manageProduct/modals/editProduct')
   
  
    <!--start::Include your scripts here-->
    @section('scripts')
        {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
        <script type="text/javascript" src="{{ "/".'custom/manageProduct/product_dt.js?v=' . rvndev()->getRandom(30)}}"></script>
        <script type="text/javascript" src="{{ "/".'custom/manageProduct/add_product.js?v='. rvndev()->getRandom(30) }}"></script>
        <script type="text/javascript" src="{{ "/".'custom/manageProduct/edit_product.js?v='. rvndev()->getRandom(30) }}"></script>
        <script type="text/javascript" src="{{ "/".'custom/manageProduct/delete_product.js?v='. rvndev()->getRandom(30) }}"></script>
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
  