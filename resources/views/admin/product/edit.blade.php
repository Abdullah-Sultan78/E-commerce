@extends('admin.master')
@section('body')
<div class="row mt-4">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product </h4>
                <hr>
                <h3 class="text-center text-success">{{session('meassage')}}</h3>
                <form class="form-horizontal p-t-20" action="{{route('product.update',['id' =>$product->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label" >Category Name <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id" id="categoryId">
                                <option value="" disabled selected>.......Seleted Category......</option>
                                   @foreach ($categories as $category )
                                <option value="{{$category->id}}" {{$category->id == $product->category_id? 'selected':''}}>{{$category->name}}</option>
                                   @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Sub Category Name <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="sub_category_id"  id="subCategoryId">
                                <option value="" disabled selected>.......Seleted Sub  Category......</option>
                                   @foreach ($sub_categories as $sub_category )
                                <option value="{{$sub_category->id}}" {{$sub_category->id == $product->sub_category_id? 'selected':''}}>{{$sub_category -> name}}</option>
                                   @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Brand Name <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="brand_id">
                                <option value="" disabled selected>.......Seleted Brand......</option>
                                   @foreach ($brands as $brand )
                                <option value="{{$brand->id}}" {{$brand->id == $product->brand_id? 'selected':''}}>{{$brand->name}}</option>
                                   @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Unit Name <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="unit_id">
                                <option value="" disabled selected>.......Seleted Unit......</option>
                                   @foreach ($units as $unit )
                                <option value="{{$unit->id}}" {{$unit->id == $product->unit_id? 'selected':''}}>{{$unit->name}}</option>
                                   @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Product Name <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->name}}" name="name" id="" placeholder=" Product Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Product Code <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->code}}" name="code" id="" placeholder="Product Code">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Product Model</label>
                        <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->model}}" name="model" id="" placeholder="Product Model">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Product Stock amount <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->stock_amount}}" name="stock_amount" id="" placeholder="Product Stock amount ">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Product Price<span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" value="{{$product->regular_price}}" name="regular_price" id="" placeholder="Regular price">
                                <input type="number" class="form-control" value="{{$product->selling_price}}" name="selling_price" id="" placeholder="Selling price">
                            </div>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Short Description <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <textarea  class="form-control" name="short_description" id="web" placeholder=" Short description">{{$product->short_description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Long Description <span class="text-danger">*<span></label>
                        <div class="col-sm-9">
                                <textarea  class="form-control summernote" name="long_description" id="web" placeholder=" Long description">{{$product->long_description}}</textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputPassword41" class="col-sm-3 control-label">Features Image</label>
                        <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify" accept="image/*" />
                                <img src="{{asset($product->image)}}" alt="" height="100" width="130">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword41" class="col-sm-3 control-label">Other Image</label>
                        <div class="col-sm-9">
                                <input type="file" name="other_image[]" multiple id="input-file-now" class="dropify" accept="image/*" />

                        @foreach ($product->otherImages as $otherImage)
                        <img src="{{asset($otherImage->image)}}" alt="" height="100" width="130">
                        @endforeach
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="inputPassword5" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <label class="me-3"><input type="radio" {{$product->status == 1?'checked':''}} name="status" value="1" > Published</label>
                            <label><input type="radio" {{$product->status == 2?'checked':''}}  name="status" value="2">Unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Product </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
