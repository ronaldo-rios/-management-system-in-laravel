<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;

class ProductOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Order $order)
    {
        $products = Product::all();
        // products is method of relationship maked in Order Model using eager loading:
        $order->products; 
        return view('app.productorder.create', [
            'order' => $order,
            'products' => $products
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        $rules = [
            'product_id' => 'exists:products,id',
            'quantity' => 'required|min:0|max:1000'
        ];
        $feedback = [
            'product_id.exists' => 'Produto informado não existe!',
            'quantity.required' => 'O campo é obrigatório',
            'quantity.min' => 'Campo não pode ser menor que 0',
            'quantity.max' => 'Valor máximo possível é 1000'
        ];

        $request->validate($rules, $feedback);

        $order->products()->attach(
            $request->get('product_id'), 
            ['quantity' => $request->get('quantity')]
        );
        return redirect()->route('pedido-produto.create', ['order' => $order->id]);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOrder $product_order, $order)
    {
        $product_order->delete();

        return redirect()->route('pedido-produto.create', ['order' => $order->id]);
    }
}
