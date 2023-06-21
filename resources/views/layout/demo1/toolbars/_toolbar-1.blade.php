<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->

    <div id="kt_toolbar_container"
        class="{{ theme()->printHtmlClasses('toolbar-container', false) }} d-flex flex-stack">
        {{-- @if (theme()->getOption('layout', 'page-title/display') && theme()->getOption('layout', 'header/left') !==
        'page-title')
        {{ theme()->getView('layout/page-title/_default') }}
        @endif --}}

        @if(Route::current()->getName() == 'testing')
        Hello This is testing
        @endif

        @switch(Route::current()->getName())
        @case("admintools.")
        First case...
        @break

        @case("admintools.category")
        <h1>Manage Category</h1>
        @break
       

        @case("admintools.phoneBrand")
        <h1>Manage Phone Brands</h1>
        @break
        @case("admintools.phone")
        <h1>Manage Phones</h1>
        @break

        @case("admintools.user")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('admintools.user') }}" class="pe-3">Manage Users</a></li>
        </ol>
        @break

        @case("admintools.userRole")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('admintools.userRole') }}" class="pe-3">Manage User Role</a></li>
        </ol>
        @break

        @case("admintools.product")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('admintools.product') }}" class="pe-3">Manage Product</a></li>
        </ol>
        @break

        @case("admintools.building")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('admintools.product') }}" class="pe-3">Manage Building</a></li>
        </ol>
        @break

        @case("list.harvest")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('list.harvest') }}" class="pe-3">Harvest List</a></li>
        </ol>
        @break

        @case("list.batch")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('list.harvest') }}" class="pe-3">Harvest List</a></li>
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Batch List</a></li>
        </ol>
        @break

        @case("list.receipt")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('list.receipt') }}" class="pe-3">Receipt List</a></li>
        </ol>
        @break

        @case("list.order")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="{{ route('list.harvest') }}" class="pe-3">Harvest List</a></li>
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Order List</a></li>
        </ol>
        @break


        @case("admintools.client")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/client" class="pe-3">Manage Clients</a></li>
        </ol>
        @break

        @case("admintools.segment")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/segment" class="pe-3">Manage Segment</a></li>
        </ol>
        @break

        @case("admintools.collectionEffort")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/collectionEffort" class="pe-3">Manage Collection Effort</a></li>
        </ol>
        @break

        @case("admintools.transaction")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/transaction" class="pe-3">Manage Transaction</a></li>
        </ol>
        @break

        @case("admintools.placeOfContact")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/placeOfContact" class="pe-3">Manage Place of Contact</a></li>
        </ol>
        @break

        @case("admintools.pointOfContact")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/pointOfContact" class="pe-3">Manage Point of Contact</a></li>
        </ol>
        @break

        @case("admintools.reasonForDenial")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/reasonForDenial" class="pe-3">Manage Reason for Denial</a></li>
        </ol>
        @break

        @case("admintools.area")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Administration Tools</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/admintools/area" class="pe-3">Manage Area</a></li>
        </ol>
        @break

        @case("verify.account")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/verify" class="pe-3">Verify Accounts</a></li>
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3"></a></li>
        </ol>
        @break

        @case("list.lead")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/list/lead" class="pe-3">Manage Leads</a></li>
        </ol>
        @break

        @case("list.campaignList")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/list/campaign" class="pe-3">Manage Campaigns</a></li>
        </ol>
        @break

        @case("list.account")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/list/account" class="pe-3">Manage Accounts</a></li>
        </ol>
        @break

        @case("report.admin")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">List & Reports</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/list/admin" class="pe-3">Generate Report</a></li>
        </ol>
        @break

        @case("misc.upload")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Miscellaneous</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/misc/uploadCSV" class="pe-3">Upload CSV</a></li>
        </ol>
        @break

        @case("misc.auditLog")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Miscellaneous</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/misc/auditLog" class="pe-3">Audit Logs</a></li>
        </ol>
        @break

        @case("misc.campaignUpload")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Miscellaneous</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/misc/campaignUpload" class="pe-3">Campaign Upload Logs</a></li>
        </ol>
        @break

        @case("misc.auditLog")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Miscellaneous</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/misc/auditLog" class="pe-3">Audit Logs</a></li>
        </ol>
        @break
        
        @case("settings.index")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Accounts</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/account/settings" class="pe-3">Settings</a></li>
        </ol>
        @break

        @case("settings.settings")
        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Accounts</a></li>
            <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/account/settings" class="pe-3">s</a></li>
        </ol>
        @break

        
        
        @default

        <ol class="breadcrumb text-muted fs-6 fw-semibold">
            {{-- <li class="breadcrumb-item pe-3"><a href="https://kohkie.rvnsolutions.app/index" class="pe-3">Dashboard</a></li> --}}
            {{-- <li class="breadcrumb-item pe-3"><a href="#" class="pe-3"></a></li> --}}
        </ol>
      
        @endswitch


        {{-- @if (Request::is('admintools/*'))
        {{ theme()->getView('layout/page-title/_default') }}
        ASDASDASD
        @endif --}}

        <!--begin::Actions-->
        {{-- <div class="d-flex align-items-center py-1"> --}}
            <!--begin::Wrapper-->
            {{-- <div class="me-4"> --}}
                <!--begin::Menu-->
                {{-- <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    {!! theme()->getSvgIcon("icons/duotone/Text/Filter.svg", "svg-icon-5 svg-icon-gray-500 me-1") !!}
                    Filter
                </a> --}}
                {{-- {{ theme()->getView('partials/menus/_menu-1') }} --}}
                <!--end::Menu-->
                {{--
            </div> --}}
            <!--end::Wrapper-->

            <!--begin::Wrapper-->
            {{-- <div data-bs-toggle="tooltip" data-bs-placement="left" data-bs-trigger="hover"
                title="Create a new account">
                <a href="#" class="btn btn-sm btn-primary fw-bolder" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_create_account" id="kt_toolbar_create_button">
                    Create
                </a>
            </div> --}}
            <!--end::Wrapper-->
            {{--
        </div> --}}
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->