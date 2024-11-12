<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use App\Models\Reply;
use Illuminate\Http\Request;

class inbox extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('replies.index', [
            'replies' => Reply::where('user_id',auth()->user()->id)->latest()->paginate(6),
            ]);
            // $msgs=Extension::paginate(6);
        // return view('inbox.index', compact('msgs'));
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
    public function show(Reply $reply)
    {
        return view('replies.show',compact('reply'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extension $extension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Extension $extension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Extension $extension)
    {
        //
    }
}
