@extends('admin.dashboard')
@section('contenido')
    <div class="page-header">
        <h3 class="page-title">
            Pacientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pacientes</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Datos pacientes</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>

                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Tipo diabetes</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pacientes as $key => $paciente)
                                    <tr>

                                        <td>{{ $paciente->nombre}}</td>
                                        <td>{{ $paciente->apellido }}</td>
                                        @if ($paciente->tipo_diabetes == 3)
                                            <td>Tipo gestacional</td>
                                        @else
                                            <td>Tipo {{ $paciente->tipo_diabetes }}</td>
                                        @endif
                                        <td>
                                            <a data-toggle="modal" data-target="#exampleModal-3{{ $paciente->id }}"
                                                class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-outline-warning" data-toggle="modal"
                                                data-target="#exampleModal-2{{ $paciente->id }}"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('paciente.eliminar', $paciente->id) }}"
                                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>

                                        </td>
                                    </tr>


                                    <div class="modal fade" id="exampleModal-2{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-2">Editar paciente</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form method="POST" action="{{ route('paciente.actualizar') }}">
                                                        @csrf
                                                        <input name="idpaciente" type="hidden" value="{{ $paciente->id }}">

                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Nombre</label>
                                                            <div class="col-sm-9">
                                                                <input name="name" type="text"
                                                                    value="{{ $paciente->nombre }}" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Apellido</label>
                                                            <div class="col-sm-9">
                                                                <input name="apellido" type="text"
                                                                    value="{{ $paciente->apellido }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Cédula</label>
                                                            <div class="col-sm-9">
                                                                <input name="cedula" type="text"
                                                                    value="{{ $paciente->cedula }}" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Teléfono</label>
                                                            <div class="col-sm-9">
                                                                <input name="telefono" type="text"
                                                                    value="{{ $paciente->telefono }}"
                                                                    class="form-control" id="exampleInputUsername2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Correo electrónico</label>
                                                            <div class="col-sm-9">
                                                                <input name="email" type="text"
                                                                    value="{{ $paciente->user->email }}" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="exampleInputUsername2"
                                                                class="col-sm-3 col-form-label">Contraseña</label>
                                                            <div class="col-sm-9">
                                                                <input name="password" type="text"
                                                                    placeholder="Nueva contraseña" class="form-control"
                                                                    id="exampleInputUsername2">
                                                            </div>
                                                        </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                                                    <button type="button" class="btn btn-light"
                                                        data-dismiss="modal">Cancelar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                    {{-- MODAL DE DATOS ANTROPOMETRICOS --}}

                                    <div class="modal fade" id="exampleModal-3{{ $paciente->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Datos paciente</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"
                                                    style="display:flex; flex-wrap:wrap; align-content:flex-start">

                                                    {{-- <div>
                                                        @if (isset($paciente->imagen->url) && $sexos[$key]->sexo == 1)
                                                            <img class="img-thumbnail"
                                                                style="max-width:200px; margin-top:80px;"
                                                                src="{{ $paciente->imagen->url }}">
                                                        @else
                                                            <img class="img-thumbnail"
                                                                style="max-width:200px; margin-top:80px;"
                                                                src="{{ asset('img/mujer.png') }}">
                                                        @endif
                                                    </div> --}}

                                                    <div style="margin-left:20px;">

                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Nombre:</strong>
                                                                {{ $paciente->nombre }}</label>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Apellido:</strong>
                                                                {{ $paciente->apellido }}</label>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Cedula:</strong>
                                                                {{ $paciente->cedula }}</label>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Teléfono:</strong>
                                                                {{ $paciente->telefono }}</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="recipient-name"><strong>Correo:</strong>
                                                                {{ $paciente->user->email }}</label>
                                                        </div>
                                                      
                                                        @foreach($paciente->dato_antropometrico as $kp => $data)
                                                        @if($loop->last)
                                                        <div class="form-group">

                                                            <label
                                                                for="recipient-name"><strong>Sexo:</strong>{{ $data->sexo == 1 ? 'Femenino' : 'Masculino' }}</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="recipient-name"><strong>Altura:</strong>{{ $data->altura }}
                                                                mts</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="recipient-name"><strong>Peso:</strong>{{ $data->peso }}
                                                                kg</label>

                                                        </div>

                                                        <div class="form-group">
                                                            <label
                                                                for="recipient-name"><strong>IMC:</strong>{{ $data->imc }}
                                                            </label>
                                                        </div>
                                                        @endif
                                                        @endforeach
                                                      
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6 grid-margin stretch-card">


        <!-- Dummy Modal Ends -->
        <!-- Modal starts -->


        <!-- Modal Ends -->

    </div>
@endsection
