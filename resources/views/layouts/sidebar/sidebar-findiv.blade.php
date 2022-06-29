<!--begin::Aside-->
<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle" style="background-color: #1b1b28 !important;">
    <!--begin::Brand-->
    <div class="aside-logo py-8" id="kt_aside_logo" style="background-color: #1b1b28 !important;">
        <!--begin::Logo-->
        <a href="{{ route('findiv.dashboard') }}" class="d-flex align-items-center">
            <img alt="Logo" src="{{ asset('assets/image/logo/logo.png') }}" class="h-80px logo" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid" id="kt_aside_menu">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 my-lg-5 pe-lg-n1" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item py-2 text-hover-primary">
                    <a class="menu-link menu-center" href="{{ route('findiv.dashboard') }}" data-bs-trigger="hover"
                        data-bs-dismiss="click" data-bs-placement="right">

                        <span class="menu-icon me-0">
                            <i class="bi bi-house fs-2 @if (Route::currentRouteName() == 'findiv.dashboard') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findiv.dashboard') @yield('active-link') @endif">Dashboard</span>
                    </a>
                </div>
                <div class="menu-item py-2 text-hover-primary">
                    <a class="menu-link menu-center" href="{{ route('findiv.account-index') }}"
                        data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-file-text fs-2 @if (Route::currentRouteName() == 'findiv.account-create' || Route::currentRouteName() == 'findiv.account-index' || Route::currentRouteName() == 'findiv.account-edit') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findiv.account-create' || Route::currentRouteName() == 'findiv.account-index' || Route::currentRouteName() == 'findiv.account-edit') @yield('active-link') @endif">Accounts</span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                    class="menu-item py-2 text-hover-primary">
                    <span class="menu-link menu-center" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-journals fs-2 
                            @if (Route::currentRouteName() == 'findiv.cash-index' || Route::currentRouteName() == 'findiv.cash-create' || Route::currentRouteName() == 'findiv.cash-detail' || Route::currentRouteName() == 'findiv.cash-edit' || Route::currentRouteName() == 'findiv.operational-index' || Route::currentRouteName() == 'findiv.operational-create' || Route::currentRouteName() == 'findiv.operational-detail' || Route::currentRouteName() == 'findiv.operational-edit' || Route::currentRouteName() == 'findiv.escrow-index' || Route::currentRouteName() == 'findiv.escrow-create' || Route::currentRouteName() == 'findiv.escrow-detail' || Route::currentRouteName() == 'findiv.escrow-edit') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findiv.cash-index' || Route::currentRouteName() == 'findiv.cash-create' || Route::currentRouteName() == 'findiv.cash-detail' || Route::currentRouteName() == 'findiv.cash-edit' || Route::currentRouteName() == 'findiv.operational-index' || Route::currentRouteName() == 'findiv.operational-create' || Route::currentRouteName() == 'findiv.operational-detail' || Route::currentRouteName() == 'findiv.operational-edit' || Route::currentRouteName() == 'findiv.escrow-index' || Route::currentRouteName() == 'findiv.escrow-create' || Route::currentRouteName() == 'findiv.escrow-detail' || Route::currentRouteName() == 'findiv.escrow-edit') @yield('active-link') @endif">Journals</span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Journals</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('findiv.cash-index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title @if (Route::currentRouteName() == 'findiv.cash-index' || Route::currentRouteName() == 'findiv.cash-create' || Route::currentRouteName() == 'findiv.cash-detail' || Route::currentRouteName() == 'findiv.cash-edit') text-primary @endif">Cash
                                    Journal</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('findiv.operational-index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title @if (Route::currentRouteName() == 'findiv.operational-index' || Route::currentRouteName() == 'findiv.operational-create' || Route::currentRouteName() == 'findiv.operational-detail' || Route::currentRouteName() == 'findiv.operational-edit') text-primary @endif">Mandiri
                                    Operational Journal</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('findiv.escrow-index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title @if (Route::currentRouteName() == 'findiv.escrow-index' || Route::currentRouteName() == 'findiv.escrow-create' || Route::currentRouteName() == 'findiv.escrow-detail' || Route::currentRouteName() == 'findiv.escrow-edit') text-primary @endif">Mandiri
                                    Escrow Journal</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item py-2 text-hover-primary">
                    <a class="menu-link menu-center" href="{{ route('findiv.project-index') }}"
                        data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-patch-check fs-2 text-hover-primary @if (Route::currentRouteName() == 'findiv.project-index' || Route::currentRouteName() == 'findiv.project-detail') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findiv.project-index' || Route::currentRouteName() == 'findiv.project-detail') @yield('active-link') @endif">Projects</span>
                    </a>
                </div>
                <div class="menu-item py-2 text-hover-primary">
                    <a class="menu-link menu-center" href="{{ route('findiv.report-index') }}" data-bs-trigger="hover"
                        data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-book-half fs-2 text-hover-primary @if (Route::currentRouteName() == 'findiv.report-index' || Route::currentRouteName() == 'findiv.report-detail') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findiv.report-index' || Route::currentRouteName() == 'findiv.report-detail') @yield('active-link') @endif">Reports</span>
                    </a>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btm-sm btn-icon btn-active-color-primary" data-kt-menu-trigger="click"
                data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-kt-menu-flip="top-end"
                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick actions">
                <!--begin::Svg Icon | path: icons/duotone/Communication/Dial-numbers.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                        version="1.1">
                        <rect fill="#000000" opacity="0.3" x="4" y="4" width="4"
                            height="4" rx="2" />
                        <rect fill="#000000" x="4" y="10" width="4" height="4"
                            rx="2" />
                        <rect fill="#000000" x="10" y="4" width="4" height="4"
                            rx="2" />
                        <rect fill="#000000" x="10" y="10" width="4" height="4"
                            rx="2" />
                        <rect fill="#000000" x="16" y="4" width="4" height="4"
                            rx="2" />
                        <rect fill="#000000" x="16" y="10" width="4" height="4"
                            rx="2" />
                        <rect fill="#000000" x="4" y="16" width="4" height="4"
                            rx="2" />
                        <rect fill="#000000" x="10" y="16" width="4" height="4"
                            rx="2" />
                        <rect fill="#000000" x="16" y="16" width="4" height="4"
                            rx="2" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions</div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('findiv.account-create') }}" class="menu-link px-3">New Account</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('findiv.cash-create') }}" class="menu-link px-3">New Cash Transaction</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('findiv.operational-create') }}" class="menu-link px-3">New Mandiri
                        Operational
                        Transaction</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3 mb-2">
                    <a href="{{ route('findiv.escrow-create') }}" class="menu-link px-3">New Mandiri Escrow
                        Transaction</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 2-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
