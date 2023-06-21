<x-base-layout>

    <div class="card card-custom">
        <div class="card-body">
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                </div>
                <!--end::Toolbar-->
            </div>

            <form class="form" id="uploadCSV_form">
                <div class="row mb-12">
                    <div class="col-lg-6">
                        <label for="upload_timestamp" class="col-form-label fw-bold fs-6">Upload
                            Timestamp</label>
                        <div class="col-lg-12 fv-row">
                            <input type="text" name="upload_timestamp"
                                class="form-control form-control-sm form-control-solid" placeholder="Campaign Timestamp"
                                value="{{ $current_date_time }}" readonly>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="upload_type" class="col-form-label fw-bold fs-6">Upload Type</label>
                        <div class="col-lg-12 fv-row" id="upload_type">
                            <select class="form-select form-select-sm form-select-solid" name="upload_type">
                                <option value="0">Batch Upload</option>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <label for="remarkStatus" class="col-form-label fw-bold fs-6">Upload CSV File</label>
                    <div class="col-lg-12 fv-row">
                        <input type="file" name="file" placeholder=""
                            class="form-control form-control-lg form-control-solid" accept=".csv, .xlsx" />
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" id="uploadCSVSubmitBtn"
                        class="btn btn-primary font-weight-bold">Upload</button>
                </div>
            </form>
            <!--end::Wrapper-->
            <!--begin::Datatable-->

            <!--end::Datatable-->
            <h1>Sample Format</h1>
            <table id="sample" class="table table-rounded table-striped border gy-7 gs-7">
                <thead>
                  <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                      <th>Harvest Date</th>
                      <th>Building Name</th>
                      <th>Product Code</th>
                      <th>Quantity Description</th>
                  </tr>
                </thead>
                <tbody class="text-black-600 fw-bold">
                    <tr>
                        <td>
                            4/20/2023
                        </td>
                        <td>
                            Building #1
                        </td>
                        <td>
                            S
                        </td>
                        <td>
                            4
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4/21/2023
                        </td>
                        <td>
                            Building #1
                        </td>
                        <td>
                            L
                        </td>
                        <td>
                            9
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4/21/2023
                        </td>
                        <td>
                            Building #2
                        </td>
                        <td>
                            L
                        </td>
                        <td>
                            9
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4/22/2023
                        </td>
                        <td>
                            Building #2
                        </td>
                        <td>
                            S
                        </td>
                        <td>
                            5
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('download.sample') }}" class="btn btn-primary font-weight-bold">Download Sample File</a>
        </div>
    </div>

    @section('scripts')
    {{-- add random version of script at the end of script tag to prevent the need to F5 refresh --}}
    <script type="text/javascript" src="{{ "/".'custom/upload/csv_excel_upload.js?v=' . rvndev()->getRandom(30)}}"></script>
    @endsection  

   
    <!--start::Include your styles here-->
    @section('styles') <style>
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
    </style>
    @endsection



</x-base-layout>