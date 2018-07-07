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
                          Title
                        </th>
                        <th>
                          Sub Titile
                        </th>
                        <th>
                          Image
                        </th>
                        <th>
                         Action
                        </th>
                      </thead>
                      <tbody>
                        @foreach($datas as $data)
                        <tr>
                      
                          <td class="center">
                            {{ $data->id}}
                          </td>
                          <td>
                          {{ $data->title}}
                          </td>
                          <td>
                          {{ $data->sub_title}}
                          </td>
                          <td>
                          {{ $data->image}}
                          </td>
                          <td class="center">
                          
                          <a href="{{route('show_slider.edit',$data->id)}}"><i class="material-icons">mode_edit</i></a></li>
                         <a href="{{route('show_slider.destroy',$data->id)}}"><i class="material-icons">mode_delete</i></a></li>                         
<!--                           
                          <form id="delete-form-{{$data->id}}" action="{{ route('show_slider.destroy',$data->id) }}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                   
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $data->id }}').submit();
                                                }else {
                                                    event.preventDefault();
                                                        }"><i class="material-icons">delete</i></button> -->
                                                                  
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