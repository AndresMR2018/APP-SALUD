@extends('nutri.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Editar datos de nutricionista
    </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('administrador.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
        </ol>
    </nav>
</div>
<div class="row">
    
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar datos de nutricionista</h4>
               
                <form method="post" action="{{route('nutricionista.updateCuenta')}}" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <input  name="nombre" type="text" value="{{$nutricionista->nombre}}" class="form-control" id="exampleInputUsername2"
                                >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Apellido</label>
                        <div class="col-sm-9">
                            <input name="apellido" type="text" value="{{$nutricionista->apellido}}" class="form-control" id="exampleInputEmail2"
                                >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Especialidad</label>
                        <div class="col-sm-9">
                            <input name="especialidad" type="text" value="{{$nutricionista->especialidad}}" class="form-control" id="exampleInputEmail2"
                                >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Cédula</label>
                        <div class="col-sm-9">
                            <input name="cedula" type="text" value="{{$nutricionista->cedula}}" class="form-control" id="exampleInputEmail2"
                                >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputMobile"
                            class="col-sm-3 col-form-label">Teléfono</label>
                        <div class="col-sm-9">
                            <input name="telefono" value="{{$nutricionista->telefono}}" type="text" class="form-control" id="exampleInputMobile"
                            >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail2"
                            class="col-sm-3 col-form-label">Correo electrónico</label>
                        <div class="col-sm-9">
                            <input name="email" value="{{$nutricionista->user->email}}" type="email" class="form-control" id="exampleInputEmail2"
                            disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Contraseña nueva</label>
                        <div class="col-sm-9">
                            <input  name="password" type="password" class="form-control" id="exampleInputUsername2"
                                >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Confirmar contraseña</label>
                        <div class="col-sm-9">
                            <input  name="confirm-password" type="password" class="form-control" id="exampleInputUsername2"
                                >
                        </div>
                    </div>

                    @if(isset($nutricionista->imagen->url))
                   <div class="form-group row">
                        <label for="exampleInputPassword2"
                            class="col-sm-3 col-form-label">Foto actual</label>
                        <div class="col-sm-9">
                       <img src="{{$nutricionista->imagen->url}}">
                        </div>
                    </div>
                    @endif

                    <div class="form-group row">
                        <label for="exampleInputPassword2"
                            class="col-sm-3 col-form-label">Actualizar foto</label>
                        <div class="col-sm-9">
                            <input name="imagen" type="file" class="form-control"
                                id="imagen" placeholder="imagen">
                        </div>
                    </div>

                    <div>
                        <img class="img-thumbnail" style="max-width:200px;" src="">
                      </div>
                    
                  
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                   
                </form>
            </div>
        </div>
    </div>
   
   
</div>
@endsection
