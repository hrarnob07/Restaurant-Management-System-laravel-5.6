@extends('admin_master.admin_master')
@section('contain_part')

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Edit Category</h4>
                        </div>
                        <div class="card-content">
                            <form method="POST" action="{{URL::to('admin/item_update/'.$data->id)}}" enctype="multipart/form- data">
                                @csrf

                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Item Name</label>
                                            <input type="text" class="form-control" value="{{$data->name}}" name="name">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cateroy Name</label>
                                            <select class="form-control" name="category_id">
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}" >{{$category->name}}</option>
                                            @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>

                                

                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Item Description</label>
                                            <input type="text" class="form-control" value="{{$data->description}}" name="description">
                                        </div>
                                    </div>
                                </div>




                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Item Price</label>
                                            <input type="text" class="form-control" value="{{$data->price}}" name="price">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label">Image</label>
                                        <input type="file" value="{{$data->image}} name="image">
                                    </div>
                                </div>
                            
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger">Back</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection