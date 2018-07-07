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
            <a class="btn btn-primary" href="{{url('admin/add_item')}}">ADD NEW Item</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ALL Slider</h4>
                  
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table"  cellspacing="0" width="100%">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                        Name
                        </th>
                        <th>
                         Image
                        </th>
                        <th>
                         Category Name
                        </th>
                        <th>
                         Description
                        </th>
                        <th>
                         Price
                        </th>
                        <th>
                         Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($datas as $data)
                        <tr>
                      
                          <td class="center">
                            {{$data->id}}
                          </td>
                          <td>
                          {{ $data->name}}
                          </td>
                          <td>
                          <img src="{{url( $data->image)}}" style="height: 80px;width: 80px;">
                         
                          </td>
                          <td>
                          {{ $data->category->name}}
                          </td>
                          <td>
                          {{ $data->description}}
                          </td>
                          <td>
                          {{ $data->price}}
                          </td>

                          <td class="center">
                          
                          <a href="{{URL::to('admin/edit_item/'.$data->id)}}"><i class="material-icons">mode_edit</i></a></li>
                          <a href="{{URL::to('admin/item_delete/'.$data->id)}}"><i class="material-icons">mode_delete</i></a></li>                                                                                         
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