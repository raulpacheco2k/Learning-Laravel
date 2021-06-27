<?php

namespace Modules\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Products\Http\Requests\ProductRequest;
use App\Repositories\Eloquent\BrandRepository;
use App\Services\ImageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Modules\Products\Repositories\ProductRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class ProductController extends Controller
{
    private ProductRepository $productRepository;
    private BrandRepository $brandRepository;
    private ImageService $productService;

    /**
     * ProductController constructor.
     *
     * @param ProductRepository $productRepository
     * @param BrandRepository $brandRepository
     * @param ImageService $productService
     */
    public function __construct(
        ProductRepository $productRepository,
        BrandRepository $brandRepository,
        ImageService $productService)
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

        return view('products::product.index')->with([
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

        return view('products::product.create')->with([
            'brands' => $brands
        ]);
    }


    /**
     * @param ProductRequest $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidatorException
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

        return view('products::product.show')->with([
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

        return view('products::product.edit')->with([
            'product' => $product,
            'brands' => $brands
        ]);
    }

    /**
     * @param ProductRequest $request
     * @param $id
     * @return Application|RedirectResponse|Redirector
     * @throws ValidatorException
     */
    public function update(ProductRequest $request, $id): Redirector|RedirectResponse|Application
    {
        $this->productService->saveImage($request);

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