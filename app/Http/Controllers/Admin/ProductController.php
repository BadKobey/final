<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * $products = Product::orderBy('created_at', 'DESC')->get();
         */

        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $stocks = Stock::orderBy('created_at', 'DESC')->get();

        return view('admin.product.create', [

            'stocks' => $stocks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        /*$product->img = $request->img;*/
      $product->article = $request->article;
      $product->nomenclature = $request->nomenclature;
      $product->price = $request->price;
      $product->count = $request->count;
      $product->stock_id = $request->stock_id;
      $product->save();

      return redirect()->back()->withSuccess('Товар успешно добавлен!');
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

        $stocks = Stock::orderBy('created_at', 'DESC')->get();

        return view('admin.product.edit', [
            'product' => $product,
            'stocks' => $stocks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        /* $product->img = $request->img; */
      $product->article = $request->article;
      $product->nomenclature = $request->nomenclature;
      $product->price = $request->price;
      $product->count = $request->count;
      $product->stock_id = $request->stock_id;
      $product->save();

      return redirect()->back()->withSuccess('Товар успешно обновлен!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->withSuccess('Товар успешно удален!');
    }
    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        Excel::import(new ProductImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport()
    {
        return Excel::download(new ProductsExport, 'products-collection.xlsx');
    }

}
