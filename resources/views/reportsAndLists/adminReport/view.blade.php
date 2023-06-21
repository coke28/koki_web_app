<x-base-layout>
    <div class="card card-custom">
        <div class="card-body">
            <!--begin::Wrapper-->

            <form class="form-horizontal" method="POST" id="admin_report_form" enctype="multipart/form-data">

                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <div class="row">

                        <div class="form-group">
                            <label class="col-form-label fw-bold fs-6">Report Type</label>

                            <select class="form-control" id="select_report_type" name="select_report_type">
                                <option value="harvest_total_amount">Harvest Produce Report</option>
                                <option value="harvest_stock">Harvest Stock Report</option>
                            </select>
                        </div>

                    </div>

                </div>
                <div class="row" id="date_choice">

                    {{-- <div class="col-md-6"> --}}
                        <div class="form-group">
                            <label class="col-form-label fw-bold fs-6">Date Filter</label>
                            {{-- <div class="col-md-9"> --}}
                                <select id="select_date_type" name="select_date_type" class="form-control">
                                    <option value="all_time">All Time</option>
                                    <option value="date_range">DATE RANGE</option>


                                </select>
                                {{--
                            </div> --}}
                        </div>
                        {{--
                    </div> --}}
                </div>

                <div class="row" id="date_filter" style="display:none">

                    {{-- <div class="col-md-6"> --}}
                        <div class="form-group">
                            <label class="col-form-label fw-bold fs-6">Date Filter</label>
                            {{-- <div class="col-md-9"> --}}
                                <input class="form-control form-control-inline input-medium form_datetime"
                                    id="start_date" type="date" name="start_date" placeholder="Start Date & Time">

                                <input class="form-control form-control-inline input-medium form_datetime" id="end_date"
                                    type="date" name="end_date" placeholder="End Date & Time">
                                {{--
                            </div> --}}
                        </div>
                        {{--
                    </div> --}}
                </div>
                <div class="form-actions" id="submit_row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <div class="separator my-10"></div>
                                    <button type="submit" id="btn-submit" class="btn btn-primary font-weight-bold"
                                        data-style="expand-right">
                                        <span class="ladda-label">
                                            <i class="icon-arrow-right"></i>Submit</span>
                                        <span class="ladda-spinner"></span>
                                    </button>
                                    <span id="error"></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>

                <!-- END FORM-->
        </div>
    </div>
    </form>
    <!--end::Wrapper-->
    </div>



    <!--start::Include your scripts here-->
    @section('scripts')
    {{-- <script type="text/javascript" src="{{ "/".'custom\adminReport\adminReportForm.js?v='. rvndev()->getRandom(30) }}"></script> --}}
    <script type="text/javascript" src="{{ "/".'custom\adminReport\adminReportValidation.js?v='. rvndev()->getRandom(30) }}"></script>

    @endsection
</x-base-layout>