@extends('admin.master')
@section('body')
<div class="row mt-4">
    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Product information</h4>
                <h6 class="card-subtitle"></h6>
                <div class="table-responsive m-t-40">
                    <p class="text-center text-success"> {{Session::get('meassage')}}</p>
                    <table  class="table table-striped border">
                        <tr>
                            <th>Product Id</th>
                            <td>{{$product->id}}</td>
                        </tr>
                        <tr>
                            <th>Product Name</th>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr>
                            <th>Product code</th>
                            <td>{{$product->code}}</td>
                        </tr>
                        <tr>
                            <th>Product Model</th>
                            <td>{{$product->model}}</td>
                        </tr>
                        <tr>
                            <th>Product Category</th>
                            <td>{{$product->category->name}}</td>
                        </tr>
                        <tr>
                            <th>Product sub Category</th>
                            <td>{{$product->subCategory->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Brand</th>
                            <td>{{$product->brand->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Unit</th>
                            <td>{{$product->unit->name}}</td>
                        </tr>
                        <tr>
                            <th>Product Stock Amount</th>
                            <td>{{$product->stock_amount}}</td>
                        </tr>
                        <tr>
                            <th>Product Regular Price</th>
                            <td>{{$product->regular_price}}</td>
                        </tr>
                        <tr>
                            <th>Product Selling Price</th>
                            <td>{{$product->selling_price  }}</td>
                        </tr>
                        <tr>
                            <th>Product Featured Image</th>
                            <td><img src="{{asset($product->image)}}" alt="" height="100" width="140"> </td>
                        </tr>
                        <tr>
                            <th>Product Other Image</th>
                            <td>
                                @foreach ($product->otherImages as $otherImage )
                                <img src="{{asset($otherImage->image)}}" alt=" " height="100" width="120">
                                @endforeach
                            </td>

                            </tr>
                        <tr>
                            <th>Product Hit Count</th>
                            <td> {{$product->hit_count}}</td></td>
                        </tr>
                        <tr>
                            <th>Product sales count</th>
                            <td>{{$product->sales_count}}</td>
                        </tr>
                        <tr>
                            <th>Product Feature Status</th>
                            <td>{{$product->status == 1?'Feature':'Not Feature'}}</td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{$product->status == 1?'published':'unpublished'}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

