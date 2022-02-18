@extends('app',['title'=>'view'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div class="col-md-12 col-lg-12 mt-2">
            <h4>Liste of products</h4>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>View</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                         <tr>
                             <td>{{ $data->name }}</td>
                             <td>{{ $data->description }}</td>
                             <td class="d-flex"><a href="{{ url('/view',$data->id) }}" class="btn btn-success">View</a></td>
                             <td><a href="{{ url('/download',$data->file) }}" class="btn btn-info">Download</a></td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
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
