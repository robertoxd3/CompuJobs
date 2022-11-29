@extends('layouts.app')

@section('content')
    
    <div class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 25px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
      
                      <p class="text-center h1 fw-bold mb-4 mx-1 mx-md-4 mt-4">Registro</p>

                        <form class="mx-1 mx-md-4" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
      
                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              <label class="form-label" for="form3Example1c">Nombre</label>
                            </div>
                          </div>
      
                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              <label class="form-label" for="email">Email</label>
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa-solid fa-address-book fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <textarea id="direccion" rows="3" class="form-control" name="direccion"></textarea>
                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              <label class="form-label" for="direccion">Dirección</label>
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa-solid fa-phone fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="telefono" class="form-control"
                                name="telefono">
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              <label class="form-label" for="telefono">Teléfono</label>
                            </div>
                          </div>

                          
                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa-solid fa-users fa-lg me-3 fa-fw"></i>
                                <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                                    <option value="profesional">Profesional</option>
                                    <option value="empresa">Empresa</option>
                                </select>
                                @error('tipo_usuario')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa-solid fa-id-card fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input type="text" id="documento_unico" rows="3"
                                        class="form-control" name="documento_unico" required>
                                @error('documento_unico')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              <label class="form-label" for="documento_unico">Dui o Nit</label>
                            </div>
                          </div>


                          <div class="d-flex flex-row align-items-center mb-4 genero_form">
                            <i class="fa-solid fa-venus-mars fa-lg me-3 fa-fw genero_form"></i>
                                <select name="genero" id="genero" class="form-control genero_form">
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                                @error('genero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa-solid fa-user-tie fa-lg me-3 fa-fw"></i>
                            <select name="nombre_categoria" id="nombre_categoria" class="form-control" required>
                              <option value="">Seleccione una profesion...</option>
                              @foreach ($categorias as $categoria)
                                  <option value="{{ $categoria->nombre_categoria }}">
                                      {{ $categoria->nombre_categoria }}</option>
                              @endforeach
                          </select>
                              @error('nombre_categoria')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password"/>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            <label class="form-label" for="password">Password</label>
                          </div>
                        </div>


      
                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                          <div class="form-outline flex-fill mb-0">
                           <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label class="form-label" for="password-confirm">Repite tu contraseña</label>
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa-solid fa-image fa-lg me-3 fa-fw"></i>
                            <div class="form-outline flex-fill mb-0">
                                <input id="foto" name="foto" type="file" class="form-control" name="image" />

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>

                          <p class="mb-2 pb-lg-2 text-center" >Ya tienes cuenta? <a  href="{{ route('login') }}">Inicia sesión acá</a></p>
      
                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                        </div>

                        </form>
      
                    </div>
                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
      
                      <img src="https://img.freepik.com/vector-gratis/ilustracion-concepto-colaboracion_114360-3995.jpg?w=900&t=st=1669424244~exp=1669424844~hmac=98d07b5775a8fb6591613b3091191844976ee91d97781182ad84d7e4e71e9a5b"
                        class="img-fluid" alt="Sample image">
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    <script>
        document.getElementById('tipo_usuario').addEventListener('change', (e) => {
            const tipo = e.target.value
            const documento = document.querySelectorAll('.document_unico_form')
            const genero = document.querySelectorAll('.genero_form')
            console.log(documento)
            if (tipo == 'empresa') {
                //documento.forEach(el => el.style.display = 'none')
                genero.forEach(el => el.style.display = 'none')
            } else {
                //documento.forEach(el => el.style.display = 'block')
                genero.forEach(el => el.style.display = 'block')
            }

        });
    </script>
@endsection
