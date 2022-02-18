@extends('base',['title'=>'home'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div id="content" class="mt-2">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>NUMERO</th>
                        <th>IMAGE</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vehicule as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nomVehicule }}</td>
                            <td>{{ $item->numeroVehicule }}</td>
                            <td><img src="{{ asset('uploads/vehicules/' . $item->imageVehicule) }}" alt="image"
                                    height="80px" width="80px"></td>
                            <td><a href="{{ url('editVehicule/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            <td>

                                <form action="{{ url('deleteVehicule/'.$item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
                <form action="{{ url('addVehicule') }}" method="POST" enctype="multipart/form-data">
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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

    </script>
@endsection
