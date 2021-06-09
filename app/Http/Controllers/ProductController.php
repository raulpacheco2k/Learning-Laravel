<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\Contracts\BrandRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Eloquent\BrandRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Services\ProductService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;
    private BrandRepositoryInterface $brandRepository;
    private ProductService $productService;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $productRepository
     * @param BrandRepository $brandRepository
     * @param ProductService $productService
     */
    public function __construct(
        ProductRepository $productRepository,
        BrandRepository $brandRepository,
        ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->brandRepository = $brandRepository;
        $this->productService = $productService;
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
        $this->productService->saveImage($request);

        $this->productRepository->create($request->input());

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
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
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
        $this->productRepository->update($request->input(), $id);

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