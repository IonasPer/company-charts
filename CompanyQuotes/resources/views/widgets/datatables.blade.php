@if(isset($table_data) && is_array($table_data) && count($table_data)>0)
    @php

        $css = '';
            /* print /*'<pre>'; print_r($table_data); print '</pre>';*/
            /* print '<pre>'; print_r($keys = $table_data[0]->getFillable()); print '</pre>';
             $column2tables = ['user_id' => 'users', 'company_id' => 'companies', 'ship_id' => 'ships']; */
         if(\Illuminate\Support\Facades\Request::segment(1) === 'products_list'
         || \Illuminate\Support\Facades\Request::segment(1) === 'myTrip'){
             $object = new \App\Product();
             $keys = $object->getVisible();
         }else if(\Illuminate\Support\Facades\Request::segment(1) === 'trips_list'){
             $object = new \App\Trip();
             $keys = $object->getVisible();

         }
         else if(\Illuminate\Support\Facades\Request::segment(1) === 'companies_list'){
             $object = new \App\Company();
             $keys = $object->getVisible();

         }
         else if(\Illuminate\Support\Facades\Request::segment(1) === 'orders_list'){
             $object = new \App\Order();
             $keys = $object->getVisible();
             $css = 'display:block;overflow-y:scroll;max-height:8rem';
         }
    @endphp
    @if(\Illuminate\Support\Facades\Request::segment(1) === 'products_list'
    || \Illuminate\Support\Facades\Request::segment(1) === 'myTrip')
        <style type="text/css">
            .bs-example {
                margin: 20px;
            }
            .bs-example-nest ul{
                margin-bottom:30px;
            }

            .nav-tabs > li.active, .nav-tabs > li.active:focus, .nav-tabs > li.active:hover {
                color: #555;
                cursor: default;
                background-color: #fff;
                border: 1px solid #ddd;
                border-bottom-color: transparent;
            }

            .nav-tabs > li.active > a {
                color: #555;
            }

            .nav-tabs > li {
                min-width: 6.2rem;
                text-align: center;
                margin-right: 2px;
                line-height: 1.42857143;
                border: 1px solid transparent;
                border-bottom-color: #ddd;;
                border-radius: 4px 4px 0 0;
            }
        </style>
        {{--<select class="subcategory_products h4">
            <option value="0" >Select subcategory</option>
            @php $count = 0; @endphp
            @foreach($table_data as $index => $subcategory)
                @php
                    $active = ($count === 0)?'active':'';
                    $count++
                @endphp
                <option value="{{$index}}">{{$index}}</option>
            @endforeach
        </select>--}}

        <div class="bs-example">
            <div class="bs-example-nest">
                <ul class="nav nav-tabs h4">
                    @php $count = 0; @endphp
                    @foreach($table_data as $category => $subcategories)
                        @php
                            $active = ($count === 0)?'active':'';
                            $count++;
                        $category = str_replace(")","",str_replace("(","",str_replace(" ","_",trim($category))));
                        @endphp
                        <li class="nav-item">
                            <a href="#{{$category}}" class="nav-link {{$active}}"
                               data-toggle="tab">{{str_replace("_"," ",$category)}}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content h5">
                    @php $count = 0; @endphp
                    @foreach($table_data as $category => $subcategories)
                        @php
                            $active = ($count === 0)?'show active':'';
                            $count++;
                        $category = str_replace(")","",str_replace("(","",str_replace(" ","_",trim($category))));
                        @endphp
                        <div class="tab-pane fade {{$active}}" id="{{$category}}">
                            <ul class="nav nav-tabs">
                                @php $count = 0; @endphp
                                @foreach($subcategories as $index => $subcategory)
                                    @php

                                        $active = ($count === 0)?'active':'';
                                        $active = (count($subcategories) === 1)?'':$active;
                                        $count++;
                                    $index = str_replace(")","",str_replace("(","",str_replace(" ","_",trim($index))));
                                    @endphp
                                    <li class="nav-item">
                                        <a href="#{{$index}}" class="nav-link {{$active}}"
                                           data-toggle="tab">{{str_replace("_"," ",$index)}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-content ">
                @php $count = 0; @endphp
                @foreach($table_data as $category => $subcategories)
                    @foreach($subcategories as $index => $subcategory)
                        @php
                            $active = ($count === 0)?'show active':'';
                            $count++;
                        $index = str_replace(")","",str_replace("(","",str_replace(" ","_",trim($index))));
                        @endphp
                        <div class="tab-pane fade {{$active}}" id="{{$index}}">

                            <!-- DataTables Example -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-table"></i>
                                    <span class="mt-2 h4">{{str_replace("_"," ",$category." - " .$index)}}</span>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                               cellspacing="0">
                                            <thead>
                                            <tr>
                                                @foreach($keys as $key)
                                                    <th>{{ucfirst($key)}}</th>
                                                @endforeach
                                                @if(\Illuminate\Support\Facades\Request::segment(1) === 'myTrip')
                                                    <th>Add to Cart</th>
                                                @endif
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                @foreach($keys as $key)
                                                    <th>{{ucfirst($key)}}</th>
                                                @endforeach
                                                @if(\Illuminate\Support\Facades\Request::segment(1) === 'myTrip')
                                                    <th>Add to Cart</th>
                                                @endif
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            {{--@foreach($table_data as $index => $subcategory)
                                                @php
                                                    $active = ($count === 0)?'active':'';
                                                    $count++
                                                @endphp--}}
                                            @foreach($subcategory as $product)
                                                <tr>
                                                    @foreach($keys as $key)
                                                        @if($key == 'price')
                                                            <td>€ {{$product->$key}}</td>
                                                        @else
                                                            <td>{{$product->$key}}</td>
                                                        @endif
                                                    @endforeach
                                                    @if(isset($basket_data) && $basket_data)
                                                        <td>
                                                            <div class="col-xl-12">
                                                                <form class="col-xl-12"
                                                                      id="companyProduct_{{$product->id}}">
                                                                    <input class="col-xl-6 " type="number" value="1">
                                                                    <div class="col-xl-6 d-xl-inline toCart btn btn-success ">
                                                                        Add
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            {{--@endforeach--}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    @else
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Table Example
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach($keys as $key)
                                <th>{{ucfirst($key)}}</th>
                            @endforeach
                            @if(isset($basket) && $basket == true)
                                <th>Add to Cart</th>
                            @endif
                                {{--condition for manage order--}}
                                @if(\Illuminate\Support\Facades\Request::segment(1) === 'orders_list' &&
                           (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('super-admin')))
                                    <th>Manage Order</th>
                                @endif
                                @if(\Illuminate\Support\Facades\Request::segment(1) === 'companies_list' &&
                           (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('super-admin')))
                                    <th>Manage Order</th>
                                @endif
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            @foreach($keys as $key)
                                <th>{{ucfirst($key)}}</th>
                            @endforeach
                            {{--condition for add to basket--}}
                            @if(isset($basket) && $basket == true)
                                <th>Add to Cart</th>
                            @endif
                            {{--condition for manage order--}}
                            @if(\Illuminate\Support\Facades\Request::segment(1) === 'orders_list' &&
                            (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('super-admin')))
                                <th>Manage Order</th>
                            @endif
                            @if(\Illuminate\Support\Facades\Request::segment(1) === 'companies_list'&&
                            (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('super-admin')))
                                <th>Edit Details</th>
                            @endif
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($table_data as $index => $product)
                            @php

                            @endphp
                                <tr>
                                    @foreach($keys as $key)
                                        @if($key== 'products')
                                            @php $display_products = json_decode($product->$key,true)
                                            @endphp
                                            <td style="{{$css}}">@foreach($display_products as $display_product)
                                                    <p class="small">{{$display_product['quantity']}} x {{'['.$display_product['code'].'|'. $display_product['description'] . '] = '.$display_product['sum'] }}</p>
                                            @endforeach
                                            </td>
                                        @elseif($key== 'total_price')
                                            @php
                                               $product->$key = round($product->$key,2,PHP_ROUND_HALF_UP);
                                            @endphp
                                            <td>€ {{$product->$key}}</td>
                                        @else
                                        <td>{{$product->$key}}</td>
                                        @endif
                                    @endforeach
                                        {{--condition for add to basket--}}
                                    @if(isset($basket_data) && $basket_data)
                                        <td>
                                            <div class="col-xl-12">
                                                <form class="col-xl-12" id="companyProduct_{{$product->id}}">
                                                    <input class="col-xl-6 " type="number" value="1">
                                                    <div class="col-xl-6 d-xl-inline toCart btn btn-success ">Add</div>
                                                </form>
                                            </div>

                                        </td>
                                    @endif
                                    {{--condition for manage order--}}
                                        @if(\Illuminate\Support\Facades\Request::segment(1) === 'orders_list' &&
                            (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('super-admin')))
                                            <td>
                                                <div class="col-xl-12" style="margin-top:1rem">
                                                    <form class="col-xl-12" id="order_{{$product->id}}">
                                                        <a href="/edit_order/{{$product->id}}"><div class="col-xl-6 d-xl-inline btn btn-success ">Update</div></a>
                                                    </form>
                                                </div>

                                            </td>
                                        @endif
                                        {{--condition for edit trip--}}
                                            @if(\Illuminate\Support\Facades\Request::segment(1) === 'companies_list' &&
                            (Auth::user()->hasRole('administrator')||Auth::user()->hasRole('super-admin')))
                                            <td>
                                                <div class="col-xl-12" style="margin-top:1rem">

                                                        <a href="/edit_company/{{$product->id}}">
                                                        <div class="col-xl-6 d-xl-inline editCompany btn btn-success">Edit Details</div>
                                                        </a>

                                                </div>

                                            </td>
                                        @endif
                                </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    @endif
@endif
<script>


</script>