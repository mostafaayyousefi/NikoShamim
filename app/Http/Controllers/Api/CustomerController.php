<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return CustomerResource::collection($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $customers = Customer::create($request->all());

        return new CustomerResource($customers);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        // $customers = Customer::all();
        return  new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response(null, 204);
    }
}
