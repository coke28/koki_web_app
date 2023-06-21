@php
    $chartCcolor = $chartCcolor ?? 'primary';
    $chartHeight = $chartHeight ?? '175px';
@endphp

<!--begin::Mixed Widget 2-->
<div class="card {{ $class }}">
    <!--begin::Header-->
    <div class="card-header border-0 bg-{{ $chartCcolor }} py-5">
        <h3 class="card-title fw-bolder text-white">Quick Actions</h3>
    </div>
    <!--end::Header-->
    <br>
    <br>
    <br>
    <br>
    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Chart-->
       
        <!--end::Chart-->

        <!--begin::Stats-->
        <div class="card-p mt-n20 position-relative">
            <!--begin::Row-->
            <div class="row g-0">
                <!--begin::Col-->
                <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                    {!! theme()->getSvgIcon("icons/duotone/Media/Equalizer.svg", "svg-icon-3x svg-icon-warning d-block my-2") !!}
                    <a href="#" class="text-warning fw-bold fs-6">
                        Harvests
                    </a>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                    {!! theme()->getSvgIcon("icons/duotone/Communication/Add-user.svg", "svg-icon-3x svg-icon-primary d-block my-2") !!}
                    <a href="#" class="text-primary fw-bold fs-6">
                        Add New User
                    </a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row g-0">
                <!--begin::Col-->
                <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                    {!! theme()->getSvgIcon("icons/duotone/Design/Layers.svg", "svg-icon-3x svg-icon-danger d-block my-2") !!}
                    <a href="#" class="text-danger fw-bold fs-6 mt-2">
                        Item Orders
                    </a>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col bg-light-success px-6 py-8 rounded-2">
                    {!! theme()->getSvgIcon("icons/duotone/Communication/Urgent-mail.svg", "svg-icon-3x svg-icon-success d-block my-2") !!}
                    <a href="#" class="text-success fw-bold fs-6 mt-2">
                        Add New Product
                    </a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>
<!--end::Mixed Widget 2-->
