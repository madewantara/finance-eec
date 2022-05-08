<div class="row">
    @if (Session::has('success'))
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0" style="bottom: 2% !important; right: 1% !important; z-index:2;">
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                    <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path opacity="0.3"
                                d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z"
                                fill="currentColor"></path>
                            <path
                                d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <div>
                        {{ Session::get('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="5px !important;"></button>
                </div>
            </div>
        </div>
    @elseif (Session::has('error'))
        <div class="position-relative">
            <div class="position-fixed bottom-0 end-0" style="bottom: 2% !important; right: 1% !important; z-index:2;">
                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                    <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.4" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"></rect>
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                                fill="currentColor"></rect>
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                                fill="currentColor"></rect>
                        </svg>
                    </span>
                    <div>
                        {{ Session::get('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        style="top:5px;"></button>
                </div>
            </div>
        </div>
    @endif
    <div class="col-lg-6 mt-2">
        <!--begin::Contact group wrapper-->
        <div class="card card-flush" id="kt_contacts_list">
            <!--begin::Card header-->
            <div class="card-header" id="kt_contacts_list_header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2 class="fw-bolder pt-7 pb-2">Category</h2>
                </div>
                <!--begin::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5" id="kt_contacts_list_body">
                <!--begin::List-->
                <div class="scroll-y me-n5 pe-5 h-450px" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}"
                    data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header"
                    data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body"
                    data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main" data-kt-scroll-offset="5px">
                    <!--begin::Category-->
                    <div class="d-flex flex-column gap-5 mb-5">
                        <div class="d-flex flex-stack">
                            <a wire:click="submitfilteraccount('all')"
                                class="fs-6 fw-bolder @if ($this->category == 'all') text-primary @else text-gray-800 @endif text-hover-primary text-active-primary"
                                style="cursor: pointer">All</a>
                            <div class="badge badge-light-primary">{{ $countAccount }}</div>
                        </div>
                    </div>

                    @foreach (array_combine($categories, $countCategory) as $categories => $countCategory)
                        <div class="d-flex flex-column gap-5 mb-5">
                            <div class="d-flex flex-stack">
                                <a wire:click="submitfilteraccount('{{ $categories }}')"
                                    class="fs-6 fw-bolder @if ($this->category == $categories) text-primary @else text-gray-800 @endif text-hover-primary text-active-primary"
                                    active style="cursor: pointer">{{ $categories }}</a>
                                <div class="badge badge-light-primary">{{ $countCategory }}</div>
                            </div>
                        </div>
                    @endforeach
                    <!--end::Category-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Contact group wrapper-->
    </div>
    <div class="col-lg-6 mt-2">
        <!--begin::Card-->
        <div class="card card-flush" id="kt_contacts_list">
            <!--begin::Card header-->
            <div class="card-header pt-7" id="kt_contacts_list_header">
                <!--begin::Icon-->
                <div class="d-flex align-items-center position-relative w-100 m-0">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span
                        class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Input-->
                    <input type="search" class="form-control form-control-solid ps-13" wire:model="search"
                        placeholder="Search category">
                    <!--end::Input-->
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-5" id="kt_contacts_list_body">
                <!--begin::List-->
                <div class="scroll-y me-n5 pe-5 h-550px" data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-offset="5px">
                    @foreach ($accounts as $search)
                        <!--begin::User-->
                        <div class="d-flex flex-stack py-4">
                            <!--begin::Details-->
                            <div class="d-flex align-items-center">
                                <!--begin::Details-->
                                <div class="ms-4">
                                    <a class="fs-6 fw-bolder text-gray-900 text-hover-primary mb-2">{{ $search->referral }}
                                        - {{ $search->name }}</a>
                                    <div class="fw-bold fs-7 text-muted">{{ $search->category }}
                                    </div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::User-->
                        <!--begin::Separator-->
                        <div class="separator separator-dashed d-none"></div>
                        <!--end::Separator-->
                    @endforeach
                </div>
                <!--end::List-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
</div>
