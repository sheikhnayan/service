<!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar" style="background: #000 !important">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand" style="background: #000 !important">
                    <div class="d-inline-block text-light p-4 " style="font-weight:bold; font-size: 20px;  width:100%;">
                        Admin Panel
                    </div>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar" style="background: #000 !important">

                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">



                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('admin.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Dashboard</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.user.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Users</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.npo.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">NPO</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.user.standard') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Standard Business</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.user.preferred') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Preferred Business</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.user.premium') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Premium Business</span> <b class="caret"></b>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.support') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Support Request</span> <b class="caret"></b>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.start-up') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Startup Pitch</span> <b class="caret"></b>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="{{ route('admin.meta-data.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Meta Data</span> <b class="caret"></b>
                            </a>
                        </li>
                        {{-- <li>
                            <a class="sidenav-item-link" href="#">
                                <span class="nav-text">Analytics</span> <b class="caret"></b>
                            </a>
                        </li> --}}




                        <li style="position: fixed; bottom: 0; width: 100%; border: unset;">
                            <form action="{{ route('logout') }}" method="post" id="logout">
                            @csrf
                            <a class="sidenav-item-link" href="#" onclick="document.getElementById('logout').submit();" style="margin: auto; margin-left: 2rem; font-size: 17px; margin-bottom: 1rem;">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Logout <span class="mdi mdi-arrow-right"></span> </span> </b>
                            </a>
                            </form>
                        </li>



                    </ul>

                </div>
            </div>
        </aside>