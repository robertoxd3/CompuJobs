<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class PublicacionController
 * @package App\Http\Controllers
 */
class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicacion = Publicacion::orderBy('id', 'DESC')->paginate();

        // Buscamos el id en la tabla
        $usuarios = User::all();
        return view('publicacion.index', compact('publicacion', 'usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $publicacion->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publicacion = new Publicacion();
        $usuarios = User::all();
        return view('publicacion.create', compact('publicacion', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        request()->validate(Publicacion::$rules);

        $publicacion = Publicacion::create([
            "id_user" => auth()->user()->id,
            "id_usuario_seguido" => $request->id_usuario_seguido,
            "contenido" => $request->contenido,
        ]);

        return redirect()->route('publicacion.index')
            ->with('success', 'Publicacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion = Publicacion::find($id);

        return view('publicacion.show', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion = Publicacion::find($id);

        return view('publicacion.edit', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Publicacion $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacion $publicacion)
    {
        request()->validate(Publicacion::$rules);

        $publicacion->update([
            'contenido' => $publicacion->contenido
        ]);

        return redirect()->route('publicacion.index')
            ->with('success', 'Publicacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $publicacion = Publicacion::find($id)->delete();

        return redirect()->route('publicacion.index')
            ->with('success', 'Publicacion deleted successfully');
    }
}
