<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\Category;
use App\Type;
use App\Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Auth;

use Stripe\Stripe;
use Stripe\Charge;


class ProductController extends Controller
{
    public function getIndex() {
        
        $categories = Category::all();
        $products = Product::all();
        $types = Type::all();
        
        $catprodtype = Category::with('products.types')->get();
        
//        dd($catprodtype);
        
        return view('shop.index', ['products' => $products, 'categories' => $categories, 'types' => $types, 'catprodtype' => $catprodtype]);
     }
    
    public function getAddToCart(Request $request, $id, $id1 = null) {
        
        $product = Product::find($id);
        $type = Type::find($id1);
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $type);
        
        Session::put('cart', $cart);
        
        $request->session()->put('cart', $cart);
        
        return redirect()->route('product.index');
    }
    
    public function getReduceByOne($id) {
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        
        if (count($cart->items) >0){
            
            Session::put('cart', $cart);
        } else {
            
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    
    public function getIncreaseByOne($id) {
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->increaseByOne($id);
        
        Session::put('cart', $cart);
        return redirect()->route('product.shoppingCart');
    }
    
    public function getRemoveItem($id) {
        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        
        if (count($cart->items) >0){
            
            Session::put('cart', $cart);
        } else {
            
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    
    public function getCart() {
        
        if(!(Session::has('cart'))){
            return view('shop.shopping-cart');
        }
        
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
//        Session::forget('cart');
        
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    
    public function getCheckout() {
        
        if(!(Session::has('cart'))){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        
        return view('shop.checkout', ['total' => $total]);
    }
    
    public function postCheckout(Request $request) {
        
        if(!(Session::has('cart'))) {
            return redirect()->route('product.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        Stripe::setApiKey('sk_test_Em9i0RnC1fR7pyOrIHcr7GhT');
    
        $token = $_POST['stripeToken'];
        
        //try to charge users card
        try { 
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice*100,
                "currency" => "gbp",
                "description" => "Example charge",
                "source" => $token,
            ));
            $order = new Order();
            $order->cart = serialize($cart);
            $order->name = $request->input('nameOnCard');
            $order->tel = $request->input('telNum');
            $order->address = $request->input('address');
            $order->payment_id = $charge->id;
            
            Auth::user()->orders()->save($order);
            
            Session::forget('cart');
            return redirect()->route('product.index')->with('success', 'Successfully purchased');
             
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        
        
    }
    
}
