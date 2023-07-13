@extends('layouts.portal.index')

@section('css_scripts')
@endsection

@section('content')

     <!-- Main Content -->
     <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard
                        <small>Welcome to Propconnect</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">

                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard')}}"><i class="zmdi zmdi-home"></i> Home</a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li> --}}
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h4>Dashboard</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.portal.alerts_block')


    </section>




@endsection


@section('js_scripts')
@endsection
