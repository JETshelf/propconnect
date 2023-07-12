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
                                <h4>Michael</h4>
                                <small>Agent</small>
                            </div>

                        </div>
                    </li>
                    <li class="header">MAIN</li>


                    <li><a href="{{ route('admin.dashboard')}}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>


                    <li><a href="{{ route('admin.agents')}}"><i class="zmdi zmdi-home"></i><span>Agents</span></a></li>

                </ul>
            </div>
        </div>

    </div>
</aside>
