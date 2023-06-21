<div class="modal fade" id="editUser" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editUser"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" id="userModalContent">
      <div class="modal-header">
        <h5 class="modal-title">
          <i class="bi bi-plus"></i>
          Edit User Modal
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
        <form class="form" id="edit_user_form" enctype="multipart/form-data">
          <input type="hidden" name="id">
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Username</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="username" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Username">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Password</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="password" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Password">
            </div>
          </div>
          {{-- <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Password Confirmation</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="passwordConfirmation" class="form-control form-control-lg form-control-solid"
                placeholder="Retype Password"></input>
            </div>
          </div> --}}
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">First Name</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="first_name" class="form-control form-control-lg form-control-solid"
                placeholder="Enter First Name">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Middle Name</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="middle_name" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Middle Name"></input>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Last Name</label>
            <div class="col-lg-10 fv-row">
              <input type="text" name="last_name" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Last Name">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">User Role</label>
            <div class="col-lg-10 fv-row">
              <select class="form-control selectpicker" name="user_role_id" id="user_role_id">
                @foreach ($userRoles as $userRole )
                <option value="{{ $userRole->id }}">{{ $userRole->user_role }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Contact Number</label>
            <div class="col-lg-10 fv-row">
              <input type="number" name="contact_number" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Contact Number">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Email Address</label>
            <div class="col-lg-10 fv-row">
              <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                placeholder="Enter Email">
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Upload</label>
            <div class="col-lg-10 fv-row">
              <input type="file" name="file" placeholder="Leave blank"
                class="form-control form-control-lg form-control-solid" accept=".png, .jpg" />
            </div>
          </div>
          <div class="row mb-6">
            <label class="col-lg-2 col-form-label fw-bold fs-6">Preview</label>
            <div class="col-lg-10 fv-row userImagePreview">

            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-danger font-weight-bold" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="editUserSubmitBtn" class="btn btn-primary font-weight-bold">Edit User</button>
      </div>
      </form>
    </div>
  </div>
</div>