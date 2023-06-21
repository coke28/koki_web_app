<x-base-layout>
    <div class="card card-custom">
        <div class="card-body">

            


            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-5">
                <div class="d-flex justify-content-end">
                    <!--begin::Add special announcement-->
                    {{-- <a href="" id="exitCallHistory" class="btn btn-danger">
                        <span class="svg-icon svg-icon-2"><i class="bi bi-caret-left fs-2"></i></span>
                        Exit
                    </a> --}}
                    <!--end::Add special announcement-->
                    <div  class="card card-custom p-0" style="width: 300px;">
                        <div class="card-body pb-5 pt-0 " style="padding-left: 0; padding-right: 0;">
                            <div class="row">
                                <div class="col-1">
                                    <hr style="width: 10px; height: 42px; background-color: #000; position: absolute; margin-top: 0; margin-bottom: 0;">
                                    </div>
                                <div class="col-11 pl-0">
                                    <h4 >Mobile Number : <span style="font-weight: 100">{{$mobileNumber}}</span></h4>
                                    <h4>Campaign ID &nbsp;&nbsp;&nbsp;&nbsp;: <span style="font-weight: 100">{{$campaignID}}</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <h2> {{"Mobile Number :". $mobileNumber ." Campaign ID :" .$campaignID}}</h2> --}}
                
               
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0 ">
                        <div class="input-group input-group-solid">
                            <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" id="callHistorySearch"
                                class="form-control form-control-lg form-control-solid" placeholder="Search">
                            <button class="input-group-text clearInp">
                                <i class="fas fa-times fs-4"></i>
                            </button>
                        </div>
                    </div>
                    <!--end::Search-->
                </div>

            </div>


            <!--end::Wrapper-->
            <!--begin::Wrapper-->

            <!--end::Wrapper-->
            <!--begin::Datatable-->
            <table id="koki" class="table table-rounded table-striped border gy-7 gs-7">
                <thead>
                    <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                        <th>Action</th>
                        <th>Agent Number</th>
                        <th>Full Name</th>
                        <th>Date</th>
                        <th>Mobile Number</th>
                        <th>Campaign Status</th>
                        <th>Campaign ID</th>
                        <th>IP Address</th>
                        <th>Duration(in seconds)</th>
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

    <script type="text/javascript" src="{{ "/".'custom/agent/lead/callHistory.js?v='. rvndev()->getRandom(30)}}"></script>
    <script type="text/javascript" src="{{ "/".'custom/agent/lead/exitCallHistory.js?v='. rvndev()->getRandom(30)}}"></script>
    @endsection
    
      <!--start::Include your styles here-->
    @section('styles') <style>
        .dataTables_wrapper .dataTables_filter {
          display: none;
        }
      </style>
    @endsection
    
    
    
    </x-base-layout>