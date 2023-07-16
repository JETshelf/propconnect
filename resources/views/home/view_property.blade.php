@extends('layouts.portal.home')

@section('css_scripts')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">

    <style>
        .carousel-image {
            width: 100%;
            /* Adjust the width as needed */
            height: 450px;
            /* Adjust the height as needed */
            object-fit: fill;
            /* Maintain aspect ratio and fill the container */
        }
    </style>
@endsection

@section('content')
    <!-- Main Content -->
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>{{ $property->property_name }}
                        <small>View Property Detail</small>
                    </h2>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 text-md-right">


                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('home.page') }}"><i class="zmdi zmdi-home"></i>
                                Home</a></li>
                        <li class="breadcrumb-item active">View Property</li>
                    </ul>
                </div>
            </div>
        </div>

        @include('layouts.portal.alerts_block')


        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div id="demo2" class="carousel slide" data-ride="carousel">
                                <!-- Carousel Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#demo2" data-slide-to="0" class="active"></li>
                                    <li data-target="#demo2" data-slide-to="1"></li>
                                    <li data-target="#demo2" data-slide-to="2"></li>
                                </ul>
                                <!-- Carousel Slides -->
                                <div class="carousel-inner">
                                    @foreach ($property->propertyImages as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                class="img-fluid carousel-image " alt="">
                                            <div class="carousel-caption">
                                                <h3>{{ $image->caption }}</h3>
                                                <p>{{ $image->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- Carousel Controls -->

                                <a class="carousel-control-prev" href="#demo2" data-slide="prev"><span
                                        class="carousel-control-prev-icon"></span></a>
                                <a class="carousel-control-next" href="#demo2" data-slide="next"><span
                                        class="carousel-control-next-icon"></span></a>
                            </div>

                            <!-- Property Price -->
                            <h6 class="text-success mt-3">KSH {{ $property->price_rent }}</h6>

                            <!-- Property Name -->
                            <h5 class="mt-0"><a href="#" class="col-blue-grey">{{ $property->property_name }}</a>
                            </h5>

                            <!-- Property Description -->
                            <p class="text-muted">{{ $property->property_description }}</p>

                            <!-- Property Address -->
                            <small class="text-muted"><i
                                    class="zmdi zmdi-pin mr-2"></i>{{ $property->property_address }}</small>

                            <!-- Property Details -->
                            <div class="d-flex flex-wrap justify-content-start mt-3 p-3 bg-light">
                                <a href="#" class="w100" title="Square Feet"><i
                                        class="zmdi zmdi-view-dashboard mr-2"></i><span>{{ $property->square_ft }}</span></a>
                                <a href="#" class="w100" title="Bedroom"><i
                                        class="zmdi zmdi-hotel mr-2"></i><span>{{ $property->bedrooms }}</span></a>
                                <a href="#" class="w100" title="Parking space"><i
                                        class="zmdi zmdi-car-taxi mr-2"></i><span>{{ $property->car_parking }}</span></a>
                                <a href="#" class="w100" title="Garages"><i
                                        class="zmdi zmdi-home mr-2"></i><span>24H</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>General</strong> Amenities<small>Description Text Here...</small></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="zmdi zmdi-more"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <ul class="list-group">
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Swimming pool
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Air
                                            conditioning</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Internet</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Radio</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Balcony</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Roof
                                            terrace</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Cable TV
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Electricity
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="list-group">
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Terrace
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Cofee pot
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Oven</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Towelwes
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Computer
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Grill</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Parquet
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="list-group">
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Dishwasher
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Near Green
                                            Zone</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Near Church
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Near
                                            Hospital</li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Near School
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Near Shop
                                        </li>
                                        <li class="list-group-item"><i class="zmdi zmdi-check-circle mr-2"></i>Natural Gas
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Location</strong> <small>Description text here...</small> </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127641.20752770935!2d36.80261635608148!3d-1.3023039235767253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f11655c311541%3A0x9dd769ac1c10b897!2sNairobi%20County!5e0!3m2!1sen!2ske!4v1689410564405!5m2!1sen!2ske"
                                        width="100%" height="450" style="border:0;" allowfullscreen=""
                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body text-center">
                            <a href="#"><img src="{{ asset('assets/images/sm/avatar1.jpg') }}"
                                    class="rounded-circle" alt="profile-image"></a>
                            <h4 class="m-t-10">Eliana Smith</h4>
                            <div class="col-12">

                                <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Request</strong> Inquiry</h2>

                        </div>
                        <div class="body">
                            <div id="responseMessage" class="mb-3"></div>

                            <form id="inquiryForm" method="POST" action="{{ route('home.addInquiry') }}">
                                @csrf
                                <div class="body">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="property_id"
                                            placeholder="Property ID" value="{{ $property->id }}">
                                        <input type="text" class="form-control" name="property_name"
                                            placeholder="Property ID" value="{{ $property->property_name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mobile_no"
                                            placeholder="Mobile No." value="{{ old('mobile_no') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email"
                                            value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" name="message" required
                                            placeholder="Please type what you want...">{{ old('message') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-round">Submit</button>
                                    <button type="button" class="btn btn-default btn-round btn-simple">Cancel</button>
                                </div>
                            </form>


                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Property Extra Details</strong></h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered m-b-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Price:</th>
                                            <td>KSH {{ $property->price_rent }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Contract type: </th>
                                            <td><span class="badge badge-primary">{{ $property->property_type }}</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bathrooms:</th>
                                            <td>{{ $property->bedrooms }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Square ft:</th>
                                            <td>{{ $property->square_ft }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Garage Spaces:</th>
                                            <td>{{ $property->car_parking }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Land Size:</th>
                                            <td>{{ $property->bedrooms }} FT</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Floors:</th>
                                            <td>{{ $property->bedrooms }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Listed for:</th>
                                            <td>15 days</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Available:</th>
                                            <td>Immediately</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Pets:</th>
                                            <td>Pets Allowed</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bedrooms:</th>
                                            <td>{{ $property->bedrooms }}</td>
                                        </tr>
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

    <script>
        $(document).ready(function () {
            // Handle form submission using Ajax
            $('#inquiryForm').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        // Handle success response
                        console.log(response);
                        showResponseMessage('success', 'Your inquiry request has been submitted successfully.');
                        // Reset the form fields
                        $('#inquiryForm')[0].reset();
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        console.log(xhr.responseText);
                        showResponseMessage('error', 'Error occurred while submitting the form.');
                    }
                });
            });

            // Function to show the response message
            function showResponseMessage(type, message) {
                var responseElement = $('#responseMessage');
                responseElement.removeClass('alert alert-success alert-danger');
                responseElement.empty();

                if (type === 'success') {
                    responseElement.addClass('alert alert-success');
                } else if (type === 'error') {
                    responseElement.addClass('alert alert-danger');
                }

                responseElement.text(message);
            }
        });
    </script>
@endsection
