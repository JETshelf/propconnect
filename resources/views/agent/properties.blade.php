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
                    <h2>Properties
                        <small>List of properties</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">

                    <a href="{{ route('agent.addProperty') }}" class="float-right ml-3">
                        <button class="btn btn-white btn-icon btn-round hidden-sm-down">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </a>


                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li> --}}
                        <li class="breadcrumb-item active">Properties</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h4>Properties</h4>
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
                                            <th>Property Location</th>
                                            <th>Property Description</th>
                                            <th>Property Type</th>
                                            <th>Price/Rent</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $property)
                                            <tr>
                                                <td>
                                                    <!-- Edit button -->
                                                    <a href="{{ route('agent.viewProperty', $property->id) }}" class="btn btn-success btn-sm">
                                                        View
                                                    </a>

                                                    <!-- Edit button -->
                                                    <a href="{{ route('agent.editProperty', $property->id) }}" class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>

                                                    <!-- Delete button -->
                                                    <form action="{{ route('agent.deleteProperty', $property->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this property?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>

                                                <td>{{ $property->property_name }}</td>
                                                <td>{{ $property->property_location }}</td>
                                                <td>{{ $property->property_description }}</td>
                                                <td>{{ $property->property_type }}</td>
                                                <td>{{ $property->price_rent }}</td>

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
