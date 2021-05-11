<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Repositories\Contracts\BrandRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BrandRepositoryInterface $model)
    {
        $brands = $model->all();
        return view('brand.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request, BrandRepositoryInterface $model)
    {
        $brand = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ];

        $model->insert($brand);

        return redirect(route('marcas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(BrandRepositoryInterface $model, $id)
    {
        $brand = $model->find($id);

        return view('brand.show')->with('brand', $brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BrandRepositoryInterface $model, $id)
    {
        $brand = $model->find($id);
        return view('brand.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrandRepositoryInterface $model, $id)
    {
        $brand = $model->find($id);

        $brand->name = $request->name;
        $brand->slug = Str::slug($request->slug);
        $brand->description = $request->description;
        $brand->save();

        return redirect(route('marcas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandRepositoryInterface $model, $id)
    {

        $brand = $model->find($id);

        $brand->delete();

        return redirect(route('marcas.index'));
    }
}
