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
                    <h2>Agents
                        <small>List of agents</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">

                    <a href="{{ route('admin.addAgent') }}" class="float-right ml-3">
                        <button class="btn btn-white btn-icon btn-round hidden-sm-down">
                            <i class="zmdi zmdi-plus"></i>
                        </button>
                    </a>


                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li> --}}
                        <li class="breadcrumb-item active">Agents</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h4>Agents</h4>
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
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Identification</th>
                                            <th>Zip Code</th>
                                            <th>Agency Name</th>
                                            <th>Agency Phone Number</th>
                                            <th>Agency Email</th>
                                            <th>Agency Address</th>
                                            <th>Agency License</th>
                                            <th>Years of Experience</th>
                                            <th>Background Check</th>
                                            <th>Compliance Documentation</th>
                                            <th>Terms Accepted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($agents as $agent)
                                            <tr>
                                                <td>
                                                    <!-- Edit button -->
                                                    <a href="{{ route('admin.editAgent', $agent->id) }}" class="btn btn-primary btn-sm">
                                                        Edit
                                                    </a>

                                                    <!-- Delete button -->
                                                    <form action="{{ route('admin.deleteAgent', $agent->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this agent?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>

                                                <td><img src="{{ asset('storage/' .$agent->photo->image_path) }}" class="rounded-circle" alt="profile-image"></td>

                                                <td>

                                                    {{ $agent->full_name }}
                                                </td>
                                                <td>{{ $agent->phone_number }}</td>
                                                <td>{{ $agent->email }}</td>
                                                <td>{{ $agent->address }}</td>
                                                <td>{{ $agent->identification }}</td>
                                                <td>{{ $agent->zip_code }}</td>
                                                <td>{{ $agent->agency_name }}</td>
                                                <td>{{ $agent->agency_phone_number }}</td>
                                                <td>{{ $agent->agency_email }}</td>
                                                <td>{{ $agent->agency_address }}</td>
                                                <td>{{ $agent->agency_license }}</td>
                                                <td>{{ $agent->years_of_experience }} Years</td>
                                                <td>{{ $agent->background_check ? 'Yes' : 'No' }}</td>
                                                <td>{{ $agent->compliance_documentation ? 'Yes' : 'No' }}</td>
                                                <td>{{ $agent->terms_accepted ? 'Yes' : 'No' }}</td>
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
