<?php

namespace App\Http\Controllers;

use App\Sale;
use App\SaleDetail;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function index()
    {
        // Desde aqui se enviaran la vista para mostrar la lista de ventas
        $sales = Sale::with('details')->with('customer')->get();
        return $sales;
    }

    public function store(Request $request)
    {
        $products = $request->get('details');
        $sale = Sale::create([
            'type' => $request->get('type'),
            'customer_id' => $request->get('customer'),
            'date' => $request->get('date')
        ]);

        foreach ($products as $product){
            SaleDetail::create([
                'sale_id' => $sale->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
                'price' => $product['price']
            ]);

        }

        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
