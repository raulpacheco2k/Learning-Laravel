<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Repositories\Eloquent\BrandRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class BrandController extends Controller
{
    private BrandRepository $repository;

    public function __construct(BrandRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    protected function index(): View
    {
        $brands = $this->repository->all();

        return view('backoffice.sections.brand.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('backoffice.sections.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(BrandRequest $request): Redirector|RedirectResponse|Application
    {
        $this->repository->create($request->input());

        return redirect(route('brands.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $brand = $this->repository->find($id);

        return view('backoffice.sections.brand.show')->with([
            'brand' => $brand
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
        $brand = $this->repository->find($id);

        return view('backoffice.sections.brand.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, int $id): Redirector|RedirectResponse|Application
    {
        $this->repository->update($request->input(), $id);

        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id): Redirector|RedirectResponse|Application
    {
        $this->repository->delete($id);

        return redirect(route('brands.index'));
    }
}
