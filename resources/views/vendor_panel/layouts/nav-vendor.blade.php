<!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
        <aside class="left-sidebar bg-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand p-3">
                    <img class="img-fluid" src="{{ asset('storage/'.Auth::user()->vendor->logo) }}" width="80px" height="80px"
                        class="img-circle ml-4 mr-2 mt-2 mb-2" alt="User Image" />
                    <div class=" text-light " style="font-weight:bold; font-size: 1.5rem">
                        {{ Auth::user()->vendor->company_name }}
                    </div>

                    {{-- <div class="nav-close">
                        <a href="#" onclick="function close(){}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2c5.53 0 10 4.47 10 10s-4.47 10-10 10S2 17.53 2 12S6.47 2 12 2m3.59 5L12 10.59L8.41 7L7 8.41L10.59 12L7 15.59L8.41 17L12 13.41L15.59 17L17 15.59L13.41 12L17 8.41L15.59 7Z"/></svg></a>
                    </div> --}}

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

                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.event.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Events</span> <b class="caret"></b>
                            </a>
                        </li>

                        @else
                            
                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.campaign.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Campaigns</span> <b class="caret"></b>
                            </a>
                        </li>

                        
                        <li>
                            <a class="sidenav-item-link" href="{{ route('vendor.event.index') }}">
                                {{-- <i class="mdi mdi-view-dashboard-outline"></i> --}}
                                <span class="nav-text">Events</span> <b class="caret"></b>
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
                                <span class="nav-text">Support & Feedback</span> <b class="caret"></b>
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