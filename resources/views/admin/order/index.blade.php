@extends('admin.master')
@section('body')
<div class="row mt-4">
    <div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Order Information</h4>

                <div class="table-responsive m-t-40">
                    <p class="text-center text-success"> {{Session::get('meassage')}}</p>
                    <table id="myTable" class="table table-striped border">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Order No</th>
                                <th>Order Date</th>
                                <th>Customer Info</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Payment Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->customer->name.'('.$order->customer->mobile.')'}}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>
                                    <a href="{{route('admin.order-detail',['id'=>$order->id])}}" class="btn btn-info btn-sm" title="View order details">
                                        <i class="ti-book"></i>
                                    </a>
                                    <a href="{{route('admin.order-edit',['id'=>$order->id])}}" class="btn btn-success btn-sm" title="Order Edit">
                                        <i class="ti-reddit"></i>
                                    </a>
                                    <a href="{{route('admin.order-invoice',['id'=>$order->id])}}" class="btn btn-primary btn-sm" title=" View Order Invoice">
                                        <i class="ti-infinite"></i>
                                    </a>

                                    <a href="{{route('admin.print-invoice',['id'=>$order->id])}}" target="_blank" class="btn btn-warning btn-sm" title=" Print Order Invoice">
                                        <i class="ti-dropbox"></i>
                                    </a>
                                    <a href="{{route('admin.order-delete',['id'=>$order->id])}}" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm('Are you sure to delete this')">
                                        <i class="ti-trash"></i>
                                    </a>
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
@endsection

