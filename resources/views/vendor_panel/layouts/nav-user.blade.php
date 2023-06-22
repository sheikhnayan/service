<!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <img src="{{ asset('vendor_panel/user.png') }}" width="60px" height="60px"
                        class="img-circle ml-4 mr-2 mt-2 mb-2" alt="User Image" />
                    <div class="d-inline-block text-light" style="font-weight:bold">
                        Timothy
                    </div>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-scrollbar">

                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">



                        <li class="active">
                            <a class="sidenav-item-link" href="{{ route('user.campaign.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Donate to non-profit</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('user.service.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Book Services</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('user.product.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Buy Product</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('user.food.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Food Menu</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('user.event.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Search Events</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="#">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Get help for startup</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="#">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Help & FAQs</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="#">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Terms & privacy Policy</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="#">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">About us</span> <b class="caret"></b>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="/support">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Contact Us</span> <b class="caret"></b>
                            </a>
                        </li>

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