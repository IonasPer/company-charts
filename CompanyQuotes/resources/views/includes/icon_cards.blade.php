<!-- Icon Cards-->
{{--@dd([\App\Category::where('id',1)->first()->subcategories->keyBy('name')])--}}
<div class="row">
    @php $link = '' @endphp
    @cannot('upload csv')
        @php
            $col_xl = 6;
                $link = '/'.auth()->user()->company_id @endphp
    @endcannot
    @can('upload csv')
        @php $col_xl = 3; @endphp
    @endcan
    @can('view company')
    <div class="col-xl-{{$col_xl}} col-sm-12 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-anchor"></i>
                </div>
                <div class="mr-5">Trips</div>
            </div>
            <a class="card-footer text-white clearfix h4 z-1" href="/new_trip">
                <span class="float-left">Create Trip</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    {{--<div class="col-xl-3 col-sm-6 mb-3">
        <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix h4 z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>--}}
    <div class="col-xl-{{$col_xl}} col-sm-12 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                </div>
                <div class="mr-5">New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix h4 z-1"
               href="{{\Illuminate\Support\Facades\URL::to('/orders_list')}}{{$link}}">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
    @endcan
    @can('upload csv')
        <div class="col-xl-{{$col_xl}} col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">New Company</div>
                </div>
                <a class="card-footer text-white clearfix h4 z-1" href="/new_company">
                    <span class="float-left">Create Now</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-{{$col_xl}} col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">All Companies</div>
                </div>
                <a class="card-footer text-white clearfix h4 z-1" href="/companies_list">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
        <div class="col-xl-{{$col_xl}} col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">Upload Products</div>
                </div>
                <a class="card-footer text-white clearfix h4 z-1" href="/upload_products">
                    <span class="float-left">Create Now</span>
                    <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                </a>
            </div>
        </div>
    @endcan

    @cannot('view company')
    <div class="col-xl-{{$col_xl}} col-sm-12 mb-3">
        <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-anchor"></i>
                </div>
                <div class="mr-5">Order Now</div>
            </div>
            <a class="card-footer text-white clearfix h4 z-1" href="/myTrip">
                <span class="float-left">Go to my trip</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>
        @endcannot
</div>