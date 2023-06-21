<!--begin::Basic info-->
<div class="card {{ $class }}">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{ __('Profile Details') }}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->

    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('settings.update') }} " 
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Avatar') }}</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline " data-kt-image-input="true"
                            style="background-image: url({{ asset(theme()->getMediaUrlPath() . 'avatars/blank.png') }})">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ "/". auth()->user()->avatar }})"></div>
                            <!--end::Preview existing avatar-->

                            <!--begin::Label-->
                            <label
                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>

                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="avatar_remove" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->

                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->

                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->

                        <!--begin::Hint-->
                        <div class="form-text">{{ __('Allowed file types: png, jpg, jpeg.') }}</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('First Name') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <input type="text" name="first_name" id="first_name"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="First name"
                                    value="{{ old('first_name', auth()->user()->first_name ?? '') }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Middle Name') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <input type="text" name="middle_name" id="middle_name"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Middle name"
                                    value="{{ old('middle_name', auth()->user()->middle_name ?? '') }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('Last Name') }}</label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-12 fv-row">
                                <input type="text" name="last_name" id="last_name"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    placeholder="Last name"
                                    value="{{ old('last_name', auth()->user()->last_name ?? '') }}" />
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                {{-- <div class="row mb-6"> --}}
                    <!--begin::Label-->
                    {{-- <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>{{ __('Address') }}</span>
                    </label> --}}
                    <!--end::Label-->
                    
                    <!--begin::Col-->
                    {{-- <div class="col-lg-2 fv-row">
                        <div class="form-floating mb-7">
                            <input type="text" class="address form-control form-control-lg form-control-solid" id="houseNumber" />
                            <label for="floatingInput">House Number</label>
                        </div>
                    </div> --}}
                    <!--end::Col-->
                    <!--begin::Col-->
                    {{-- <div class="col-lg-2 fv-row">
                        <div class="form-floating mb-7">
                            <input type="text" class="address form-control form-control-lg form-control-solid" id="blockLotStreet" />
                            <label for="floatingInput">Block, Lot and Street</label>
                        </div>
                    </div> --}}
                    <!--end::Col-->
                    <!--begin::Col-->
                    {{-- <div class="col-lg-4 fv-row">
                        <div class="form-floating mb-7">
                            <input type="text" class="address form-control form-control-lg form-control-solid" id="barangay" />
                            <label for="floatingInput">Barangay</label>
                        </div>
                    </div> --}}
                    {{-- Concatenated Address --}}
                    {{-- <input type="hidden" name="address" id="address"> --}}
                    <!--end::Col-->
                {{-- </div> --}}
                <!--end::Input group-->
                <!--begin::Input group-->
                {{-- <div class="row mb-6"> --}}
                    <!--begin::Label-->
                    {{-- <label class="col-lg-4 col-form-label fw-bold fs-6"></label> --}}
                    <!--end::Label-->

                    <!--begin::Col-->
                    {{-- <div class="col-lg-3 fv-row">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control form-control-lg form-control-solid" name="city" id="city" />
                            <label for="floatingInput">City</label>
                        </div>
                    </div> --}}
                    <!--end::Col-->
                    <!--begin::Col-->
                    {{-- <div class="col-lg-3 fv-row">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control form-control-lg form-control-solid" name="province" id="province" />
                            <label for="floatingInput">Province</label>
                        </div>
                    </div> --}}
                    <!--end::Col-->
                    <!--begin::Col-->
                    {{-- <div class="col-lg-2 fv-row">
                        <div class="form-floating mb-7">
                            <input type="text" class="form-control form-control-lg form-control-solid"  name="area" id="area" />
                            <label for="floatingInput">Area Code</label>
                        </div>
                    </div> --}}
                    <!--end::Col-->
                {{-- </div> --}}
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>{{ __('Birthdate') }}</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="date" name="birthdate" id="birthdate" class="form-control form-control-lg form-control-solid"
                            placeholder="" value="{{ old('birthdate',  auth()->user()->birthdate ?? '') }}"/>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                 <!--begin::Input group-->
                 <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span>{{ __('Age') }}</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="number" name="age" id="age" class="form-control form-control-lg form-control-solid"
                            placeholder="Age" value="{{ old('age',  auth()->user()->age ?? '') }}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{ __('Email') }}</span>
                        </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="email" name="email" id="email" class="form-control form-control-lg form-control-solid"
                            placeholder="Email" value="{{ old('email',  auth()->user()->email ?? '') }}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->



                <!--begin::Input group-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">{{ __('Mobile') }}</span>
                    </label>
                    <!--end::Label-->

                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <input type="tel" name="mobile" id="mobile"  class="form-control form-control-lg form-control-solid"
                            placeholder="Mobile number" value="{{ old('mobile',  auth()->user()->mobile ?? '') }}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->

               



                
            </div>
            <!--end::Card body-->

            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-white btn-active-light-primary me-2">{{ __('Discard') }}</button>

                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
                    @include('partials.general._button-indicator', ['label' => __('Save Changes')])
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->