@php
$menu = bootstrap()->getHorizontalMenu();
\App\Core\Adapters\Menu::filterMenuPermissions($menu->items);
@endphp

<!--begin::Menu wrapper-->
<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend"
    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
    <!--begin::Menu-->
    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
        id="#kt_header_menu" data-kt-menu="true">
        {{-- {!! $menu->build() !!} --}}

        @php
        $user_role_id = auth()->user()->user_role_id;
        $user_role = \App\Models\UserRole::where(['id' => $user_role_id])->first();

        @endphp
        {{-- @if ($permission == 2 )
        <div class="menu-item me-lg-1 {{ (request()->is('admintools/category*')) ? 'active' : '' }}">
            <a class="menu-link py-2" href="{{ route(" admintools.category") }}"><span
                    class="menu-title">Dashboard</span></a>
        </div>
        @endif

        @if ($permission == 2 )
        <div class="menu-item me-lg-1 {{ (request()->is('admintools/product*')) ? 'active' : '' }}">
            <a class="menu-link py-2" href="{{ route(" admintools.product") }}"><span
                    class="menu-title">Dashboard2</span></a>
        </div>
        @endif --}}

        <!--begin::Menu-->

        {{-- <div class="menu-item me-lg-1" {{ (request()->is('index')) ? 'active' : '' }}>
            <a class="menu-link py-2" href="{{  route(" home") }}"><span class="menu-title">Dashboard</span></a>
        </div> --}}

        <div class="menu-item me-lg-1 {{ (request()->is('index')) ? 'active' : '' }}">
            <a class="menu-link py-2" href="{{ route("home") }}"><span class="menu-title">Overview</span></a>
        </div>

        {{-- //List and Reports --}}


        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-2">
                <span class="menu-title">List & Reports</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>

            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-150px">

                <!--begin:Row-->
                <div class="row" data-kt-menu-dismiss="true">
                    <!--begin:Col-->
                    <div class="col-lg-4 border-left-lg-1">
                        <div class="menu-inline menu-column menu-active-bg">
                            <div class="menu-item">
                                <a href="{{route('list.harvest')  }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Harvests</span>
                                </a>
                            </div>

                            <div class="menu-item">
                                <a href="{{route('list.receipt')  }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Receipts</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{route('report.admin')  }} " class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Reports</span>
                                </a>
                            </div>


                        </div>
                    </div>

                </div>
                <!--end:Row-->

            </div>

        </div>


        {{-- //Administartion Tools --}}
        @if ($user_role->application_access == 2 )
        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-2">
                <span class="menu-title" {{ (request()->is('admintools/*')) ? 'active' : '' }}>Administration
                    Tools</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>

            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 w-100 w-lg-400px p-5 p-lg-5"
                style="">

                <!--begin:Row-->
                <div class="row" data-kt-menu-dismiss="true">
                    <!--begin:Col-->
                    <div class="col-lg-4 border-left-lg-1">
                        <div class="menu-inline menu-column menu-active-bg">
                            <div class="menu-item">
                                <a href="{{route('admintools.building')  }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Manage Building</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('admintools.product') }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Manage Product</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 border-left-lg-1">
                        <div class="menu-inline menu-column menu-active-bg">
                            <div class="menu-item">
                                <a href="{{ route('admintools.user') }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Manage Users</span>
                                </a>
                            </div>


                          
                        </div>
                    </div>
                    <div class="col-lg-4 border-left-lg-1">
                        <div class="menu-inline menu-column menu-active-bg">
                            <div class="menu-item">
                                <a href="{{route('admintools.userRole')  }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Manage User Role</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:Row-->

            </div>

        </div>
        @endif


        {{-- //Misc --}}

        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
            class="menu-item menu-lg-down-accordion me-lg-1">
            <span class="menu-link py-2">
                <span class="menu-title">Miscellaneous</span>
                <span class="menu-arrow d-lg-none"></span>
            </span>

            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-125px">

                <!--begin:Row-->
                <div class="row" data-kt-menu-dismiss="true">
                    <!--begin:Col-->
                    <div class="col-lg-4 border-left-lg-1">
                        <div class="menu-inline menu-column menu-active-bg">
                            <div class="menu-item">
                                <a href="{{route('misc.upload')  }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Upload CSV</span>
                                </a>
                            </div>

                            {{-- <div class="menu-item">
                                <a href="{{route('misc.qrCode')  }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Generate QR Code</span>
                                </a>
                            </div> --}}
                            {{-- @if ($permission == 2 && auth()->user()->username == "root") --}}
                            <div class="menu-item">
                                <a href="{{route('misc.auditLog')  }}" class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Audit Logs</span>
                                </a>
                            </div>
                            {{-- @endif --}}
                            {{-- @if ($permission == 2 && auth()->user()->username == "root") --}}
                            {{-- <div class="menu-item">
                                <a href="{{url('log/system')  }} " class="menu-link">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Error Logs</span>
                                </a>
                            </div> --}}
                            {{-- @endif --}}


                        </div>
                    </div>

                </div>
                <!--end:Row-->

            </div>

        </div>




    </div>
    <!--end::Menu-->
</div>

<!--end::Menu wrapper-->