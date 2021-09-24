<?php

namespace App\Http\Controllers;

use App\pd_entery;
use App\View\Components\pd_entry;
use Illuminate\Http\Request;

class PdEnteryController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function show(pd_entery $pd_entery)
    {
        return view('home')->with('todoPd',pd_entery::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function edit(pd_entery $pd_entery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pd_entery $pd_entery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pd_entery  $pd_entery
     * @return \Illuminate\Http\Response
     */
    public function destroy(pd_entery $pd_entery)
    {
        //
    }
}
