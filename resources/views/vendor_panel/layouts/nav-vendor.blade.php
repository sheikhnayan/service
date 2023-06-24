<!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <img class="img-fluid" src="{{ asset('vendor_panel/user.png') }}" width="60px" height="60px"
                        class="img-circle ml-4 mr-2 mt-2 mb-2" alt="User Image" />
                    <div class="d-inline-block text-light" style="font-weight:bold">
                        Timothy
                    </div>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">

                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">

                        @if (Auth::user()->vendor->business_type == 'business')
                            
                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('vendor.product.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">My Products</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.service.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">My Services</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.food-menu.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Food Menu</span> <b class="caret"></b>
                            </a>
                        </li>

                        @else
                            
                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.event.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Events</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.campaign.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Campaign</span> <b class="caret"></b>
                            </a>
                        </li>

                        @endif





                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.analytics') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">My Analytics</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('support') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Support</span> <b class="caret"></b>
                            </a>
                        </li>
                        {{-- <li>
                            <a class="sidenav-item-link" href="/subscription">
                                <span class="nav-text">Subscriptions</span> <b class="caret"></b>
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