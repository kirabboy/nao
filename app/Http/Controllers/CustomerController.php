<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function listCustomer() {
        $user = Auth::user();
        $customer = Customer::where('id_ofuser', '=', $user->id)->get();
        $count_customers = $customer->count();
        return view('public.customer.list_customer',['customer'=>$customer,'user'=>$user,'count_customers'=>$count_customers]);
    }

    public function postListCustomer(Request $request) {
        $user_id = auth()->user()->id;
        $customer = new Customer;
        $customer->id_ofuser = $user_id;
        $customer->name = $request->name;
        $customer->birthday = $request->birthday;
        $customer->email = $request->email;
        $customer->sex = $request->sex;
        $customer->phone = $request->phone;
        $customer->facebook = $request->facebook;

        $number_code = $customer->count() + 1;
        $customer->code_customer = 'FKC'.$number_code;

        $customer->save();
        return redirect()->back();
    }
     
    public function index($id)
    {
        $user = Auth::user();
        $customer = Customer::find($id);

        return view('public.customer.customer_detail',['customer' => $customer,'user'=>$user]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
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
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->birthday = $request->birthday;
        $customer->email = $request->email;
        $customer->sex = $request->sex;
        $customer->phone = $request->phone;
        $customer->facebook = $request->facebook;

        $customer->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
