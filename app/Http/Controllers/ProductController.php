<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Contracts\BrandRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProductRepositoryInterface $product
     * @param BrandRepositoryInterface $brand
     * @return View
     */
    public function index(ProductRepositoryInterface $product, BrandRepositoryInterface $brand): View
    {
        $products = $product->all();
        $brands = $brand->all();
        return view('backoffice.sections.product.index')->with(['products' => $products, 'brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param BrandRepositoryInterface $model
     * @return View
     */
    public function create(BrandRepositoryInterface $model): View
    {
        $brands = $model->all();
        return view('backoffice.sections.product.create')->with('brands', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @param ProductRepositoryInterface $model
     * @return Redirector
     */
    public function store(ProductRequest $request, ProductRepositoryInterface $model): Redirector
    {
        $product = new Product(
            [
                'name' => $request->get('name'),
                'slug' => Str::slug($request->get('name')),
                'description' => $request->get('description'),
                'brand_id' => $request->get('brand_id'),
                'stock' => $request->get('stock'),
                'price' => $request->get('price'),
                'image' => $request->file('image')->store('products')
            ]
        );

        $model->create($product);

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param ProductRepositoryInterface $product
     * @param $id
     * @param BrandRepositoryInterface $brands
     * @return View
     */
    public function show(ProductRepositoryInterface $product, $id, BrandRepositoryInterface $brands): View
    {
        $product = $product->find($id);
        $brands = $brands->all();

        return view('backoffice.sections.product.show')->with(['product' => $product, 'brands' => $brands]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ProductRepositoryInterface $product
     * @param $id
     * @param BrandRepositoryInterface $brand
     * @return View
     */
    public function edit(ProductRepositoryInterface $product, $id, BrandRepositoryInterface $brand): View
    {
        $product = $product->find($id);
        $brands = $brand->all();

        return view('backoffice.sections.product.edit')->with(['product' => $product, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @param ProductRepositoryInterface $product
     * @return Redirector
     */
    public function update(Request $request, $id, ProductRepositoryInterface $product): Redirector
    {
        $product = $product->find($id);

        $product->name = $request->get('name');
        $product->slug = Str::slug($request->get('name'));
        $product->description = $request->get('description');
        $product->brand_id = $request->get('brand_id');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');

        if ($request->file('image')){
            $product->image = $request->file('image')->store('products');
        }

        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProductRepositoryInterface $product
     * @param $id
     * @return Redirector
     */
    public function destroy(ProductRepositoryInterface $product, $id): Redirector
    {
        $product->delete($id);
        return redirect(route('products.index'));
    }
}