@extends('app',['title'=>'home'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="col-md-4 col-lg-4 mt-5">
            <form action="{{ url('uploadproduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Produit Name">
                </div>
                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="Produit Description">
                </div>
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
                <div class="d-flex">
                    <div class="form-group">
                        <input type="submit" value="Ajouter" class="btn btn-success">
                    </div>
                    <div class="form-group ml-2">
                        <a href="{{ Route('app_view') }}" class="btn btn-info">View</a>
                    </div>
                </div>
            </form>

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
