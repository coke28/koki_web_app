<x-base-layout>
    <div class="card card-custom">
        <div class="card-body">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                <li class="nav-item">
                    <a class="nav-link active fw-bolder text-primary" data-bs-toggle="tab" href="#kt_tab_pane_1">Status
                        </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-primary" data-bs-toggle="tab" href="#kt_tab_pane_2">Account Details</a>
                </li>
              
                @if ($level == 0)
                <li class="nav-item">
                    <a class="nav-link fw-bolder text-danger" id="exitHotLead" href="">Exit
                    </a>
                </li>
                @endif
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                    <form class="form" id="edit_status_form">
                        {{-- <input type="hidden" name="action" value="{{ $action }}"> --}}
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
                                                placeholder="Campaign Name" value="{{ $account->campaignName }}"
                                                readonly>
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
                                                placeholder="Campaign ID" value="{{ $account->campaignID }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="leadStatus" class="col-form-label fw-bold fs-6">Lead Status</label>
                                        <div class="col-lg-12 fv-row" id="leadStatus">
                                            <input type="text" name="leadStatus"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Campaign ID" value="{{ $account->campaignStatus }}"
                                                readonly>
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
                                            <input type="text" name="reason"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Reason Why Application Did Not Proceed To Online">
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

                        <div class="row">
                            <label for="remarkStatus" class="col-form-label fw-bold fs-6">Remark</label>
                            <div class="col-lg-12 fv-row">
                                <textarea style="height:75px;resize:none;" name="remarkStatus"
                                    class="form-control form-control-sm form-control-solid"
                                    placeholder="{{ $account->campaignRemark }}"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">


                        </div>
                       
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="extraField#1" class="col-form-label fw-bold fs-6">Extra
                                        Field#</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="extraField1"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="{{ $account->extraField1 }}" readonly></textarea>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="extraField#2" class="col-form-label fw-bold fs-6">Extra
                                        Field#</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="extraField2"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="{{ $account->extraField2 }}" readonly></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="extraField#3" class="col-form-label fw-bold fs-6">Extra
                                        Field#</label>
                                    <div class="col-lg-12 fv-row">
                                        <textarea style="height:75px;resize:none;" name="extraField3"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="{{ $account->extraField3 }}" readonly></textarea>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="reference" class="col-form-label fw-bold fs-6">Reference</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="reference"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Reference" value="{{ $account->referenceNumber }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="customerName" class="col-form-label fw-bold fs-6">Customer
                                        Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="customerName"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Customer Name" value="{{ $account->origName }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">

                                <div class="col-lg-6">
                                    <label for="creditLimit" class="col-form-label fw-bold fs-6">Credit
                                        Limit</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="creditLimit"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Credit Limit" value="{{ $account->creditLimit }}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="product" class="col-form-label fw-bold fs-6">Product</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="product"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Product" value="{{ $account->product }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="orderNumberUltima" class="col-form-label fw-bold fs-6">Order # from
                                        Ultima </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="orderNumberUltima"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Order # from Ultima" value="{{ $account->orderNumberUltima }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="CCandTransmittalDate" class="col-form-label fw-bold fs-6">CC &
                                        Transmittal Date <span class="text-danger">*</span></label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="CCandTransmittalDate"
                                            class="form-control form-control-sm form-control-solid"
                                            value="{{ $account->transmittalDate }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="globeAccountNumber" class="col-form-label fw-bold fs-6">Globe
                                        Account
                                        #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="globeAccountNumber"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Globe Account #" value="{{ $account->globeAccount }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="salutation" class="col-form-label fw-bold fs-6">Salutation</label>
                                    <div class="col-lg-12 fv-row" id="salutation">
                                        <input type="text" name="salutation"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Salutation" value="{{  $account->salutation }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="gender" class="col-form-label fw-bold fs-6">Gender</label>
                                    <div class="col-lg-12 fv-row" id="add_genderSelParent">
                                        <input type="text" name="gender"
                                            class="form-control form-control-sm form-control-solid" placeholder="gender"
                                            value="{{  $account->gender }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="birthday" class="col-form-label fw-bold fs-6">Birthdate</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" id="addaccountBdate" name="birthday"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Birthday" value="{{$account->birthday}}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="civilStatus" class="col-form-label fw-bold fs-6">Civil
                                        Status</label>
                                    <div class="col-lg-12 fv-row" id="civilStatus">
                                        <input type="text" id="civilStatus" name="civilStatus"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Civil Status" value="{{$account->civilStatus}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="lname" class="col-form-label fw-bold fs-6">Last Name </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="lname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Last Name" value="{{ $account->lastname }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="fname" class="col-form-label fw-bold fs-6">First Name </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="fname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="First Name" value="{{ $account->firstname }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="mname" class="col-form-label fw-bold fs-6">Middle Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="mname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Middle Name" value="{{ $account->middlename }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="motherFname" class="col-form-label fw-bold fs-6">Mother's First Name
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="motherFname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Mother's First Name" value="{{ $account->motherFirstname }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="motherMname" class="col-form-label fw-bold fs-6">Middle
                                        Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="motherMname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Mother's Middle Name" value="{{ $account->motherMiddlename }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="motherLname" class="col-form-label fw-bold fs-6">Mother's Last Name
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="motherLname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Mother's Last Name" value="{{ $account->motherLastname }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="numberOfChildren" class="col-form-label fw-bold fs-6"># of
                                        Children</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="numberOfChildren"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="# of Children" value="{{ $account->NumberOfChildren }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="homeOwnership" class="col-form-label fw-bold fs-6">Home
                                        Ownership</label>
                                    <div class="col-lg-12 fv-row" id="homeOwnership">
                                        <input type="text" name="homeOwnership"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Home Ownership" value="{{ $account->homeOwnership }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="houseBuilding" class="col-form-label fw-bold fs-6">House/Building
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="houseBuilding"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="House/Building" value="{{ $account->addHB }}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="unitNumber" class="col-form-label fw-bold fs-6">Unit # </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="unitNumber"
                                            class="form-control form-control-sm form-control-solid" placeholder="Unit #"
                                            value="{{ $account->addUnit }}" readonly>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">

                                <div class="col-lg-6">
                                    <label for="buildingVillage"
                                        class="col-form-label fw-bold fs-6">Building/Village</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="buildingVillage"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Building/Village" value="{{ $account->addBuilding }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="addressStreet" class="col-form-label fw-bold fs-6">Address Street
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="addressStreet"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Address Street Name" value="{{ $account->addStreet }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="addressBarangay" class="col-form-label fw-bold fs-6">Address
                                        Barangay </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="addressBarangay"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Address Baranagay" value="{{ $account->addBarangay }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="addressCity" class="col-form-label fw-bold fs-6">Address City
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="addressCity"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Address City" value="{{ $account->addCity }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="addressProvince" class="col-form-label fw-bold fs-6">Address
                                        Province </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="addressProvince"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Address Province" value="{{ $account->addProvince }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="addressPostal" class="col-form-label fw-bold fs-6">Address Postal
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="addressPostal"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Address Postal" value="{{ $account->addPostal }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="addressRegion" class="col-form-label fw-bold fs-6">Address
                                        Region</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="addressRegion"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Address Region" value="{{ $account->addressRegion }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="addressRemark" class="col-form-label fw-bold fs-6">Address
                                        Remark</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" style="height:75px;resize:none;" name="addressRemark"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Remark for the Address" value="{{ $account->addressRemark }}"
                                            readonly></input>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="lengthOfStay" class="col-form-label fw-bold fs-6">Length Of
                                        Stay</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="lengthOfStay"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Length Of Stay" value="{{ $account->lengthOfStay }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="landlineContactNumber" class="col-form-label fw-bold fs-6">Landline
                                        #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="landlineContactNumber"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Landline #" value="{{ $account->landlineContact }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="existingMobileNumber" class="col-form-label fw-bold fs-6">Existing
                                        Mobile #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="existingMobileNumber"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Existing Mobile #" value="{{ $account->existingMobile }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="mobileNumber" class="col-form-label fw-bold fs-6">
                                        Mobile #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="mobileNumber"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Mobile #" value="{{ $account->mobileContactNumber }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="email" class="col-form-label fw-bold fs-6">Email</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="email"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="ex. johndoe@hotmail.com" value="{{ $account->email }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="tin" class="col-form-label fw-bold fs-6">TIN</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="tin"
                                            class="form-control form-control-sm form-control-solid" placeholder="TIN"
                                            value="{{ $account->tin }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="GSIS/SSS" class="col-form-label fw-bold fs-6">GSIS/SSS</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="gsiss"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="GSIS/SSS" value="{{ $account->gsiss }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="citizenship" class="col-form-label fw-bold fs-6">Citizenship
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="citizenship"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Citizenship" value="{{ $account->citizenship }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="ifForeign" class="col-form-label fw-bold fs-6">If Foreign
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="ifForeign"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="If Foreign" value="{{ $account->ifForeignCountry }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="spouseLname" class="col-form-label fw-bold fs-6">Spouse's Last Name
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="spouseLname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Spouse's Last Name" value="{{ $account->spousename }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="spouseFname" class="col-form-label fw-bold fs-6">Spouse's First Name
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="spouseFname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Spouse's First Name" value="{{ $account->spouseFirstname }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="spouseMname" class="col-form-label fw-bold fs-6">Middle
                                        Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="spouseMname"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Spouse's Middle Name" value="{{ $account->spouseMiddlename }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="birthdaySpouse" class="col-form-label fw-bold fs-6">Spouse's
                                        Birthdate </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" id="birthdaySpouse" name="birthdaySpouse"
                                            class="form-control form-control-sm form-control-solid"
                                            value="{{ $account->spouseBirthday }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="contactNumberSpouse" class="col-form-label fw-bold fs-6">Spouse's
                                        Contact #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="contactNumberSpouse"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Spouse's Contact #" value="{{ $account->spouseContactNumber }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="officeName" class="col-form-label fw-bold fs-6">Office
                                        Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="officeName"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Office Name" value="{{ $account->officeName }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="officeAddress" class="col-form-label fw-bold fs-6">Office Address w/
                                        Postal Code</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" style="height:75px;resize:none;" name="officeAddress"
                                            class="form-control form-control-sm form-control-solid"
                                            value="{{ $account->officeAddressPostal }}"></input>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="dateOfEmployment" class="col-form-label fw-bold fs-6">Date of
                                        Employment</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="dateOfEmployment"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Date of Employment" value="{{ $account->dateOfemployment }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="officeTelephoneNumber" class="col-form-label fw-bold fs-6">Office
                                        Telephone #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="officeTelephoneNumber"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Office Telephone #"
                                            value="{{ $account->officeTelephoneNumber }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="yearsInCompany" class="col-form-label fw-bold fs-6">Years In
                                        Company</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="yearsInCompany"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Years In Company" value="{{ $account->yearsInCompany }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="occupation" class="col-form-label fw-bold fs-6">Occupation</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="occupation"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Occupation" value="{{ $account->occupation }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="monthlyIncome" class="col-form-label fw-bold fs-6">Monthly
                                        Income/Salary</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="monthlyIncome"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Monthly Income" value="{{ $account->monthlyIncome }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="authorizedContactName" class="col-form-label fw-bold fs-6">Authorized
                                        Contact
                                        Person
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="authorizedContactName"
                                            class="form-control form-control-sm form-control-solid" placeholder="Name"
                                            value="{{ $account->authorizedContactPerson }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="authorizedContactRelation"
                                        class="col-form-label fw-bold fs-6">Authorized Contact Person Relation
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="authorizedContactRelation"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Relation" value="{{ $account->relation }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="authorizedContact#" class="col-form-label fw-bold fs-6">Authorized
                                        Contact Person #
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="authorizedContact"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Contact Number" value="{{ $account->authorizedContactNumber }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="billingType" class="col-form-label fw-bold fs-6">Billing
                                        Type</label>

                                    <div class="col-lg-12 fv-row" id="billingType">
                                        <input type="text" name="billingType"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Billing Type" value="{{ $account->homeOfficePaperless }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="reference" class="col-form-label fw-bold fs-6">Reference ID</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="referenceID"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Reference ID" value="{{ $account->referenceNumber }}" readonly>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="agentName" class="col-form-label fw-bold fs-6">Agent Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="agentName"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Agent Name" value="{{ $account->agentName }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="product" class="col-form-label fw-bold fs-6">Product</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="product"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Product" value="{{ $account->product }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="planType" class="col-form-label fw-bold fs-6">Plan Type</label>

                                    <div class="col-lg-12 fv-row" id="planType">

                                        <input type="text" name="planType"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="planType" value="{{ $account->planType }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="planMSF" class="col-form-label fw-bold fs-6">Plan(MSF)
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="planMSF"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Plan (MSF)" value="{{ $account->planMSF }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="combos" class="col-form-label fw-bold fs-6">
                                        Combos</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="combos"
                                            class="form-control form-control-sm form-control-solid" placeholder="Combos"
                                            value="{{ $account->planCombo }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="addOnBooster" class="col-form-label fw-bold fs-6">Add On(Booster)
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="addOnBooster"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Add On(Booster)" value="{{ $account->planBooster }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="mandatoryBoosterForArrow" class="col-form-label fw-bold fs-6">
                                        Mandatory Booster</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="mandatoryBoosterForArrow"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=" Mandatory Booster For Arrow"
                                            value="{{ $account->mandatoryArrowAddon }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="lifestyleBundle" class="col-form-label fw-bold fs-6">
                                        Lifestyle Bundle</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="lifestyleBundle"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder=" Lifestyle Bundle" value="{{ $account->goSurfBundle }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="arrowBundleFree" class="col-form-label fw-bold fs-6">Arrow
                                        Bundle(Free)
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="arrowBundleFree"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Arrow Bundle(Free)" value="{{ $account->arrowAddon }}"
                                            readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="handset" class="col-form-label fw-bold fs-6">Handset</label>

                                    <div class="col-lg-12 fv-row" id="handset">
                                        <input type="text" name="handset"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="handset" value="{{ $account->handset }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="cashOut" class="col-form-label fw-bold fs-6">
                                        Cash Out</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="cashOut"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Cash Out" value="{{ $account->cashAmount }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="promo" class="col-form-label fw-bold fs-6">Promo
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="promo"
                                            class="form-control form-control-sm form-control-solid" placeholder="Promo"
                                            value="{{ $account->promoPriceBulletin }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="modeOfPayment" class="col-form-label fw-bold fs-6">Mode Of
                                        Payment</label>

                                    <div class="col-lg-12 fv-row" id="modeOfPayment">
                                        <input type="text" name="modeOfPayment"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Mode Of Payment" value="{{ $account->paymentMethod }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="valueAddedService" class="col-form-label fw-bold fs-6">
                                        Added Service</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="valueAddedService"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Value Added Service" value="{{ $account->valueAddedService }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="hbp" class="col-form-label fw-bold fs-6">HBP
                                    </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="hbp"
                                            class="form-control form-control-sm form-control-solid" placeholder="HBP"
                                            value="{{ $account->hbp }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="LockUpPeriod" class="col-form-label fw-bold fs-6">LockUp
                                        Period</label>

                                    <div class="col-lg-12 fv-row" id="LockUpPeriod">

                                        <input type="text" name="LockUpPeriod"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Lockup Period" value="{{ $account->lockupPeriod }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="transmittalType" class="col-form-label fw-bold fs-6">Transmittal
                                        Type</label>

                                    <div class="col-lg-12 fv-row" id="transmittalType">

                                        <input type="text" name="transmittalType"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Transmittal Type" value="{{ $account->transmittalType }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="sourceOfSales" class="col-form-label fw-bold fs-6">Source Of
                                        Sales</label>

                                    <div class="col-lg-12 fv-row" id="sourceOfSales">


                                        <input type="text" name="sourceOfSales"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Source Of Sales" value="{{ $account->sourceOfSales }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="applicationMode" class="col-form-label fw-bold fs-6">Application
                                        Mode</label>

                                    <div class="col-lg-12 fv-row" id="applicationMode">

                                        <input type="text" name="applicationMode"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Application Mode" value="{{ $account->applicationMode }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="remark" class="col-form-label fw-bold fs-6">Remark</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" style="height:75px;resize:none;" name="remark"
                                            class="form-control form-control-sm form-control-solid" placeholder=""
                                            value="{{ $account->remark }}" readonly></input>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="salesmanID" class="col-form-label fw-bold fs-6">Salesman ID</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="salesmanID"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Salesman ID" value="{{ $account->salesmanID }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="salesmanName" class="col-form-label fw-bold fs-6">Salesman
                                        Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="salesmanName"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Salesman Name" value="{{ $account->salesmanName }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="agencyName" class="col-form-label fw-bold fs-6">Agency Name</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="agencyName"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Agency Name" value="{{ $account->agencyName }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="accountManager" class="col-form-label fw-bold fs-6">Account
                                        Manager</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="accountManager"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Account Manager" value="{{ $account->accountManager }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="salesChannel" class="col-form-label fw-bold fs-6">Sales
                                        Channel</label>

                                    <div class="col-lg-12 fv-row" id="salesChannel">

                                        <input type="text" name="salesChannel"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Sales Channel" value="{{ $account->salesChannel }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="projectPromo" class="col-form-label fw-bold fs-6">Project/Promo</label>

                                    <div class="col-lg-12 fv-row" id="projectPromo">



                                        <input type="text" name="projectPromo"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Project Promo" value="{{ $account->projectPromo }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="appsReceivedSource" class="col-form-label fw-bold fs-6">Received
                                        Source</label>

                                    <div class="col-lg-12 fv-row" id="appsReceivedSource">


                                        <input type="text" name="appsReceivedSource"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="appsReceivedSource" value="{{ $account->appReceiveSource }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="timestamp" class="col-form-label fw-bold fs-6">Timestamp</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="timestamp"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Timestamp" value="{{ $currentDatestamp }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="poidType" class="col-form-label fw-bold fs-6">POID Type</label>

                                    <div class="col-lg-12 fv-row" id="poidType">
                                        <input type="text" name="poidType"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="poidType" value="{{ $account->typeOfPOID }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="poidNumber" class="col-form-label fw-bold fs-6">POID #</label>

                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="poidNumber"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="POID #" value="{{ $account->poidNumber }}" readonly>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="docksLink" class="col-form-label fw-bold fs-6">Docs Link</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="docksLink"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="docksLink" value="{{ $account->doculink }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="leadType" class="col-form-label fw-bold fs-6">Lead Type</label>

                                    <div class="col-lg-12 fv-row" id="leadType">


                                        <input type="text" name="leadType"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="leadType" value="{{ $account->leadType }}" readonly>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="salesAgentName" class="col-form-label fw-bold fs-6">Sales Agent
                                        Name</label>

                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="salesAgentName"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Sales Agent Name" value="{{ $account->salesAgentName }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="applicationDate" class="col-form-label fw-bold fs-6">Application
                                        Date</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="applicationDate"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Application Date" value="{{ $account->appDate }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="gcashGUI" class="col-form-label fw-bold fs-6">Gcash GUI</label>

                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="gcashGUI"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Gcash GUI" value="{{ $account->gcashGui }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="eligablePlansFastlane" class="col-form-label fw-bold fs-6">Eligable
                                        Plans Via Fastlane</label>
                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="eligablePlansFastlane"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Eligable Plans Via Fastlane"
                                                value="{{ $account->eviaFastlane }}" readonly>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>



                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="eligablePlansGscore" class="col-form-label fw-bold fs-6">Eligable
                                        Plans Based on GScore</label>
                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="eligablePlansGscore"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Eligable Plans Based on GScore"
                                                value="{{ $account->eplanGscore }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="deliveryAddress" class="col-form-label fw-bold fs-6">Delivery
                                        Address</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="deliveryAddress"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Delivery Address" value="{{ $account->deliveryAddress }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="admin" class="col-form-label fw-bold fs-6">Admin</label>

                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="admin"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Admin" value="{{ $account->sadmin }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="GDFPromo" class="col-form-label fw-bold fs-6">GDF Promo Tag</label>
                                    <div class="col-lg-12 fv-row" id="GDFPromo">

                                        <input type="text" name="GDFPromo"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="GDFPromo" value="{{  $account->gdfPromoTag }}" readonly>



                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="dateCalled" class="col-form-label fw-bold fs-6">Date Called</label>

                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="dateCalled"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Date Called" value="{{ $account->dateCalled }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="dateCompiled" class="col-form-label fw-bold fs-6">Date
                                        Compiled</label>

                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="dateCompiled"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Date Compiled" value="{{ $account->dateCompiled }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="qualified" class="col-form-label fw-bold fs-6">Qualified</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="qualified"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Qualified" value="{{ $account->qualified }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="deliveryZipCode" class="col-form-label fw-bold fs-6">Delivery
                                        Zipcode</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="deliveryZipCode"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Delivery Zipcode" value="{{ $account->deliveryZipCode }}"
                                            readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="andaleArea" class="col-form-label fw-bold fs-6">Andale Area</label>

                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="andaleArea"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Andale Area" value="{{ $account->andaleArea }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="portingNumber" class="col-form-label fw-bold fs-6">Porting #</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="portingNumber"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Porting #" value="{{ $account->portingNumber }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="projectChamomile" class="col-form-label fw-bold fs-6">Project
                                        Chamomile </label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="projectChamomile"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Project Chamomile" value="{{ $account->projectChamomile }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="gadgetCareAmount" class="col-form-label fw-bold fs-6">Gadget Care
                                        Amount</label>

                                    <div class="col-lg-12 fv-row">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="gadgetCareAmount"
                                                class="form-control form-control-sm form-control-solid"
                                                placeholder="Gadget Care Amount"
                                                value="{{ $account->gadgetCareAmount }}" readonly>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="extraFieldEnd1" class="col-form-label fw-bold fs-6">Extra Field
                                        1</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="extraFieldEnd1"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Extra Field 1" value="{{ $account->extraField1 }} " readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="extraFieldEnd2" class="col-form-label fw-bold fs-6">Extra Field
                                        2</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="extraFieldEnd2"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Extra Field 2" value="{{ $account->extraField2 }}" readonly>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row mb-6">

                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="extraFieldEnd3" class="col-form-label fw-bold fs-6">Extra Field
                                        3</label>
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="extraFieldEnd3"
                                            class="form-control form-control-sm form-control-solid"
                                            placeholder="Extra Field 3" value="{{ $account->extraField3 }}" readonly>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @section('scripts')

    <script type="text/javascript" src="{{ "/".'custom/agent/hotLead/hotLeadExitConfirmation.js?v=' . rvndev()->getRandom(30)}}"></script>



    @endsection

    <!--start::Include your styles here-->
    @section('styles') <style>
        .dataTables_wrapper .dataTables_filter {
            display: none;
        }
    </style>
    @endsection
</x-base-layout>