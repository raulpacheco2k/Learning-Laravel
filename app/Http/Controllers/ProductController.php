<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Contracts\BrandRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquent\BrandRepository;
use App\Repositories\Eloquent\ProductRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;
    private BrandRepositoryInterface $brandRepository;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $productRepository
     * @param BrandRepository $brandRepository
     */
    public function __construct(ProductRepository $productRepository, BrandRepository $brandRepository)
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $products = $this->productRepository->all();
        $brands = $this->brandRepository->all();

        return view('backoffice.sections.product.index')->with([
            'products' => $products,
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $brands = $this->brandRepository->all();
        return view('backoffice.sections.product.create')->with([
            'brands' => $brands
        ]);
    }


    /**
     * @param ProductRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ProductRequest $request): Redirector|RedirectResponse|Application
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

        $this->productRepository->create($product);

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $product = $this->productRepository->find($id);
        $brands = $this->brandRepository->all();

        return view('backoffice.sections.product.show')->with([
            'product' => $product,
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        $product = $this->productRepository->find($id);
        $brands = $this->brandRepository->all();

        return view('backoffice.sections.product.edit')->with([
            'product' => $product,
            'brands' => $brands
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, $id): Redirector|RedirectResponse|Application
    {
        $product = $this->productRepository->find($id);

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
     * @param $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy($id): Redirector|RedirectResponse|Application
    {
        $this->productRepository->delete($id);
        return redirect(route('products.index'));
    }
}