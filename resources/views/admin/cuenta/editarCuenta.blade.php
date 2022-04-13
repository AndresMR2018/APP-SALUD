@extends('admin.dashboard')
@section('contenido')
<div class="page-header">
    <h3 class="page-title">
       Editar datos de administración
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
                <h4 class="card-title">  Editar datos de administración</h4>
               
                <form method="POST"  action="{{route('admin.updateCuenta')}}"  class="forms-sample">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputUsername2"
                            class="col-sm-3 col-form-label">Correo electrónico</label>
                        <div class="col-sm-9">
                            <input  type="text" value="{{$administrador->user->email}}" class="form-control"
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
                   <div style="display:flex; justify-content:center;">
                    <button  type="submit" class="btn btn-success">Guardar cambios</button>
                   </div>
                     
                    {{-- <button type="submit" class="btn btn-primary mr-2">Editar datos</button> --}}
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
