<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Http\Requests\StoreBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers=Buyer::paginate(6);
        return view('buyers.index',compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buyers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuyerRequest $request)
    {
        $request->user()->buyers()->create($request->validated());
        return redirect()->route('buyers.index')->with('success', 'Product Listed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        return view('buyers.show',compact('buyer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buyer $buyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuyerRequest $request, Buyer $buyer)
    {
        $buyer->update($request->validated());
        return redirect()->route('buyers.index')->with('success','Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buyer $buyer)
    {
        $buyer->delete();
        return redirect()->route('buyers.index')->with('success','Product Deleted');
    }
}
