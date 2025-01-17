@extends('website.master')
@section('title')
Profile page
@endsection
@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Profile</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <p class="text-center text-danger">{{session('meassage')}}</p>
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="list-group">
                        {{-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                          The current link item
                        </a> --}}
                        <a href="{{route('customer.dashboard')}}" class="list-group-item list-group-item-action">Dashboard</a>
                        <a href="{{route('customer.profile')}}" class="list-group-item list-group-item-action">Profile</a>
                        <a href="{{route('customer.order')}}" class="list-group-item list-group-item-action">Order</a>
                        <a href="#" class="list-group-item list-group-item-action">Account</a>
                        <a href="#" class="list-group-item list-group-item-action">Change Password</a>
                        <a href="#" class="list-group-item list-group-item-action">Logout</a>

                      </div>
                </div>
                <div class="col-md-9">
                    <div class="card-body">
                        <h2>Profile</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
