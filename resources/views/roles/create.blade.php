@extends('layouts.theme')

@section('content')
    <div class="py-3 mt-3 ">

        <div class=" max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Titulo de Formulario--}}
            <div class="bg-gray-900 text-white rounded-xl shadow-lg text-center py-2 px-2 mb-4">
                Crear Nuevo Rol
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Fin de Alerta validacion del rut --}}
            <form action="{{ route('roles.store') }}" method="post">
                @csrf
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg  mb-2">
                    <div class="container">
                        <div class="  grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-4 py-4 px-4 ">


                            <div class=" text-center">
                                <label class="block text-gray-700 text-sm font-bold mb-1 text-left">
                                    Rol
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                       oninput="this.value = this.value.toUpperCase() "
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       placeholder=" Ingrese Nuevo Rol">
                                @if ($errors->has('name'))
                                    <span class="error text-danger"
                                          for="input-name">{{ $errors->first('name') }}</span>
                                @endif

                            </div>
                            <div class=" text-center">
                            </div>
                        </div>
                    </div>
                </div>
                {{--Inicio table--}}
                <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg mb-2">
                    <div class=" font-bold text-center px-2 py-2 ">
                        <table class="table min-w-full leading-normal">
                            <tbody>
                            @foreach ($permissions as $id => $permission)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox"
                                                       name="permissions[]" value="{{ $id }}">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                                        {{ $permission }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{--Boton Formulario--}}
                    <div class="grid grid-cols-1 my-4 px-4 ">
                        <button type="submit"
                                class="  inline-block px-6 py-2 text-sm  leading-6 text-center text-white uppercase transition
                                bg-gray-900 rounded-xl shadow-lg ripple waves-light hover:shadow-lg focus:outline-none hover:bg-gray-700 font-bold mb-5">
                            Guardar
                        </button>
                    </div>
                </div>
        </div>

        </form>
        {{--formu_ori
                 <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
                                                @csrf
                                                <div class="card">
                                                    <div class="card-header card-header-primary">
                                                        <h4 class="card-title">Usuario</h4>
                                                        <p class="card-category">Ingresar datos</p>
                                                    </div>
                                                    <div class="card-body">
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        <div class="row">
                                                            <label for="name" class="col-sm-2 col-form-label">rut</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" name="rut" onkeypress="return isNumber(event)"
                                                                       oninput="checkRut(this)"
                                                                       placeholder="Ingrese su rut"
                                                                       autofocus>
                                                                @if ($errors->has('rut'))
                                                                    <span class="error text-danger"
                                                                          for="input-rut">{{ $errors->first('rut') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                            <div class="row">
                                                                <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control" name="name"
                                                                           placeholder="Ingrese su nombre" value="{{ old('name') }}"
                                                                           autofocus>
                                                                    @if ($errors->has('name'))
                                                                        <span class="error text-danger"
                                                                              for="input-name">{{ $errors->first('name') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="name" class="col-sm-2 col-form-label">Apellido Paterno</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control" name="apeterno"
                                                                           placeholder="Ingrese Apellido" value="{{ old('apeterno') }}"
                                                                           autofocus>
                                                                    @if ($errors->has('apaterno'))
                                                                        <span class="error text-danger"
                                                                              for="input-apaterno">{{ $errors->first('apaterno') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <label for="name" class="col-sm-2 col-form-label">Apellido Materno</label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" class="form-control" name="amaterno"
                                                                           placeholder="Ingrese apellido Materno" value="{{ old('amaterno') }}"
                                                                           autofocus>
                                                                    @if ($errors->has('amaterno'))
                                                                        <span class="error text-danger"
                                                                              for="input-amaterno">{{ $errors->first('amaterno') }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        <div class="row">
                                                            <label for="username" class="col-sm-2 col-form-label">Nombre de
                                                                usuario</label>
                                                            <div class="col-sm-7">
                                                                <input type="text" class="form-control" name="username"
                                                                       placeholder="Ingrese su nombre de usuario"
                                                                       value="{{ old('username') }}">
                                                                @if ($errors->has('username'))
                                                                    <span class="error text-danger"
                                                                          for="input-username">{{ $errors->first('username') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="email" class="col-sm-2 col-form-label">Correo</label>
                                                            <div class="col-sm-7">
                                                                <input type="email" class="form-control" name="email"
                                                                       placeholder="Ingrese su correo"
                                                                       value="{{ old('email') }}">
                                                                @if ($errors->has('email'))
                                                                    <span class="error text-danger"
                                                                          for="input-email">{{ $errors->first('email') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                                                            <div class="col-sm-7">
                                                                <input type="password" class="form-control" name="password"
                                                                       placeholder="Contraseña">
                                                                @if ($errors->has('password'))
                                                                    <span class="error text-danger"
                                                                          for="input-password">{{ $errors->first('password') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                                                            <div class="col-sm-7">
                                                                <div class="form-group">
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane active">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                @foreach ($roles as $id => $role)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="form-check">
                                                                                                <label class="form-check-label">
                                                                                                    <input class="form-check-input"
                                                                                                           type="checkbox"
                                                                                                           name="roles[]"
                                                                                                           value="{{ $id }}"
                                                                                                    >
                                                                                                    <span class="form-check-sign">
                                                                            <span class="check"></span>
                                                                        </span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $role }}
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Footer-->
                                                    <div class="card-footer ml-auto mr-auto">
                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                    <!--End footer-->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

        --}}









        {{--
        <div class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="{{ route('roles.store') }}" class="form-horizontal">
                  @csrf
                  <div class="card ">
                    <!--Header-->
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Crear Rol</h4>
                      <p class="card-category">Ingresar datos del rol</p>
                    </div>
                    <!--End header-->
                    <!--Body-->
                    <div class="card-body">
                      <div class="row">
                        <label for="name" class="col-sm-2 col-form-label">Nombre del rol</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <input type="text" class="form-control" name="name" autocomplete="off" autofocus>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label for="name" class="col-sm-2 col-form-label">Permisos</label>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <div class="tab-content">
                              <div class="tab-pane active">
                                <table class="table">
                                  <tbody>
                                    @foreach ($permissions as $id => $permission)
                                    <tr>
                                      <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                              value="{{ $id }}">
                                            <span class="form-check-sign">
                                              <span class="check"></span>
                                            </span>
                                          </label>
                                        </div>
                                      </td>
                                      <td>
                                        {{ $permission }}
                                      </td>
                                    </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--End body-->

                    <!--Footer-->
                    <div class="card-footer ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <!--End footer-->
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        --}}
        @endsection

