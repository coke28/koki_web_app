<div class="modal fade" id="edit_building_modal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="edit_building_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id ="buildingModalContent">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Edit Building
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
                <form class="form" id="edit_building_form">
                    <input type="hidden" name="id">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Building Name</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="building_name" class="form-control form-control-lg form-control-solid" placeholder="Enter Building Name">
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
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Location</label>
                        <div class="col-lg-10 fv-row">
                            <textarea type="text" name="location" class="form-control form-control-lg form-control-solid" placeholder="Enter Building Location"></textarea>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Building Description</label>
                        <div class="col-lg-10 fv-row">
                            <textarea type="text" name="building_description" class="form-control form-control-lg form-control-solid" placeholder="Enter Building Description"></textarea>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Remark</label>
                        <div class="col-lg-10 fv-row">
                            <textarea type="text" name="remark" class="form-control form-control-lg form-control-solid" placeholder="Enter Remark"></textarea>
                        </div>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="editBuildingSubmitBtn" class="btn btn-primary font-weight-bold">Edit Building</button>
            </div>
            </form>
        </div>
    </div>
</div>