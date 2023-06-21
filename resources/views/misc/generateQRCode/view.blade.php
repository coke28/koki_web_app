<x-base-layout>
    
    <div class="card card-custom">
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Search-->
                {{-- <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                    <div class="input-group input-group-solid">
                        <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" id="applicationTypeSearch"
                            class="form-control form-control-lg form-control-solid" placeholder="Search">
                        <button class="input-group-text clearInp">
                            <i class="fas fa-times fs-4"></i>
                        </button>
                    </div>
                </div> --}}
                <!--end::Search-->

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <!--begin::Add special announcement-->
                    {{-- <button type="button" class="btn btn-primary" title="Add application type"
                        data-bs-toggle="modal" data-bs-target="#addApplicationType">
                        <span class="svg-icon svg-icon-2"><i class="bi bi-plus fs-2"></i></span>
                        Add Application Type
                    </button> --}}
                    <!--end::Add special announcement-->
                </div>
                <!--end::Toolbar-->
            </div>

            <form class="form" id="generate_qr_code_form">
                <div class="row mb-12">
                    <div class="col-lg-6">
                        <label for="campaignID" class="col-form-label fw-bold fs-6">Building #</label>
                        <select class="form-select form-select-sm form-select-solid"
                        name="building">
                            <option value="Distributed to User Base on Lead Count">Distributed to User Base
                                on Lead Count</option>
                            <option value="Same as Product">Same as Product</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="leadsUserAssignment" class="col-form-label fw-bold fs-6">Leads User
                        Assignment</label>
                        <div class="col-lg-12 fv-row" id="leadsUserAssignment">
                            <select class="form-select form-select-sm form-select-solid"
                            name="leadsUserAssignment">
                            {{-- <option value="None">None</option> --}}
                                <option value="Distributed to User Base on Lead Count">Distributed to User Base
                                    on Lead Count</option>
                                <option value="Same as Product">Same as Product</option>
                            </select>
                        </div>
                    </div>

                   

                    
                </div>
                
                <div class="row mb-12">

                    <div class="col-lg-6">
                        <label for="campaignName" class="col-form-label fw-bold fs-6">Campaign
                             Name</label>
                        <div class="col-lg-12 fv-row" id="campaignName">
                            <select class="form-select form-select-sm form-select-solid" name="campaignName">
                                {{-- @foreach ($clients as $client )
                                    <option value="{{ $client->clientName }}">{{ $client->clientName}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <label for="campaignTimestamp" class="col-form-label fw-bold fs-6">Campaign
                            Timestamp</label>
                        <div class="col-lg-12 fv-row">
                            <input type="text" name="campaignTimestamp"
                            class="form-control form-control-sm form-control-solid"
                            placeholder="Campaign Timestamp" value="{{ $current_date_time }}" readonly>
                        </div>
                    </div>

                </div>
                <div class="row mb-12">

                    <div class="col-lg-6">
                        <label for="campaignGrouping" class="col-form-label fw-bold fs-6">Campaign
                             Grouping</label>
                        <div class="col-lg-12 fv-row" id="campaignGroup">
                            <select class="form-select form-select-sm form-select-solid" name="campaignGroup">
                                {{-- @foreach ($groups as $group )
                                    <option value="{{ $group->groupName }}">{{ $group->groupName}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label for="remarkStatus" class="col-form-label fw-bold fs-6">Generated QR Code</label>
                    <div class="card-body">
                        {!! QrCode::size(300)->generate($koki) !!}
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" id="uploadCSVSubmitBtn" class="btn btn-primary font-weight-bold">Upload</button>
                </div>
            </form>
            <!--end::Wrapper-->
            <!--begin::Datatable-->

            <!--end::Datatable-->
        </div>
    </div>

    @section('scripts')
    {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
    <script type="text/javascript" src="{{ "/".'custom/upload/csv_excel_upload.js?v=' . rvndev()->getRandom(30)}}"></script>
    @endsection  

   
    <!--start::Include your styles here-->
    @section(' styles') <style>
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
    </style>
    @endsection



</x-base-layout>