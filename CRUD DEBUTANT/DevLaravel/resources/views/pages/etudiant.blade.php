@extends('app',['title'=>'Etudiant'])

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/etudiant.css') }}">
@endsection

@section('content')
    <section id="etudiant">
        <div class="container">
            <h4 class="mt-3 mb-3">Liste des etudiants inscrits</h4>
            {{-- if la session successDelete existe --}}
            @if (session()->has('successDelete'))
                <div class="alert alert-success">
                    {{ session()->get('successDelete') }}
                </div>
            @endif

            <div class="d-flex justify-content-between">
                <div class="button_pagination">
                    {{ $etudiants->links() }}
                </div>
                <div class="button_ajouter">
                    <a href="{{ Route('app_createEtudiant') }}" class="btn btn-primary mb-2">Ajouter un nouvelle
                        etudiant</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Classe</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->prenom }}</td>
                                <td>{{ $etudiant->classe->libelle }}</td>
                                <td><a href="{{Route("app_afficheEtudiant",['etudiant'=>$etudiant->id])}}" class="btn btn-info">Modifier</a>
                                    <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment suprimer cet etudiant?')){
                                                document.getElementById('form-{{ $etudiant->id }}').submit();
                                            }">Suprimer</a>
                                </td>
                                <form id="form-{{ $etudiant->id }}"
                                    action="{{ Route('app_supressionEtudiant', ['etudiant' => $etudiant->id]) }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
