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
        return view('pembelian.pembeli.show', ['order' => $order]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pengiriman' => ['required', 'in:gojek,maxim,cod,grab'],
            'metode_bayar' => ['required', 'in:cod,qris',],
            'bukti_bayar' => 'file|image|max:5000'
        ]);

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cartItems = CartItem::where('cart_id', $cart->id)->get();
        $status_bayar = $request->hasFile('bukti_bayar') ? "Sudah Bayar" : "Belum Bayar";

        if ($request->hasFile('bukti_bayar')) {
            $oriFileName = preg_replace('/\s+/', '-', $request->bukti_bayar->getClientOriginalName());
            $namaFile = 'TBN-' . time() . '-' . $oriFileName;
            $request->bukti_bayar->storeAs('public/images', $namaFile);

            $validateData['bukti_bayar'] = 'storage/images/' . $namaFile;
        }

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
            $item->buah->update([
                'stok' => $item->buah->stok - $item->kuantitas,
            ]);
            $item->delete();
        }
        $cart->delete();

        return view('dashboard');
    }

    public function history()
    {
        $orders = Order::where('user_id', Auth::user()->id)->get();
        // dump($orders);
        // dump($orders[0]->details);
        // dump($orders[1]->details);
        // die();
        return view('pembelian.pembeli.index', ['orders' => $orders]);
        // return view('keranjang', ['cart' => $cart]);
    }

    public function kirim_bukti(Request $request, int $idOrder)
    {
        $order = Order::find($idOrder);
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $validateData = $request->validate([
            'bukti_bayar' => 'required|file|image|max:5000'
        ]);

        $oriFileName = preg_replace('/\s+/', '-', $request->bukti_bayar->getClientOriginalName());
        $namaFile = 'TBN-' . time() . '-' . $oriFileName;
        $request->bukti_bayar->storeAs('public/images', $namaFile);

        $validateData['bukti_bayar'] = 'storage/images/' . $namaFile;
        $order->update([
            'status_bayar' => "Sudah Bayar",
            'bukti_bayar' => $validateData['bukti_bayar'],
        ]);
        return to_route('pemesanan.pembeli.index', compact('orders'));
    }

    public function all()
    {
        $orders = Order::all();
        return view('pembelian.admin-staff.index', compact('orders'));
    }

    public function destroy(Order $order)
    {
        if ($order->status_bayar == "Belum Bayar") {
            foreach ($order->details as $detail) {
                $detail->buah->update([
                    'stok' => $detail->buah->stok + $detail->kuantitas,
                ]);
            }
        }
        $order->delete();
        return to_route('pemesanan.admin.index');
    }

    public function edit(Request $request, Order $order)
    {
        $order->update([
            'status_pengiriman' => $request->status_pengiriman,
        ]);
        return to_route('pemesanan.admin.index');
    }
}
