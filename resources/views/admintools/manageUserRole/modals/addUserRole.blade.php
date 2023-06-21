<div class="modal fade" id="add_user_role_modal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="add_user_role_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Add User Role
                </h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i aria-hidden="true" class="bi bi-x fs-2x"></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                <div class="formAlertDiv">
                </div>
                <form class="form" id="add_user_role_form">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">User Role Name</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="user_role" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter User Role">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Application Access</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-control selectpicker" name="application_access" id="application_access">
                                <option value="0">Mobile Application</option>
                                <option value="1">Web Application</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">User Role Description</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="user_role_description" class="form-control form-control-lg form-control-solid" placeholder="Enter User Role Description">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-control selectpicker" name="status" id="status">
                                <option value="1">ACTIVE</option>
                                <option value="0">DISABLED</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" id="addUserRoleSubmitBtn" class="btn btn-primary font-weight-bold">Add
                    User Role</button>
            </div>
            </form>
        </div>
    </div>
</div>