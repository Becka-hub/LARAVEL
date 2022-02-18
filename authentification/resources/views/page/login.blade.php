@extends('app',['title'=>'Login'])

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <section id="home">
        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-4 mt-5">
                <h2 class="text-center text-white">Login<h2>
                        <form action="{{ Route('check') }}" method="post" class="mt-5">
                            @csrf
                            <div class="resultat">
                                @if (Session::get('error'))
                                    <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                    </div>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control"  name="mailEtudiant" placeholder="Votre mail ..." value="{{ old('mailEtudiant') }}">
                                <span class="text-danger"> @error('mailEtudiant')
                                    {{ $message }}
                                @enderror </span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="mdpEtudiant" placeholder="Votre mot de passe ...">
                                <span class="text-danger"> @error('mdpEtudiant')
                                    {{ $message }}
                                @enderror </span>
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <input type="submit" class="btn btn-info" value="Connexion">
                            </div>
                        </form>
                        <a href="{{ Route('app_inscription') }}" class="btn-inscription">Inscription</a>
            </div>
        </div>
    </section>
@endsection
