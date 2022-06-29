<!--begin::Header-->
<div id="kt_header" class="header align-items-stretch bg-white">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n1 me-2" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                <span class="svg-icon svg-icon-2x mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <rect fill="#000000" x="4" y="5" width="16" height="3"
                                rx="1.5" />
                            <path
                                d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                fill="#000000" opacity="0.3" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('findir.dashboard') }}" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/image/logo/logo.png') }}" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <!--begin::Menu wrapper-->
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <!--begin::Menu-->
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">
                        <div class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{ route('findir.dashboard') }}">
                                <span
                                    class="menu-title @if (Route::currentRouteName() == 'findir.dashboard') text-primary fw-bolder @endif">Dashboard</span>
                            </a>
                        </div>
                        <div class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{ route('findir.account-index') }}">
                                <span
                                    class="menu-title @if (Route::currentRouteName() == 'findir.account-index') text-primary fw-bolder @endif">Accounts</span>
                            </a>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span
                                    class="menu-title @if (Route::currentRouteName() == 'findir.cash-index' || Route::currentRouteName() == 'findir.cash-detail' || Route::currentRouteName() == 'findir.operational-index' || Route::currentRouteName() == 'findir.operational-detail' || Route::currentRouteName() == 'findir.escrow-index' || Route::currentRouteName() == 'findir.escrow-detail') text-primary fw-bolder @endif">Journals</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="{{ route('findir.cash-index') }}"
                                        title="Manage all transaction on Cash" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon">
                                            <i class="bi bi-dot fs-3"></i>
                                        </span>
                                        <span
                                            class="menu-title @if (Route::currentRouteName() == 'findir.cash-index' || Route::currentRouteName() == 'findir.cash-detail') text-primary @endif">Cash
                                            Journal</span>
                                    </a>
                                    <a class="menu-link py-3" href="{{ route('findir.operational-index') }}"
                                        title="Manage all transaction on Mandiri Operational" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon">
                                            <i class="bi bi-dot fs-3"></i>
                                        </span>
                                        <span
                                            class="menu-title @if (Route::currentRouteName() == 'findir.operational-index' || Route::currentRouteName() == 'findir.operational-detail') text-primary @endif ">Mandiri
                                            Operational Journal</span>
                                    </a>
                                    <a class="menu-link py-3" href="{{ route('findir.escrow-index') }}"
                                        title="Manage all transaction on Mandiri Escrow" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                        <span class="menu-icon">
                                            <i class="bi bi-dot fs-3"></i>
                                        </span>
                                        <span
                                            class="menu-title @if (Route::currentRouteName() == 'findir.escrow-index' || Route::currentRouteName() == 'findir.escrow-detail') text-primary @endif">Mandiri
                                            Escrow Journal</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{ route('findir.project-index') }}">
                                <span
                                    class="menu-title @if (Route::currentRouteName() == 'findir.project-index' || Route::currentRouteName() == 'findir.project-detail') text-primary fw-bolder @endif">Projects</span>
                            </a>
                        </div>
                        <div class="menu-item menu-lg-down-accordion me-lg-1">
                            <a class="menu-link py-3" href="{{ route('findir.report-index') }}">
                                <span
                                    class="menu-title @if (Route::currentRouteName() == 'findir.report-index' || Route::currentRouteName() == 'findir.report-detail') text-primary fw-bolder @endif">Reports</span>
                            </a>
                        </div>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Menu wrapper-->
            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <!--begin::Toolbar wrapper-->
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <div class="d-flex align-items-center">
                        <!--begin::Menu- wrapper-->
                        <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px position-relative pulse pulse-primary"
                            data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                            data-kt-menu-placement="bottom-end" data-bs-toggle="tooltip" data-bs-trigger="hover"
                            data-bs-placement="bottom" title="Activity Logs">
                            <div class="numberNotif">{{ count($notification) }}</div>
                            <span class="pulse-ring w-45px h-45px"></span>
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px"
                            data-kt-menu="true" style="">
                            <!--begin::Heading-->
                            <div class="d-flex flex-column bgi-no-repeat rounded-top"
                                style="background-image:url('{{ asset('assets/image/random/notification.jpg') }}')">
                                <!--begin::Title-->
                                <h3 class="text-white fw-bold px-9 mt-10">Activity Logs
                                    <span class="fs-8 opacity-75 ps-3">{{ count($notification) }} activity</span>
                                </h3>
                                <div class="text-white px-9 mb-6 mt-1 fs-8 mb-10 opacity-75 fst-italic">For the last 7
                                    days
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Tab content-->
                            <div class="tab-content">
                                <!--begin::Items-->
                                <div class="scroll-y mh-325px my-5 px-8">
                                    @if (count($notification) == 0)
                                        <div class="row py-4">
                                            <div class="col-lg-12 text-center">
                                                <div class="text-muted fst-italic">
                                                    There are no activities
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($notification as $n)
                                            <!--begin::Item-->
                                            <div class="row py-4">
                                                <div class="col-lg-8">
                                                    <!--begin::Section-->
                                                    <div class="row align-items-center me-2">
                                                        <div class="col-lg-3">
                                                            <div class="symbol-group symbol-hover me-3">
                                                                <!--begin::User-->
                                                                <div class="symbol symbol-35px symbol-circle"
                                                                    data-bs-toggle="tooltip"
                                                                    title="{{ $n['user']['fullname'] }}"
                                                                    data-bs-original-title="{{ $n['user']['fullname'] }}">
                                                                    <img class="img img-fluid"
                                                                        src="{{ $n['user']['avatar'] }}"
                                                                        alt="image"
                                                                        style="max-width: 100%; height:auto;">
                                                                </div>
                                                                <!--end::User-->
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            @if ($n['category'] == 'cash')
                                                                @if ($n['status'] == 1)
                                                                    <!--begin::Title-->
                                                                    <span class="text-gray-800">
                                                                        This
                                                                        <a href="{{ route('findir.cash-detail', ['uuid' => $n['uuid']]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">
                                                                            #{{ $n['token'] }}</a>
                                                                        cash transaction need approval.
                                                                    </span>
                                                                    <!--end::Title-->
                                                                @elseif ($n['status'] == 4)
                                                                    <!--begin::Title-->
                                                                    <span class="text-gray-800">
                                                                        This
                                                                        <a href="{{ route('findir.cash-detail', ['uuid' => $n['uuid']]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">
                                                                            #{{ $n['token'] }}</a>
                                                                        cash transaction has been paid.
                                                                    </span>
                                                                    <!--end::Title-->
                                                                @endif
                                                            @elseif ($n['category'] == 'operational')
                                                                @if ($n['status'] == 1)
                                                                    <!--begin::Title-->
                                                                    <span class="text-gray-800">
                                                                        This
                                                                        <a href="{{ route('findir.operational-detail', ['uuid' => $n['uuid']]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">
                                                                            #{{ $n['token'] }}</a>
                                                                        operational transaction need approval.
                                                                    </span>
                                                                    <!--end::Title-->
                                                                @elseif ($n['status'] == 4)
                                                                    <!--begin::Title-->
                                                                    <span class="text-gray-800">
                                                                        This
                                                                        <a href="{{ route('findir.operational-detail', ['uuid' => $n['uuid']]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">
                                                                            #{{ $n['token'] }}</a>
                                                                        operational transaction has been paid.
                                                                    </span>
                                                                    <!--end::Title-->
                                                                @endif
                                                            @else
                                                                @if ($n['status'] == 1)
                                                                    <!--begin::Title-->
                                                                    <span class="text-gray-800">
                                                                        This
                                                                        <a href="{{ route('findir.escrow-detail', ['uuid' => $n['uuid']]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">
                                                                            #{{ $n['token'] }}</a>
                                                                        escrow transaction need approval.
                                                                    </span>
                                                                    <!--end::Title-->
                                                                @elseif ($n['status'] == 4)
                                                                    <!--begin::Title-->
                                                                    <span class="text-gray-800">
                                                                        This
                                                                        <a href="{{ route('findir.escrow-detail', ['uuid' => $n['uuid']]) }}"
                                                                            class="text-hover-primary"
                                                                            style="color: #009ef7e0">
                                                                            #{{ $n['token'] }}</a>
                                                                        escrow transaction has been paid.
                                                                    </span>
                                                                    <!--end::Title-->
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <div class="col-lg-4">
                                                    <!--begin::Label-->
                                                    <span
                                                        class="badge badge-light fs-8">{{ $n['updated_at']->format('F, jS Y') }}<br>{{ $n['updated_at']->format('h:i A') }}</span>
                                                    <!--end::Label-->
                                                </div>
                                            </div>
                                            <!--end::Item-->
                                        @endforeach
                                    @endif
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Tab content-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--begin::User-->
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                            data-kt-menu-flip="bottom">
                            <img src="{{ $dataUser['avatar'] }}" alt="Avatar" />
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Avatar" src="{{ $dataUser['avatar'] }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                            {{ $dataUser['nickname'] }}
                                            <span
                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ $dataUser['Contracts'][0]['Position']['title'] }}</span>
                                        </div>
                                        <span
                                            class="fw-bold text-muted text-hover-primary fs-7">{{ $dataUser['User']['email'] }}</span>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{ route('findir.profile') }}" class="menu-link px-5">My Profile</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="javascript:void" onclick="$('#logout-form').submit();"
                                    class="menu-link px-5">Sign Out</a>
                                <form class="form-create" id="logout-form" method="POST"
                                    action="{{ route('logout') }}" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                    <!--begin::Heaeder menu toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-2" title="Show header menu">
                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-40px h-md-40px"
                            id="kt_header_menu_mobile_toggle">
                            <!--begin::Svg Icon | path: icons/duotone/Text/Toggle-Right.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z"
                                            fill="black" />
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z"
                                            fill="black" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Heaeder menu toggle-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
<!--begin::Toolbar-->
<div class="toolbar py-2 bg-white mt-1" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center pt-1 pb-1">
        <!--begin::Page title-->
        <div class="flex-grow-1 flex-shrink-0 me-5">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">@yield('page-title')</h1>
                <!--end::Title-->
                <!--begin::Separator-->
                <span class="h-20px border-gray-200 border-start mx-3"></span>
                <!--end::Separator-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('findir.dashboard') }}"
                            class="text-muted text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    @if (Route::currentRouteName() != 'findir.dashboard')
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">@yield('page-title')</li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-200 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-dark">@yield('sub-page-title')</li>
                        <!--end::Item-->
                    @endif
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Page title-->
    </div>
    <!--end::Container-->
</div>
<!--end::Toolbar-->
