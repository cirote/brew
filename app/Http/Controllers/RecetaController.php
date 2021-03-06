<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Receta;
use Cirote\Scalar\Facade\Scalar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recetas.index')
            ->with('recetas', Receta::orderBy('nombre')->get());
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
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        return view('recetas.show')
            ->with('receta', $receta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }

    public function order(Receta $receta)
    {
        return view('recetas.order')
            ->with('receta', $receta);
    }

    public function volume(Receta $receta)
    {
        return view('lotes.volume')
            ->with('receta', $receta);
    }

    public function lotes(Receta $receta, Lote $lote = null)
    {
        return view('recetas.lotes')
            ->with('receta', $receta)
            ->with('lote', $lote);
    }

    public function calculos(Receta $receta, Lote $lote = null)
    {
        return view('recetas.calculos')
            ->with('receta', $receta)
            ->with('lote', $lote);
    }

    public function prueba()
    {
//        if (App::bound('scalar'))
//            dump('La clase esta registrada.');

        if (App::getProvider('DB'))
            dump('La clase DB esta registrada.');

        if (App::getProvider('Scalar'))
            dump('La clase esta registrada.');

        $r = Scalar::Density('1.053 sg');

        dd($r);
          //$scalar = App::make('scalar');
        //dd($scalar->Density());
    }
}
