@extends('app',['title'=>'Etudiant'])

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/createEtudiant.css') }}">
@endsection

@section('content')
    <section id="cretaeEtudiant">
        <div class="container">
            <h4 class="mt-3 mb-3">Edition d'un etudiant</h4>
            {{-- if la session success existe --}}
            @if(session()->has("success"))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            {{-- si il y a une erreur errors->any --}}
            @if ($errors->any())
                <div class="error_validation">
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form style="width: 60%;" method="post" action="{{ Route('app_editeEtudiant',['etudiant'=>$etudiantAffiche->id]) }}">
                @csrf
                {{-- @csrf perme d'authentifier la source de la requete --}}
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control form-control-sm" name="nom" value="{{ $etudiantAffiche->nom }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Prénom</label>
                    <input type="text" class="form-control form-control-sm" name="prenom" value=" {{$etudiantAffiche->prenom}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Classe</label>
                    <select class="custom-select custom-select-sm mb-3" name="classe_id">
                            @foreach ($classes as $classe)
                                @if($classe->id==$etudiantAffiche->classe_id)
                                <option value="{{$classe->id}}" selected>{{$classe->libelle}}</option>
                                @else
                                <option value="{{$classe->id}}">{{$classe->libelle}}</option>
                                @endif
                            @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ Route('app_etudiant') }}" class="btn btn-danger">Annuler</a>
            </form>

        </div>
    </section>
@endsection
