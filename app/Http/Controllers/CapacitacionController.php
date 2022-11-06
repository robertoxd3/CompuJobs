<?php

namespace App\Http\Controllers;

use App\Models\Capacitacion;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class CapacitacionController
 * @package App\Http\Controllers
 */
class CapacitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capacitacion = Capacitacion::paginate();

        return view('capacitacion.index', compact('capacitacion'))
            ->with('i', (request()->input('page', 1) - 1) * $capacitacion->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $capacitacion = new Capacitacion();
        return view('capacitacion.create', compact('capacitacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Capacitacion::$rules);

        $capacitacion = Capacitacion::create($request->all());

        return redirect()->route('capacitacion.index')
            ->with('success', 'Capacitacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capacitacion = Capacitacion::find($id);

        return view('capacitacion.show', compact('capacitacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $capacitacion = Capacitacion::find($id);

        return view('capacitacion.edit', compact('capacitacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Capacitacion $capacitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacitacion $capacitacion)
    {
        request()->validate(Capacitacion::$rules);

        $capacitacion->update($request->all());

        return redirect()->route('capacitacion.index')
            ->with('success', 'Capacitacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $capacitacion = Capacitacion::find($id)->delete();

        return redirect()->route('capacitacion.index')
            ->with('success', 'Capacitacion deleted successfully');
    }
}
