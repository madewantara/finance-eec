<div>
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
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path
                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-subscription-table-filter="search"
                    class="form-control form-control-solid mw-250px ps-14" wire:model="search"
                    placeholder="Search Account" />
            </div>
            <div class="d-flex align-items-center position-relative my-1 ms-3">
                <select class="form-control form-select-solid form-select" name="pagesize" id="pagesize"
                    wire:model="pagesize">
                    <option value="10" class="form-control form-select form-select-solid fw-bolder" selected>10
                    </option>
                    <option value="25" class="form-control form-select form-select-solid fw-bolder">25</option>
                    <option value="50" class="form-control form-select form-select-solid fw-bolder">50</option>
                    <option value="100" class="form-control form-select form-select-solid fw-bolder">100</option>
                </select>
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="flex-row-fluid justify-content-end gap-5" data-kt-subscription-table-toolbar="base">
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z"
                                    fill="#000000" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Filter
                </button>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Separator-->
                    <!--begin::Content-->
                    <div class="px-7 py-5" data-kt-subscription-table-filter="form">
                        <!--begin::Input group-->
                        <form wire:submit.prevent="submitfiltercategory" autocomplete="off">
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Category:</label><br>
                                <select class="form-control form-select form-select-solid fw-bolder category-filter"
                                    wire:model.defer="filtercategory" data-pharaonic="select2"
                                    data-component-id="{{ $this->id }}" id="filtercategory" name="filtercategory">
                                    <option></option>
                                    @foreach ($category as $c)
                                        <option value="{{ $c->category }}"
                                            class="form-control form-select form-select-solid fw-bolder">
                                            {{ $c->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                    data-kt-menu-dismiss="true" data-kt-subscription-table-filter="reset"
                                    wire:click="resetcategory()">Reset</button>
                                <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true"
                                    data-kt-subscription-table-filter="filter">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Menu 1-->
                <!--end::Filter-->
                <!--begin::Export-->
                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                    data-bs-target="#kt_subscriptions_export_modal">
                    <!--begin::Svg Icon | path: icons/duotone/Files/Export.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <rect fill="#000000" opacity="0.3"
                                    transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000)"
                                    x="11" y="2" width="2" height="12" rx="1" />
                                <path
                                    d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                    fill="#000000" fill-rule="nonzero"
                                    transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000)" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Export
                </button>
                <!--end::Export-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 table-responsive">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                    <th class="min-w-125px">Account Code</th>
                    <th class="min-w-125px">Account Name</th>
                    <th class="min-w-70px">Category</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="text-gray-600 fw-bold">
                @foreach ($account as $acc)
                    <tr>
                        <!--begin::Customer=-->
                        <td>
                            {{ $acc->referral }}
                        </td>
                        <td>
                            {{ $acc->name }}
                        </td>
                        <!--end::Customer=-->
                        <!--begin::Status=-->
                        <td>
                            <div class="badge badge-light-success">{{ $acc->category }}</div>
                        </td>
                        <!--end::Status=-->
                    </tr>
                @endforeach
            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
        <div class="d-flex flex-stack flex-wrap pt-10">
            <div class="fs-6 fw-bold text-gray-700">Showing {{ count($account) }} of
                {{ count($allAccount) }}
                entries
            </div>
            <!--begin::Pages-->
            {{ $account->links() }}
            <!--end::Pages-->
        </div>
    </div>
    <!--end::Card body-->
</div>

@push('js')
    <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.category-filter').select2({
                placeholder: "Select category",
                closeOnSelect: true,
                allowClear: true,
                minimumResultsForSearch: -1,
            });
        });
        $('.category-filter').on("select2:unselect", function(e) {
            if (!e.params.originalEvent) {
                return
            }
            e.params.originalEvent.stopPropagation();
        });
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshFilterCategory', function() {
                $('.category-filter').select2({
                    placeholder: "Select account",
                    closeOnSelect: true,
                    allowClear: true,
                    minimumResultsForSearch: -1,
                });
                $('.category-filter').on("select2:unselect", function(e) {
                    if (!e.params.originalEvent) {
                        return
                    }
                    e.params.originalEvent.stopPropagation();
                });
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 5000);
        document.addEventListener('livewire:load', function(event) {
            @this.on('refreshNotification', function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        });
    </script>
@endpush
