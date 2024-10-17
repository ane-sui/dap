<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Http\Requests\StoreCropRequest;
use App\Http\Requests\UpdateCropRequest;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crops=Crop::paginate(10);
        return view('crops.index', compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCropRequest $request)
    {
        $request->user()->crops()->create($request->validated());
        return redirect()->route('crops.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Crop $crop)
    {
        return view('crops.show',compact('crop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crop $crop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCropRequest $request, Crop $crop)
    {
        $crop->update($request->validated());
        return redirect()->route('crops.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crop $crop)
    {
        $crop->delete();
        return redirect()->route('crops.index');
    }
}
