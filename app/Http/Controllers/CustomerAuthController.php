<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

use function Laravel\Prompts\password;

class CustomerAuthController extends Controller
{
    private $customer;
    public function index()
    {
        return view('customer.index');
    }

    public function login(Request $request)
    {
        // return $request->all();
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer) {
            if (password_verify($request->passward, $this->customer->passward)) {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('customer.dashboard');
            } else {
                return back()->with('meassage', 'Invalid password');
            }
        } else {
            return back()->with('meassage', 'Invalid email address');
        }
    }

    public function register(Request $request)
    {
        //    return $request->all();
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|unique:customers,email',
            'mobile'   => 'required|unique:customers,mobile',
            'passward' => 'required',
        ]);

       $this->customer =  Customer::newCustomer($request);
        Session::put('customer_id',$this->customer->id);
        Session::put('customer_name',$this->customer->name);
        return redirect('/customer.dashboard');
    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/');
    }

    public function profile()
    {
        return view('customer.profile');
    }
    public function dashboard()
    {
        return view('customer.dashboard');
    }
}
