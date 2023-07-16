<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">

    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="profile.html"><img src="{{ asset('assets/images/user-12.jpg') }}"
                                        alt="User"></a></div>
                            <div class="detail">
                                <h4>{{ session('name')}}</h4>
                                <small>{{ session('role')}}</small>
                            </div>

                        </div>
                    </li>
                    <li class="header">MAIN</li>

                    @if (auth()->user()->hasRole('Administrator'))


                    <li><a href="{{ route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


                    <li><a href="{{ route('admin.agents')}}"><i class="zmdi zmdi-home"></i><span>Agents</span></a></li>

                    <li><a href="{{ route('admin.properties')}}"><i class="zmdi zmdi-home"></i><span>Properties</span></a></li>

                    <li><a href="{{ route('admin.inquiries')}}"><i class="zmdi zmdi-home"></i><span>Inquiries</span></a></li>

                    @elseif (auth()->user()->hasRole('Agent'))

                    <li><a href="{{ route('agent.dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                    <li><a href="{{ route('agent.properties')}}"><i class="zmdi zmdi-home"></i><span>Properties</span></a></li>

                    <li><a href="{{ route('agent.inquiries')}}"><i class="zmdi zmdi-home"></i><span>Inquiries</span></a></li>

                    @endif

                </ul>
            </div>
        </div>

    </div>
</aside>
