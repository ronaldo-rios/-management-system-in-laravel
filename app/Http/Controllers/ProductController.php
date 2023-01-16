<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UnitOfMeasurement;
use App\Models\ProductDetail;
use App\Models\Provider;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Find product by name, site, uf and e-mail:
        $prod = Product::paginate(10);     
        return view('app.product.product', ['products' => $prod, 'request' => $request->all()]);
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Call unit of measurements of database:
        $unities = UnitOfMeasurement::all();
        $providers = Provider::all();
        return view('app.product.add', ['un' => $unities, 'providers' => $providers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=> 'required',
            'description' => 'required | max:200',
            'weight' => 'required | integer',
            'unit_id' => 'exists:unit_of_measurements,id',
            'provider_id' => 'exists:providers,id'  
        ];
        $feedback = [
            'required'=> 'O campo deve ser preenchido',
            'description.max' => 'O campo possui mais caracteres do que o permitido',
            'weight.integer' => 'Campo deve ser número inteiro',
            'unit_id.exists' => 'A unidade de medida informada não existe',
            'provider_id.exists' => 'Fornecedor informado não existe!'
        ];

        $request->validate($rules, $feedback);

        Product::create($request->all());
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('app.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $unities = UnitOfMeasurement::all();
        $providers = Provider::all();
        return view('app.product.edit', [
            'product' => $product, 
            'un' => $unities, 
            'providers' => $providers
        ]);
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

        $rules = [
            'name'=> 'required',
            'description' => 'required | max:200',
            'weight' => 'required | integer',
            'unit_id' => 'exists:unit_of_measurements,id',
            'provider_id' => 'exists:providers,id' 
        ];
        $feedback = [
            'required'=> 'O campo deve ser preenchido',
            'description.max' => 'O campo possui mais caracteres do que o permitido',
            'weight.integer' => 'Campo deve ser número inteiro',
            'unit_id.exists' => 'A unidade de medida informada não existe',
            'provider_id.exists' => 'Fornecedor informado não existe!'
        ];

        $request->validate($rules, $feedback);

        $product = Product::findOrFail($id);
        $product->update($request->all());
    
        if($product->save()){
            $msg = 'Atualizado com sucesso!';
        }
        else {
            $msg = 'Erro na atualização do registro!';
        }
    
        return redirect()->route('product.edit', 
        [
        'product' => $product, 
        'msg' => $msg
    ]);
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
        
        return redirect()->route('product.index');
    }
}
