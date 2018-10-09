<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();

        return $customers;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Customer $custumer)
    {
        //
    }

    public function edit(Customer $custumer)
    {
        //
    }

    public function update(Request $request, Customer $custumer)
    {
        //
    }

    public function destroy(Customer $custumer)
    {
        //
    }
}
