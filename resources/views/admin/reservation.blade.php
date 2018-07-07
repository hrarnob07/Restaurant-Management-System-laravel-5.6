@extends('admin_master.admin_master')
@section('contain_part')
<form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>

<div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <a class="btn btn-primary" href="{{route('show_slider.create')}}">ADD NEW SLIDER</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ALL Reservation</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table"  cellspacing="0" width="100%">
                    <thead class="text-primary">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Time and Date</th>
                                <th>Message</th>
                                <th>Status</th>
                                
                                <th>Action</th>
                                </thead>
                                <tbody>
                      <tbody>
                        @foreach($datas as $data)
                        <tr>
                      
                          <td class="center">
                            {{ $data->id}}
                          </td>
                          <td>
                          {{ $data->name}}
                          </td>
                          <td>
                          {{ $data->phone}}
                          </td>
                          <td>
                          {{ $data->email}}
                          </td>
                          <td>
                          {{ $data->date_and_time}}
                          </td>
                          <td>
                          {{ $data->message}}
                          </td>
                          <th>
                        @if($data->status == true)
                            <span class="label label-info">Confirmed</span>
                        @else
                            <span class="label label-danger">not Confirmed yet</span>
                        @endif

                    </th>
                          <td class="center">
                          
                                             <td>
                                                @if($data->status == false)
                                                <a href="{{URL::to('active/'.$data->id )}}"><i class="material-icons">mode_edit</i></a></li>
                                                @endif
                                                <a href="{{url('delete/'.$data->id)}}"><i class="material-icons">mode_delete</i></a></li>
                                            </td>                        
                          
                          
                                                                  
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
       
        <script>
        $(document).ready(function() {
            $('#table').DataTable();
        } );
    </script>
@endsection