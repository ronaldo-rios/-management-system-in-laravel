<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitOfMeasurement;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Gate;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('isAdmin');
        $unities = UnitOfMeasurement::all();
        return view('app.productDetail.create', ['unities' => $unities]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('isAdmin');
        ProductDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductDetail $product_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $product_detail)
    {
        Gate::authorize('isAdmin');
        $unities = UnitOfMeasurement::all();
        return view('app.productDetail.edit', [
            'product_detail' => $product_detail, 
            'unities' => $unities
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductDetail $product_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $product_detail)
    {
        Gate::authorize('isAdmin');
        $product_detail->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
