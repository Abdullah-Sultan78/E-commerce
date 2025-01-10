@extends('admin.master')
@section('body')
<div class="row mt-4">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Unit Form</h4>
                <hr>
                <form class="form-horizontal p-t-20" action="{{route('unit.update',['id'=>$unit->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Unit Name <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$unit->name}}" name="name" id="exampleInputuname3" placeholder="Unit Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Unit Code <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$unit->code}}" name="code" id="exampleInputuname3" placeholder="Unit Name">
                        </div>
                    </div>
                    <h3 class="text-center text-success">{{session('meassage')}}</h3>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Unit Description <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <textarea  class="form-control" name="description" id="web" placeholder="Unit description">{{$unit->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword5" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <label class="me-3"><input type="radio" name="status" {{$unit->status ==1?'checked':''}} value="1" checked> Published</label>
                            <label><input type="radio" name="status" {{$unit->status ==2?'checked':''}}  value="2">Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Unit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

