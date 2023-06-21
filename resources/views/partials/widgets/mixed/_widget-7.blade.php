@php
    $chartCcolor = $chartCcolor ?? 'primary';
    $chartHeight = $chartHeight ?? '175px';
@endphp

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}

<!--begin::Mixed Widget 7-->
<div class="card {{ $class }}">
    <!--begin::Body-->
    <div class="card-body d-flex flex-column p-0">
        <!--begin::Stats-->
        <div class="flex-grow-1 card-p pb-0">
            <div class="d-flex flex-stack flex-wrap">
                <div class="me-2">
                    <a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Generate Reports</a>

                    <div class="text-muted fs-7 fw-bold">Finance and accounting reports</div>
                </div>

                <div class="fw-bolder fs-3 text-{{ $chartCcolor }}">
                    $10000
                </div>
            </div>
        </div>
        <!--end::Stats-->

        <!--begin::Chart-->
        <div class="mixed-widget-7-chart card-rounded-bottom" data-kt-chart-color="{{ $chartCcolor }}" style="height: {{ $chartHeight }}"></div>
        <!--end::Chart-->
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> --}}
    <!--end::Body-->
</div>
<!--end::Mixed Widget 7-->
