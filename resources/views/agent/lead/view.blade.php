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
                <input type="text" id="leadSearch" class="form-control form-control-lg form-control-solid"
                  placeholder="Search">
                <button class="input-group-text clearInp">
                  <i class="fas fa-times fs-4"></i>
                </button>
              </div>
            </div>
            <!--end::Search-->
          </div>
          {{--
        </div> --}}


      </div>


      <!--end::Wrapper-->
      <!--begin::Wrapper-->

      <!--end::Wrapper-->
      <!--begin::Datatable-->
      <table id="lead_dt" class="table table-rounded table-striped border gy-7 gs-7">
        <thead>
          <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
            <th>Campaign Name</th>
            <th>Customer Name</th>
            <th>Mobile</th>
            <th>Campaign ID</th>
            <th>Lead Status</th>
            {{-- <th>Campaign Timestamp</th> --}}

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
  @section('scripts')
  {{--<script type="text/javascript" src="{{ " /".'custom/campaignList/campaign_list_dt.js' }}"></script> --}}
  <script type="text/javascript" src="{{ "/".'custom/agent/lead/lead_dt.js?v='. rvndev()->getRandom(30)}}"></script>
  {{-- <script type="text/javascript" src="{{ "/".'custom/agent/lead/callHistory.js?v='. rvndev()->getRandom(30)}}"></script> --}}
  @endsection
  
    <!--start::Include your styles here-->
  @section('styles') <style>
    .dataTables_wrapper .dataTables_filter {
        display: none;
      }
    </style>
  @endsection
  
  
  
  </x-base-layout>