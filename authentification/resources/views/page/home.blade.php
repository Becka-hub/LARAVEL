@extends('app',['title'=>'Accueil'])

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <section id="home">
        <h1 class="text-center mt-5 text-white">Bienvenue dans BeckasCoder</h1>
        <div class="d-flex justify-content-center mt-5">
           <a class="btn btn-success btn-sm"  href="{{ Route('app_login') }}">Se connecter</a>
        </div>
    </section>
@endsection
