@extends('admin.master')
@section('body')
<div class="row mt-4">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Category Form</h4>
                <hr>
                <form class="form-horizontal p-t-20" action="{{route('category.new')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Category Name <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="exampleInputuname3" placeholder="Category Name">
                        </div>
                    </div>
                    <h3 class="text-center text-success">{{session('meassage')}}</h3>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Category Description <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <textarea  class="form-control" name="description" id="web" placeholder="Category description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Category Image</label>
                        <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword5" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <label class="me-3"><input type="radio" name="status" value="1" checked> Published</label>
                            <label><input type="radio" name="status" value="2">Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create new category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
