<div class="modal fade" id="addPhoneBrand" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPhoneBrand" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                  <i class="bi bi-plus"></i>
                  Add Phone Brand
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
              <form class="form" id="add_phone_brand_form">
                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Phone Brand</label>
                  <div class="col-lg-10 fv-row">
                      <input type="text" name="phoneBrandName" class="form-control form-control-lg form-control-solid" placeholder="Enter Phone Brand">
                  </div>
                </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">Phone Brand Status</label>
                    <div class="col-lg-10 fv-row">
                        <select class="form-control selectpicker" name="status" id="status">
                            <option value = 1>ACTIVE</option>
                            <option value = 0>DISABLED</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
                  <button type="submit" id="addPhoneBrandSubmitBtn" class="btn btn-primary font-weight-bold">Add Phone Brand</button>
              </div>
            </form>
        </div>
    </div>
</div>
