<div class="modal fade" id="generate_batch_qr_code_modal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="generate_batch_qr_code_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="qrCodeModalContent">
            <div class="modal-header">
                <h5 class="modal-title">
                  <i class="bi bi-plus"></i>
                  Generated Batch QR Code
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
              <form class="form" id="generate_batch_qr_code_form">
                <input type="hidden" name="id">
                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Building</label>
                  <div class="col-lg-10 fv-row">
                    <select class="form-control selectpicker" name="building" id="building">
                      @foreach ($buildings as $building )
                      <option value="{{ $building->id }}">{{ $building->building_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Product</label>
                  <div class="col-lg-10 fv-row">
                    <select class="form-control selectpicker" name="product" id="product">
                      @foreach ($products as $product )
                      <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

               
                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Added Stock</label>
                  <div class="col-lg-10 fv-row">
                      <input type="text" name="added_stock" class="form-control form-control-lg form-control-solid" placeholder="Enter Added Stock"></input>
                  </div>
                </div>
                <div class="row mb-6">
                  <label class="col-lg-2 col-form-label fw-bold fs-6">Current Stock Stock</label>
                  <div class="col-lg-10 fv-row">
                      <input type="text" name="current_stock" class="form-control form-control-lg form-control-solid" placeholder="Enter Current Stock"></input>
                  </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">Generated QR Code</label>
                      {{-- {!! QrCode::size(300)->generate($koki) !!} --}}
                  </div>
            
               
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
                  <button type="submit" id="" class="btn btn-primary font-weight-bold">Download QR Code</button>
              </div>
            </form>
        </div>
    </div>
</div>
