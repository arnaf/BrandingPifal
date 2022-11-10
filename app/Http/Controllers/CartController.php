<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return response(
                $request->user()->cart()->get()

            );
        }
        $products = DB::table('drugs')
        ->join('drug_categories', 'drugs.drug_category_id', '=', 'drug_categories.id')
        ->join('drug_details', 'drugs.id', '=', 'drug_details.drug_id')
        ->join('stoks', 'drugs.id', '=', 'stoks.drug_id')
        ->select([
            'drugs.*','drug_details.desc','drug_details.photo as image',
            'drugs.sellprice as price', 'drug_categories.name as nama_kategori','stoks.current_stok as quantity'
        ])
        ->orderBy('drugs.id', 'desc');

        return view('cart.index', compact('products'));

        //return view('cart.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'barcode' => 'required|exists:drugs,barcode',
        ]);
        $barcode = $request->barcode;

        //$product = Product::where('barcode', $barcode)->first();

        $products = DB::table('drugs')
        ->join('drug_categories', 'drugs.drug_category_id', '=', 'drug_categories.id')
        ->join('drug_details', 'drugs.id', '=', 'drug_details.drug_id')
        ->join('stoks', 'drugs.id', '=', 'stoks.drug_id')
        ->select([
            'drugs.*','drug_details.desc','drug_details.photo as image',
            'drugs.sellprice as price', 'drug_categories.name as nama_kategori','stoks.current_stok as quantity'
        ])
        ->where('drugs.barcode', $barcode)
        ->orderBy('drugs.id', 'desc')
        ->first();




        $cart = $request->user()->cart()->where('drugs.barcode', $barcode)->first();
        //dd($cart);
        if ($cart) {
            // check product quantity
            if($products->quantity <= $cart->pivot->quantity) {
                return response([
                    'message' => 'Product available only: '. $products->quantity,
                ], 400);
            }
            // update only quantity
            $cart->pivot->quantity = $cart->pivot->quantity + 1;
            $cart->pivot->save();
        } else {
            if($products->quantity < 1) {
                return response([
                    'message' => 'Product out of stock',
                ], 400);
            }
            $request->user()->cart()->attach($products->id, ['quantity' => 1]);
        }

        return response('', 204);
    }

    public function changeQty(Request $request)
    {
        $request->validate([
            'drug_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $request->user()->cart()->where('id', $request->drug_id)->first();

        if ($cart) {
            $cart->pivot->quantity = $request->quantity;
            $cart->pivot->save();
        }

        return response([
            'success' => true
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'drug_id' => 'required|integer|exists:drugs,id'
        ]);
        $request->user()->cart()->detach($request->drug_id);

        return response('', 204);
    }

    public function empty(Request $request)
    {
        $request->user()->cart()->detach();

        return response('', 204);
    }
}
