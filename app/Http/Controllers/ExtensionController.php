<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use App\Http\Requests\StoreExtensionRequest;
use App\Http\Requests\UpdateExtensionRequest;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extensions=Extension::paginate(6);
        return view('extensions.index',compact('extensions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('extensions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExtensionRequest $request)
    {

        $request->user()->extensions()->create($request->validated());
        return redirect()->route('extensions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Extension $extension)
    {
        return view('extensions.show',compact('extension'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extension $extension)
    {
        return view('extensions.edit',compact('extension'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExtensionRequest $request, Extension $extension)
    {
        $extension->update($request->validated());
        return redirect()->route('extension.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extension $extension)
    {
        $extension->delete();
        return redirect()->route('extensions.index');
    }
}
