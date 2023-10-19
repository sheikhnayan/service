<!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand p-3">
                    <a href="{{ route('user.index') }}">
                        <img class="img-fluid" src="{{ asset('vendor_panel/logo.png') }}" width="80px" height="80px"
                            class="img-circle ml-4 mr-2 mt-2 mb-2" alt="User Image" />
                    </a>
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
                            <a class="sidenav-item-link" href="{{ route('user.start-up') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Get help for startup</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('support') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Support & Feedback</span> <b class="caret"></b>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="{{ route('user.about') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">About us</span> <b class="caret"></b>
                            </a>
                        </li>
                        <li style="margin-bottom: 4rem;">
                            <a class="sidenav-item-link" href="{{ route('user.terms') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Terms & privacy Policy</span> <b class="caret"></b>
                            </a>
                        </li>

                        {{-- <li style="position: fixed; bottom: 0; width: 100%; border: unset; background: #ec981b">
                            <form action="{{ route('logout') }}" method="post" id="logout">
                            @csrf
                            <a class="sidenav-item-link" href="#" onclick="document.getElementById('logout').submit();" style="margin: auto; margin-left: 2rem; font-size: 17px; margin-bottom: 1rem;">
                                
                                <span class="nav-text">Logout <span class="mdi mdi-arrow-right"></span> </span> </b>
                            </a>
                            </form>
                        </li> --}}

                    </ul>

                </div>
            </div>
        </aside>