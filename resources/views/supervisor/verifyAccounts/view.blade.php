<x-base-layout>
    <div class="card card-custom">
      <div class="card-body">
  
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack mb-5">
          {{-- <div class="col-4"> --}}
            <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0 w-50 p-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="bi bi-bookmarks-fill fs-4"></i></span>
                <div class="overflow-hidden flex-grow-1">
                  <select id="statusSelect" class="form-select rounded-start-0" data-control="select"
                    data-placeholder="Select an option">
                    <option value="">Please Select A Campaign</option>
                    @foreach ($campaignUploads as $campaignUpload)
                    <option value="{{ $campaignUpload->campaignID }}">{{ $campaignUpload->campaignID }}</option>
                    @endforeach
  
  
  
                  </select>
                </div>
              </div>
            </div>
  
            {{--
          </div> --}}
          {{-- <div class="col-2">
          </div> --}}
          {{-- <div class="col-6"> --}}
            <div class="d-flex justify-content-end">
              <!--begin::Search-->
              <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0 ">
                <div class="input-group input-group-solid">
                  <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                  <input type="text" id="verifyAccountSearch" class="form-control form-control-lg form-control-solid"
                    placeholder="Search">
                  <button class="input-group-text clearInp">
                    <i class="fas fa-times fs-4"></i>
                  </button>
                </div>
              </div>
              <!--end::Search-->
            </div>
  
            @if($errors->any())
            <!--begin::Alert-->
            <div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mb-10">
              <!--begin::Icon-->
              <span class="svg-icon svg-icon-2hx svg-icon-primary me-4 mb-5 mb-sm-0"></span>
              <!--end::Icon-->
    
              <!--begin::Wrapper-->
              <div class="d-flex flex-column pe-0 pe-sm-10">
                  <!--begin::Title-->
                  <h4 class="fw-semibold">Error</h4>
                  <!--end::Title-->
                  <!--begin::Content-->
                  <span>{{$errors->first()}}</span>
                  <!--end::Content-->
              </div>
              <!--end::Wrapper-->
    
              <!--begin::Close-->
              <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                  <span class="svg-icon svg-icon-1 svg-icon-primary"></span>
              </button>
              <!--end::Close-->
            </div>
            <!--end::Alert-->
            @endif
            {{--
          </div> --}}
  
  
        </div>
   
       
        <!--end::Wrapper-->
        <!--begin::Datatable-->
        <table id="verify_account_dt" class="table table-rounded table-striped border gy-7 gs-7">
          <thead>
            <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
              <th>ID</th>
              <th>Campaign Name</th>
              <th>Agent Name</th>
              <th>Customer Name</th>
              <th>Mobile Number</th>
              <th>Campaign ID</th>
              <th>Account Status</th>
              <th>Tools</th>
            </tr>
          </thead>
          <tbody class="text-black-600 fw-bold">
          </tbody>
        </table>
        <!--end::Datatable-->
      </div>
    </div>
  
 
  
    <!--start::Include your scripts here-->
    @section('scripts')

    <script type="text/javascript" src="{{ "/".'custom/verifyAccount/verify_account_dt.js?v=' . rvndev()->getRandom(30)}}"></script>
   
  
  
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