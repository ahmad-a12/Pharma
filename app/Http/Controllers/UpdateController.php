<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $updates=Update::get();
        return view('Update.UpdateTable',compact('updates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Update.AddUpdate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $updates= new Update();
        $updates->name= $request->name;
        $updates->news= $request->news;
        $updates->save();
        return redirect()->route('update');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $updates=Update::find($id);
        return view('Update.ShowUpdate',compact('updates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $updates=Update::find($id);
        return view('Update.EditUpdate',compact('updates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updates= Update::find($id);
        $updates->name= $request->name;
        $updates->news= $request->news;
        $updates->save();
        return redirect()->route('update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $updates= Update::findOrFail($id);
        $updates->delete();
        return redirect()->route('update');
    }
}
