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
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $total_harga = $request->harga_buah * $request->kuantitas;

        $existingCartItem = CartItem::where('cart_id', $cart->id)
            ->where('buah_id', $request->buah_id)
            ->first();
        if ($existingCartItem) {
            $pesan = 'Buah sudah ada dalam keranjang, silahkan update dari <a href="' . route('keranjang') . '">halaman keranjang</a>';
            return back()->with('pesan', $pesan)->withFragment('pesan');
        }
        $cart->update([
            'jumlah_produk' => $cart->jumlah_produk + 1,
            'total_harga' => $cart->total_harga + $total_harga,
        ]);
        CartItem::create([
            'kuantitas' => $request->kuantitas,
            'cart_id' => $cart->id,
            'buah_id' => $request->buah_id,
        ]);

        return to_route('keranjang', ['cart' => $cart]);
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
        return to_route('keranjang', ['cart' => $cart]);
    }

    public function delete(int $idItem)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartItem = CartItem::find($idItem);

        $cart->update([
            'jumlah_produk' => $cart->jumlah_produk - 1,
            'total_harga' => $cart->total_harga - ($cartItem->buah->harga * $cartItem->kuantitas),
        ]);

        $cartItemController = App::make(CartItemController::class);
        $cartItemController->destroy($idItem);
        return to_route('keranjang', ['cart' => $cart]);
    }
}
