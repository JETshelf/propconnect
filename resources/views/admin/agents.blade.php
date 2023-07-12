@extends('layouts.portal.index')

@section('css_scripts')

<link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
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

                    <button class="btn btn-white btn-icon btn-round hidden-sm-down float-right ml-3" type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>

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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>City</th>
                                            <th>Rating</th>
                                            <th>Deal</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>1</td>
                                            <td><img src="../assets/images/xs/avatar1.jpg" class="w30 rounded mr-2"
                                                    alt=""> Karen Eilla Boyette</td>
                                            <td>areneboyette@armyspy.com</td>
                                            <td>+502-324-4194</td>
                                            <td>Manchester</td>
                                            <td class="text-warning">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                            </td>
                                            <td>53</td>
                                            <td>$2,800</td>
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

<script src="{{ asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>

@endsection
