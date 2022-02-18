@extends('app',['title'=>'Profie'])

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <section>
        <div class="d-flex justify-content-center">
            <div class="col-md-4 mt-5">
                <h2 class="text-center">Profile</h2>
                <table class="table table-hover mt-2">
                   <thead>
                       <th>Nom</th>
                       <th>Prenom</th>
                       <th>Mail</th>
                       <th>Actions</th>
                   </thead>
                   <tbody>
                       <tr>
                           <td>{{ $LoggedEtudiantInfo->nomEtudiant }}</td>
                           <td>{{ $LoggedEtudiantInfo->prenomEtudiant }}</td>
                           <td>{{ $LoggedEtudiantInfo->mailEtudiant }}</td>
                           <td><a href="logout">Logout</a></td>
                       </tr>
                   </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
