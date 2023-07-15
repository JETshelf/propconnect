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
                    <h2>Edit Property
                        <small>Edit Property</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">


                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('agent.properties') }}">Properties</a></li>
                        <li class="breadcrumb-item active">Edit Property</li>
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
                            <form method="POST" action="{{ route('agent.updateProperty', $property->id) }}">
                                @csrf

                                @method('PATCH')

                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('property_name') is-invalid @enderror"
                                                    name="property_name" placeholder="Property Name" value="{{ $property->property_name }}">
                                                @error('property_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('property_location') is-invalid @enderror"
                                                    name="property_location" placeholder="Property Location" value="{{ $property->property_location }}">
                                                @error('property_location')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize @error('property_description') is-invalid @enderror"
                                                        name="property_description" placeholder="Property Description">{{ $property->property_description }}</textarea>
                                                </div>
                                                @error('property_description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">Property Information</h6>
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="radio inlineblock m-r-25">
                                                <input type="radio" name="property_type" id="radio1" value="For Rent" {{ $property->property_type == 'For Rent' ? 'checked' : '' }}>
                                                <label for="radio1">For Rent</label>
                                            </div>
                                            <div class="radio inlineblock">
                                                <input type="radio" name="property_type" id="radio2" value="For Sale" {{ $property->property_type == 'For Sale' ? 'checked' : '' }}>
                                                <label for="radio2">For Sale</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('price_rent') is-invalid @enderror"
                                                    name="price_rent" placeholder="Price / Rent" value="{{ $property->price_rent }}">
                                                @error('price_rent')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('bedrooms') is-invalid @enderror"
                                                    name="bedrooms" placeholder="Bedrooms" value="{{ $property->bedrooms }}">
                                                @error('bedrooms')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('square_ft') is-invalid @enderror"
                                                    name="square_ft" placeholder="Square ft" value="{{ $property->square_ft }}">
                                                @error('square_ft')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('car_parking') is-invalid @enderror"
                                                    name="car_parking" placeholder="Car Parking" value="{{ $property->car_parking }}">
                                                @error('car_parking')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('year_built') is-invalid @enderror"
                                                    name="year_built" placeholder="Year Built" value="{{ $property->year_built }}">
                                                @error('year_built')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control no-resize @error('property_address') is-invalid @enderror"
                                                    name="property_address" placeholder="Property Address">{{ $property->property_address }}</textarea>
                                                @error('property_address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">Dimensions</h6>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-4 col-sm-6">
                                            <div class="form-line">
                                                <input type="text" class="form-control @error('dining_room') is-invalid @enderror"
                                                    name="dining_room" placeholder="Dining Room" value="{{ $property->dining_room }}">
                                                @error('dining_room')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6">
                                            <div class="form-line">
                                                <input type="text" class="form-control @error('kitchen') is-invalid @enderror"
                                                    name="kitchen" placeholder="Kitchen" value="{{ $property->kitchen }}">
                                                @error('kitchen')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6">
                                            <div class="form-line">
                                                <input type="text" class="form-control @error('living_room') is-invalid @enderror"
                                                    name="living_room" placeholder="Living Room" value="{{ $property->living_room }}">
                                                @error('living_room')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('master_bedroom') is-invalid @enderror"
                                                    name="master_bedroom" placeholder="Master Bedroom" value="{{ $property->master_bedroom }}">
                                                @error('master_bedroom')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('bedroom_2') is-invalid @enderror"
                                                    name="bedroom_2" placeholder="Bedroom 2" value="{{ $property->bedroom_2 }}">
                                                @error('bedroom_2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control @error('other_room') is-invalid @enderror"
                                                    name="other_room" placeholder="Other Room" value="{{ $property->other_room }}">
                                                @error('other_room')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">General Amenities</h6>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox21" type="checkbox" name="swimming_pool" {{ $property->swimming_pool ? 'checked' : '' }}>
                                                <label for="checkbox21">Swimming pool</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox22" type="checkbox" name="terrace" {{ $property->terrace ? 'checked' : '' }}>
                                                <label for="checkbox22">Terrace</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox23" type="checkbox" name="air_conditioning" {{ $property->air_conditioning ? 'checked' : '' }}>
                                                <label for="checkbox23">Air conditioning</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox24" type="checkbox" name="internet" {{ $property->internet ? 'checked' : '' }}>
                                                <label for="checkbox24">Internet</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox25" type="checkbox" name="balcony" {{ $property->balcony ? 'checked' : '' }}>
                                                <label for="checkbox25">Balcony</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox26" type="checkbox" name="cable_tv" {{ $property->cable_tv ? 'checked' : '' }}>
                                                <label for="checkbox26">Cable TV</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox27" type="checkbox" name="computer" {{ $property->computer ? 'checked' : '' }}>
                                                <label for="checkbox27">Computer</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox28" type="checkbox" name="dishwasher" {{ $property->dishwasher ? 'checked' : '' }}>
                                                <label for="checkbox28">Dishwasher</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox29" type="checkbox" name="near_green_zone" {{ $property->near_green_zone ? 'checked' : '' }}>
                                                <label for="checkbox29">Near Green Zone</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox30" type="checkbox" name="near_church" {{ $property->near_church ? 'checked' : '' }}>
                                                <label for="checkbox30">Near Church</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox31" type="checkbox" name="near_estate" {{ $property->near_estate ? 'checked' : '' }}>
                                                <label for="checkbox31">Near Estate</label>
                                            </div>
                                            <div class="checkbox inlineblock m-r-20">
                                                <input id="checkbox32" type="checkbox" name="coffee_pot" {{ $property->coffee_pot ? 'checked' : '' }}>
                                                <label for="checkbox32">Coffee pot</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('checkboxes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
