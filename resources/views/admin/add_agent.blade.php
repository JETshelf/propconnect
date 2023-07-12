@extends('layouts.portal.index')

@section('css_scripts')
@endsection

@section('content')
    <div class="page-body">

        <!-- Container-fluid start -->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="page-header-left">
                            <h3>Add New Agent

                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <!-- Breadcrumb start -->
                        <ol class="breadcrumb pull-right" style="--bs-breadcrumb-divider: '::';">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="fa fa-home">Home</i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.agents') }}">
                                    Agents
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Add New Agent</li>
                        </ol>
                        <!-- Breadcrumb end -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid end -->

        @include('layouts.portal.alerts_block')

        <!-- Container-fluid start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5>Personal Information</h5>
                        </div>
                        <form class="row gx-3" method="POST" action="{{ route('add.agent') }}">
                            @csrf
                            <div class="card-body admin-form">

                                <div class="row">


                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>First name <span class="font-danger">*</span></label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                            id="first_name" name="first_name" value="{{ old('first_name') }}"
                                            placeholder="Enter First Name" />
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>Last name <span class="font-danger">*</span></label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                            id="last_name" name="last_name" value="{{ old('last_name') }}"
                                            placeholder="Last Name" />
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="form-label col-form-label" for="gender">Gender <span
                                                class="text-danger">*</span></label>
                                        <div class="col-md-12 pt-2 mb-5px">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="male" name="gender"
                                                    value="Male" checked />
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="female" name="gender"
                                                    value="Female" />
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>Mobile<span class="font-danger">*</span></label>
                                        <input type="number" class="form-control @error('mobile') is-invalid @enderror"
                                            id="mobile" name="mobile" value="{{ old('mobile') }}"
                                            placeholder="Mobile" />
                                        @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>National ID<span class="font-danger">*</span></label>
                                        <input type="number"
                                            class="form-control @error('national_id') is-invalid @enderror" id="national_id"
                                            name="national_id" value="{{ old('national_id') }}" placeholder="National ID" />
                                        @error('national_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>Email <span class="font-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}"
                                            placeholder="Email" />
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>Address <span class="font-danger"> *</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address" value="{{ old('address') }}"
                                            placeholder="Address" />
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4 col-sm-6">
                                        <label>Zip Code <span class="font-danger"> *</span></label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror"
                                            id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                            placeholder="Zip Code" />
                                        @error('zip_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="card-header pb-0">
                                    <h5>Other Information</h5>
                                </div>


                                <div class="form-btn">
                                    <button type="submit" class="btn btn-pill btn-gradient color-4">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid end -->


@endsection


@section('js_scripts')
@endsection
