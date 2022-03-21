@extends('layouts.app-findiv')

@section('title', 'Edit Account | Finance Division')

@section('page-title', 'Account')

@section('sub-page-title', 'Edit Account')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endpush

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
                    <div id="kt_content_container" class="container">
                        <!--begin::Layout-->
                        <!--begin::Content-->
                        <div class="row me-lg-5 order-2 order-lg-1 mb-10 mb-lg-0">
                            <div class="col-md-4 col-lg-3 col-xl-3 mt-2">
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
                                        <div class="scroll-y me-n5 pe-5 h-300px h-xl-auto" data-kt-scroll="true"
                                            data-kt-scroll-activate="{default: false, lg: true}"
                                            data-kt-scroll-max-height="auto"
                                            data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_contacts_list_header"
                                            data-kt-scroll-wrappers="#kt_content, #kt_contacts_list_body"
                                            data-kt-scroll-stretch="#kt_contacts_list, #kt_contacts_main"
                                            data-kt-scroll-offset="5px" style="max-height: 800px;">
                                            <!--begin::Category-->
                                            <div class="d-flex flex-column gap-5 mb-5">
                                                <div class="d-flex flex-stack">
                                                    <form id="formFilterAll"
                                                        class="d-flex align-items-center position-relative w-100 m-0"
                                                        autocomplete="off" action="" method="GET" role="search">
                                                        <a href="javascript:{}"
                                                            onclick="document.getElementById('formFilterAll').submit()"
                                                            class="fs-6 fw-bolder @if ($filter == '') text-primary @else text-gray-800 @endif text-hover-primary text-active-primary">
                                                            <input type="hidden" name="filter" id="filter"
                                                                class="form-control" value="">All</a>
                                                    </form>
                                                    <div class="badge badge-light-primary">{{ $countAccount }}</div>
                                                </div>
                                            </div>
                                            @foreach (array_combine($category, $countCategory) as $category => $countCategory)
                                                <div class="d-flex flex-column gap-5 mb-5">
                                                    <div class="d-flex flex-stack">
                                                        <form id="formFilter{{ $category }}"
                                                            class="d-flex align-items-center position-relative w-100 m-0"
                                                            autocomplete="off" action="" method="GET" role="search">
                                                            <a href="javascript:{}"
                                                                onclick="document.getElementById('formFilter{{ $category }}').submit()"
                                                                class="fs-6 fw-bolder @if ($filter == $category) text-primary @else text-gray-800 @endif text-hover-primary text-active-primary"
                                                                active>
                                                                <input type="hidden" name="filter" id="filter"
                                                                    class="form-control"
                                                                    value="{{ $category }}">{{ $category }}</a>
                                                        </form>
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
                            @livewire('filter-create-account', ['filter' => $filter])
                            <div class="col-md-4 col-lg-6 col-xl-6 mt-2">
                                <!--begin::Card-->
                                <div class="card card-flush pt-3 mb-5 mb-lg-10">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bolder">Edit Account</h2>
                                        </div>
                                        <!--begin::Card title-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <form class="form-create" method="POST"
                                            action="{{ route('findiv.account-update', ['uuid' => $uuid]) }}" novalidate>
                                            @csrf
                                            <div class="form-group">
                                                <label for="referral"
                                                    class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0">Referral</label>
                                                <input type="text" class="form-control mt-3"
                                                    value="{{ $data[0]->referral }}" name="referral" id="referral"
                                                    placeholder="12.34(.xx)" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name"
                                                    class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0 mt-5">Name</label>
                                                <input type="text" class="form-control mt-3" value="{{ $data[0]->name }}"
                                                    name="name" id="name" placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="category"
                                                    class="text-start text-muted fw-bolder fs-6 text-uppercase gs-0 mt-5">Category</label>
                                                <label class="text-start text-muted fw-bolder gs-0" for="reminder-category"
                                                    style="font-size: 12px; display:block;">* Please use capital
                                                    letter for each word if
                                                    you add new category.</label>
                                                <select class="form-control form-select mt-3" name="category" id="category"
                                                    style="width:100%;">
                                                    <option style="color:#181c32;" value="" disabled>-- Choose category --
                                                    </option>
                                                    @foreach ($allCategory as $cat)
                                                        <option style="color:#181c32;" value={{ $cat }}
                                                            @if (preg_replace('/([a-z])([A-Z])/s', '$1 $2', $cat) == $data[0]->category) selected @endif>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script>
        $("#category").select2({
            placeholder: "-- Select Category --",
            tags: true,
            width: 'resolve'
        });
    </script>
@endpush
