<div class="modal fade" id="addStatus" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addStatus"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="bi bi-plus"></i>
          Add Status
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
        <form class="form" id="add_status_form">
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Status Code</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="statusCode" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Status Code">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">User Access Level</label>
            <div class="col-lg-10 fv-row">
              <select class="form-control selectpicker" name="client" id="client">

                <option value="0">Agent</option>
                <option value="1">Supervisor</option>
                <option value="2">Administrator</option>

              </select>
            </div>

          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Status ID</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="statusID" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Status ID">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>
            <div class="col-lg-10 fv-row">
              <select class="form-control selectpicker" name="status" id="status">
                <option>ACTIVE</option>
                <option>DISABLED</option>
              </select>

            </div>

          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Status Name</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="statusName" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Status Name">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Status Description</label>
            <div class="col-lg-10 fv-row">
              <textarea type="text" name="statusDescription" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Status Description"></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="addStatusSubmitBtn" class="btn btn-primary font-weight-bold">Add Status</button>
      </div>
      </form>
    </div>
  </div>
</div>