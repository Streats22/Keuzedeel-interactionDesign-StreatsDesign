<?php

namespace App\Http\Controllers;

use App\Models\usermanger;
use Illuminate\Http\Request;
use App\Models\User;

class UsermangerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('Usermanger', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Usermanger.create');
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
     * @param  \App\Models\Usermanger  $usermanger
     * @return \Illuminate\Http\Response
     */
    public function show(UsermangerController $usermanger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usermanger  $usermanger
     * @return \Illuminate\Http\Response
     */
    public function edit(UsermangerController $usermanger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usermanger  $usermanger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsermangerController $usermanger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usermanger  $usermanger
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsermangerController $usermanger)
    {
        //
    }
}
