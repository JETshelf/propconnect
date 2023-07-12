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
                            <h3>Agents
                                
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <!-- Breadcrumb start -->
                        <ol class="breadcrumb pull-right" style="--bs-breadcrumb-divider: '::';">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard')}}">
                                    <i class="fa fa-home">Home</i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active">Agents</li>
                        </ol>
                        <!-- Breadcrumb end -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid end -->

        @include('layouts.portal.alerts_block')



    </div>




@endsection


@section('js_scripts')
@endsection
