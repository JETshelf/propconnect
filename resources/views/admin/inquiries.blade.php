@extends('layouts.portal.index')

@section('css_scripts')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Inquiries
                        <small>List of property inquiries</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">

                    {{-- <a href="{{ route('admin.addProperty') }}" class="float-right ml-3">
                        <button class="btn btn-white btn-icon btn-round hidden-sm-down">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </a> --}}


                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li> --}}
                        <li class="breadcrumb-item active">Inquiries</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h4>Inquiries</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.portal.alerts_block')

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table td_2 table-striped table-hover js-basic-example dataTable vcenter">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Property Name</th>
                                            <th>Name</th>
                                            <th>Mobile No.</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            {{-- <th>Actions</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inquiries as $inquiry)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $inquiry->property->property_name }}</td>
                                                <td>{{ $inquiry->name }}</td>
                                                <td>{{ $inquiry->mobile_no }}</td>
                                                <td>{{ $inquiry->email }}</td>
                                                <td>{{ $inquiry->message }}</td>
                                                {{-- <td>
                                                    <!-- View button -->
                                                    <a href="{{ route('admin.viewInquiry', $inquiry->id) }}" class="btn btn-success btn-sm">
                                                        View
                                                    </a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection


@section('js_scripts')
    <script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
@endsection
