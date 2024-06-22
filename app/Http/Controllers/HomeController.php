<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($orderName = 'ASC', $orderPrice = 'DESC', $minPrice = 1, $maxPrice = 100)
    {
        $makes = Db::table('products')
                    ->groupBy('make')
                    ->select('make')
                    ->get();
        $countries = Db::table('products')
                    ->groupBy('country')
                    ->select('country')
                    ->get();
        $products = Db::table('products')
                    ->get();
        $user = DB::table('users')->first();
        $countOfCart = Db::table('carts')
                        ->where('user_id', $user->id)
                        ->count();
        return view('index', compact('minPrice',
                                         'maxPrice',
                                                    'orderName',
                                                    'orderPrice',
                                                    'makes',
                                                    'countries',
                                                    'countOfCart',
                                                    'products'));
    }

    public function buyProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required'
        ]);
        $product_id = $request->get('product_id');
        $user = DB::table('users')->first();
        $productInCart = DB::table('carts')
                                    ->where('user_id', $user->id)
                                    ->where('product_id', $product_id)
                                    ->first();
        if(isset($productInCart)){
            Db::table('carts')
                ->where('id', $productInCart->id)
                ->update(['quantity' => $productInCart->quantity + 1]);
        }
        else
        {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product_id,
                'quantity' => 1,
            ]);
        }
        return redirect()->route('home')->with('success', 'Successfully buy product');
    }

    public function cart()
    {
        $user = DB::table('users')->first();
        $products = DB::table('carts')
                    ->where('user_id', $user->id)
                    ->join('products', 'carts.product_id', '=', 'products.id')
                    ->select('products.*', 'carts.quantity', 'carts.id as cart_id')
                    ->get();

        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $product->quantity;
        }
        return view('cart', compact('products', 'total'));
    }

    public function removeProductFromCart(Request $request)
    {
        $cartId = $request->get('cart_id');
        $cartRow = DB::table('carts')
                        ->find($cartId);
        if(isset($cartRow)){
            Db::table('carts')
                ->delete($cartId);
        }
        return redirect()->route('home')->with('success', 'Successfully remove product from cart');
    }
}
