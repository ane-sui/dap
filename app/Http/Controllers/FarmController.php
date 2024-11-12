<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Http\Requests\StoreFarmRequest;
use App\Http\Requests\UpdateFarmRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\ViewServiceProvider;

use function Ramsey\Uuid\v1;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms=Farm::paginate(6);
        return view('farms.index', compact('farms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('farms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFarmRequest $request)
    {

        $request->user()->farms()->create($request->validated());
        return redirect()->route('farms.index')->with('success', 'Farm added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Farm $farm)
    {
        return  view('farms.show',compact('farm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(UpdateFarmRequest $request, Farm $farm)
    {
        $farm->update($request->validated());
        return redirect()->route('farms.index');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(Farm $farm)
    {
        $farm->delete();
        return redirect()->route('farms.index')->with('success', 'Farm deleted successfully!');
    }
}
