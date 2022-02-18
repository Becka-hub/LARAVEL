@extends('app',['title'=>'home'])


@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
@endsection


@section('content')
    <div class="container">
        <div id="content" class="mt-2">
           <h3 class="text-center">Search Customer Data in Laravel using Ajax</h3>
           <div class="panel panel-default">
               <div class="panel-body">
                  <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                  </div>
                  <div class="table-responsive">
                      <h3 class="text-center">Total Data : <span id="total_records"></span></h3>
                      <table class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 <th>Name</th>
                                 <th>Address</th>
                                 <th>City</th>
                                 <th>Postal code</th>
                                 <th>Country</th>
                             </tr>
                         </thead>
                         <tbody>

                         </tbody>
                      </table>
                  </div>
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


        $(document).ready(function() {

            feact_data();

            function feact_data(query = ''){
               $.ajax({
                  url:"{{ route('app_live_search') }}",
                  method:'GET',
                  data:{query:query},
                  dataType:'json',
                  success:function(data){
                      $('tbody').html(data.table_data);
                      $('#total_records').text(data.total_data);
                  }

               });
            }


            $(document).on('keyup','#search',function(){
                var query=$(this).val();
                feact_data(query);
            });

        });





    </script>
@endsection
