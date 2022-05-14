<!--begin::Aside-->
<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle" style="background-color: #161527 !important;">
    <!--begin::Brand-->
    <div class="aside-logo py-8" id="kt_aside_logo" style="background-color: #161527 !important;">
        <!--begin::Logo-->
        <a href="{{ route('findir.dashboard') }}" class="d-flex align-items-center">
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
                    <a class="menu-link menu-center" href="{{ route('findir.dashboard') }}" data-bs-trigger="hover"
                        data-bs-dismiss="click" data-bs-placement="right">

                        <span class="menu-icon me-0">
                            <i class="bi bi-house fs-2 @if (Route::currentRouteName() == 'findir.dashboard') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findir.dashboard') @yield('active-link') @endif">Dashboard</span>
                    </a>
                </div>
                <div class="menu-item py-2 text-hover-primary">
                    <a class="menu-link menu-center" href="{{ route('findir.account-index') }}"
                        data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-file-text fs-2 @if (Route::currentRouteName() == 'findir.account-index') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findir.account-index') @yield('active-link') @endif">Accounts</span>
                    </a>
                </div>
                <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                    class="menu-item py-2 text-hover-primary">
                    <span class="menu-link menu-center" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-journals fs-2 
                            @if (Route::currentRouteName() == 'findir.cash-index' || Route::currentRouteName() == 'findir.cash-detail' || Route::currentRouteName() == 'findir.operational-index' || Route::currentRouteName() == 'findir.operational-detail' || Route::currentRouteName() == 'findir.escrow-index' || Route::currentRouteName() == 'findir.escrow-detail') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findir.cash-index' || Route::currentRouteName() == 'findir.cash-detail' || Route::currentRouteName() == 'findir.operational-index' || Route::currentRouteName() == 'findir.operational-detail' || Route::currentRouteName() == 'findir.escrow-index' || Route::currentRouteName() == 'findir.escrow-detail') @yield('active-link') @endif">Journals</span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Journals</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('findir.cash-index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title @if (Route::currentRouteName() == 'findir.cash-index' || Route::currentRouteName() == 'findir.cash-detail') text-primary @endif">Cash
                                    Journal</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('findir.operational-index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title @if (Route::currentRouteName() == 'findir.operational-index' || Route::currentRouteName() == 'findir.operational-detail') text-primary @endif">Mandiri
                                    Operational Journal</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{ route('findir.escrow-index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title @if (Route::currentRouteName() == 'findir.escrow-index' || Route::currentRouteName() == 'findir.escrow-detail') text-primary @endif">Mandiri
                                    Escrow Journal</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item py-2 text-hover-primary">
                    <a class="menu-link menu-center" href="{{ route('findir.project-index') }}"
                        data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-patch-check fs-2 text-hover-primary @if (Route::currentRouteName() == 'findir.project-index' || Route::currentRouteName() == 'findir.project-detail') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findir.project-index' || Route::currentRouteName() == 'findir.project-detail') @yield('active-link') @endif">Projects</span>
                    </a>
                </div>
                <div class="menu-item py-2 text-hover-primary">
                    <a class="menu-link menu-center" href="{{ route('findir.report-index') }}" data-bs-trigger="hover"
                        data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-book-half fs-2 text-hover-primary @if (Route::currentRouteName() == 'findir.report-index' || Route::currentRouteName() == 'findir.report-detail') @yield('active-icon') @endif"
                                style="color: #f5f5f58a"></i>
                        </span>
                        <span
                            class="menu-title @if (Route::currentRouteName() == 'findir.report-index' || Route::currentRouteName() == 'findir.report-detail') @yield('active-link') @endif">Reports</span>
                    </a>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>
<!--end::Aside-->
