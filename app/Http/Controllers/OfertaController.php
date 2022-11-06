<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use Illuminate\Http\Request;

/**
 * Class OfertaController
 * @package App\Http\Controllers
 */
class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oferta = Oferta::paginate();

        return view('oferta.index', compact('oferta'))
            ->with('i', (request()->input('page', 1) - 1) * $oferta->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oferta = new Oferta();
        return view('oferta.create', compact('oferta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Oferta::$rules);

        $Oferta = Oferta::create([
            'titulo' => $request->titulo,
            'cargo' => $request->cargo,
            'anios_experiencia' => $request->anios_experiencia,
            'rango_salarial' => $request->rango_salarial,
            'id_empresa' => auth()->user()->id,
        ]);

        return redirect()->route('oferta.index')
            ->with('success', 'Oferta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Oferta = Oferta::find($id);

        return view('oferta.show', compact('Oferta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oferta = Oferta::find($id);

        return view('oferta.edit', compact('oferta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Oferta $Oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oferta $Oferta)
    {
        request()->validate(Oferta::$rules);

        $Oferta->update($request->all());

        return redirect()->route('oferta.index')
            ->with('success', 'Oferta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $Oferta = Oferta::find($id)->delete();

        return redirect()->route('oferta.index')
            ->with('success', 'Oferta deleted successfully');
    }
}
