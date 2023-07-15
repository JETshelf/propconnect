@extends('layouts.portal.home')

@section('css_scripts')
@endsection

@section('content')

    <!-- Main Content -->
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>PROPCONNECT
                <small>Welcome to Propconnect</small>
                </h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card action_bar">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-1 col-md-1 col-3">
                                <div class="checkbox inlineblock delete_all mb-0">
                                    <input id="deleteall" type="checkbox">
                                    <label for="deleteall">All</label>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-9">
                                <div class="input-group search mb-0">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-addon">
                                        <i class="zmdi zmdi-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($properties as $property)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="body">
                        @if ($property->propertyImages->isNotEmpty())
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage/' . $property->propertyImages->first()->image_path) }}" alt="img">
                @else
                    <img class="img-thumbnail img-fluid" src="{{ asset('path/to/placeholder/image.jpg') }}" alt="img">
                @endif
                        <h6 class="text-success mt-3">KSH {{ $property->price_rent }}</h6>
                        <h5 class="mt-0"><a href="{{ route('home.viewProperty', $property->id) }}" class="col-blue-grey">{{ $property->property_name}}</a></h5>
                        <p class="text-muted">{{ $property->property_description }}</p>
                        <small class="text-muted"><i class="zmdi zmdi-pin mr-2"></i>{{ $property->property_location }}</small>
                        <div class="d-flex justify-content-between mt-3 p-3 bg-light">
                            <a href="#" title="Square Feet"><i class="zmdi zmdi-view-dashboard mr-2"></i><span>{{ $property->square_ft }}</span></a>
                            <a href="#" title="Bedroom"><i class="zmdi zmdi-hotel mr-2"></i><span>{{ $property->bedrooms }}</span></a>
                            <a href="#" title="Parking space"><i class="zmdi zmdi-car-taxi mr-2"></i><span>{{ $property->car_parking }}</span></a>
                            <a href="#" title="Garages"><i class="zmdi zmdi-home mr-2"></i><span> 24H</span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>





@endsection


@section('js_scripts')
@endsection
