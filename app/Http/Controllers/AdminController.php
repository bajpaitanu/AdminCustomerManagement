<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $customer_details = Customer::get();
       return view('admin.customers_list',compact('customer_details'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $detail = Customer::find($id);
        return view('admin.customer.edit',compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $detail)
    {
        $detail->update($request->all());
        return redirect('admin/customers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve(Request $request,Customer $detail)
    {
       $detail->update(['approved'=>true]);

       return back();
    }

    public function reject(Request $request,Customer $detail)
    {
       $detail->update(['approved'=>false]);
       return back();
    }
}
