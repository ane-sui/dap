<?php

namespace App\Http\Controllers;

use App\Models\Government;
use App\Http\Requests\StoreGovernmentRequest;
use App\Http\Requests\UpdateGovernmentRequest;
use Illuminate\Auth\Events\Validated;

class GovernmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $governments=Government::paginate(6);
        return view('governments.index',compact('governments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('governments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGovernmentRequest $request)
    {
        $request->user()->governments()->create($request->Validated());
        return redirect()->route('governments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Government $government)
    {
        return view('governments.show',compact('government'));

        redirect()->route('governments.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Government $government)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGovernmentRequest $request, Government $government)
    {
        $government->update($request->validated());
        return redirect()->route('governments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Government $government)
    {
        $government->delete();
        return redirect()->route('governments.index');
    }
}
