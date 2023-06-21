<x-base-layout>
    @section('styles')
    <style>
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }

        .ldCallBtn{
          padding:20px;
          font-size:20px;

          transition: background-color 1s, width 1s;
        }
    </style>
    @endsection
    <button type="button" data-callnumber="{{ $lead->mobileNumber }}" id="startCallBtn" class="btn btn-lg btn-block btn-success w-100 ldCallBtn">
      <i class="bi bi-telephone" style="font-size:20px"></i>
      <span id="callBtnDesc">Start Call</span>
    </button>

    <div class="card card-custom mt-5">
        <div class="card-body">
            {{-- begin:: Navigation --}}
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
                @if ($level == 2)
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-danger" id="exitLead" href="">Exit
                    </a>
                </li>
                @endif

                @if ($level == 0)
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-danger" id="exitLeadAgent" href="">Exit
                    </a>
                </li>
                @endif
            </ul>
            {{-- end:: Navigation --}}

            <div class="tab-content" id="productsTabContent">
                <div class="tab-pane fade show active" id="history_tab" role="tabpanel">
                    <!--begin::Wrapper-->
                    <div class="d-flex justify-content-end mb-5">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-absolute my-1 mb-2 mb-md-0">
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
                                <th>ID</th>
                                <th>Action</th>
                                <th>Agent</th>
                                <th>Full Name</th>
                                <th>Date</th>
                                <th>Mobile Number</th>
                                <th>Campaign Status</th>
                                <th>Campaign ID</th>
                                <th>Campaign Name</th>
                                <th>IP Address</th>
                                <th>Call Duration</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-bold">
                        </tbody>
                    </table>
                    <!--end::Datatable-->
                </div>
                {{-- begin:: Status Form  --}}
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
                        {{-- <input type ="hidden" name="action" value="{{ $action }}"> --}}
                        <div class="row mb-12">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="agentName" class="col-form-label fw-bold fs-6">Agent Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="agentName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Agent Name" value="{{ " $agent->first_name"." ".
                                            "$agent->middle_name" ." ". "$agent->last_name" }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="campaignName" class="col-form-label fw-bold fs-6">Campaign Name
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="campaignName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Campaign Name" value="{{ $lead->campaignName }}" readonly>
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
                                                placeholder="Campaign ID" value="{{ $lead->campaignID }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="leadStatus" class="col-form-label fw-bold fs-6">Status</label>
                                        <div class="col-lg-12 fv-row" id="leadStatus">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="leadStatus">
                                                <option value="">{{ "Select A Status" }}</option>
                                                @foreach ( $status as $status )
                                                <option value="{{ $status->statusName }}">{{ $status->statusName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row mb-12">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="reason" class="col-form-label fw-bold fs-6">Reason for
                                            Denial</label>
                                        <div class="col-lg-12 fv-row">
                                            <select type="text" name="reason"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Reason Why Application Did Not Proceed To Online">
                                                @foreach ( $reasonForDenials as $reasonForDenial )
                                                <option value="{{ $reasonForDenial->statusName }}">{{ $reasonForDenial->statusName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="dateStamp" class="col-form-label fw-bold fs-6">Date Stamp</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="dateStamp"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Date Stamp" value="{{ $currentDatestamp }}" readonly>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
                                <label for="remarkStatus" class="col-form-label fw-bold fs-6">Remark for Status</label>
                                <div class="col-lg-12 fv-row">
                                    <textarea style="height:75px;resize:none;" name="remarkStatus"
                                        class="form-control form-control-sm form-control-solid"
                                        placeholder="{{ $lead->remarkStatus }}">{{ $lead->remarkStatus }}</textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="note" class="col-form-label fw-bold fs-6">Notes</label>
                                <div class="col-lg-12 fv-row">
                                    <textarea style="height:75px;resize:none;" name="note"
                                        class="form-control form-control-sm form-control-solid"
                                        placeholder="{{ $lead->notes }}">{{ $lead->notes }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" id="editStatusSubmitBtn"
                                class="btn btn-primary font-weight-bold">Edit</button>
                        </div>
                    {{-- </form> --}}

                </div>
                {{-- end:: Status Form  --}}
                <div class="tab-pane fade " id="accountDetail_tab" role="tabpanel">
                    {{-- <form class="form" id="edit_accountDetail_form"> --}}
                        <div class="row mb-5">

                            <div class="col-6">
                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">Account Details</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="segment" class="col-form-label fw-bold fs-6">Segment</label>
                                        <div class="col-lg-12 fv-row" id="segment">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="segment">

                                                @foreach ($segments as $segment)
                                                <option value="{{ $segment->statusName }}" {{ ( $segment->statusName == $selectedSegment) ? 'selected' : '' }}> {{ $segment->statusName }} </option>
                                                 @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <label for="accountNumber" class="col-form-label fw-bold fs-6">Account Number</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="accountNumber"
                                                class="form-control form-control-sm form-control-solid" value ="{{ $lead->accountNumber }}"
                                                placeholder="Account Number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="collectionEffort" class="col-form-label fw-bold fs-6">Collection Effort</label>
                                        <div class="col-lg-12 fv-row" id="collectionEffort">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="collectionEffort">
                                                @foreach ( $collectionEfforts as $collectionEffort )
                                                <option value="{{ $collectionEffort->statusName }}">{{ $collectionEffort->statusName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="transaction" class="col-form-label fw-bold fs-6">Transaction</label>
                                        <div class="col-lg-12 fv-row" id="transaction">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="transaction">
                                                @foreach ( $transactions as $transaction )
                                                <option value="{{ $transaction->statusName }}">{{ $transaction->statusName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                       <div class="col-lg-6">
                                        <label for="placeOfContact" class="col-form-label fw-bold fs-6">Place Of Contact</label>
                                        <div class="col-lg-12 fv-row" id="placeOfContact">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="placeOfContact">
                                                @foreach ( $placeOfContacts as $placeOfContact )
                                                <option value="{{ $placeOfContact->statusDefinition }}">{{ $placeOfContact->statusDefinition }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="pointOfContact" class="col-form-label fw-bold fs-6">Point Of Contact</label>
                                        <div class="col-lg-12 fv-row" id="pointOfContact">
                                            <select class="form-select form-select-sm form-select-solid"
                                                name="pointOfContact">
                                                @foreach ( $pointOfContacts as $pointOfContact )
                                                <option value="{{ $pointOfContact->statusName }}">{{ $pointOfContact->statusName }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="endoDate" class="col-form-label fw-bold fs-6">Endo Date </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="endoDate"
                                                class="form-control form-control-sm form-control-solid" value ="{{ $lead->endoDate }}" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="pullOutDate" class="col-form-label fw-bold fs-6">Pull Out Date</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="pullOutDate"
                                                class="form-control form-control-sm form-control-solid" value ="{{ $lead->pullOutDate }}" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="writeOffDate" class="col-form-label fw-bold fs-6"> Write Off Date</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="writeOffDate"
                                                class="form-control form-control-sm form-control-solid" value ="{{ $lead->writeOffDate }}" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <label for="activationDate" class="col-form-label fw-bold fs-6"> Activation Date</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="activationDate"
                                                class="form-control form-control-sm form-control-solid" value ="{{ $lead->activationDate }}" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="originalBalance" class="col-form-label fw-bold fs-6">
                                            Original Balance
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="originalBalance"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->originalBalance }}" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="principalBalance" class="col-form-label fw-bold fs-6">
                                            Principal Balance
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="principalBalance"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->principalBalance }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label for="penalties" class="col-form-label fw-bold fs-6">
                                            Penalties For Account

                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="penalties"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->penalties }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="totalAmountDue" class="col-form-label fw-bold fs-6">
                                            Total Amount Due
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="totalAmountDue"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->totalAmountDue }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="lastPaymentDate" class="col-form-label fw-bold fs-6">
                                            Last Payment Date
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="lastPaymentDate"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->lastPaymentDate }}" >
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="lastPaymentAmount" class="col-form-label fw-bold fs-6">
                                            Last Payment Amount
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="lastPaymentAmount"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->lastPaymentAmount }}">
                                        </div>
                                    </div>
                                </div>
                            <hr>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <p class="text-primary fs-2 fw-bold mb-0">Addressess</p>
                                </div>
                            </div>

                            <div class="row">
                                <label for="homeAddress" class="col-form-label fw-bold fs-6">Home
                                    Address</label>
                                <div class="col-lg-12 fv-row">
                                    <textarea style="height:75px;resize:none;" name="homeAddress"
                                        class="form-control form-control-sm form-control-solid"
                                        value ="{{ $lead->homeAddress }}"  placeholder="">{{ $lead->homeAddress }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="companyName" class="col-form-label fw-bold fs-6">Company
                                        Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="companyName"
                                            class="form-control form-control-sm form-control-solid"
                                            value ="{{ $lead->companyName }}" placeholder="Company Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label for="companyAddress" class="col-form-label fw-bold fs-6">Office
                                    Address /  Business Address</label>
                                <div class="col-lg-12 fv-row">
                                    <textarea style="height:75px;resize:none;" name="companyAddress"
                                        class="form-control form-control-sm form-control-solid"
                                        value ="{{ $lead->CEAddressBusinessAddress }}"  placeholder="">{{ $lead->CEAddressBusinessAddress }}</textarea>
                                </div>
                            </div>
                            <hr>
                            </div>
                            <div class="col-6">

                                <div class="row mb-2">
                                    <div class="col-lg-12">
                                        <p class="text-primary fs-2 fw-bold mb-0">Debtor Details</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="firstName" class="col-form-label fw-bold fs-6"> First Name </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="firstName"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->firstname }}" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="middleName" class="col-form-label fw-bold fs-6"> Middle Name</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="middleName"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->middlename }}" placeholder="Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="lastName" class="col-form-label fw-bold fs-6"> Last Name </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="lastName"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->lastname }}" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="dateOfBirth" class="col-form-label fw-bold fs-6"> Date of Birth </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="dateOfBirth"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->dateOfBirth }}" placeholder="Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="civilStatus" class="col-form-label fw-bold fs-6"> Civil Status </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="civilStatus"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->civilStatus }}" placeholder="Civil Status">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="email" class="col-form-label fw-bold fs-6">Email Address</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="email"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->emailAddress }}" placeholder="ex. johndoe@hotmail.com">
                                        </div>
                                    </div>
                                </div>
                                {{-- NUMBERS --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="mobileNumber" class="col-form-label fw-bold fs-6">Cellphone Number</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="mobileNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->mobileNumber }}" placeholder="Cellphone">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="homeNumber" class="col-form-label fw-bold fs-6">Home Number</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="homeNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->homeNumber }}" placeholder="Home Number">
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <label for="officeNumber" class="col-form-label fw-bold fs-6">Office Number</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="officeNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->officeNumber }}" placeholder="Office Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="otherContact1" class="col-form-label fw-bold fs-6">Other Contact 1</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="otherContact1"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->otherContact1 }}" placeholder="Other Contact 1">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="otherContact2" class="col-form-label fw-bold fs-6">Other Contact 2</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="otherContact2"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->otherContact2 }}" placeholder="Other Contact 2">
                                        </div>

                                    </div>
                                    <div class="col-lg-4" >
                                        <label for="otherContact3" class="col-form-label fw-bold fs-6">Other Contact 3</label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="otherContact3"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->otherContact3 }}" placeholder="Other Contact 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="autoloanCarInfo" class="col-form-label fw-bold fs-6">Autoloan /
                                            Car Info
                                        </label>
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="autoloanCarInfo"
                                                class="form-control form-control-sm form-control-solid"
                                                value ="{{ $lead->autoloanCarInfo }}" placeholder="Company Name">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                {{-- Addresses :: Right Column --}}
                                <div class="row mt-5" >
                                    <label for="otherAddress1" class="col-form-label fw-bold fs-6">Other Address 1</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:88px;resize:none;" name="otherAddress1"
                                            class="form-control form-control-sm form-control-solid"
                                            value ="{{ $lead->otherAddress1 }}" placeholder="">{{ $lead->otherAddress1 }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="otherAddress2" class="col-form-label fw-bold fs-6">Other Address 2</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:88px;resize:none;" name="otherAddress2"
                                            class="form-control form-control-sm form-control-solid"
                                            value ="{{ $lead->otherAddress2 }}" placeholder="">{{ $lead->otherAddress2 }}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-5">
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <label for="area" class="col-form-label fw-bold fs-6">Area</label>
                                            <div class="col-lg-12 fv-row" id="area">
                                                <select class="form-select form-select-sm form-select-solid"
                                                    name="area">
                                                    @foreach ($areas as $area)
                                                    <option value="{{ $area->statusName }}" {{ ( $area->statusName == $lead->area) ? 'selected' : '' }}> {{ $area->statusName }} </option>
                                                     @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-5">
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row mb-1 mt-1">
                                        <div class="col-lg-12">
                                            <p class="text-primary fs-2 fw-bold mb-0">Other Details</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="motherMaidenName" class="col-form-label fw-bold fs-6">Mother's Maiden Name</label>
                                            <div class="col-lg-12 fv-row">
                                                <input type="text" name="motherMaidenName"
                                                    class="form-control form-control-sm form-control-solid"
                                                    value ="{{ $lead->motherMaidenName }}" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">

                            {{-- <button type="submit" id="editStatusSubmitBtn"
                                class="btn btn-primary font-weight-bold">Edit</button> --}}
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



</x-base-layout>
