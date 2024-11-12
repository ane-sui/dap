<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Http\Requests\StoreReplyRequest;
use App\Http\Requests\UpdateReplyRequest;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('replies.index', [
            'replies' => Reply::where('user_id',auth()->user()->id)->latest()->paginate(6),
        ]);
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

        $reply=new Reply();
        $reply->user_id=$request->user()->id;
        $reply->extension_id=$request->input('extension_id');
        $reply->email=$request->input('email');
        $reply->subject=$request->input('subject');
        $reply->from=$request->input('from');
        $reply->content=$request->input('content')
        ;
        $reply->save();
        return redirect()->route('reply.index');
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
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReplyRequest $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        //
    }
}
