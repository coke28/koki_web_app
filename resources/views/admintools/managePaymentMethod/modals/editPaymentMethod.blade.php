<div class="modal fade" id="editPaymentMethod" data-bs-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="editPaymentMethod" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="paymentMethodModalContent">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus"></i>
                    Edit Payment Method
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
                <form class="form" id="edit_payment_method_form">
                    <input type="hidden" name="id">
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Payment Method</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="paymentMethod"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Payment Method">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Payment Method Remark</label>
                        <div class="col-lg-10 fv-row">
                            <input type="text" name="paymentMethodRemark"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Enter Payment Method Remark">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-2 col-form-label fw-bold fs-6">Payment Method Status</label>
                        <div class="col-lg-10 fv-row">
                            <select class="form-control selectpicker" name="status" id="status">
                                <option value=1>ACTIVE</option>
                                <option value=0>DISABLED</option>
                              </select>

                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" id="editPaymentMethodSubmitBtn" class="btn btn-primary font-weight-bold">Edit
                    Payment Method</button>
            </div>
            </form>
        </div>
    </div>
</div>