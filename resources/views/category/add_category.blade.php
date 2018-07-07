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
                            <form method="POST" action="{{url('admin/add_category')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Cateroy Name</label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
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