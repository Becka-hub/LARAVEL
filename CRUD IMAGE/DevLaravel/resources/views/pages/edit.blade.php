@extends('base',['title'=>'home'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection
@section('content')
    <div class="container">
        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

         <h1 class="text-center">Update Vehicule</h1>
        <form action="{{ url('updateVehicule/'.$vehicule->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputPassword1">Nom vehicule</label>
                <input type="text" class="form-control" id="nomVehicule" name="nomVehicule" placeholder="Nom vehicule ..."
                    required value="{{ $vehicule->nomVehicule }}">
                <span id="nomError"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Numéro vehicule</label>
                <input type="text" class="form-control" id="numeroVehicule" name="numeroVehicule"
                    placeholder="Numéro vehicule ..." required value="{{ $vehicule->numeroVehicule }}">
                <span id="numeroError"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Numéro vehicule</label>
                <input type="file" class="form-control" id="imageVehicule" name="imageVehicule" required>
                    <img src="{{ asset('uploads/vehicules/'.$vehicule->imageVehicule) }}" alt="image" width="70px" height="70px">
                <span id="numeroError"></span>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ url('/') }}" class="btn btn-success">Liste</a>
        </form>




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
