<?php

namespace App\Http\Controllers;

use App\Models\design;
use Illuminate\Http\Request;

class DesignControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('designCont');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('designCont.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function show(design $design)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function edit(design $design)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, design $design)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\design  $design
     * @return \Illuminate\Http\Response
     */
    public function destroy(design $design)
    {
        //
    }
}
