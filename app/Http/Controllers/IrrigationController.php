<?php

namespace App\Http\Controllers;

use App\Models\Irrigation;
use App\Http\Requests\StoreIrrigationRequest;
use App\Http\Requests\UpdateIrrigationRequest;

class IrrigationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $irrigations=Irrigation::paginate(6);
        return view('irrigations.index', compact('irrigations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('irrigations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIrrigationRequest $request)
    {
        $request->user()->irrigations()->create($request->validated());

    }

    /**
     * Display the specified resource.
     */
    public function show(Irrigation $irrigation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Irrigation $irrigation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIrrigationRequest $request, Irrigation $irrigation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Irrigation $irrigation)
    {
        //
    }
}
