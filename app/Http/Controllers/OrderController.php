<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        return view('pesanan', ['cart' => $cart]);
    }

    public function show(int $idOrder)
    {
        $order = Order::find($idOrder);
        return view('pembelian.pembeli.show', ['details' => $order->details]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pengiriman' => ['required', 'in:gojek,maxim,cod'],
            'metode_bayar' => ['required', 'in:cod,qris,transfer_bank',],
            'bukti_bayar' => 'file|image|max:5000'
        ]);

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartItems = CartItem::where('cart_id', $cart->id)->get();
        $status_bayar = $request->hasFile('bukti_bayar') ? "Sudah Bayar" : "Belum Bayar";

        $order =  Order::create([
            'jumlah_produk' => $cart->jumlah_produk,
            'total_harga' => $cart->total_harga,
            'metode_bayar' => $validateData['metode_bayar'],
            'pengiriman' => $validateData['pengiriman'],
            'bukti_bayar' => $validateData['bukti_bayar'] ?? null,
            'status_bayar' => $status_bayar,
            'status_pengiriman' => 'Diproses',
            'user_id' => Auth::user()->id,
        ]);

        foreach ($cartItems as $item) {
            OrderDetail::create([
                'kuantitas' => $item->kuantitas,
                'order_id' => $order->id,
                'buah_id' => $item->buah->id,
            ]);
            $item->delete();
        }
        $cart->delete();

        return view('dashboard');
    }

    public function history()
    {
        $orders = Order::all();
        // dump($orders);
        // dump($orders[0]->details);
        // dump($orders[1]->details);
        // die();
        return view('pembelian.pembeli.index', ['orders' => Order::all()]);
        // return view('keranjang', ['cart' => $cart]);
    }
}
