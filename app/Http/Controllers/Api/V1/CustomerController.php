<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\V1\StoreCustomerRequest;
use App\Http\Requests\V1\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Models\Admin;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {


        try {
            $customer = Customer::create($request->validated());

            // Now create the Admin record associated with the newly created customer
            $adminData = [
                'customer_id' => $customer->id,
                'status' => 'R',
            ];

            $admin = Admin::create($adminData);

            if (!$admin) {
                return response()->json(['error' => 'Failed to reserve a room'], 400);
            }

            return new CustomerResource($customer);
        } catch (\Exception $e) {

            Log::error('Unable to reserve a room: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to reserve a room'], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
