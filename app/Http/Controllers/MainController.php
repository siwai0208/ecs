<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item; 
use App\Models\Cart; 

class MainController extends Controller
{
    public function index()
    {
        $items = Item::Paginate(15); 
        return view('main', compact('items'));
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart',$data);
    }

    public function addMyCart(Request $request, Cart $cart)
    {
        $item_id=$request->item_id;
 
        $message = $cart->addCart($item_id);
 
        $data = $cart->showCart();
 
        return view('mycart', $data)->with('message', $message);
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        $item_id=$request->item_id;

        $message = $cart->deleteCart($item_id);

        $data = $cart->showCart();

        return view('mycart', $data)->with('message', $message);
    }

    public function checkout(Request $request, Cart $cart)
    {
        $user = Auth::user();
        // $mail_data['user']=$user->name;
        $checkout=$cart->checkoutCart(); 
        // Mail::to($user->email)->send(new Thanks($mail_data));
        return view('checkout', $checkout);
    }

}