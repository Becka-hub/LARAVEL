@extends('app',['title'=>'view_products'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="col-md-12 col-lg-12 mt-2">
            <h4>PRODUCTS</h4>
            <hr>
            <div class="table-responsive">
             <h6>{{ $data->name }}</h6>
             <h6>{{ $data->description }}</h6>
             <iframe src="/assets/{{ $data->file }}" height="400" width="400"></iframe>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
@endsection
