<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Contracts\BrandRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductRepositoryInterface $product, BrandRepositoryInterface $brand)
    {
        $products = $product->all();
        $brands = $brand->all();
        return view('web.backoffice.sections.product.index')->with(['products' => $products, 'brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BrandRepositoryInterface $model)
    {
        $brands = $model->all();
        return view('web.backoffice.sections.product.create')->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, ProductRepositoryInterface $model)
    {
        $product = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'brand_id' => $request->brand_id,
            'stock' => $request->stock,
            'price' => $request->price
        ];

        $model->insert($product);

        return redirect(route('produtos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRepositoryInterface $product, $id, BrandRepositoryInterface $brand)
    {
        $product = $product->find($id);
        $brand = $brand->find($product->brand_id)->name;

        return view('web.backoffice.sections.product.show')->with(['product' => $product, 'brand' => $brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRepositoryInterface $product, $id, BrandRepositoryInterface $brand)
    {
        $product = $product->find($id);
        $brands = $brand->all();

        return view('web.backoffice.sections.product.edit')->with(['product' => $product, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, ProductRepositoryInterface $product)
    {
        $product = $product->find($id);

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->save();

        return redirect(route('produtos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRepositoryInterface $product, $id)
    {
        $product = $product->find($id);
        $product->delete();
        return redirect(route('produtos.index'));
    }
}