@extends('layouts.app-findiv')

@section('title', 'Add Account | Finance Division')

@section('page-title', 'Account')

@section('sub-page-title', 'Add Account')

@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('layouts.sidebar.sidebar-findiv')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('layouts.header.header-findiv')
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-fluid">
                        <!--begin::Layout-->
                        <!--begin::Content-->
                        <div class="row me-lg-5 order-2 order-lg-1 mb-10 mb-lg-0">
                            <div class="col-lg-4 mt-2">
                                @livewire('filter-create-account')
                            </div>
                            <div class="col-lg-5 mt-2">
                                <!--begin::Card-->
                                <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bolder">Add Account</h2>
                                        </div>
                                        <!--begin::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <form class="form-create" method="POST"
                                            action="{{ route('findiv.account-post') }}" novalidate>
                                            @csrf
                                            <div class="form-group">
                                                <label for="referral"
                                                    class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0">Referral</label>
                                                <input type="text" class="form-control mt-3" value="{{ old('referral') }}"
                                                    name="referral" id="referral" placeholder="12.34(.xx)" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name"
                                                    class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0 mt-5">Name</label>
                                                <input type="text" class="form-control mt-3" value="{{ old('name') }}"
                                                    name="name" id="name" placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="category"
                                                    class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0 mt-5">Category</label>
                                                <label class="text-start text-muted fw-bolder gs-0" for="reminder-category"
                                                    style="font-size: 12px; display:block;">* Please use capital
                                                    letter for each word if
                                                    you add new category.</label>
                                                <select class="form-control form-select mt-3 category" name="category"
                                                    id="category" data-pharaonic="select2">
                                                    <option></option>
                                                    @foreach ($allCategory as $cat)
                                                        <option style="color:#181c32;" value={{ $cat }}>
                                                            {{ preg_replace('/([a-z])([A-Z])/s', '$1 $2', $cat) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit"
                                                        class="btn btn-primary float-right mt-7">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--begin::Sidebar-->
                            <div class="col-lg-3 mt-2">
                                <!--begin::Card-->
                                <div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="invoice"
                                    data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-left="auto"
                                    data-kt-sticky-width="{lg: '405px', lg: '405px'}" data-kt-sticky-top="30px"
                                    data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                                    <div class="card-header pt-7">
                                        <div class="card-title">
                                            <h2 class="fw-bolder">Activity</h2>
                                        </div>
                                    </div>
                                    <!--begin::Card body-->
                                    <div class="card-body p-0 ps-10 pe-10 pb-10">
                                        <div class="scroll-y me-n5 pe-5 h-550px" data-kt-scroll="true"
                                            data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-offset="5px">
                                            <div class="row mt-7">
                                                <div class="col-lg-12">
                                                    <p><i>There are no activities for this account</i></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Sidebar-->
                        </div>
                        <!--end::Content-->
                        <!--end::Layout-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
                @include('layouts.footer.footer-findiv')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
@endsection

@push('js')
    <script src="{{ asset('vendor/pharaonic/pharaonic.select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.category').select2({
                placeholder: "Select category",
                closeOnSelect: true,
                allowClear: true,
            });
        });
    </script>
@endpush
