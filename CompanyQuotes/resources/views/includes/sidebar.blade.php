<ul class="sidebar navbar-nav toggled">
    @auth
        @php $link = '' @endphp

            <li class="nav-item active">
                <a class="nav-link" href="{{\Illuminate\Support\Facades\URL::to('/')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Login Screens:</h6>
                    <a class="dropdown-item" href="login.html">Login</a>
                    <a class="dropdown-item" href="register.html">Register</a>
                    <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Other Pages:</h6>
                    <a class="dropdown-item" href="404.html">404 Page</a>
                    <a class="dropdown-item" href="blank.html">Blank Page</a>
                </div>
            </li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{\Illuminate\Support\Facades\URL::to('/products_list')}}{{$link}}">
                    <i class="fas fa fa-flask"></i>
                    <span>Products List</span></a>
            </li>
            {{--    <li class="nav-item">
                    <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Charts</span></a>
                </li>--}}
            <li class="nav-item">
                <a class="nav-link" href="{{\Illuminate\Support\Facades\URL::to('/orders_list')}}{{$link}}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Orders</span></a>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="{{\Illuminate\Support\Facades\URL::to('/trips_list')}}{{$link}}">
                    <i class="fas fa-anchor"></i>
                    <span>Trips</span></a>
            </li>
        @cannot('create trip')
            <li class="nav-item">
                <a class="nav-link" href="{{\Illuminate\Support\Facades\URL::to('/myTrip')}}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Order Now</span></a>
            </li>
               {{-- <div class="col-xl-12 col-sm-12 mb-12 text-white-50">


                        @if($trip_data[0])
                            <h4 class="text-white col-sm-12">My Trip: {{$trip_data[0]->reservation_code}}</h4><hr>


                                <div class=" col-sm-12" style="margin-bottom:10px">
                                    <label for="charter_code" class=" col-form-label text-md-right text-white">Charter
                                        Code</label>
                                    <div>{{$trip_data[0]->charter_code}}</div>
                                </div>

                                <div class="col-sm-12" style="margin-bottom:10px">
                                    <label for="yacht_name" class=" col-form-label text-md-right text-white" >Yacht Type</label>
                                    <div>{{$trip_data[0]->yacht_name}}</div>
                                </div>
                                <div class="col-sm-12" style="margin-bottom:10px">
                                    <label for="client_email" class=" col-form-label text-md-right text-white" >Client
                                        E-Mail</label>
                                    <div>{{$trip_data[0]->client_email}}</div>
                                </div>
                                <div class="col-sm-12" style="margin-bottom:10px">
                                    <label for="client_name" class=" col-form-label text-md-right text-white">Client
                                        Name</label>
                                    <div>{{$trip_data[0]->client_name}}</div>
                                </div>


                        @endif
                    </div>--}}
        @endcannot
        <li class="nav-item">

            <a class="nav-link" href="{{\Illuminate\Support\Facades\URL::to('/about_us')}}">
                <i class="fas fa-building"></i>
                <span>About us</span></a>
        </li>
    @endauth
</ul>