<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;
use App\Models\Customer;
use Hash;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.create');
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
        $request->validate([
          'name'=>'required', 
          'email'=>'required', 
          'password'=>'required', 
        ]);
        Customer::create([
         'name'=>$request->name,
         'email'=>$request->email,
         'password'=>Hash::make($request->password),
        ]);
        return response()->json(['success'=>'Account created successfully!']);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        return view('customer.login');
    }

    public function custLogin(Request $request)
    {
        $request->validate([
          'email'=>'required', 
          'password'=>'required', 
        ]);
        $credentials = $request->only('email','password');
        if(Auth::guard('customer')->attempt($credentials))
        {
          return redirect('customer-dashboard');
        }
        return back()->withErrors(['email'=>'The provided credentials do not match our record']);
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect('customer-login');
    }

    public function dashboard()
    {
        return view('customer.dashboard');
    }
}
