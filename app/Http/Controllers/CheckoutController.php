<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;

use App\Transaction;
use App\TransactionDetail;
use App\Product;
use App\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
         $item = Transaction::with(['details','product','user'])->findOrFail($id);

        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $detail = TransactionDetail::findOrFail($id);

        $transaction = Transaction::create([
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'shipping_cost' => 20000,
            'transaction_total' => $product->price + 20000 + mt_rand(0,99),
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'product' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'complete_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'contact' => Auth::user()->contact,
            'address' => Auth::user()->address
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'complete_name' => 'required|max:255',
            'email' => 'required|max:255',
            'contact' => 'required|max:15',
            'address' => 'required|max:255'
        ]);

        $data = $request->all();
        $data['products_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with(['product'])->find($id);

        $transaction->product->price += 20000;
        $transaction->transaction_total += $transaction->product->price;
        $transaction->save();

        return route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details', 'product.galleries', 'user'])->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        // buat kirim email ke einvoice nya
        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );


        return view('pages.success');
    }
}
