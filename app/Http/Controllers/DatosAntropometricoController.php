<?php

namespace App\Http\Controllers;

use App\Models\DatosAntropometrico;
use App\Http\Requests\StoreDatosAntropometricoRequest;
use App\Http\Requests\UpdateDatosAntropometricoRequest;

class DatosAntropometricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Http\Requests\StoreDatosAntropometricoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDatosAntropometricoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function show(DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDatosAntropometricoRequest  $request
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDatosAntropometricoRequest $request, DatosAntropometrico $datosAntropometrico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosAntropometrico  $datosAntropometrico
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosAntropometrico $datosAntropometrico)
    {
        //
    }
}
