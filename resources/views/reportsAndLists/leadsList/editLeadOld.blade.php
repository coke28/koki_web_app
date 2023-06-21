<x-base-layout>
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active fw-bolder text-primary" data-bs-toggle="tab" href="#history_tab">
                        History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-primary" data-bs-toggle="tab" href="#accountDetail_tab">Account
                        Details</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bolder text-primary" data-bs-toggle="tab" href="#status_tab">Status
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bolder text-primary" href="/">Exit
                    </a>
                </li>


            </ul>
            <div class="tab-content" id="productsTabContent">
                <div class="tab-pane fade show active" id="history_tab" role="tabpanel">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 mb-2 mb-md-0">
                            <div class="input-group input-group-solid">
                                <span class="svg-icon svg-icon-1 input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" id="historySearch"
                                    class="form-control form-control-lg form-control-solid" placeholder="Search">
                                <button class="input-group-text clearInp">
                                    <i class="fas fa-times fs-4"></i>
                                </button>
                            </div>
                        </div>
                        <!--end::Search-->

                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Datatable-->
                    <table id="history_dt" class="table align-middle table-row-bordered fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th>Action</th>
                                <th>Agent</th>
                                <th>Full Name</th>
                                <th>Date</th>
                                <th>Mobile Number</th>
                                <th>Campaign Status</th>
                                <th>Campaign ID</th>
                                <th>IP Address</th>
                                <th>Call Duration</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
                <div class="tab-pane fade" id="status_tab" role="tabpanel">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack mb-5">
                        <!--begin::Search-->

                        <!--end::Search-->

                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">

                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Wrapper-->
                    <form class="form" id="edit_status_form">
                        <div class="row mb-12">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="agentName" class="col-form-label fw-bold fs-6">Agent Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="agentName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Agent Name" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="campaignName" class="col-form-label fw-bold fs-6">Campaign Name </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="campaignName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Agent Name" disabled>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row mb-12">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="campaignID" class="col-form-label fw-bold fs-6">Campaign ID</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="campaignID"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Campaign ID" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="leadStatus" class="col-form-label fw-bold fs-6">Lead Status</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="leadStatus"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Lead Status">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row mb-12">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="reason" class="col-form-label fw-bold fs-6">Reason for Denial</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="reason"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Reason Why Application Did Not Proceed To Online">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="dateStamp" class="col-form-label fw-bold fs-6">Date Stamp</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="date" name="dateStamp"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Date Stamp" disabled>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label for="remarkStatus" class="col-form-label fw-bold fs-6">Remark</label>
                            <div class="col-lg-12 fv-row">
                                <textarea style="height:75px;resize:none;" name="remarkStatus"
                                    class="form-control form-control-sm form-control-solid"
                                    placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" id="editstatusSubmitBtn"
                                class="btn btn-primary font-weight-bold">Edit</button>
                        </div>
                    </form>

                </div>
                <div class="tab-pane fade " id="accountDetail_tab" role="tabpanel">
                    <form class="form" id="edit_accountDetail_form">
                        <div class="row mb-6">

                            <div class="col-6">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">Account Details</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="extraField#1" class="col-form-label fw-bold fs-6">Extra Field#</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="extraField1"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="extraField#2" class="col-form-label fw-bold fs-6">Extra Field#</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="extraField2"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="extraField#3" class="col-form-label fw-bold fs-6">Extra Field#</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="extraField3"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="reference" class="col-form-label fw-bold fs-6">Reference</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="reference"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="reference">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="creditLimit" class="col-form-label fw-bold fs-6">Credit Limit</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="creditLimit"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Credit Limit">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="orderNumberUltima" class="col-form-label fw-bold fs-6">Order # from
                                        Ultima </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="orderNumberUltima"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Order # from Ultima">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="globeAccountNumber" class="col-form-label fw-bold fs-6">Globe Account
                                        #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="globeAccountNumber"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Globe Account # ">
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="customerName" class="col-form-label fw-bold fs-6">Customer Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="customerName"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Customer Name ">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="CCandTransmittalDate" class="col-form-label fw-bold fs-6">CC &
                                            Transmittal Date <span class="text-danger">*</span></label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="date" name="CCandTransmittalDate"
                                                class="form-control form-control-sm form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="product" class="col-form-label fw-bold fs-6">Product</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="product"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Product ">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">Lead Details</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="reference" class="col-form-label fw-bold fs-6">Reference #</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="reference"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Reference #">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="agentName" class="col-form-label fw-bold fs-6">Agent Name </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="agentName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Agent Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="product" class="col-form-label fw-bold fs-6">Product</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="product" name="product"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Product">
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="planType" class="col-form-label fw-bold fs-6">Plan Type</label>

                                        <div class="col-lg-12 fv-row" id="planType">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="planType">
                                                <option value="Owned">Owned</option>
                                                <option value="Rented">Rented</option>
                                                <option value="Company Owned">Company Owned</option>
                                                <option value="Living with Relatives">Living with Relatives</option>
                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="planMSF" class="col-form-label fw-bold fs-6">Plan(MSF)
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="existingMobileNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Existing Mobile #">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="combos" class="col-form-label fw-bold fs-6">
                                            Combos</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="combos"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Combos">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <label for="addOnBooster" class="col-form-label fw-bold fs-6">Add On(Booster)
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="addOnBooster"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Add On(Booster)">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="mandatoryBoosterForArrow" class="col-form-label fw-bold fs-6">
                                            Mandatory Booster</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="mandatoryBoosterForArrow"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder=" Mandatory Booster For Arrow">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="lifestyleBundle" class="col-form-label fw-bold fs-6">
                                            Lifestyle Bundle</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="lifestyleBundle"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder=" Lifestyle Bundle">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-4">
                                        <label for="arrowBundleFree" class="col-form-label fw-bold fs-6">Arrow
                                            Bundle(Free)
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="arrowBundleFree"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Arrow Bundle(Free)">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="handset" class="col-form-label fw-bold fs-6">Handset</label>

                                        <div class="col-lg-12 fv-row" id="handset">
                                            <select class="form-select form-select-sm form-select-solid" name="handset">
                                                <option value="Owned">Owned</option>
                                                <option value="Rented">Rented</option>
                                                <option value="Company Owned">Company Owned</option>
                                                <option value="Living with Relatives">Living with Relatives</option>
                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="cashOut" class="col-form-label fw-bold fs-6">
                                            Cash Out</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="cashOut"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Cash Out">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-4">
                                        <label for="promo" class="col-form-label fw-bold fs-6">Promo
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="promo"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Promo">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="modeOfPayment" class="col-form-label fw-bold fs-6">Mode Of
                                            Payment</label>

                                        <div class="col-lg-12 fv-row" id="modeOfPayment">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="modeOfPayment">
                                                <option value="Owned">Owned</option>
                                                <option value="Rented">Rented</option>
                                                <option value="Company Owned">Company Owned</option>
                                                <option value="Living with Relatives">Living with Relatives</option>
                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="valueAddedService" class="col-form-label fw-bold fs-6">
                                            Added Service</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="valueAddedService"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Value Added Service">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-4">
                                        <label for="promo" class="col-form-label fw-bold fs-6">Promo
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="promo"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Promo">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="modeOfPayment" class="col-form-label fw-bold fs-6">Mode Of
                                            Payment</label>

                                        <div class="col-lg-12 fv-row" id="modeOfPayment">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="modeOfPayment">
                                                <option value="Owned">Owned</option>
                                                <option value="Rented">Rented</option>
                                                <option value="Company Owned">Company Owned</option>
                                                <option value="Living with Relatives">Living with Relatives</option>
                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="valueAddedService" class="col-form-label fw-bold fs-6">
                                            Added Service</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="valueAddedService"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Value Added Service">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-4">
                                        <label for="hbp" class="col-form-label fw-bold fs-6">HBP
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="hbp"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="HBP">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="LockUpPeriod" class="col-form-label fw-bold fs-6">LockUp
                                            Period</label>

                                        <div class="col-lg-12 fv-row" id="LockUpPeriod">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="LockUpPeriod">
                                                <option value="6">6 Months</option>
                                                <option value="12">12 Months</option>
                                                <option value="24">24 Months</option>
                                                <option value="36">36 Months</option>
                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="transmittalType" class="col-form-label fw-bold fs-6">Transmittal
                                            Type</label>

                                        <div class="col-lg-12 fv-row" id="transmittalType">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="transmittalType">
                                                <option value="NEW">NEW</option>
                                                <option value="COMPLIANCE">COMPLIANCE</option>


                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <label for="sourceOfSales" class="col-form-label fw-bold fs-6">Source Of
                                            Sales</label>

                                        <div class="col-lg-12 fv-row" id="sourceOfSales">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="sourceOfSales">
                                                <option value="6">6 Months</option>
                                                <option value="12">12 Months</option>
                                                <option value="24">24 Months</option>
                                                <option value="36">36 Months</option>
                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="applicationMode" class="col-form-label fw-bold fs-6">Application
                                            Mode</label>

                                        <div class="col-lg-12 fv-row" id="LockUpPeriod">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="LockUpPeriod">
                                                <option value="FTA">FTA</option>
                                                <option value="ADA">ADA</option>
                                                <option value="FTA WIRELESS">FTA WIRELESS</option>

                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <label for="remark" class="col-form-label fw-bold fs-6">Remark</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="remark"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=""></textarea>
                                    </div>
                                </div>












                                <hr>
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">Sales</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="salesmanID" class="col-form-label fw-bold fs-6">Salesman ID</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="salesmanID"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Salesman ID">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="salesmanName" class="col-form-label fw-bold fs-6">Salesman
                                            Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="salesmanName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Salesman Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="agencyName" class="col-form-label fw-bold fs-6">Agency Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="agencyName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Agency Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="accountManager" class="col-form-label fw-bold fs-6">Account
                                            Manager</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="accountManager"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Account Manager">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="salesChannel" class="col-form-label fw-bold fs-6">Sales
                                            Channel</label>

                                        <div class="col-lg-12 fv-row" id="salesChannel">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="salesChannel">
                                                <option value="STS">STS</option>
                                                <option value="STS_OL">STS_OL</option>


                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="projectPromo"
                                            class="col-form-label fw-bold fs-6">Project/Promo</label>

                                        <div class="col-lg-12 fv-row" id="projectPromo">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="projectPromo">
                                                <option value="STS">STS</option>
                                                <option value="STS_OL">STS_OL</option>


                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="appsReceivedSource" class="col-form-label fw-bold fs-6">Received
                                            Source</label>

                                        <div class="col-lg-12 fv-row" id="appsReceivedSource">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="appsReceivedSource">
                                                <option value="STS">STS</option>
                                                <option value="STS_OL">STS_OL</option>


                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="timestamp" class="col-form-label fw-bold fs-6">Timestamp</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="date" name="timestamp"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Timestamp">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="poidType" class="col-form-label fw-bold fs-6">POID Type</label>

                                        <div class="col-lg-12 fv-row" id="poidType">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="poidType">
                                                <option value="STS">STS</option>
                                                <option value="STS_OL">STS_OL</option>


                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="poidNumber" class="col-form-label fw-bold fs-6">POID #</label>

                                        <div class="col-lg-12 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="poidNumber"
                                                    class="form-control form-control-sm form-control-solid"
                                                    placeholder="POID #">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="docksLink" class="col-form-label fw-bold fs-6">Docs Link</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="docksLink"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="docksLink">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="leadType" class="col-form-label fw-bold fs-6">Lead Type</label>

                                        <div class="col-lg-12 fv-row" id="leadType">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="leadType">
                                                <option value="STS">STS</option>
                                                <option value="STS_OL">STS_OL</option>


                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="salesAgentName" class="col-form-label fw-bold fs-6">Sales Agent
                                            Name</label>

                                        <div class="col-lg-12 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="salesAgentName"
                                                    class="form-control form-control-sm form-control-solid"
                                                    placeholder="Sales Agent Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="applicationDate" class="col-form-label fw-bold fs-6">Application
                                            Date</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="date" name="applicationDate"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="applicationDate">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="gcashGUI" class="col-form-label fw-bold fs-6">Gcash GUI</label>

                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="gcashGUI"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Gcash GUI">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="eligablePlans" class="col-form-label fw-bold fs-6">Eligable
                                            Plans</label>

                                        <div class="col-lg-12 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="eligablePlans"
                                                    class="form-control form-control-sm form-control-solid"
                                                    placeholder="Based on GScore">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="deliveryAddress" class="col-form-label fw-bold fs-6">Delivery
                                            Address</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="deliveryAddress"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Delivery Address">
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="admin" class="col-form-label fw-bold fs-6">Admin</label>

                                        <div class="col-lg-12 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="admin"
                                                    class="form-control form-control-sm form-control-solid"
                                                    placeholder="Admin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="GDFPromo" class="col-form-label fw-bold fs-6">GDF Promo Tag</label>
                                        <div class="col-lg-12 fv-row" id="GDFPromo">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="GDFPromo">
                                                <option value="STS">STS</option>
                                                <option value="STS_OL">STS_OL</option>


                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="dateCalled" class="col-form-label fw-bold fs-6">Date Called</label>

                                        <div class="col-lg-12 fv-row">
                                            <input type="date" name="dateCalled"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Gcash GUI">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="dateCompiled" class="col-form-label fw-bold fs-6">Date
                                            Compiled</label>

                                        <div class="col-lg-12 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="date" name="dateCompiled"
                                                    class="form-control form-control-sm form-control-solid"
                                                    placeholder="Date Compiled">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="qualified" class="col-form-label fw-bold fs-6">Qualified</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="qualified"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Qualified">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="deliveryZipCode" class="col-form-label fw-bold fs-6">Delivery
                                            Zipcode</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="deliveryZipCode"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Delivery Zipcode">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="andaleArea" class="col-form-label fw-bold fs-6">Andale Area</label>

                                        <div class="col-lg-12 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="date" name="andaleArea"
                                                    class="form-control form-control-sm form-control-solid"
                                                    placeholder="Andale Area">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="portingNumber" class="col-form-label fw-bold fs-6">Porting #</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="portingNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Porting #">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="projectChamomile" class="col-form-label fw-bold fs-6">Project
                                            Chamomile </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="projectChamomile"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Project Chamomile">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="gadgetCareAmount" class="col-form-label fw-bold fs-6">Gadget Care
                                            Amount</label>

                                        <div class="col-lg-12 fv-row">
                                            <div class="col-lg-12 fv-row">
                                                <input type="date" name="gadgetCareAmount"
                                                    class="form-control form-control-sm form-control-solid"
                                                    placeholder="Gadget Care Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="extraFieldEnd1" class="col-form-label fw-bold fs-6">Extra Field
                                            1</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="extraFieldEnd1"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Extra Field 1">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="extraFieldEnd2" class="col-form-label fw-bold fs-6">Extra Field
                                            2</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="extraFieldEnd2"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Extra Field 2">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="extraFieldEnd3" class="col-form-label fw-bold fs-6">Extra Field
                                            3</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="extraFieldEnd3"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Extra Field 3">
                                        </div>
                                    </div>

                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">User Details</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="fname" class="col-form-label fw-bold fs-6">First Name </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="fname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="mname" class="col-form-label fw-bold fs-6">Middle Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="mname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="lname" class="col-form-label fw-bold fs-6">Last Name </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="lname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="landlineContactNumber" class="col-form-label fw-bold fs-6">Landline
                                            #</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="landlineContactNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Landline #">
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <label for="existingMobileNumber" class="col-form-label fw-bold fs-6">Existing
                                            Mobile #</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="existingMobileNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Existing Mobile #">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="mobileNumber" class="col-form-label fw-bold fs-6">
                                            Mobile #</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="mobileNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Mobile #">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="email" class="col-form-label fw-bold fs-6">Email</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="email"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="ex. johndoe@hotmail.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="tin" class="col-form-label fw-bold fs-6">TIN</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="tin"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="TIN">
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <label for="GSIS/SSS" class="col-form-label fw-bold fs-6">GSIS/SSS</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="GSIS/SSS"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="GSIS/SSS">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">Address Details</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="homeOwnership" class="col-form-label fw-bold fs-6">Home
                                            Ownership</label>
                                        <div class="col-lg-12 fv-row" id="homeOwnership">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="homeOwnership">
                                                <option value="Owned">Owned</option>
                                                <option value="Rented">Rented</option>
                                                <option value="Company Owned">Company Owned</option>
                                                <option value="Living with Relatives">Living with Relatives</option>
                                                {{-- @foreach($provinces as $province)
                                                <option data-compare="{{ $province->region }}"
                                                    value="{{ $province->province }}">{{ $province->province }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="houseBuilding" class="col-form-label fw-bold fs-6">House/Building
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="houseBuilding"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="House/Building">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="unitNumber" class="col-form-label fw-bold fs-6">Unit # </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="unitNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Unit #">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="buildingVillage"
                                            class="col-form-label fw-bold fs-6">Building/Village</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="buildingVillage"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Building/Village">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="addressStreet" class="col-form-label fw-bold fs-6">Address Street
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="addressStreet"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Address Street Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="addressBarangay" class="col-form-label fw-bold fs-6">Address
                                            Barangay </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="addressBarangay"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Address Baranagay">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="addressCity" class="col-form-label fw-bold fs-6">Address City
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="addressCity"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Address City">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="addressProvince" class="col-form-label fw-bold fs-6">Address
                                            Province </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="addressProvince"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Address Province">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="addressPostal" class="col-form-label fw-bold fs-6">Address Postal
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="addressPostal"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Address Postal">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="addressRegion" class="col-form-label fw-bold fs-6">Address
                                            Region</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="addressRegion"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Address Region">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="lengthOfStay" class="col-form-label fw-bold fs-6">Length Of
                                            Stay</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="lengthOfStay"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Length Of Stay">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <label for="addressRemark" class="col-form-label fw-bold fs-6">Address
                                        Remark</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="addressRemark"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=""></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="officeName" class="col-form-label fw-bold fs-6">Office
                                            Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="officeName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Office Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="officeTelephoneNumber" class="col-form-label fw-bold fs-6">Office
                                            Telephone #</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="officeTelephoneNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Office Telephone #">
                                        </div>
                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="yearsInCompany" class="col-form-label fw-bold fs-6">Years In
                                            Company</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="yearsInCompany"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Years In Company">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="dateOfEmployment" class="col-form-label fw-bold fs-6">Date of
                                            Employment</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="date" name="dateOfEmployment"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Date of Employment">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="officeAddress" class="col-form-label fw-bold fs-6">Office Address w/
                                        Postal Code</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="officeAddress"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=""></textarea>
                                    </div>
                                </div>



                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">Other Details</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="motherFname" class="col-form-label fw-bold fs-6">Mother's First Name
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="motherFname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Mother's First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="motherMname" class="col-form-label fw-bold fs-6">Middle
                                            Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="motherMname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Mother's Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="motherLname" class="col-form-label fw-bold fs-6">Mother's Last Name
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="motherLname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Mother's Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="fatherFname" class="col-form-label fw-bold fs-6">Father's First Name
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="fatherFname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Father's First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="fatherMname" class="col-form-label fw-bold fs-6">Middle Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="fatherMname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Father's Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="fatherLname" class="col-form-label fw-bold fs-6">Father's Last Name
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="fatherLname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Father's Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="fatherFname" class="col-form-label fw-bold fs-6">Spouse's First Name
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="fatherFname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Father's First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="fatherMname" class="col-form-label fw-bold fs-6">Middle
                                            Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="fatherMname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Father's Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="fatherLname" class="col-form-label fw-bold fs-6">Spouse's Last Name
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="fatherLname"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Father's Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="contactNumberSpouse" class="col-form-label fw-bold fs-6">Spouse's
                                            Contact #</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="contactNumberSpouse"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Spouse's Contact #">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="birthdaySpouse" class="col-form-label fw-bold fs-6">Spouse's
                                            Birthdate </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="date" id="birthdaySpouse" name="birthdaySpouse"
                                                class="form-control form-control-sm form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="numberOfChildren" class="col-form-label fw-bold fs-6"># of
                                            Children</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="numberOfChildren"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="# of Children">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="gender" class="col-form-label fw-bold fs-6">Gender</label>
                                        <div class="col-lg-12 fv-row" id="add_genderSelParent">
                                            <select class="form-select form-select-sm form-select-solid" name="gender">
                                                <option value="none">Select gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="birthday" class="col-form-label fw-bold fs-6">Birthdate</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="date" id="addaccountBdate" name="birthday"
                                                class="form-control form-control-sm form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="civilStatus" class="col-form-label fw-bold fs-6">Civil
                                            Status</label>
                                        <div class="col-lg-12 fv-row" id="civilStatus">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="civilStatus">
                                                <option value="none">Select Civil Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Seperated">Seperated</option>
                                                <option value="Not Disclosed">Not Disclosed</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="salutation" class="col-form-label fw-bold fs-6">Salutation</label>
                                        <div class="col-lg-12 fv-row" id="salutation">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="salutation">
                                                <option value="none">Select Prefix</option>
                                                <option value="Mr">Mr</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Eng">Eng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="citizenship" class="col-form-label fw-bold fs-6">Citizenship
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="citizenship"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Citizenship">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="occupation" class="col-form-label fw-bold fs-6">Occupation</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="occupation"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Occupation">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="authorizedContactName"
                                            class="col-form-label fw-bold fs-6">Authorized Contact
                                            Person
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="authorizedContactName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="authorizedContact#" class="col-form-label fw-bold fs-6">Authorized
                                            Contact Person #
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="authorizedContact"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Contact Number">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="monthlyIncome" class="col-form-label fw-bold fs-6">Monthly
                                            Income/Salary</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="monthlyIncome"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Monthly Income">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="authorizedContactRelation"
                                            class="col-form-label fw-bold fs-6">Authorized Contact Person Relation
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="authorizedContactRelation"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Relation">
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            
                            <button type="submit" id="editAccountSubmitBtn"
                                class="btn btn-primary font-weight-bold">Edit</button>
                        </div>
                        </form>
                </div>
               
            </div>
        </div>
    </div>
    </div>
    </div>




    <!--start::Include your modals here-->


    <!--start::Include your scripts here-->
    @section('scripts')

    @endsection

    <!--start::Include your styles here-->
    @section('styles')
    <style>
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
    </style>
    @endsection


</x-base-layout>