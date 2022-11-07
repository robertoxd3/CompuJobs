<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validations =  Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nombre_categoria' => ['required', 'string'],
            'direccion' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'tipo_usuario' => ['required', 'string'],
            // 'documento_unico' => ['required', 'string'],
            // 'genero' => ['required', 'string'],
        ]);

        return $validations;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'direccion' => $data['direccion'],
            'password' => Hash::make($data['password']),
            'telefono' => $data['telefono'],
            'tipo_usuario' => $data['tipo_usuario'],
            'documento_unico' => $data['documento_unico'],
            'genero' => $data['genero'],
            'foto' => '/img/foto.png',
            'id_categoria' => Categoria::where('nombre_categoria', $data['nombre_categoria'])->first()->id,
        ]);
    }

    public function showRegistrationForm()
    {
        $categorias = Categoria::all();

        return view("auth.register", compact("categorias"));
    }
}
