<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $detail = Product::Join('kategoris', 'products.kategori_id', '=', 'kategoris.id')
        ->select([
            'products.*', 'kategoris.name as nama_kategori'
        ])

        ->get();


        //$products = new Product();
        // $products = Product::Join('kategoris', 'products.kategori_id', '=', 'kategoris.id')
        // ->select([
        //     'products.*', 'kategoris.name as nama_kategori'
        // ])

        // ->get();

        $products = DB::table('products')
        ->join('kategoris', 'products.kategori_id', '=', 'kategoris.id')
        ->join('stoks', 'products.id', '=', 'stoks.product_id')
        ->select([
            'products.*', 'kategoris.name as nama_kategori','stoks.current_stok as quantity'
        ])
        ->orderBy('products.id', 'desc');





        //dd($products);
        // $products = Product::Join('stoks', 'products.id', '=', 'stoks.product_id')
        // ->select([
        //     'products.*', 'stoks.current_stok as quantity'
        // ])
        // ->get();

        if ($request->search) {
            $products = $products->where('products.name', 'LIKE', "%{$request->search}%" )
            ->orWhere('products.kategori_id','like',"%{$request->search}%");


        }
        if ($request->kategori) {
            $products = $products->where('kategori_id', '=', "{$request->kategori}");
        }
        $products = $products->latest()->paginate(10);
        if (request()->wantsJson()) {
            return ProductResource::collection($products);
        }
        return view('products.index', compact('products','detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Kategori::select('*')
        ->get();

        //dd($Categories->name);
        return view('products.create', compact('Categories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {


        $image_path = '';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('products', 'public');
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image_path,
            'barcode' => $request->barcode,
            'harga_beli' => $request->harga_beli,
            'price' => $request->price,
            'kategori_id' => $request->kategori_id,
            'status' => $request->status,

        ]);

        $product->stoks()->create([
            'current_stok' => 0,

        ]);


        if (!$product) {
            return redirect()->back()->with('error', 'Sorry, there a problem while creating product.');
        }
        return redirect()->route('products.index')->with('success', 'Success, you product have been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $product->name = $request->name;
        $product->description = $request->description;
        $product->barcode = $request->barcode;
        $product->harga_beli = $request->harga_beli;
        $product->price = $request->price;
        // $product->kategori = $request->kategori;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                Storage::delete($product->image);
            }
            // Store image
            $image_path = $request->file('image')->store('products', 'public');
            // Save to Database
            $product->image = $image_path;
        }

        if (!$product->save()) {
            return redirect()->back()->with('error', 'Sorry, there\'re a problem while updating product.');
        }
        return redirect()->route('products.index')->with('success', 'Success, your product have been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete($product->image);
        }
        $product->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
