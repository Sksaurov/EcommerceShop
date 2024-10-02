<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;

class HomeController extends Controller
{
    public function adminHome(){
        $data2= Order::count();
        $data3= Product::count();
        $data = User::where('userType','user')->get()->count();
        $data4 = Order::where('status','delivered')->get()->count();
        return view('admin.adminHome',compact('data','data2','data3','data4'));
    }
    public function mainHome(){
        $data = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userID = $user->id;
            $count = Cart::where('user_id',$userID)->count();
        }

     else{
        $count='';
     }
       
        return view('home.index',compact('data','count'));
    }
    public function login_Home(){
        $data = Product::all();
        if(Auth::id()){
            $user = Auth::user();
            $userID = $user->id;
            $count = Cart::where('user_id',$userID)->count();
        }

     else{
        $count='';
     }
        return view('home.index',compact('data'),compact('data','count'));
    }

    public function product_details($id){
        $data = Product::find($id);
        if(Auth::id()){
            $user = Auth::user();
            $userID = $user->id;
            $count = Cart::where('user_id',$userID)->count();
        }

     else{
        $count='';
     }
    return view('home.product_details',compact('data','count'));
    }
    public function add_cart($id){
     $product_id = $id;
     $user = Auth::user();
     $user_id = $user->id;
    $data = new Cart;
    $data->user_id=$user_id;
    $data->product_id = $product_id;
    $data->save();
    toastr()->closeButton()->Addsuccess('cart updated.');
    return redirect()->back();

    }
    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();
            $userID = $user->id;
            $count = Cart::where('user_id',$userID)->count();
            $cart = Cart::where('user_id',$userID)->get();
        }

     else{
        $count='';
     }
        return view('home.mycart',compact('count','cart'));
    }
    public function cart_delete($id){
        $data = Cart::find($id);
        $data->delete();
        toastr()->closeButton()->Addsuccess('deleted.');
        return redirect()->back();
    }

    public function confirm_order(Request $request){
      $name = $request->name;
      $address = $request->address;
      $phone = $request->phone;
      $user_id = Auth::id();
      $cart = Cart::where('user_id',$user_id)->get();
      

      foreach($cart as $carts){
        $order = new Order;
        $order->name= $name;
        $order->rec_address= $address;
        $order->phone= $phone;
        $order->user_id= $user_id;
        $order->product_id = $carts->product_id;
        $order->save();

        

      }
       $cart_remove = Cart::where('user_id',$user_id)->get();
       foreach($cart_remove as $remove){
        $data = Cart::find($remove->id);
        $data->delete();
       }




      return redirect()->back();
     
    
    
    }
    public function myorder(){
     $data = Auth::user();
     $userId = $data->id;
     $count= Order::where('user_id',$userId)->get()->count();
     $maindata= Order::where('user_id',$userId)->get();

     return view('home.order',compact('count','maindata'));
    }

    public function stripe($value)

    {

        return view('home.stripe',compact('value'));

    }
    
    public function stripePost(Request $request,$value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

      

        $name =Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $user_id = Auth::id();
        $cart = Cart::where('user_id',$user_id)->get();
        
  
        foreach($cart as $carts){
          $order = new Order;
          $order->name= $name;
          $order->rec_address= $address;
          $order->phone= $phone;
          $order->user_id= $user_id;
          $order->product_id = $carts->product_id;
          $order->payment_status="paid";
          $order->save();

  
          
  
        }
         $cart_remove = Cart::where('user_id',$user_id)->get();
         foreach($cart_remove as $remove){
          $data = Cart::find($remove->id);
          $data->delete();
         }
  
  
  
         toastr()->closeButton()->Addsuccess('successfully paid.');
        return redirect('mycart');
       

    }

}


