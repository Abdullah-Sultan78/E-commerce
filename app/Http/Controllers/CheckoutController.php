<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

use Session;
use ShoppingCart;

class CheckoutController extends Controller
{
    private $order, $orderDetail, $email, $customer;
    public function index()
    {
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            $this->customer = '';
        }
        return view('website.checkout.index',['customer' => $this->customer ])   ;
    }

    public function orderCustomerValidate($request)
    {

        $request -> validate([
              'name'    => 'required',
              'email'   => 'required|unique:customers,email',
              'mobile' => 'required|unique:customers,mobile',
              'delivery_address' => 'required',

        ]);
    }

    public function newCashOrder(Request $request)
    {
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {

            $this->orderCustomerValidate($request);
            $this->customer = Customer::newCustomer($request);
            Session::put('customer_id',$this->customer->id);
            Session::put('customer_name',$this->customer->name);

        }

        //  return ShoppingCart::all();
        $this->order =  Order::newOrder($request,$this->customer->id);
           OrderDetail::newOrderDetail($this->order->id);
        return redirect('/complete-order')->with('meassage','Congratulation Your order info  post successfully.Please wait , we will contact with you soon.');

    }
    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }

    public function checkCustomerEmail()
    {
        $this ->email = $_GET['email'];
        $this ->customer = Customer::where('email', $this ->email)->first();
        if($this->customer){
            return response()->json([
                'success'=>false,
                'message' => "Email address already exist"
            ]);

        }
        return response()->json([
            'success'=>true,
            'message' => "Email address available"
        ]);
        // return response()->json( $this ->email);
    }
}
