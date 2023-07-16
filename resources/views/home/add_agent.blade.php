@extends('layouts.portal.home')

@section('css_scripts')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">

    <style>
        /* File Upload */
        .fake-shadow {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }

        .fileUpload {
            position: relative;
            overflow: hidden;
        }

        .fileUpload #photo-id {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 33px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .img-preview {
            max-width: 100%;
        }

        .scrollable-textarea {
            max-height: 200px;
            overflow-y: scroll;
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>PROPCONNECT
                        <small>Register to be an agent with us!</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">


                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.page') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item active">Register to be an agent with us!</li>
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
                            <form method="POST" action="{{ route('home.registerAgent') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row clearfix">

                                    <div class="row">
                                        <div class="col-md-4">

                                            <div class="row">



                                                <div class="col-md-12">

                                                    <div class="input-group @error('agent_image') is-invalid @enderror">


                                                        <img id="player-image" src="{{ asset('assets/images/peron.webp') }}"
                                                            class="img-thumbnail" style="height: 300px;" alt="User Image">

                                                    </div>
                                                    @error('agent_image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <div class="input-group mt-3">
                                                        <div class="input-group-btn">
                                                            <div class="fileUpload btn btn-default fake-shadow">
                                                                <span><i class="fa fa-upload"></i> Upload Passport
                                                                    photo</span>
                                                                <input id="photo-id" name="agent_image" type="file"
                                                                    onchange="handlePhotoUpload(event)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-8">

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('full_name') is-invalid @enderror"
                                                            id="full_name" name="full_name" value="{{ old('full_name') }}"
                                                            placeholder="Enter Full Name" />
                                                        @error('full_name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('phone_number') is-invalid @enderror"
                                                            id="phone_number" name="phone_number"
                                                            value="{{ old('phone_number') }}"
                                                            placeholder="Enter Phone Number" />
                                                        @error('phone_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" name="email" value="{{ old('email') }}"
                                                            placeholder="Enter Email" />
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('address') is-invalid @enderror"
                                                            id="address" name="address" value="{{ old('address') }}"
                                                            placeholder="Enter Address" />
                                                        @error('address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('identification') is-invalid @enderror"
                                                            id="identification" name="identification"
                                                            value="{{ old('identification') }}"
                                                            placeholder="Enter Identification" />
                                                        @error('identification')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('zip_code') is-invalid @enderror"
                                                            id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                                                            placeholder="Enter Agency Phone Number" />
                                                        @error('zip_code')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('agency_name') is-invalid @enderror"
                                                            id="agency_name" name="agency_name"
                                                            value="{{ old('agency_name') }}"
                                                            placeholder="Enter Agency Name" />
                                                        @error('agency_name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('agency_phone_number') is-invalid @enderror"
                                                            id="agency_phone_number" name="agency_phone_number"
                                                            value="{{ old('agency_phone_number') }}"
                                                            placeholder="Enter Agency Phone Number" />
                                                        @error('agency_phone_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="email"
                                                            class="form-control @error('agency_email') is-invalid @enderror"
                                                            id="agency_email" name="agency_email"
                                                            value="{{ old('agency_email') }}"
                                                            placeholder="Enter Agency Email" />
                                                        @error('agency_email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('agency_address') is-invalid @enderror"
                                                            id="agency_address" name="agency_address"
                                                            value="{{ old('agency_address') }}"
                                                            placeholder="Enter Agency Address" />
                                                        @error('agency_address')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text"
                                                            class="form-control @error('agency_license') is-invalid @enderror"
                                                            id="agency_license" name="agency_license"
                                                            value="{{ old('agency_license') }}"
                                                            placeholder="Enter Agency License" />
                                                        @error('agency_license')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="number"
                                                            class="form-control @error('years_of_experience') is-invalid @enderror"
                                                            id="years_of_experience" name="years_of_experience"
                                                            value="{{ old('years_of_experience') }}"
                                                            placeholder="Enter Years of Experience" />
                                                        @error('years_of_experience')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>







                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="terms" class="form-label">Background Check Terms</label>
                                            <div class="scrollable-textarea">
                                                <textarea class="form-control" id="terms" name="terms" rows="6" readonly>
                                                    TERMS AND CONDITIONS

                                                    Welcome to our website! By accessing and using this site, you agree to comply with the following terms and conditions:

                                                    1. Intellectual Property: All content on this website is protected by intellectual property rights and should not be reproduced without permission.

                                                    2. Accuracy of Information: While we strive to provide accurate and up-to-date information, we make no warranties or representations regarding the completeness or accuracy of the content.

                                                    3. User Conduct: You agree to use this website responsibly and refrain from any activities that may cause harm or disrupt its functionality.

                                                    4. Privacy: We respect your privacy and handle personal information in accordance with our Privacy Policy.

                                                    By using this website, you acknowledge and accept these terms and conditions in full.

                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('background_check') is-invalid @enderror"
                                                    type="checkbox" id="background_check" name="background_check"
                                                    value="1" {{ old('background_check') ? 'checked' : '' }}>
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
                                            <label for="terms" class="form-label">Compliance Documentation Terms</label>
                                            <div class="scrollable-textarea">
                                                <textarea class="form-control" id="terms" name="terms" rows="6" readonly>
                                                    TERMS AND CONDITIONS

                                                    Welcome to our website! By accessing and using this site, you agree to comply with the following terms and conditions:

                                                    1. Intellectual Property: All content on this website is protected by intellectual property rights and should not be reproduced without permission.

                                                    2. Accuracy of Information: While we strive to provide accurate and up-to-date information, we make no warranties or representations regarding the completeness or accuracy of the content.

                                                    3. User Conduct: You agree to use this website responsibly and refrain from any activities that may cause harm or disrupt its functionality.

                                                    4. Privacy: We respect your privacy and handle personal information in accordance with our Privacy Policy.

                                                    By using this website, you acknowledge and accept these terms and conditions in full.

                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('compliance_documentation') is-invalid @enderror"
                                                    type="checkbox" id="compliance_documentation"
                                                    name="compliance_documentation" value="1"
                                                    {{ old('compliance_documentation') ? 'checked' : '' }}>
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
                                            <label for="terms" class="form-label">Terms and Conditions</label>
                                            <div class="scrollable-textarea">
                                                <textarea class="form-control" id="terms" name="terms" rows="6" readonly>
                                                    TERMS AND CONDITIONS

                                                    Welcome to our website! By accessing and using this site, you agree to comply with the following terms and conditions:

                                                    1. Intellectual Property: All content on this website is protected by intellectual property rights and should not be reproduced without permission.

                                                    2. Accuracy of Information: While we strive to provide accurate and up-to-date information, we make no warranties or representations regarding the completeness or accuracy of the content.

                                                    3. User Conduct: You agree to use this website responsibly and refrain from any activities that may cause harm or disrupt its functionality.

                                                    4. Privacy: We respect your privacy and handle personal information in accordance with our Privacy Policy.

                                                    By using this website, you acknowledge and accept these terms and conditions in full.

                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input @error('terms_accepted') is-invalid @enderror"
                                                    type="checkbox" id="terms_accepted" name="terms_accepted"
                                                    value="1" {{ old('terms_accepted') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="terms_accepted">
                                                    I agree to the Terms and Conditions
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
                                        <button type="submit" class="btn btn-primary btn-round">Submit</button>
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

    <script>
        function handlePhotoUpload(event) {
            var file = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#player-image').attr('src', e.target.result);
            }

            reader.readAsDataURL(file);
        }
    </script>
@endsection
