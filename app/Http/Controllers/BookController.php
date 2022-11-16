<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Services\CartService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        dd($_SERVER);
        $books = Book::paginate(5);

        return view('index', compact(['books']));
    }

    public function getAddToCart(Request $request, $id)
    {
        $book = Book::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CartService($oldCart);
        $cart->add($book, $book->id);
        Session::put('cart', $cart);
        return redirect('/');
    }

    public function cart()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CartService($oldCart);
        return view('cart',[
            'books'=> $cart->items,
            'totalPrice'=> $cart->totalPrice,
            'totalQty'=>$cart->totalQty]);
    }

    public function increaseByOne($id)
    {
        $cart = new CartService(Session::get('cart'));
        $cart->increaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('BooksController@cart');
    }

    public function decreaseByOne($id)
    {
        $cart = new CartService(Session::get('cart'));
        $cart->decreaseByOne($id);
        session()->put('cart', $cart);
        return redirect()->action('BooksController@cart');
    }

    public function removeItem($id)
    {
        $cart = new CartService(Session::get('cart'));
        $cart->removeItem($id);
        session()->put('cart', $cart);
        return redirect()->action('BooksController@cart');
    }

    public function clearCart()
    {
        if(session()->has('cart')){
            session()->forget('cart');
        }
        return redirect()->action('BooksController@index');
    }
}
