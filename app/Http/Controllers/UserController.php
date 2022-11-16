<?php

namespace App\Http\Controllers;

use App\Models\Habilidad;
use App\Models\Idioma;
use App\Models\Seguido;
use App\Models\Trabajo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\Element\Table;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('usuarios.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function profesionales()
    {
        //$profesionales = User::all()->where('tipo_usuario', 'profesional');
        $profesionales = DB::table('users')
            ->join('categoria', 'users.id_categoria', '=', 'categoria.id', 'left outer')
            ->select('users.*', 'categoria.nombre_categoria')
            // ->where('tipo_usuario', 'profesional')
            ->get();
        //dd($profesionales);
        return view('usuarios.profesionales', compact('profesionales'));
    }

    public function seguir($id, $idseguido)
    {
        $siguiendo = Seguido::where([
            'id_user' => $id,
            'id_usuario_seguido' => $idseguido
        ])->first();

        if (is_null($siguiendo)) {
            Seguido::insert([
                'id_user' => $id,
                'id_usuario_seguido' => $idseguido
            ]);

            return redirect()->route('profesionales')
                ->with('success', 'Ahora sigues al profesional');
        } else {
            Seguido::where([
                'id_user' => $id,
                'id_usuario_seguido' => $idseguido
            ])->delete();

            return redirect()->route('profesionales')
                ->with('success', 'Dejaste de seguir al profesional');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('usuarios.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);

        $user = User::create($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //Obtener los id de los seguidos de este usuario en especifico
        $profesion = DB::table('categoria')->where('id', $user->id_categoria)->first();

        foreach ($user->seguidos->toArray() as $seguido) {
            if ($seguido['id_usuario_seguido'] == auth()->user()->id) {
                $user->siguiendo = true;
            }
        }
        return view('usuarios.show', compact('user', 'profesion'));
    }


    public function perfil($id)
    {
        if (auth()->user()->id != $id) {
            return redirect()->route('home');
        }

        $seguidosUsuario[] = null;
        //Encontrar el usuario con el id especifico
        $user = User::find($id);
        //Obtener los id de los seguidos de este usuario en especifico
        $seguidos = DB::table('seguido')->where('id_user', $id)->get();
        $profesion = DB::table('categoria')->where('id', $user->id_categoria)->first();
        //Encontrar la informacion de esos usuarios con los id de los seguidos que se obtuvo anterior
        for ($i = 0; $i < $seguidos->count(); $i++) {
            $seguidosUsuario[$i] = User::find($seguidos[$i]->id_usuario_seguido);
        }


        return view('usuarios.perfil', compact('user', 'seguidosUsuario', 'profesion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('usuarios.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('usuarios.index')
            ->with('success', 'User deleted successfully');
    }

    public function reportRequest($id)
    {
        $model = User::where("users.id", $id)
            ->first();

        $habilidades = Habilidad::where('id_user', $id)->get();
        $trabajos = Trabajo::where('id_user', $id)->get();
        $idiomas = Idioma::where('id_user', $id)->get();
        $templatePath = storage_path() . '/app/public/templates';

        //Open template and save it as docx
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $document = $phpWord->loadTemplate($templatePath . '/CVTemplate.docx');

        $document->setValue('name', $model->name);
        $document->setValue('email', $model->email);
        $document->setValue('telefono', $model->telefono);
        $document->setValue('direccion', $model->direccion);
        $document->setValue('nombre_categoria', $model->categoria->nombre_categoria);
        $document->setValue('documento_unico', $model->documento_unico);

        for ($i = 1; $i <= 3; $i++) {
            $document->setValue('habilidad' . $i, $habilidades[$i]->nombre_habilidad ?? 'N/A');
            $document->setValue('trabajo' . $i, $trabajos[$i]->nombre_trabajo ?? 'N/A');
            $document->setValue('idioma' . $i, $idiomas[$i]->nombre_idioma ?? 'N/A');
        }

        $document->setValue('dateReport', date('d-m-Y'));
        $document->setValue('timeReport', date('H:i'));

        $tempPath = storage_path() . '/app/public/temps';

        $nameFile = "$tempPath/$model->id.docx";
        $document->saveAs($nameFile);

        return response()
            ->download($nameFile)
            ->deleteFileAfterSend(true);
    }

    public function pdfUsuario()
    {
        //$users = User::get();

        $users = DB::table('users')
            ->join('categoria', 'users.id_categoria', '=', 'categoria.id', 'left outer')
            ->select('users.*', 'categoria.nombre_categoria')
            ->orderBy('categoria.nombre_categoria', 'asc')
            // ->where('tipo_usuario', 'profesional')
            ->get();

        $masculino = DB::table('users')
            ->where('genero', 'masculino')
            ->get();

        $femenino = DB::table('users')
            ->where('genero', 'femenino')
            ->get();

        $data = [
            'title' => 'Reporte de usuarios registrados',
            'date' => date('m/d/Y'),
            'masculino' => $masculino,
            'femenino' => $femenino,
            'users' => $users
        ];

        $pdf = PDF::loadView('reporte.reporteUsuario', $data);

        return $pdf->stream();
        //return $pdf->download('itsolutionstuff.pdf');
    }

    public function pdfHabilidad()
    {
        //$users = User::get();


        $habilidad = DB::table('habilidad')
            ->join('users', 'habilidad.id_user', '=', 'users.id', 'left outer')
            ->select('users.name', 'habilidad.*')
            // ->where('tipo_usuario', 'profesional')
            ->get();

        $data = [
            'title' => 'Reporte de habilidades',
            'date' => date('m/d/Y'),
            'habilidad' => $habilidad
        ];
        $pdf = PDF::loadView('reporte.reporteHabilidad', $data);

        return $pdf->stream();
        //return $pdf->download('itsolutionstuff.pdf');
    }

    public function pdfProfesion()
    {
        //$users = User::get();


        $profesion = DB::table('users')
            ->join('categoria', 'users.id_categoria', '=', 'categoria.id', 'left outer')
            ->select('users.*', 'categoria.*')
            // ->where('tipo_usuario', 'profesional')
            ->get();

        $data = [
            'title' => 'Reporte de Profesiones',
            'date' => date('m/d/Y'),
            'profesion' => $profesion
        ];
        $pdf = PDF::loadView('reporte.reporteProfesion', $data);

        return $pdf->stream();
        //return $pdf->download('itsolutionstuff.pdf');
    }
}
