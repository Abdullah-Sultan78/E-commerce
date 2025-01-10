<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Validate;
use Session;

class Customer extends Model
{
    private static $customer;

    public static function newCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->mobile = $request->mobile;

        if($request->passward)
        {
            self::$customer->passward = bcrypt($request->passward);
        }
        else
        {
            self::$customer->passward = bcrypt($request->mobile);
        }

        self::$customer->save();
        return  self::$customer;


    }
}
