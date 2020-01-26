@extends('layouts.app')

@section('content')
    <script>

                $( function() {
                    $( '#start_date').datepicker({

                        format: 'yyyy-mm-dd'

                    });
                    $( '#end_date').datepicker({

                        format: 'yyyy-mm-dd'

                    });

                } );
    </script>
    <form method="GET" action="/get-quotes" class="offset-3 col-lg-3">
        @csrf
        @foreach($fields as $field=> $data)
            <div class="form-group">
                <label for="{{$field}}">{{$data['label']}}</label>
                <input id="{{$field}}" type="{{$data['type']}}" class="@error('{{$field}}') is-invalid @enderror">
                @error('{{$field}}')
                <small class="alert alert-danger">{{ $message }}</small>
                @enderror
            </div>
        @endforeach
        <div class="btn btn-primary submit-form">Submit</div>
    </form>
    {{--@include('widgets.area_chart')

    @include('widgets.datatables')--}}
@endsection

@section('scripts')
    <!-- Demo scripts for this page-->
    {{--<script src="{{\Illuminate\Support\Facades\URL::to('js/demo/datatables-demo.js')}}"></script>
    <script src="{{\Illuminate\Support\Facades\URL::to('js/custom_scripts.js')}}"></script>--}}
   {{-- <script src="{{\Illuminate\Support\Facades\URL::to('js/demo/chart-area-demo.js')}}"></script>--}}
@endsection
