<?php

namespace App\Http\Controllers;

use App\Models\Mode;
use Illuminate\Http\Request;

class ModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mode = Mode::findOrFail(1);
        return apiResponse($mode->type);
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
    public function show(Mode $mode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mode $mode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mode $mode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mode $mode)
    {
        //
    }
}