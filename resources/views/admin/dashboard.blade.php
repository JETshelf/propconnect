@extends('layouts.portal.index')

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
                    <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                        <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2"
                            data-bar-Spacing="5" data-bar-Color="#fff">3,2,6,5,9,8,7,9,5,1,3,5,7,4,6</div>
                        <small class="col-white">Visitors</small>
                    </div>
                    <div class="inlineblock text-center m-r-15 m-l-15 hidden-md-down">
                        <div class="sparkline" data-type="bar" data-width="97%" data-height="25px" data-bar-Width="2"
                            data-bar-Spacing="5" data-bar-Color="#fff">1,3,5,7,4,6,3,2,6,5,9,8,7,9,5</div>
                        <small class="col-white">Bounce Rate</small>
                    </div>

                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0">Properties</h5>
                                    <span class="badge badge-danger">For Sale {{ $properties}}</span>
                                    <span class="badge badge-success">For Rent {{ $properties}}</span>
                                </div>
                                <div>
                                    <h2 class="mb-0">{{ $properties}}</h2>
                                </div>
                            </div>
                            <span id="linecustom1">1,4,2,6,5,2,3,8,5,2</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0">Agents</h5>
                                    <span class="badge badge-success">Active {{ $agents}}</span>
                                    <span class="badge badge-danger">Inactive 0</span>
                                </div>
                                <div>
                                    <h2 class="mb-0">{{ $agents}}</h2>
                                </div>
                            </div>
                            <span id="linecustom2">2,9,5,5,8,5,4,2,6</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <h5 class="mt-0">Inquiries</h5>
                                    <span class="badge badge-success">All {{ $inquiries}}</span>
                                    {{-- <span class="badge badge-danger">Inactive 25</span> --}}
                                </div>
                                <div>Inquiries
                                    <h2 class="mb-0">{{ $inquiries}}</h2>
                                </div>
                            </div>
                            <span id="linecustom3">1,5,3,6,6,3,6,8,4,2</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row clearfix">
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Total</strong> Properties</h2>
                        </div>
                        <div class="body text-center">
                            <div id="c3chart-properties"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>




@endsection


@section('js_scripts')

<script src="{{ asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{ asset('assets/bundles/knob.bundle.js')}}"></script>

<script src="{{ asset('assets/js/pages/index.js')}}"></script>
@endsection
