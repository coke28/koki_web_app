<div class="modal fade" id="addPhone" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPhone" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                  <i class="bi bi-plus"></i>
                  Add Phone Model
                </h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="bi bi-x fs-2x"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
              <div class="formAlertDiv">

              </div>
              <form class="form" id="add_phone_form">
                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Phone Brand</label>
                  <div class="col-lg-10 fv-row">
                        <select class="form-control selectpicker" name="phoneBrand" id="phoneBrand">
                            @foreach ($phoneBrands as $phoneBrand )
                            <option value="{{ $phoneBrand->phoneBrandName }}">{{ $phoneBrand->phoneBrandName}}</option>
                 
                            @endforeach
                        </select>
                  </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">Phone Model Status</label>
                    <div class="col-lg-10 fv-row">
                        <select class="form-control selectpicker" name="status" id="status">
                            <option >ACTIVE</option>
                            <option >DISABLED</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Phone Model</label>
                  <div class="col-lg-10 fv-row">
                      <input type="text" name="phoneModel" class="form-control form-control-lg form-control-solid" placeholder="Enter Phone Model">
                  </div>
                </div>
                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Phone Price</label>
                  <div class="col-lg-10 fv-row">
                      <input type="text" name="phonePrice" class="form-control form-control-lg form-control-solid" placeholder="Enter Phone Price">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
                  <button type="submit" id="addPhoneSubmitBtn" class="btn btn-primary font-weight-bold">Add Phone Model</button>
              </div>
            </form>
        </div>
    </div>
</div>


