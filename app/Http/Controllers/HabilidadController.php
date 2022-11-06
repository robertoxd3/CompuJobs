<?php

namespace App\Http\Controllers;

use App\Models\Habilidad;
use Illuminate\Http\Request;

/**
 * Class HabilidadController
 * @package App\Http\Controllers
 */
class HabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habilidads = Habilidad::paginate();
        $profesion = DB::table('habilidad')->where('id', $user->id_categoria)->first();
        return view('habilidad.index', compact('habilidads'))
            ->with('i', (request()->input('page', 1) - 1) * $habilidads->perPage());
    }

    public function ranking()
    {
        $i = 1;
        $habilidads =  Habilidad::all()->sortByDesc("puntaje");
        return view('habilidad.ranking', compact('habilidads', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $habilidad = new Habilidad();
        return view('habilidad.create', compact('habilidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Habilidad::$rules);

        $habilidad = Habilidad::create([
            'nombre_habilidad' => $request->nombre_habilidad,
            'descripcion' => $request->descripcion,
            'puntaje' => 0,
            'id_user' => auth()->user()->id,
        ]);

        return redirect()->route('perfil', auth()->user()->id)
            ->with('success', 'Habilidad created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $habilidad = Habilidad::find($id);

        return view('habilidad.show', compact('habilidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $habilidad = Habilidad::find($id);

        return view('habilidad.edit', compact('habilidad'));
    }

    public function puntuar($id)
    {
        $puntacion = 3;
        //Habilidad::where('id', $id)->update(array('puntaje' => $puntacion));
        $habilidad = Habilidad::find($id);
        if ($habilidad) {
            $habilidad->puntaje += $puntacion;
            $habilidad->save();
        }
        return redirect()->route('profesionales')
            ->with('success', 'Habilidad Puntuada');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Habilidad $habilidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Habilidad $habilidad)
    {
        request()->validate(Habilidad::$rules);

        $habilidad->update($request->all());

        return redirect()->route('habilidad.index')
            ->with('success', 'Habilidad updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $habilidad = Habilidad::find($id)->delete();

        return redirect()->route('habilidad.index')
            ->with('success', 'Habilidad deleted successfully');
    }
}
