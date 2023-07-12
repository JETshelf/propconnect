@extends('layouts.portal.index')

@section('css_scripts')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Edit Agent
                        <small>Edit Agent</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">


                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.agents') }}">Agents</a></li>
                        <li class="breadcrumb-item active">Edit Agent</li>
                    </ul>
                </div>
            </div>
        </div>

        @include('layouts.portal.alerts_block')


        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic</strong> Information </h2>

                        </div>
                        <div class="body">
                            <form method="POST" action="{{ route('admin.updateAgent', $agent->id) }}">
                                @csrf

                                @method('PATCH')

                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control @error('full_name') is-invalid @enderror"
                                                id="full_name" name="full_name" value="{{ $agent->full_name }}"
                                                placeholder="Enter Full Name" />
                                            @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                                name="phone_number" value="{{ $agent->phone_number }}" placeholder="Enter Phone Number" />
                                            @error('phone_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                                value="{{  $agent->email }}" placeholder="Enter Email" />
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                                value="{{  $agent->address }}" placeholder="Enter Address" />
                                            @error('address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('identification') is-invalid @enderror" id="identification"
                                                name="identification" value="{{  $agent->identification }}" placeholder="Enter Identification"  />
                                            @error('identification')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                                id="zip_code" name="zip_code" value="{{  $agent->zip_code }}"
                                                placeholder="Enter Agency Phone Number"  />
                                            @error('zip_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('agency_name') is-invalid @enderror" id="agency_name"
                                                name="agency_name" value="{{ $agent->agency_name }}" placeholder="Enter Agency Name"  />
                                            @error('agency_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('agency_phone_number') is-invalid @enderror"
                                                id="agency_phone_number" name="agency_phone_number" value="{{  $agent->agency_phone_number }}"
                                                placeholder="Enter Agency Phone Number"  />
                                            @error('agency_phone_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="email" class="form-control @error('agency_email') is-invalid @enderror" id="agency_email"
                                                name="agency_email" value="{{ $agent->agency_email }}" placeholder="Enter Agency Email"  />
                                            @error('agency_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('agency_address') is-invalid @enderror" id="agency_address"
                                                name="agency_address" value="{{  $agent->agency_address }}" placeholder="Enter Agency Address"  />
                                            @error('agency_address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control @error('agency_license') is-invalid @enderror" id="agency_license"
                                                name="agency_license" value="{{  $agent->agency_license }}" placeholder="Enter Agency License"  />
                                            @error('agency_license')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control @error('years_of_experience') is-invalid @enderror"
                                                id="years_of_experience" name="years_of_experience" value="{{  $agent->years_of_experience }}"
                                                placeholder="Enter Years of Experience"  />
                                            @error('years_of_experience')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input @error('background_check') is-invalid @enderror" type="checkbox"
                                                    id="background_check" name="background_check" value="1" {{  $agent->background_check ? 'checked' : '' }}>
                                                <label class="form-check-label" for="background_check">
                                                    Background Check
                                                </label>
                                            </div>
                                            @error('background_check')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input @error('compliance_documentation') is-invalid @enderror" type="checkbox"
                                                    id="compliance_documentation" name="compliance_documentation" value="1"
                                                    {{  $agent->compliance_documentation ? 'checked' : '' }}>
                                                <label class="form-check-label" for="compliance_documentation">
                                                    Compliance Documentation
                                                </label>
                                            </div>
                                            @error('compliance_documentation')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input @error('terms_accepted') is-invalid @enderror" type="checkbox"
                                                    id="terms_accepted" name="terms_accepted" value="1" {{  $agent->terms_accepted ? 'checked' : '' }}>
                                                <label class="form-check-label" for="terms_accepted">
                                                    Terms Accepted
                                                </label>
                                            </div>
                                            @error('terms_accepted')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>





                                </div>

                                <div class="row clearfix">
                                    <div class="col-sm-12 mt-4">
                                        <button type="submit" class="btn btn-primary btn-round">Update Info</button>
                                    </div>
                                </div>
                            </form>
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
