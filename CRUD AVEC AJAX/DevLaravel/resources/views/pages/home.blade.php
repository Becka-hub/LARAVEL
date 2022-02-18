@extends('app',['title'=>'home'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div id="content" class="mt-2">

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="modal-title text-white" id="exampleModalScrollableTitle">New vehicule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nom vehicule</label>
                        <input type="text" class="form-control" id="nomVehicule" placeholder="Nom vehicule ...">
                        <span id="nomError"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Numéro vehicule</label>
                        <input type="text" class="form-control" id="numeroVehicule" placeholder="Numéro vehicule ...">
                        <span id="numeroError"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Couleur vehicule</label>
                        <input type="text" class="form-control" id="couleurVehicule" placeholder="Couleur vehicule ...">
                        <span id="couleurError"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Propriétaire vehicule</label>
                        <input type="text" class="form-control" id="proprietaireVehicule"
                            placeholder="Propriétaire vehicule ...">
                        <span id="proprietaireError"></span>
                    </div>
                </div>
                <div class="modal-footer bg-info">
                    <button type="button" class="btn btn-success" onclick="addData()">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>







    <!-- Modal -->
    <div class="modal fade" id="ModelUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Modal Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nom vehicule</label>
                        <input type="text" class="form-control" id="UpdatenomVehicule" placeholder="Nom vehicule ...">
                        <span id="nomError"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Numéro vehicule</label>
                        <input type="text" class="form-control" id="UpdatenumeroVehicule" placeholder="Numéro vehicule ...">
                        <span id="numeroError"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Couleur vehicule</label>
                        <input type="text" class="form-control" id="UpdatecouleurVehicule"
                            placeholder="Couleur vehicule ...">
                        <span id="couleurError"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Propriétaire vehicule</label>
                        <input type="text" class="form-control" id="UpdateproprietaireVehicule"
                            placeholder="Propriétaire vehicule ...">
                        <span id="proprietaireError"></span>
                    </div>
                    <input type="hidden" id="updateId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="UpdateData()">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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

        function clearData() {
            $('#nomVehicule').val("");
            $('#numeroVehicule').val("");
            $('#couleurVehicule').val("");
            $('#proprietaireVehicule').val("");
        }

        $(document).ready(function() {
            readData();

        });



        function readData() {
            $.ajax({
                url: "{{ Route('app_listeVehicule') }}",
                type: "GET",
                success: function(data) {
                    $('#content').html(data);

                }
            });
        }


        function Delete(id) {
            Swal.fire({
                title: 'Vous êtes sur de suprimer?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, suprimer!',
                cancelButtonText: 'Non, annuler'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                    url: "/vehicule/delete/" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        readData();
                        Swal.fire(
                        'Suppression!',
                        data,
                        'success'
                    );
                    },
                });


                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Annulation',
                        'Suppression annuler :)',
                        'error'
                    )
                }
            })

        }

        function addData() {
            var nom = $('#nomVehicule').val();
            var numero = $('#numeroVehicule').val();
            var couleur = $('#couleurVehicule').val();
            var proprietaire = $('#proprietaireVehicule').val();
            $.ajax({
                url: "{{ Route('app_ajouteVehicule') }}",
                type: "POST",
                dataType: "json",
                data: {
                    nom: nom,
                    numero: numero,
                    couleur: couleur,
                    proprietaire: proprietaire
                },
                success: function(data) {
                    Swal.fire({
                        title: data,
                        icon: 'success'
                    });
                    readData();
                    clearData();
                },
                error: function(error) {
                    $('#nomError').text(error.responseJSON.errors.nom);
                    $('#numeroError').text(error.responseJSON.errors.numero);
                    $('#couleurError').text(error.responseJSON.errors.couleur);
                    $('#proprietaireError').text(error.responseJSON.errors.proprietaire);
                }
            });
        }


        function GetVehicule(id) {
            $.ajax({
                url: "/vehicule/getVehicule/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#UpdatenomVehicule').val(data.nom);
                    $('#UpdatenumeroVehicule').val(data.numero);
                    $('#UpdatecouleurVehicule').val(data.couleur);
                    $('#UpdateproprietaireVehicule').val(data.proprietaire);
                    $('#updateId').val(data.id);

                }
            });
        }


        function UpdateData() {
            var nom = $('#UpdatenomVehicule').val();
            var numero = $('#UpdatenumeroVehicule').val();
            var couleur = $('#UpdatecouleurVehicule').val();
            var proprietaire = $('#UpdateproprietaireVehicule').val();
            var id = $('#updateId').val();
            $.ajax({
                url: "/vehicule/modifier/" + id,
                type: "POST",
                dataType: "json",
                data: {
                    nom: nom,
                    numero: numero,
                    couleur: couleur,
                    proprietaire: proprietaire,
                },
                success: function(data) {
                    Swal.fire({
                        title: data,
                        icon: 'success'
                    });
                    readData();
                },
                error: function(error) {
                    $('#nomError').text(error.responseJSON.errors.nom);
                    $('#numeroError').text(error.responseJSON.errors.numero);
                    $('#couleurError').text(error.responseJSON.errors.couleur);
                    $('#proprietaireError').text(error.responseJSON.errors.proprietaire);
                }

            });
        }

    </script>
@endsection
