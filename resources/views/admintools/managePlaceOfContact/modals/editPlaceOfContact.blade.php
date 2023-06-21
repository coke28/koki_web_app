<div class="modal fade" id="editPlaceOfContact" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editPlaceOfContact" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="placeOfContactModalContent">
            <div class="modal-header">
                <h5 class="modal-title">
                  <i class="bi bi-plus"></i>
                  Edit Place Of Contact
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
              <form class="form" id="edit_place_of_contact_form">
                <input type="hidden" name="id">
                {{-- <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">Select Product</label>
                    <div class="col-lg-10 fv-row">
                    <select class="form-control selectpicker" name="product" id="product">
                        @foreach ($clients as $client )
                        <option value="{{ $client->clientName }}">{{ $client->clientName}}</option>
             
                        @endforeach
                    </select>
                
                    </div>
                    
                </div> --}}
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">Place Of Contact</label>
                    <div class="col-lg-10 fv-row">
                        <input type="text" name="placeOfContact" class="form-control form-control-lg form-control-solid" placeholder="Enter Place Of Contact">
                    </div>
                  </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">Status</label>
                    <div class="col-lg-10 fv-row">
                    <select class="form-control selectpicker" name="status" id="status">
                        <option value=1>ACTIVE</option>
                        <option value=0>DISABLED</option>
                    </select>
                
                    </div>
                    
                </div>
                <div class="row mb-6">
                    <label class="col-lg-2 col-form-label fw-bold fs-6">Description</label>
                    <div class="col-lg-10 fv-row">
                      <textarea type="text" name="placeOfContactDescription" class="form-control form-control-lg form-control-solid" placeholder="Enter Place Of Contact Description"></textarea>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
                  <button type="submit" id="editPlaceOfContactSubmitBtn" class="btn btn-primary font-weight-bold">Edit Place Of Contact</button>
              </div>
            </form>
        </div>
    </div>
</div>
