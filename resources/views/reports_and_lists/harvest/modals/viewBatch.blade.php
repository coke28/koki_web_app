<div class="modal fade" id="view_batch_modal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="view_batch_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Manage Batches of Harvest
                </h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="bi bi-x fs-2x"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="formAlertDiv">
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

                </div>
                <div class="card card-custom">
                    <div class="card-body">
                      <!--begin::Wrapper-->
                      <div class="d-flex flex-stack mb-5">
                      </div>
                      <!--begin::Datatable-->
                      <table id="harvest_dt" class="table table-rounded table-striped border gy-7 gs-7">
                        <thead>
                          <tr class="fw-semibold fs-6 text-black-800 border-bottom border-gray-200">
                            <th>Batch ID</th>
                            <th>Harvest Date</th>
                            <th>Harvest Name</th>
                            <th>Building</th>
                            <th>Added Stock</th>
                            <th>Current Stock</th>
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



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
                {{-- <button type="submit" id="addAreaSubmitBtn" class="btn btn-primary font-weight-bold">Add Area</button> --}}
            </div>
        </div>
    </div>
</div>