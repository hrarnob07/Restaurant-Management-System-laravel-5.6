@extends('admin_master.admin_master')
@section('contain_part')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Add New Cateroy</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{url('admin/save_item')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Item Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cateroy Name</label>
                                            <select class="form-control" name="category_id">
                                            @foreach($datas as $data)
                                            <option value="{{$data->id}}" >{{$data->name}}</option>
                                            @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>

                                

                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Item Description</label>
                                            <input type="text" class="form-control" name="description">
                                        </div>
                                    </div>
                                </div>




                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Item Price</label>
                                            <input type="text" class="form-control" name="price">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                               
                               
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection