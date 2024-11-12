<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Http\Requests\StoreCropRequest;
use App\Http\Requests\UpdateCropRequest;
use App\Models\Farm;
use Illuminate\Http\Request;

class CropController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $crops=Crop::all();
        return view('crops.index', compact('crops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request )
    {
        $farm =Farm::find($request->farm_id);

        return view('crops.create',compact('farm'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $crop=new Crop();
        $crop->user_id=$request->user()->id;
        $crop->name=$request->input('name');
        $crop->seed_type=$request->input('seed_type');
        $crop->quantity=$request->input('quantity');
        $crop->planting=$request->input('planting');
        $crop->farm_id=$request->input('farm_id');
        $crop->save();

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
