@extends('app',['title'=>'Inscription'])

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/inscription.css') }}">
@endsection

@section('content')
    <section id="home">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-4 mt-5">
                <h2 class="text-center text-white">Inscription<h2>
                        <form action="{{ Route('create') }}" method="post" class="mt-5">
                            @csrf
                            <div class="resultat">
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::get('error'))
                                    <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" name="nomEtudiant" placeholder="Votre nom ..." value="{{ old('nomEtudiant') }}">
                                <span class="text-danger"> @error('nomEtudiant')
                                    {{ $message }}
                                @enderror </span>
                            </div>
                            <div class="form-group">
                                <label for="">Prenom</label>
                                <input type="text" class="form-control" name="prenomEtudiant" placeholder="Votre prenom ..." value="{{ old('prenomEtudiant') }}">
                                <span class="text-danger"> @error('prenomEtudiant')
                                    {{ $message }}
                                @enderror </span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="mailEtudiant" placeholder="Votre mail ..." value="{{ old('mailEtudiant') }}">
                                <span class="text-danger"> @error('mailEtudiant')
                                    {{ $message }}
                                @enderror </span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="mdpEtudiant" placeholder="Votre mot de passe ..." value="{{ old('mdpEtudiant') }}">
                                <span class="text-danger"> @error('mdpEtudiant')
                                    {{ $message }}
                                @enderror </span>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input type="submit" class="btn btn-info" value="Connexion">
                            </div>
                        </form>
                        <a href="{{ Route('app_login') }}" class="btn-login">Login</a>
            </div>
        </div>
    </section>
@endsection
