<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function tambahKeranjang(Request $request)
    {
        $checkCart = Cart::where('user_id', Auth::user()->id)->first();
        $total_harga = $request->harga_buah * $request->kuantitas;

        if ($checkCart) {
            $checkCart->update([
                'jumlah_produk' => $checkCart->jumlah_produk + 1,
                'total_harga' => $checkCart->total_harga + $total_harga,
            ]);
            CartItem::create([
                'kuantitas' => $request->kuantitas,
                'cart_id' => $checkCart->id,
                'buah_id' => $request->buah_id,
            ]);
        } else {
            $cart = Cart::create([
                'jumlah_produk' => 1,
                'total_harga' => $total_harga,
                'user_id' => $request->user_id,
            ]);

            CartItem::create([
                'kuantitas' => $request->kuantitas,
                'cart_id' => $cart->id,
                'buah_id' => $request->buah_id,
            ]);
        }

        return to_route('keranjang', ['cart' => $checkCart]);
    }

    public function index()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        return view('keranjang', ['cart' => $cart]);
    }

    public function update(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartItem = CartItem::where('cart_id', $cart->id)->get();
        $cartItemController = App::make(CartItemController::class);
        $total_harga = 0;
        foreach ($cartItem as $item) {
            $cartItemController->update($request, $item);
            $total_harga = $total_harga + ($item->buah->harga * $item->kuantitas);
        }
        $cart->update(['total_harga' => $total_harga]);
        return view('keranjang', ['cart' => $cart]);
    }

    public function delete(int $idItem)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartItem = CartItem::find($idItem);

        $cart->update([
            'jumlah_produk' => $cart->jumlah_produk - 1,
            'total_harga' => $cart->total_harga - $cartItem->buah->harga,
        ]);

        $cartItemController = App::make(CartItemController::class);
        $cartItemController->destroy($idItem);
        return view('keranjang', ['cart' => $cart]);
    }
}
