<x-base-layout>
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active fw-bolder text-primary" data-bs-toggle="tab" href="#kt_tab_pane_1">Batch
                        Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-danger" data-bs-toggle="tab" id="exit_batch_view" href="#kt_tab_pane_2">Back</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <div class="d-flex justify-content-end">
                            <!--begin::Add special announcement-->

                            <!--end::Add special announcement-->
                            <div class="card card-custom p-0" style="width: 300px;">
                                <div class="card-body pb-5 pt-0 " style="padding-left: 0; padding-right: 0;">
                                    <div class="row">
                                        <div class="col-1">
                                            <hr
                                                style="width: 10px; height: 42px; background-color: #000; position: absolute; margin-top: 0; margin-bottom: 0;">
                                        </div>
                                        <div class="col-11 pl-0">
                                            <h4>Harvest ID : <span style="font-weight: 100">{{$harvest_id}}</span></h4>
                                            <h4>Harvest Name : <span style="font-weight: 100">{{$harvest_name}}</span>
                                            </h4>
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
                                    <span class="svg-icon svg-icon-1 input-group-text"><i
                                            class="bi bi-search"></i></span>
                                    <input type="text" id="batchSearch"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="Search Batch">
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
                    <table id="batch_dt" class="table table-rounded table-striped border gy-7 gs-7">
                        <thead>
                            <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                                <th>Batch ID</th>
                                <th>Harvest Date</th>
                                <th>Building</th>
                                <th>Product</th>
                                <th>Added Stock</th>
                                <th>Current Stock</th>
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
            @include('reports_and_lists/harvest/modals/editBatch')
            {{-- @include('reports_and_lists/harvest/modals/generateBatchQRCode') --}}
            @section('scripts')

            <script type="text/javascript" src="{{ "/".'custom/listHarvest/list_batch_dt.js?v='. rvndev()->getRandom(30) }}"></script>
            <script type="text/javascript" src="{{ "/".'custom/listHarvest/edit_batch.js?v='. rvndev()->getRandom(30) }}"></script>
            <script type="text/javascript" src="{{ "/".'custom/listHarvest/delete_batch.js?v='. rvndev()->getRandom(30) }}"></script>
            <script type="text/javascript" src="{{ "/".'custom/listHarvest/exit_batch.js?v='. rvndev()->getRandom(30) }}"></script>
            <script type="text/javascript" src="{{ "/".'custom/listHarvest/generate_qr_code.js?v='. rvndev()->getRandom(30) }}"></script>
            @endsection
            
            <!--start::Include your styles here-->
            @section('styles') <style>
                .dataTables_wrapper .dataTables_filter {
                display: none;
                }
            </style>
            @endsection
    
        </div>
    </div>

    @if ($batch_id)
    <div class="card card-custom">
        <div class="card-body">
            <div class="modal-header">
                <h5 class="modal-title">
                  <i class="bi bi-plus"></i>
                  Generated Batch QR Code For Batch # {{ $batch_id  }}
                </h5>
              
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="row mb-6">
                    {!! QrCode::size(300)->generate($batch_id) !!}
                </div>
            </div>
            <div class="modal-footer">
                  {{-- <button type="submit" id="generateQrCodeBtn" class="btn btn-primary font-weight-bold">Download QR Code</button> --}}
                  <a href="{{ route('generate.qr', ['batch_id' => $batch_id,]) }}" class="btn btn-primary font-weight-bold">Download</a>
            </div>
        </div>
    </div>    
    @endif
</x-base-layout>