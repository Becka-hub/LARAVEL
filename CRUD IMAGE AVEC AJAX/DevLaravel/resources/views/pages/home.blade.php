@extends('base',['title'=>'home'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div id="content" class="mt-2">

        </div>
    </div>
    @if (session('status'))
        <h6 class="alert alert-success">{{ session('status') }}</h6>
    @endif

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
                <form id="addform" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nom vehicule</label>
                            <input type="text" class="form-control" id="nomVehicule" name="nomVehicule"
                                placeholder="Nom vehicule ..." required>
                            <span id="nomError"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Numéro vehicule</label>
                            <input type="text" class="form-control" id="numeroVehicule" name="numeroVehicule"
                                placeholder="Numéro vehicule ..." required>
                            <span id="numeroError"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Numéro vehicule</label>
                            <input type="file" class="form-control" id="imageVehicule" name="imageVehicule" required>
                            <span id="numeroError"></span>
                        </div>

                    </div>
                    <div class="modal-footer bg-info">
                        <button type="submit" class="btn btn-success" onclick="addData()">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
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
                    <input type="hidden" id="updateId"/>
                </div>

                <form method="POST" enctype="multipart/form-data" id="updateform">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nom vehicule</label>
                            <input type="text" class="form-control" id="updateNomVehicule" name="nom"
                                placeholder="Nom vehicule ..." required>
                            <span id="nomError"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Numéro vehicule</label>
                            <input type="text" class="form-control" id="updateNumeroVehicule" name="numero"
                                placeholder="Numéro vehicule ..." required>
                            <span id="numeroError"></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">image vehicule</label>
                            <input type="file" class="form-control" id="updateImageVehicule" name="image"/>
                            <span id="numeroError"></span>
                        </div>


                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
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
        $(document).ready(function() {
            $('#addform').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ Route('app_addVehicule') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        Swal.fire({
                            title: data,
                            icon: 'success'
                        });
                        clearData();
                        readData();
                    }
                });
            });


            $('#updateform').on('submit', function(e) {
                e.preventDefault();
                var id=$('#updateId').val();
                $.ajax({
                    url: "updateVehicule/" + id,
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        Swal.fire({
                            title: data,
                            icon: 'success'
                        });
                        readData();
                        clearUpdateData();

                    }
                });
            });


            readData();
        });



        function clearData() {
            $('#nomVehicule').val("");
            $('#numeroVehicule').val("");
            $('#imageVehicule').val("");
        }

        function clearUpdateData() {
            $('#updateNomVehicule').val("");
            $('#updateNumeroVehicule').val("");
            $('#updateImageVehicule').val("");
        }


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
                        url: "deleteVehicule/" + id,
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




        function GetVehicule(id) {
            $.ajax({
                url: "editVehicule/" + id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#updateId').val(data.id);
                    $('#updateNomVehicule').val(data.nomVehicule);
                    $('#updateNumeroVehicule').val(data.numeroVehicule);
                    $('#updateImageVehicule').val(data.imageVehicule);
                }
            });
        }


    </script>
@endsection
