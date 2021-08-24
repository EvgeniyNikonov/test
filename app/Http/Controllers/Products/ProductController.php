<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Services\Products\ProductService as Service;

class ProductController extends Controller
{
    public function __construct(Service $service) {
		$this->service = $service;
        $this->middleware('permission:products-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:products-read', ['only' => ['show']]);
        $this->middleware('permission:products-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:products-delete', ['only' => ['destroy']]);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->service->store($request);
		return redirect($this->service->routeName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $this->showElement($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return $this->editElement($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->service->model = $product;
		$this->service->update($request);

		return redirect()->route($this->service->routeName . '.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
		return redirect()->route($this->service->routeName . '.index');
    }
}
