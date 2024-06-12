<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{
    public function update(Request $request, CartItem $cartItem)
    {
        $name = 'kuantitas' . $cartItem->id;
        $cartItem->update(['kuantitas' => $request->$name]);
    }

    public function destroy(int $idItem)
    {
        // $cartItem->delete();
        // $cartItem = DB::table('cart_items')->find($idItem);
        DB::table('cart_items')->where('id', $idItem)->delete();
    }
}
