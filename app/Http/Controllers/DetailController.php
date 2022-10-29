<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = Product::with(['galleries'])
                    ->where('slug', $slug)
                    ->firstOrfail();

        return view('pages.detail',[
            'item' => $item
        ]);
    }
}
